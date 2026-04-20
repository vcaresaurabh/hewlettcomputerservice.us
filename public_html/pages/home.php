<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';

$seo = new Seo(
    'Hewlett Computer Service — Expert Technical Assistance & Smart Home Installation',
    'CompTIA-certified technical assistance, smart home installation, WiFi, TV mounting, and more. Same-day service across USA, UK & Canada. 30-day money-back guarantee.',
    SITE_URL . '/'
);
$seo->addSchema(org_schema());
$seo->addSchema(local_business_schema());

$services    = require ROOT . '/data/services.php';
$memberships = require ROOT . '/data/memberships.php';
$testimonials= require ROOT . '/data/testimonials.php';
$faqs_all    = require ROOT . '/data/faqs.php';
$faqs        = array_slice($faqs_all[0]['items'], 0, 5);

require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>

<!-- HERO -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden hero-bg noise-overlay pt-16">
  <!-- Hero background image -->
  <div class="absolute inset-0 z-0">
    <img
      src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=1920&q=60"
      alt=""
      class="w-full h-full object-cover opacity-[0.06]"
      loading="eager"
    />
  </div>

  <!-- Background gradient blobs -->
  <div class="glow-orb w-[600px] h-[600px] bg-accent-500/10 -top-40 -left-40 animate-pulse-slow"></div>
  <div class="glow-orb w-[500px] h-[500px] bg-indigo-500/10 -bottom-20 -right-20 animate-pulse-slow animation-delay-300"></div>

  <!-- Grid pattern -->
  <div class="absolute inset-0 grid-pattern opacity-30"></div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 grid lg:grid-cols-2 gap-16 items-center">
    <!-- Text -->
    <div class="hero-content">
      <div class="badge-accent mb-6">
        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
        CompTIA A+ Certified Technicians
      </div>
      <h1 class="font-display font-bold text-5xl md:text-6xl xl:text-7xl text-white leading-[1.05] tracking-tight mb-6">
        Expert Technical Assistance,<br><em class="gradient-text not-italic">Delivered</em><br>to Your Door.
      </h1>
      <p class="text-lg md:text-xl text-slate-400 leading-relaxed mb-8 max-w-lg">
        Trusted by thousands of homeowners and businesses across the US. Same-day service, certified technicians, and a 30-day money-back guarantee — on every job.
      </p>
      <div class="flex flex-wrap gap-4 mb-10">
        <a href="/book" class="btn-primary px-8 py-4 text-base">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          Book a Service
        </a>
        <a href="/membership" class="btn-outline px-8 py-4 text-base">
          Explore Plans
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
        </a>
      </div>
      <!-- Trust indicators -->
      <div class="flex flex-wrap items-center gap-5">
        <div class="flex items-center gap-1.5 text-sm text-slate-400">
          <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
          20+ Years Experience
        </div>
        <div class="flex items-center gap-1.5 text-sm text-slate-400">
          <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          4.9★ Average Rating
        </div>
        <div class="flex items-center gap-1.5 text-sm text-slate-400">
          <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
          Licensed & Insured
        </div>
      </div>
    </div>

    <!-- Terminal visual -->
    <div class="hidden lg:block relative animate-float">
      <div class="terminal max-w-sm ml-auto relative">
        <div class="terminal-bar">
          <div class="terminal-dot bg-[#ff5f57]"></div>
          <div class="terminal-dot bg-[#febc2e]"></div>
          <div class="terminal-dot bg-[#28c840]"></div>
          <span class="ml-3 text-[#8b949e] text-xs">technician@hewlett ~ </span>
        </div>
        <div class="p-5 text-xs leading-relaxed space-y-1" style="min-height:220px">
          <p><span class="text-[#79c0ff]">$</span> <span class="text-[#e6edf3]">run diagnostic --device laptop</span></p>
          <p class="text-[#3fb950]">✓ Scanning hardware components...</p>
          <p class="text-[#3fb950]">✓ Checking OS integrity...</p>
          <p class="text-[#3fb950]">✓ Running virus scan (0 threats)</p>
          <p class="text-[#ffa657]">⚠ SSD health: 67% — upgrade recommended</p>
          <p class="text-[#3fb950]">✓ Network connectivity: stable</p>
          <p class="text-[#3fb950]">✓ RAM utilization: normal</p>
          <p>&nbsp;</p>
          <p><span class="text-[#79c0ff]">$</span> <span class="text-[#e6edf3]">fix --ssd-upgrade --optimize</span></p>
          <p class="text-[#3fb950]">✓ SSD upgraded to 1TB NVMe</p>
          <p class="text-[#3fb950]">✓ Data migrated (100%)</p>
          <p class="text-[#3fb950]">✓ Boot time: 4.2s (was 47s)</p>
          <p>&nbsp;</p>
          <p><span class="text-[#79c0ff]">$</span> <span class="text-[#e6edf3]">✦ All done. Your tech is healthy.</span></p>
        </div>
      </div>
      <!-- Glow under terminal -->
      <div class="absolute -bottom-8 left-1/2 -translate-x-1/2 w-64 h-16 rounded-full blur-2xl" style="background:rgba(14,165,233,0.2)"></div>
    </div>
  </div>

  <!-- Scroll indicator -->
  <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-40">
    <span class="text-xs text-slate-500">Scroll to explore</span>
    <div class="w-5 h-8 border border-slate-600 rounded-full flex items-start justify-center p-1.5">
      <div class="w-1 h-2 bg-slate-500 rounded-full animate-bounce"></div>
    </div>
  </div>
