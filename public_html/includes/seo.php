<?php
declare(strict_types=1);

class Seo {
    private string $title;
    private string $description;
    private string $canonical;
    private string $og_type;
    private string $og_image;
    private array $extra_meta = [];
    private array $schema = [];

    public function __construct(
        string $title = '',
        string $description = '',
        string $canonical = '',
        string $og_type = 'website',
        string $og_image = ''
    ) {
        $this->title       = $title ?: SITE_NAME;
        $this->description = $description ?: 'Expert technical assistance, smart home installation, and IT services delivered to your door. CompTIA-certified technicians. Same-day service. 30-day money-back guarantee.';
        $this->canonical   = $canonical ?: SITE_URL . (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));
        $this->og_type     = $og_type;
        $this->og_image    = $og_image ?: SITE_URL . '/assets/img/og-image.png';
    }

    public function addSchema(array $schema): void {
        $this->schema[] = $schema;
    }

    public function render(): void {
        $title = e($this->title . (str_contains($this->title, SITE_NAME) ? '' : ' | ' . SITE_NAME));
        $desc  = e($this->description);
        $canon = e($this->canonical);
        $image = e($this->og_image);
        $type  = e($this->og_type);

        echo "<title>{$title}</title>\n";
        echo "<meta name=\"description\" content=\"{$desc}\">\n";
        echo "<link rel=\"canonical\" href=\"{$canon}\">\n";

        // Open Graph
        echo "<meta property=\"og:type\" content=\"{$type}\">\n";
        echo "<meta property=\"og:title\" content=\"{$title}\">\n";
        echo "<meta property=\"og:description\" content=\"{$desc}\">\n";
        echo "<meta property=\"og:url\" content=\"{$canon}\">\n";
        echo "<meta property=\"og:image\" content=\"{$image}\">\n";
        echo "<meta property=\"og:image:width\" content=\"1200\">\n";
        echo "<meta property=\"og:image:height\" content=\"630\">\n";
        echo "<meta property=\"og:image:type\" content=\"image/png\">\n";
        echo "<meta property=\"og:image:alt\" content=\"" . e(SITE_NAME) . " — Expert Technical Assistance\">\n";
        echo "<meta property=\"og:site_name\" content=\"" . e(SITE_NAME) . "\">\n";
        echo "<meta property=\"og:locale\" content=\"en_US\">\n";
        echo "<meta property=\"og:locale:alternate\" content=\"en_GB\">\n";

        // Twitter Card
        echo "<meta name=\"twitter:card\" content=\"summary_large_image\">\n";
        echo "<meta name=\"twitter:site\" content=\"@HewlettCS\">\n";
        echo "<meta name=\"twitter:creator\" content=\"@HewlettCS\">\n";
        echo "<meta name=\"twitter:title\" content=\"{$title}\">\n";
        echo "<meta name=\"twitter:description\" content=\"{$desc}\">\n";
        echo "<meta name=\"twitter:image\" content=\"{$image}\">\n";
        echo "<meta name=\"twitter:image:alt\" content=\"" . e(SITE_NAME) . " — Expert Technical Assistance\">\n";

        // Schema.org
        foreach ($this->schema as $schema) {
            echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
        }
    }
}

function org_schema(): array {
    return [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => SITE_NAME,
        'url'      => SITE_URL,
        'logo'     => SITE_URL . '/assets/img/logo.svg',
        'sameAs'   => [],
        'contactPoint' => [
            '@type'             => 'ContactPoint',
            'telephone'         => SITE_PHONE_RAW,
            'contactType'       => 'customer service',
            'areaServed'        => ['US', 'GB', 'CA'],
            'availableLanguage' => 'English',
            'hoursAvailable'    => 'Mo-Fr 08:00-19:00, Sa 09:00-17:00',
        ],
        'address' => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => '2634 Cove Court',
            'addressLocality' => 'Vista',
            'addressRegion'   => 'CA',
            'postalCode'      => '92081',
            'addressCountry'  => 'US',
        ],
    ];
}

function local_business_schema(): array {
    return [
        '@context' => 'https://schema.org',
        '@type'    => 'LocalBusiness',
        'name'     => SITE_NAME,
        'url'      => SITE_URL,
        'telephone' => SITE_PHONE_RAW,
        'email'    => SITE_EMAIL,
        'address'  => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => '2634 Cove Court',
            'addressLocality' => 'Vista',
            'addressRegion'   => 'CA',
            'postalCode'      => '92081-8701',
            'addressCountry'  => 'US',
        ],
        'openingHoursSpecification' => [
            ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'], 'opens' => '08:00', 'closes' => '19:00'],
            ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Saturday'], 'opens' => '09:00', 'closes' => '17:00'],
        ],
        'priceRange' => '$$',
        'areaServed' => ['US', 'GB', 'CA'],
        'aggregateRating' => [
            '@type'       => 'AggregateRating',
            'ratingValue' => '4.9',
            'reviewCount' => '50000',
        ],
    ];
}

function service_schema(string $name, string $description, string $url): array {
    return [
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => $name,
        'description' => $description,
        'url'         => $url,
        'provider'    => [
            '@type' => 'Organization',
            'name'  => SITE_NAME,
            'url'   => SITE_URL,
        ],
        'areaServed'  => ['US', 'GB', 'CA'],
    ];
}

function faq_schema(array $faqs): array {
    $items = array_map(fn($faq) => [
        '@type'          => 'Question',
        'name'           => $faq['q'],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
    ], $faqs);

    return [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $items,
    ];
}
