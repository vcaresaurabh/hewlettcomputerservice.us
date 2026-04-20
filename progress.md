# Hewlett Computer Service — Project Progress

**Site:** hewlettcomputerservice.us
**Stack:** PHP 8.1 · MySQL/PDO · Tailwind CSS v3 · Alpine.js · GSAP 3 · PHPMailer
**Status:** LIVE — Deployed to Hostinger. DB not yet configured (bookings save silently fail until config.php created).

---

## Session 4 Changes (2026-04-20)

- [x] **Favicon added** — `favicon.ico` (16/32/48px embedded), `apple-touch-icon.png` (180×180) generated with brand gradient; `?v=2` cache-bust query on all icon links
- [x] **OG image created** — `assets/img/og-image.png` (1200×630) with dark branded layout: logo icon, gradient title, tagline, trust badges, URL; used across all pages via seo.php
- [x] **head.php meta enhanced** — added `theme-color`, `msapplication-TileColor`, `robots` (max-image-preview:large), `author`, geo tags (`geo.region`, `geo.placename`, `geo.position`, `ICBM`), `format-detection`
- [x] **seo.php OG tags upgraded** — added `og:image:width/height/type/alt`, `og:locale:alternate`, `twitter:site`, `twitter:creator`, `twitter:image:alt`
- [x] **Booking rate limit relaxed** — `api/book.php` changed from 3/300s to 5/60s so testing doesn't trip it
- [x] **Booking success popup redesigned** — animated pulsing checkmark, glowing booking-ref card with click-to-copy, inline confirmation details (email, 1hr ETA, phone), two CTAs
- [x] **Deployed to Hostinger** — favicon.ico, apple-touch-icon.png, og-image.png, head.php, seo.php, pages/book.php, api/book.php synced live

---

## Session 3 Changes (2026-04-20)

- [x] **"Tech support" replaced** — all bold/heading uses changed to "technical assistance" across home.php, about.php, partners.php, footer.php, seo.php
- [x] **Admin panel created** — `/admin` login (user: admin, pass: Hewlett@Admin2026), `/admin/leads` shows bookings + contact forms table, handles missing DB gracefully
- [x] **`/services/smart-home-iot` fixed** — slug changed from `smart-home` to `smart-home-iot` in data/services.php, index.php, api/book.php, helpers.php, sitemap.xml
- [x] **Light theme completely removed** — `html:not(.dark)` CSS removed from input.css, toggle button removed from navbar, head.php simplified to always force dark
- [x] **SEO service fully removed** — removed from valid_slugs in api/book.php; sitemap.xml entry removed
- [x] **Button hover text fixed** — `isolation: isolate` + `::before { z-index: -1 }` on `.btn-primary` so hover gradient never obscures text
- [x] **GSAP visibility fixed** — `immediateRender: false` added to all `.gsap-stagger` and `.gsap-fade-up` animations; trigger changed to `top 92%` to ensure off-screen elements animate in
- [x] **Tailwind CSS rebuilt** — `npm run build` complete, app.css updated
- [x] **Deployed to Hostinger** — rsync to `~/domains/hewlettcomputerservice.us/public_html/` via SSH port 65002; site live at https://hewlettcomputerservice.us

### Pending after deploy
- Create MySQL DB in Hostinger hPanel, then SSH and create `config/config.php` with DB + SMTP credentials
- Import `sql/schema.sql` via phpMyAdmin to enable booking storage
- Admin login: user=admin, pass=Hewlett@Admin2026 (hash stored in admin-login.php)

---

## Session 2 Changes (2026-04-20)

- [x] **Dark mode forced as default** — bootstrap script in `head.php` always adds `.dark` unless user explicitly chose light; removed system-preference fallback to light
- [x] **JetBrains Mono font** — added to Google Fonts load + tailwind config; used in terminal sections
- [x] **Light mode CSS overrides** — added `html:not(.dark)` rules in `input.css` for body, cards, section headings, navbar glassmorphic, patterns, forms, buttons
- [x] **SEO service hidden** — `website-seo` entry in `data/services.php` wrapped in `/* ... */` comment block; easy to re-enable
- [x] **Home page images added:**
  - Hero section: Unsplash tech/laptop background at 6% opacity behind the grid pattern
  - New **"Why Choose Hewlett"** section (between Stats and Services) — full image of technician + floating badge widgets + 4-point benefits list
  - New **tech visual banner** before the CTA — full-bleed smart home image with content overlay
- [x] **Tailwind CSS rebuilt** — `npm run build` complete, `assets/css/app.css` updated
- [x] **STARTUP.md created** — server startup guide at repo root

---

## Project Checklist

