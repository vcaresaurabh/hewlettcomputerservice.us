<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';

$services = require ROOT . '/data/services.php';

// Find service by slug
$service = null;
foreach ($services as $svc) {
    if ($svc['slug'] === $service_slug) {
        $service = $svc;
        break;
    }
}

if (!$service) {
    http_response_code(404);
    require ROOT . '/pages/404.php';
    exit;
}

// Related services (3 others)
$related = array_filter($services, fn($s) => $s['slug'] !== $service_slug);
$related = array_values(array_slice($related, 0, 3));

$seo = new Seo(
    $service['name'] . ' — Professional ' . $service['name'] . ' Services',
    $service['short_desc'],
    SITE_URL . '/services/' . $service_slug
);
$seo->addSchema(service_schema(
    $service['name'],
    $service['short_desc'],
    SITE_URL . '/services/' . $service_slug
));
$seo->addSchema(faq_schema($service['faqs']));

require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>

<!-- Hero -->
<section class="pt-32 pb-20 bg-surface-950 relative overflow-hidden">
  <div class="glow-orb w-80 h-80 bg-accent-500/10 -top-20 left-0"></div>
  <div class="glow-orb w-80 h-80 bg-indigo-500/10 -top-20 right-0"></div>
  <div class="absolute inset-0 dot-pattern opacity-20"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="gsap-fade-up max-w-3xl">
      <a href="/services" class="inline-flex items-center gap-1.5 text-xs text-slate-400 hover:text-white mb-6 transition-colors">
        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
        All Services
      </a>
      <div class="flex items-center gap-4 mb-6">
        <div class="w-14 h-14 rounded-2xl flex items-center justify-center shrink-0" style="background:linear-gradient(135deg,rgba(14,165,233,0.2),rgba(99,102,241,0.2))">
          <span class="text-accent-400"><?php echo service_icon($service['slug'], 'w-7 h-7'); ?></span>
        </div>
        <div>
          <h1 class="font-display font-bold text-5xl md:text-6xl text-white leading-tight">
            <?php echo e($service['name']); ?>
          </h1>
        </div>
      </div>
      <p class="text-xl text-slate-400 leading-relaxed mb-8"><?php echo e($service['tagline']); ?></p>
      <div class="flex flex-wrap gap-4">
        <a href="/book?service=<?php echo e($service['slug']); ?>" class="btn-primary px-8 py-4 text-base">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          Book This Service
        </a>
        <a href="tel:+12056494627" class="btn-outline px-8 py-4 text-base">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
          Call (205) 649-4627
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Description -->
<section class="py-20 bg-surface-900">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 gsap-fade-up">
      <?php $half = ceil(count($service['long_desc']) / 2); ?>
      <div class="space-y-4">
        <?php foreach (array_slice($service['long_desc'], 0, $half) as $para): ?>
        <p class="text-slate-400 leading-relaxed"><?php echo e($para); ?></p>
        <?php endforeach; ?>
      </div>
      <div class="space-y-4">
        <?php foreach (array_slice($service['long_desc'], $half) as $para): ?>
        <p class="text-slate-400 leading-relaxed"><?php echo e($para); ?></p>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Sub-services / Pricing -->
<section class="py-20 bg-surface-950">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12 gsap-fade-up">
      <span class="badge-accent mb-4 inline-flex">Pricing</span>
      <h2 class="section-heading mb-4">Services &amp; Pricing</h2>
      <p class="text-slate-400 max-w-xl mx-auto">Transparent, upfront pricing. We quote before we start — no surprises.</p>
    </div>
    <div class="gsap-stagger grid md:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($service['sub_services'] as $ss): ?>
      <div class="card p-5 rounded-2xl flex flex-col">
        <div class="flex items-start justify-between gap-3 mb-3">
          <h3 class="font-display font-semibold text-white text-sm leading-snug"><?php echo e($ss['name']); ?></h3>
          <span class="badge-accent shrink-0 text-xs"><?php echo e($ss['price']); ?></span>
        </div>
        <p class="text-slate-400 text-xs leading-relaxed flex-1 mb-4"><?php echo e($ss['desc']); ?></p>
        <a href="/book?service=<?php echo e($service['slug']); ?>" class="btn-outline text-xs py-2 justify-center">Book Now</a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- How it works -->
<section class="py-20 bg-surface-900 relative overflow-hidden">
  <div class="absolute inset-0 dot-pattern opacity-20"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12 gsap-fade-up">
      <span class="badge-indigo mb-4 inline-flex">Process</span>
      <h2 class="section-heading mb-4">How it works</h2>
    </div>
    <div class="gsap-stagger grid md:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach ($service['how_it_works'] as $step): ?>
      <div class="card p-6 rounded-2xl relative">
        <div class="step-indicator mb-4 w-10 h-10 text-sm"><?php echo e($step['step']); ?></div>
        <h3 class="font-display font-semibold text-white mb-2"><?php echo e($step['title']); ?></h3>
        <p class="text-slate-400 text-sm leading-relaxed"><?php echo e($step['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="py-20 bg-surface-950">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12 gsap-fade-up">
      <span class="badge-accent mb-4 inline-flex">FAQ</span>
      <h2 class="section-heading mb-4">Questions about <?php echo e($service['name']); ?></h2>
    </div>
    <div class="space-y-3" data-accordion-group>
      <?php foreach ($service['faqs'] as $faq): ?>
      <div class="card rounded-2xl overflow-hidden">
        <button data-accordion-trigger aria-expanded="false" class="w-full flex items-center justify-between p-5 text-left hover:bg-white/2 transition-colors">
          <span class="font-medium text-white text-sm pr-4"><?php echo e($faq['q']); ?></span>
          <svg data-accordion-icon class="w-4 h-4 text-slate-400 shrink-0 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="accordion-content">
          <div class="px-5 pb-5 text-slate-400 text-sm leading-relaxed border-t border-[#1E2D42] pt-4"><?php echo e($faq['a']); ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Related services -->
<section class="py-20 bg-surface-900">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-10 gsap-fade-up">
      <h2 class="font-display font-bold text-3xl text-white">Related Services</h2>
    </div>
    <div class="gsap-stagger grid md:grid-cols-3 gap-5">
      <?php foreach ($related as $rel): ?>
      <a href="/services/<?php echo e($rel['slug']); ?>" class="card card-hover group p-5 rounded-2xl block">
        <div class="flex items-center gap-3 mb-3">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="background:linear-gradient(135deg,rgba(14,165,233,0.15),rgba(99,102,241,0.15))">
            <span class="text-accent-400"><?php echo service_icon($rel['slug'], 'w-5 h-5'); ?></span>
          </div>
          <h3 class="font-display font-semibold text-white text-sm group-hover:text-accent-400 transition-colors"><?php echo e($rel['name']); ?></h3>
        </div>
        <p class="text-slate-500 text-xs leading-relaxed"><?php echo e($rel['tagline']); ?></p>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<?php
$cta_primary = ['text' => 'Book ' . $service['name'], 'url' => '/book?service=' . urlencode($service_slug)];
require ROOT . '/partials/cta.php'; ?>

<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
<?php require ROOT . '/partials/booking-widget.php'; ?>
</body>
</html>