</section>

<!-- TRUST BAR / MARQUEE -->
<section class="py-10 border-y border-[#1E2D42] bg-surface-900/50 overflow-hidden">
  <p class="text-center text-xs text-slate-500 uppercase tracking-wider font-semibold mb-6">Certified and trusted by industry leaders</p>
  <div class="relative overflow-hidden">
    <div class="flex">
      <div class="marquee-track marquee-track-1 flex items-center gap-12 px-6">
        <?php $trust_logos = ['CompTIA A+','Microsoft Partner','Apple Certified','Google Certified','Ring Pro','Nest Pro','Cisco','Eero','Arlo','Samsung','Ubiquiti','HP Partner']; ?>
        <?php foreach ($trust_logos as $logo): ?>
        <div class="flex items-center gap-2 whitespace-nowrap shrink-0">
          <div class="w-7 h-7 rounded-lg bg-accent-500/10 border border-accent-500/20 flex items-center justify-center shrink-0">
            <svg class="w-3.5 h-3.5 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
          </div>
          <span class="text-slate-400 font-medium text-sm"><?php echo e($logo); ?></span>
        </div>
        <?php endforeach; ?>
      </div>
      <!-- Duplicate for seamless loop -->
      <div class="marquee-track marquee-track-1 flex items-center gap-12 px-6" aria-hidden="true">
        <?php foreach ($trust_logos as $logo): ?>
        <div class="flex items-center gap-2 whitespace-nowrap shrink-0">
          <div class="w-7 h-7 rounded-lg bg-accent-500/10 border border-accent-500/20 flex items-center justify-center shrink-0">
            <svg class="w-3.5 h-3.5 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
          </div>
          <span class="text-slate-400 font-medium text-sm"><?php echo e($logo); ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="py-20 bg-surface-900">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="gsap-stagger grid grid-cols-2 lg:grid-cols-4 gap-6">
      <?php $stats = [
        ['val' => '20',  'suffix' => '+',  'label' => 'Years of Trust'],
        ['val' => '50',  'suffix' => 'K+', 'label' => 'Happy Customers'],
        ['val' => '30',  'suffix' => 'M+', 'label' => 'Jobs Completed'],
        ['val' => '4.9', 'suffix' => '★',  'label' => 'Average Rating', 'float' => true],
      ]; ?>
      <?php foreach ($stats as $s): ?>
      <div class="card p-6 text-center rounded-2xl">
        <p class="font-display font-bold text-4xl md:text-5xl text-white mb-2"
           data-counter="<?php echo e($s['val']); ?>"
           data-suffix="<?php echo e($s['suffix']); ?>"
           <?php if (!empty($s['float'])): ?>data-float="true"<?php endif; ?>>
          <?php echo e(is_numeric($s['val']) && $s['val'] >= 1000 ? number_format((float)$s['val']) : $s['val']); ?><?php echo e($s['suffix']); ?>
        </p>
        <p class="text-slate-400 text-sm font-medium"><?php echo e($s['label']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- WHY CHOOSE HEWLETT -->
<section class="py-24 bg-surface-950 relative overflow-hidden">
  <div class="absolute inset-0 dot-pattern opacity-10"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-14 items-center">

      <!-- Image column -->
      <div class="relative gsap-fade-up order-2 lg:order-1">
        <div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-black/60">
          <img
            src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=800&q=80"
            alt="Certified technician repairing a laptop"
            class="w-full h-[440px] object-cover"
            loading="lazy"
          />
          <div class="absolute inset-0 bg-gradient-to-t from-surface-950/60 via-transparent to-transparent"></div>
        </div>
        <!-- Floating stat badge -->
        <div class="absolute -bottom-5 -right-4 card p-4 rounded-2xl flex items-center gap-3 shadow-xl shadow-black/40">
          <div class="w-11 h-11 rounded-xl bg-emerald-500/15 border border-emerald-500/25 flex items-center justify-center shrink-0">
            <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </div>
          <div>
            <p class="text-white font-bold text-sm leading-none">30-Day Guarantee</p>
            <p class="text-slate-400 text-xs mt-0.5">On every single job</p>
          </div>
        </div>
        <!-- Floating certification badge -->
        <div class="absolute -top-5 -left-4 card p-3.5 rounded-2xl flex items-center gap-2.5 shadow-xl shadow-black/40">
          <div class="w-9 h-9 rounded-lg flex items-center justify-center shrink-0" style="background:linear-gradient(135deg,#0EA5E9,#6366F1)">
            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          </div>
          <div>
            <p class="text-white font-semibold text-xs leading-none">CompTIA A+ Certified</p>
            <p class="text-slate-400 text-xs mt-0.5">All technicians</p>
          </div>
        </div>
      </div>

      <!-- Content column -->
      <div class="gsap-fade-up order-1 lg:order-2">
        <span class="badge-accent mb-5 inline-flex">Why Choose Hewlett</span>
        <h2 class="font-display font-bold text-4xl md:text-5xl text-white leading-tight mb-6">
          Real assistance that actually <em class="gradient-text not-italic">shows up.</em>
        </h2>
        <p class="text-slate-400 text-lg leading-relaxed mb-8">
          No call centers, no overseas tickets. When you book with us, a certified local technician arrives — on time, fully equipped, and focused on your problem.
        </p>
        <ul class="space-y-4 mb-9">
          <?php $benefits = [
            ['icon' => 'clock', 'title' => 'Same-Day Availability', 'desc' => 'Book online and get a confirmed technician within hours — not days.'],
            ['icon' => 'shield', 'title' => 'Licensed & Insured', 'desc' => 'Every tech is background-checked, certified, and fully insured for your peace of mind.'],
            ['icon' => 'currency', 'title' => 'Transparent Pricing', 'desc' => 'Upfront quotes before any work begins. No hidden fees, ever.'],
            ['icon' => 'refresh', 'title' => 'Free Return Visits', 'desc' => 'Same issue within 30 days? We come back at zero charge.'],
          ]; ?>
          <?php foreach ($benefits as $b): ?>
          <li class="flex items-start gap-4">
            <div class="w-9 h-9 rounded-xl bg-accent-500/10 border border-accent-500/20 flex items-center justify-center shrink-0 mt-0.5">
              <?php if ($b['icon'] === 'clock'): ?>
              <svg class="w-4 h-4 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              <?php elseif ($b['icon'] === 'shield'): ?>
              <svg class="w-4 h-4 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
              <?php elseif ($b['icon'] === 'currency'): ?>
              <svg class="w-4 h-4 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33"/></svg>
              <?php else: ?>
              <svg class="w-4 h-4 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/></svg>
              <?php endif; ?>
            </div>
            <div>
              <p class="text-white font-semibold text-sm"><?php echo e($b['title']); ?></p>
              <p class="text-slate-400 text-sm leading-relaxed mt-0.5"><?php echo e($b['desc']); ?></p>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="/about" class="btn-secondary">Meet Our Team</a>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES BENTO GRID -->
<section class="py-24 bg-surface-950">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 gsap-fade-up">
      <span class="badge-accent mb-4 inline-flex">9 Service Categories</span>
      <h2 class="section-heading mb-4">Everything your tech needs,<br><em class="gradient-text not-italic">under one roof.</em></h2>
      <p class="section-subheading mx-auto">From slow computers to full smart home automation — certified technicians for every job.</p>
    </div>

    <div class="gsap-stagger grid grid-cols-2 md:grid-cols-3 gap-4">
      <?php foreach ($services as $svc): ?>
      <a href="/services/<?php echo e($svc['slug']); ?>" class="card card-hover group p-6 block rounded-2xl relative overflow-hidden">
        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300" style="background:linear-gradient(135deg,rgba(14,165,233,0.04),rgba(99,102,241,0.04))"></div>
        <div class="relative">
          <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4 transition-all duration-300 group-hover:scale-110" style="background:linear-gradient(135deg,rgba(14,165,233,0.15),rgba(99,102,241,0.15))">
            <span class="text-accent-400"><?php echo service_icon($svc['slug'], 'w-5 h-5'); ?></span>
          </div>
          <h3 class="font-display font-semibold text-white text-base mb-1.5 group-hover:text-accent-400 transition-colors"><?php echo e($svc['name']); ?></h3>
          <p class="text-slate-500 text-xs leading-relaxed mb-3"><?php echo e($svc['tagline']); ?></p>
          <span class="text-xs text-accent-500 font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
            Learn more
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
          </span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-10 gsap-fade-up">
      <a href="/services" class="btn-secondary">View all services</a>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="py-24 bg-surface-900 relative overflow-hidden">
  <div class="absolute inset-0 dot-pattern opacity-20"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 gsap-fade-up">
      <span class="badge-indigo mb-4 inline-flex">How It Works</span>
      <h2 class="section-heading mb-4">Three steps to <em class="gradient-text not-italic">problem solved.</em></h2>
      <p class="section-subheading mx-auto">No contracts, no surprises, no jargon. Just fast, reliable service from certified professionals.</p>
    </div>

    <div class="gsap-stagger grid md:grid-cols-3 gap-8 relative">
      <!-- Connecting line -->
      <div class="hidden md:block absolute top-10 left-1/4 right-1/4 h-px bg-gradient-to-r from-accent-500/50 to-indigo-500/50"></div>

      <?php $steps = [
        ['num' => '01', 'icon' => 'calendar', 'title' => 'Book Online', 'desc' => 'Choose your service, select a same-day or scheduled slot, and provide a brief description of the issue. Takes 2 minutes.'],
        ['num' => '02', 'icon' => 'truck', 'title' => 'Technician Dispatched', 'desc' => 'A CompTIA-certified technician is confirmed within minutes. You\'ll receive their name, photo, and ETA by email.'],
        ['num' => '03', 'icon' => 'check-circle', 'title' => 'Problem Solved', 'desc' => 'Your tech is fixed, tested, and explained. Pay only when you\'re satisfied. 30-day guarantee covers every job.'],
      ]; ?>

      <?php foreach ($steps as $i => $step): ?>
      <div class="card p-8 rounded-2xl text-center relative">
        <div class="step-indicator mx-auto mb-5"><?php echo e($step['num']); ?></div>
        <h3 class="font-display font-semibold text-xl text-white mb-3"><?php echo e($step['title']); ?></h3>
        <p class="text-slate-400 text-sm leading-relaxed"><?php echo e($step['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- MEMBERSHIP TEASER -->
<section class="py-24 bg-surface-950" x-data="{ billing: '1yr' }">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 gsap-fade-up">
      <span class="badge-accent mb-4 inline-flex">Membership Plans</span>
      <h2 class="section-heading mb-4">IT support you can <em class="gradient-text not-italic">count on</em> every month.</h2>
      <p class="section-subheading mx-auto mb-8">Choose a plan, lock in your rate, and get expert technical assistance whenever you need it.</p>

      <!-- Billing toggle -->
      <div class="inline-flex items-center bg-surface-900 rounded-xl p-1 border border-[#1E2D42]">
        <?php foreach (['6mo' => '6 Months', '1yr' => '1 Year', '2yr' => '2 Years', '3yr' => '3 Years'] as $key => $label): ?>
        <button
          @click="billing = '<?php echo e($key); ?>'"
          :class="billing === '<?php echo e($key); ?>' ? 'bg-accent-500 text-white shadow-lg' : 'text-slate-400 hover:text-white'"
          class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200"
        ><?php echo e($label); ?></button>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="gsap-stagger grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
      <?php foreach ($memberships as $plan): ?>
      <div class="card rounded-2xl p-6 relative <?php echo $plan['popular'] ? 'gradient-border' : ''; ?>">
        <?php if ($plan['popular']): ?>
        <div class="popular-badge">Most Popular</div>
        <?php endif; ?>
        <div class="mb-4">
          <h3 class="font-display font-bold text-xl text-white mb-1"><?php echo e($plan['name']); ?></h3>
          <p class="text-xs text-slate-500"><?php echo e($plan['tagline']); ?></p>
        </div>
        <div class="mb-5">
          <?php foreach ($plan['pricing'] as $period => $price): ?>
          <div x-show="billing === '<?php echo e($period); ?>'" class="flex items-baseline gap-1" style="display:none">
            <span class="font-display font-bold text-4xl text-white">$<?php echo e($price); ?></span>
            <span class="text-slate-400 text-sm">/mo</span>
          </div>
          <?php endforeach; ?>
        </div>
        <ul class="space-y-2 mb-6">
          <?php foreach (array_slice($plan['features'], 0, 6) as $feat): ?>
          <li class="flex items-center gap-2 text-sm <?php echo $feat['included'] ? 'text-slate-300' : 'text-slate-600'; ?>">
            <?php if ($feat['included']): ?>
            <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
            <?php else: ?>
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            <?php endif; ?>
            <?php echo e($feat['text']); ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="/membership" class="<?php echo $plan['popular'] ? 'btn-primary w-full justify-center' : 'btn-outline w-full justify-center'; ?> block text-center">
          <?php echo e($plan['cta_text']); ?>
        </a>
      </div>
      <?php endforeach; ?>
    </div>

    <p class="text-center text-xs text-slate-500 mt-6">All plans include a 30-day money-back guarantee. <a href="/membership" class="text-accent-400 hover:text-accent-300">Compare all features →</a></p>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="py-24 bg-surface-900 overflow-hidden" x-data="{
  current: 0,
  total: <?php echo count($testimonials); ?>,
  perPage() { return window.innerWidth >= 1024 ? 3 : window.innerWidth >= 768 ? 2 : 1; },
  maxIndex() { return Math.max(0, this.total - this.perPage()); },
  prev() { this.current = Math.max(0, this.current - 1); },
  next() { this.current = Math.min(this.maxIndex(), this.current + 1); }
}" x-init="setInterval(() => { if (current < maxIndex()) current++; else current = 0; }, 5000)">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16 gsap-fade-up">
      <span class="badge-indigo mb-4 inline-flex">Customer Stories</span>
      <h2 class="section-heading mb-4">50,000+ customers <em class="gradient-text not-italic">trust us.</em></h2>
      <div class="flex items-center justify-center gap-1 mb-2">
        <?php for ($i = 0; $i < 5; $i++): ?>
        <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        <?php endfor; ?>
      </div>
      <p class="text-sm text-slate-400">4.9/5 average from 50,000+ verified reviews</p>
    </div>

    <div class="overflow-hidden">
      <div class="flex gap-5 transition-transform duration-500 ease-out"
           :style="`transform: translateX(calc(-${current} * (100% / ${perPage()} + 20px / ${perPage()})))`">
        <?php foreach ($testimonials as $t): ?>
        <div class="card p-6 rounded-2xl flex-shrink-0 w-full md:w-[calc(50%-10px)] lg:w-[calc(33.33%-14px)]">
          <div class="flex items-center gap-1 mb-4">
            <?php for ($i = 0; $i < $t['rating']; $i++): ?>
            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <?php endfor; ?>
          </div>
          <p class="text-slate-300 text-sm leading-relaxed mb-5">"<?php echo e($t['text']); ?>"</p>
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br <?php echo e($t['color']); ?> flex items-center justify-center text-white font-bold text-sm shrink-0">
              <?php echo e($t['initials']); ?>
            </div>
            <div>
              <p class="text-sm font-semibold text-white"><?php echo e($t['name']); ?></p>
              <p class="text-xs text-slate-500"><?php echo e($t['role']); ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="flex items-center justify-center gap-3 mt-8">
      <button @click="prev()" :disabled="current === 0" class="w-9 h-9 rounded-full border border-[#1E2D42] flex items-center justify-center text-slate-400 hover:text-white hover:border-accent-500 disabled:opacity-30 transition-all">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
      </button>
      <div class="flex gap-1.5">
        <template x-for="i in maxIndex() + 1" :key="i">
          <button @click="current = i - 1" :class="current === i - 1 ? 'bg-accent-500 w-5' : 'bg-[#1E2D42] w-1.5'" class="h-1.5 rounded-full transition-all duration-300"></button>
        </template>
      </div>
      <button @click="next()" :disabled="current >= maxIndex()" class="w-9 h-9 rounded-full border border-[#1E2D42] flex items-center justify-center text-slate-400 hover:text-white hover:border-accent-500 disabled:opacity-30 transition-all">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
      </button>
    </div>
  </div>
</section>

<!-- FAQ TEASER -->
<section class="py-24 bg-surface-950">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12 gsap-fade-up">
      <span class="badge-accent mb-4 inline-flex">Common Questions</span>
      <h2 class="section-heading mb-4">Got questions? <em class="gradient-text not-italic">We've got answers.</em></h2>
    </div>
    <div class="space-y-3" data-accordion-group>
      <?php foreach ($faqs as $faq): ?>
      <div class="card rounded-2xl overflow-hidden">
        <button
          data-accordion-trigger
          aria-expanded="false"
          class="w-full flex items-center justify-between p-5 text-left hover:bg-white/2 transition-colors"
        >
          <span class="font-medium text-white text-sm pr-4"><?php echo e($faq['q']); ?></span>
          <svg data-accordion-icon class="w-4 h-4 text-slate-400 shrink-0 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="accordion-content">
          <div class="px-5 pb-5 text-slate-400 text-sm leading-relaxed border-t border-[#1E2D42] pt-4">
            <?php echo e($faq['a']); ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-8 gsap-fade-up">
      <a href="/faq" class="btn-secondary">View all FAQs</a>
    </div>
  </div>
</section>

<!-- TECH VISUAL BANNER -->
<section class="relative overflow-hidden">
  <div class="relative h-72 md:h-96">
    <img
      src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=1600&q=75"
      alt="Smart home technology setup"
      class="w-full h-full object-cover"
      loading="lazy"
    />
    <div class="absolute inset-0 bg-gradient-to-r from-surface-950 via-surface-950/70 to-surface-950/30"></div>
    <div class="absolute inset-0 flex items-center">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="max-w-xl">
          <span class="badge-indigo mb-4 inline-flex">Smart Home & IoT</span>
          <h2 class="font-display font-bold text-3xl md:text-4xl text-white mb-4 leading-tight">
            Your whole home, <em class="gradient-text not-italic">connected.</em>
          </h2>
          <p class="text-slate-300 text-base mb-6">From smart thermostats to full home automation — our certified techs set it all up for you.</p>
          <a href="/services/smart-home-iot" class="btn-primary">Explore Smart Home →</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<?php require ROOT . '/partials/cta.php'; ?>

<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
<?php require ROOT . '/partials/booking-widget.php'; ?>
</body>
</html>
