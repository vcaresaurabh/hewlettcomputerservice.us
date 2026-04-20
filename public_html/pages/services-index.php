<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';

$seo = new Seo(
    'Tech Services — Computers, Smart Home, WiFi & More',
    'Browse all 9 service categories: computer repair, WiFi setup, smart home installation, TV mounting, home security, and more. Same-day service available.',
    SITE_URL . '/services'
);

$services = require ROOT . '/data/services.php';

require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>

<!-- Hero -->
<section class="pt-32 pb-16 bg-surface-950 relative overflow-hidden">
  <div class="glow-orb w-96 h-96 bg-accent-500/10 -top-20 left-1/4"></div>
  <div class="absolute inset-0 grid-pattern opacity-20"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <div class="gsap-fade-up max-w-3xl mx-auto">
      <span class="badge-accent mb-4 inline-flex">All Services</span>
      <h1 class="section-heading mb-4">
        Every tech problem. <em class="gradient-text not-italic">One trusted team.</em>
      </h1>
      <p class="section-subheading mx-auto">
        Nine service categories covering every piece of technology in your home or office. CompTIA-certified technicians. Same-day availability. 30-day guarantee.
      </p>
    </div>
  </div>
</section>

<!-- Services grid -->
<section class="py-16 bg-surface-950">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="gsap-stagger grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($services as $svc): ?>
      <div class="card card-hover rounded-2xl overflow-hidden group">
        <div class="p-6">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0 transition-all duration-300 group-hover:scale-110" style="background:linear-gradient(135deg,rgba(14,165,233,0.2),rgba(99,102,241,0.2))">
              <span class="text-accent-400"><?php echo service_icon($svc['slug'], 'w-6 h-6'); ?></span>
            </div>
            <div>
              <h2 class="font-display font-semibold text-white group-hover:text-accent-400 transition-colors"><?php echo e($svc['name']); ?></h2>
              <p class="text-xs text-slate-500"><?php echo e($svc['tagline']); ?></p>
            </div>
          </div>
          <p class="text-sm text-slate-400 leading-relaxed mb-4"><?php echo e($svc['short_desc']); ?></p>

          <!-- Price hints -->
          <div class="flex flex-wrap gap-2 mb-4">
            <?php foreach (array_slice($svc['sub_services'], 0, 3) as $ss): ?>
            <span class="text-xs bg-surface-900 border border-[#1E2D42] text-slate-400 px-2 py-1 rounded-lg"><?php echo e($ss['price']); ?></span>
            <?php endforeach; ?>
          </div>

          <a href="/services/<?php echo e($svc['slug']); ?>" class="btn-secondary text-sm py-2.5 w-full justify-center">
            Learn More
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Trust bar -->
<section class="py-12 bg-surface-900 border-y border-[#1E2D42]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
      <?php $points = [
        ['icon' => 'check', 'title' => 'Same-Day Available', 'desc' => 'Mon–Fri before 2pm PT'],
        ['icon' => 'shield', 'title' => '30-Day Guarantee', 'desc' => 'On every job we do'],
        ['icon' => 'award', 'title' => 'CompTIA Certified', 'desc' => 'All technicians'],
        ['icon' => 'lock', 'title' => 'Background Checked', 'desc' => 'Every team member'],
      ]; ?>
      <?php foreach ($points as $p): ?>
      <div class="flex flex-col items-center gap-2">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,rgba(14,165,233,0.15),rgba(99,102,241,0.15))">
          <svg class="w-5 h-5 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <?php if ($p['icon'] === 'check'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
            <?php elseif ($p['icon'] === 'shield'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
            <?php elseif ($p['icon'] === 'award'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0"/>
            <?php else: ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
            <?php endif; ?>
          </svg>
        </div>
        <p class="font-semibold text-white text-sm"><?php echo e($p['title']); ?></p>
        <p class="text-xs text-slate-500"><?php echo e($p['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<?php require ROOT . '/partials/cta.php'; ?>
<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
<?php require ROOT . '/partials/booking-widget.php'; ?>
</body>
</html>