### Core Infrastructure
- [x] Front controller (`public_html/index.php`) — single-entry routing for all 19 routes
- [x] `.htaccess` — force HTTPS, mod_rewrite, security headers, gzip, asset caching
- [x] Tailwind build pipeline (`package.json`, `tailwind.config.js`, `src/input.css`)
- [x] Compiled CSS (`public_html/assets/css/app.css`) — 36KB minified
- [x] JavaScript (`public_html/assets/js/app.js`) — GSAP init, theme toggle, forms
- [x] Database schema (`sql/schema.sql`) — 4 tables
- [x] Config sample (`public_html/config/config.sample.php`)
- [x] `.gitignore` — excludes config.php, app.css, node_modules, logs

### Includes / Core PHP
- [x] `includes/helpers.php` — e(), asset(), url(), csrf_token(), csrf_verify(), old(), redirect(), rate_limit(), json_response(), sanitize(), valid_email(), generate_booking_ref(), nav_active(), service_icon()
- [x] `includes/db.php` — PDO singleton, ERRMODE_EXCEPTION, FETCH_ASSOC
- [x] `includes/seo.php` — Seo class, org_schema(), local_business_schema(), service_schema(), faq_schema()
- [x] `includes/mailer.php` — send_mail(), mail_template() HTML email

### Data Files
- [x] `data/services.php` — 9 services: slug, name, tagline, long_desc, sub_services (with pricing), how_it_works, faqs (5 each)
- [x] `data/memberships.php` — 3 plans × 4 billing periods (6mo/1yr/2yr/3yr)
- [x] `data/testimonials.php` — 12 testimonials with rating, role, service
- [x] `data/faqs.php` — 6 categories, 30+ Q&A items
- [x] `data/partners.php` — trust logos, program benefits, ideal partner types

### Partials (Shared UI)
- [x] `partials/head.php` — dark mode bootstrap script, Google Fonts, Tailwind CSS, Alpine.js CDN
- [x] `partials/navbar.php` — glassmorphic scroll transition, services mega-dropdown, dark mode toggle, mobile drawer
- [x] `partials/footer.php` — newsletter AJAX form, 4-col links, trust badges
- [x] `partials/scripts.php` — GSAP 3.12.5 + ScrollTrigger CDN
- [x] `partials/cta.php` — reusable CTA section with glow orbs
- [x] `partials/booking-widget.php` — floating Book Now button (scroll-triggered)

### Pages (19 Routes)

#### Main Pages
- [x] `/` → `pages/home.php` — hero (terminal aesthetic), trust marquee, stats counters, services bento grid, how-it-works, membership teaser (Alpine.js billing toggle), testimonials carousel, FAQ accordion teaser, CTA
- [x] `/services` → `pages/services-index.php` — all 9 service cards grid
- [x] `/services/{slug}` → `pages/service-detail.php` — dynamic (9 slugs), long desc, sub-service pricing cards, how-it-works, FAQ accordion, related services

#### Service Slugs (9)
- [x] `/services/virus-malware-removal`
- [x] `/services/pc-laptop-repair`
- [x] `/services/data-recovery`
- [x] `/services/network-wifi-setup`
- [x] `/services/software-installation`
- [x] `/services/remote-support`
- [x] `/services/business-it-support`
- [x] `/services/hardware-upgrades`
- [x] `/services/smart-home-iot`

#### Booking
- [x] `/book` → `pages/book.php` — Alpine.js 4-step form (service → datetime → contact → review), AJAX submit, success modal with booking_ref
- [x] `/book/confirmation` → `pages/book-confirmation.php` — next-steps list

#### Information Pages
- [x] `/membership` → `pages/membership.php` — 3 plan cards, Alpine.js billing toggle, feature comparison table, membership FAQ
- [x] `/about` → `pages/about.php`
- [x] `/faq` → `pages/faq.php` — 6 category tabs, accordions
- [x] `/contact` → `pages/contact.php` — contact form with AJAX
- [x] `/partners` → `pages/partners.php` — partner application form

#### Legal Pages (8)
- [x] `/privacy` → `pages/privacy.php` — CCPA/CPRA/GDPR/PIPEDA, data categories, retention table
- [x] `/terms` → `pages/terms.php` — services, payment, arbitration/class-action waiver, California law
- [x] `/cookie-policy` → `pages/cookie-policy.php` — per-cookie table with expiry
- [x] `/disclaimer` → `pages/disclaimer.php`
- [x] `/cancellation-policy` → `pages/cancellation-policy.php` — 30-day guarantee, tiered fees, tech credits
- [x] `/eula` → `pages/eula.php`
- [x] `/uninstall` → `pages/uninstall.php` — Alpine.js platform tabs (Windows/macOS/iOS/Android)
- [x] `/opt-in-opt-out` → `pages/opt-in-opt-out.php` — email/SMS opt-out, CCPA rights

