<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';

$seo = new Seo('Booking Confirmed — Hewlett Computer Service', '', SITE_URL . '/book/confirmation');

require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>

<section class="pt-32 pb-24 bg-surface-950 relative overflow-hidden">
  <div class="glow-orb w-96 h-96 bg-emerald-500/8 top-0 left-1/4"></div>
  <div class="absolute inset-0 grid-pattern opacity-20"></div>
  <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <div class="gsap-fade-up">
      <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6" style="background:linear-gradient(135deg,rgba(16,185,129,0.2),rgba(5,150,105,0.2));border:1px solid rgba(16,185,129,0.3)">
        <svg class="w-10 h-10 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
        </svg>
      </div>
      <h1 class="font-display font-bold text-4xl md:text-5xl text-white mb-4">Booking Confirmed!</h1>
      <p class="text-slate-400 text-lg mb-8">We've received your booking and will confirm your technician shortly. Check your email for details.</p>

      <div class="card p-6 rounded-2xl text-left mb-8">
        <h2 class="font-display font-semibold text-white mb-4">What happens next?</h2>
        <div class="space-y-4">
          <?php $nextsteps = [
            ['num' => '1', 'title' => 'Confirmation email sent', 'desc' => 'You\'ll receive an email with your booking reference and details within minutes.'],
            ['num' => '2', 'title' => 'Technician assigned', 'desc' => 'We\'ll match you with the best available certified technician for your service and location.'],
            ['num' => '3', 'title' => 'We contact you', 'desc' => 'Our team will call or email you within 1 hour to confirm your appointment details.'],
            ['num' => '4', 'title' => 'Service completed', 'desc' => 'Your technician arrives at the scheduled time and resolves your issue. 30-day guarantee applies.'],
          ]; ?>
          <?php foreach ($nextsteps as $s): ?>
          <div class="flex items-start gap-3">
            <div class="step-indicator text-xs w-7 h-7 shrink-0"><?php echo e($s['num']); ?></div>
            <div>
              <p class="font-medium text-white text-sm"><?php echo e($s['title']); ?></p>
              <p class="text-slate-500 text-xs mt-0.5"><?php echo e($s['desc']); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="flex flex-wrap justify-center gap-4">
        <a href="/" class="btn-primary">Return Home</a>
        <a href="/contact" class="btn-outline">Contact Support</a>
      </div>

      <p class="text-xs text-slate-500 mt-6">Need to change something? Call us at <a href="tel:+12056494627" class="text-accent-400">(205) 649-4627</a></p>
    </div>
  </div>
</section>

<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
</body>
</html>