#### System
- [x] 404 → `pages/404.php` — gradient 404, return home / browse services

### API Endpoints (4 POST)
- [x] `POST /api/contact` — rate limit, CSRF, honeypot, PDO insert, admin + auto-reply emails
- [x] `POST /api/book` — rate limit, CSRF, slug whitelist validation, booking_ref generation, PDO insert, confirmation emails
- [x] `POST /api/newsletter` — rate limit, honeypot, resubscribe handling, welcome email
- [x] `POST /api/partners` — rate limit, honeypot, free-domain block, PDO insert, admin + applicant emails

### SEO & Discoverability
- [x] `public_html/sitemap.xml` — 25 URLs with priorities (homepage 1.0, services 0.9, legal 0.3)
- [x] `public_html/robots.txt` — allow all, disallow /config/ /includes/ /api/ /lib/ /data/
- [x] Per-page `<title>`, meta description, canonical, Open Graph, Twitter Cards
- [x] JSON-LD schemas: Organization, LocalBusiness, Service, FAQPage

### Security
- [x] CSRF tokens on all forms (session-based, hash_equals comparison)
- [x] Honeypot fields on all public forms
- [x] IP-based rate limiting (filesystem JSON cache, no Redis required)
- [x] PDO prepared statements everywhere (EMULATE_PREPARES = false)
- [x] Output escaping via e() on all user-supplied data
- [x] Security headers in .htaccess (X-Frame-Options, X-Content-Type-Options, HSTS, Permissions-Policy)
- [x] Block direct access to config/, includes/, lib/, data/, api/ PHP files via .htaccess

### Design System
- [x] Dark-first theme (#080B12 bg, #0EA5E9 accent, #6366F1 indigo)
- [x] Space Grotesk display + Inter body (Google Fonts)
- [x] Glassmorphic navbar (backdrop-blur, rgba bg on scroll)
- [x] Gradient border CTA buttons (shimmer hover animation)
- [x] Noise overlay, dot pattern, grid pattern, glow orbs
- [x] Terminal aesthetic decorative element (hero)
- [x] GSAP ScrollTrigger: fade-up, stagger, data-counter, hero entrance, parallax, card hover
- [x] CSS marquee animation (duplicated track, seamless loop)
- [x] Dark mode toggle (localStorage 'hcs-theme', no flash on load)

### PHPMailer
- [x] Stub files in `lib/PHPMailer/` (PHPMailer.php, SMTP.php, Exception.php)
- [ ] **Replace stubs** with real PHPMailer src/ files from github.com/PHPMailer/PHPMailer

---

## File Count Summary

| Directory | Files |
|---|---|
| `public_html/pages/` | 19 |
| `public_html/api/` | 4 |
| `public_html/partials/` | 6 |
| `public_html/includes/` | 4 |
| `public_html/data/` | 5 |
| `public_html/lib/PHPMailer/` | 3 (stubs) |
| `public_html/config/` | 1 (sample) |
| `public_html/assets/` | 2 (css + js) |
| Root config | 5 (package.json, tailwind.config.js, .gitignore, .htaccess, STARTUP.md) |
| SQL | 1 |
| SEO | 2 (sitemap.xml, robots.txt) |
| **Total** | **~51 files** |

---

## Deployment Checklist

- [ ] Copy `public_html/` to Hostinger's `public_html/`
- [ ] Copy `config/config.sample.php` → `config/config.php` and fill in DB + SMTP credentials
- [ ] Import `sql/schema.sql` via phpMyAdmin
- [ ] Replace `lib/PHPMailer/` stub files with real PHPMailer source (PHPMailer.php, SMTP.php, Exception.php from `src/` on GitHub)
- [x] Upload a real `favicon.ico` to `public_html/` — generated with brand gradient, 16/32/48px
- [x] Upload `og-image.png` to `public_html/assets/img/` — 1200×630 branded social share image
- [ ] Run `npm run build` locally before deploy to ensure latest CSS is committed
- [ ] Verify HTTPS redirect is working after deploy
- [ ] Test booking form end-to-end (submit → email confirmation → booking_ref in DB)
- [ ] Test contact form, newsletter signup, partner application

---

## Known Gaps / Optional Improvements

- `public_html/assets/img/` — has `og-image.png` (1200×630) and `apple-touch-icon.png` (180×180); hero/service photos optional
- PHPMailer stubs functional (log to error_log) but emails won't send until replaced
- No admin dashboard — bookings/contacts viewable only via DB
- No unsubscribe landing page for newsletter (link in email would need `/unsubscribe?token=...` route)
