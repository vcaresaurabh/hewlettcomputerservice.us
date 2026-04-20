<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';

$faqs_all = require ROOT . '/data/faqs.php';

$all_faqs_flat = [];
foreach ($faqs_all as $cat) {
    foreach ($cat['items'] as $faq) {
        $all_faqs_flat[] = $faq;
    }
}

$seo = new Seo(
    'FAQ — Frequently Asked Questions',
    'Find answers to common questions about booking, pricing, memberships, technical support, privacy, and billing.',
    SITE_URL . '/faq'
);
$seo->addSchema(faq_schema(array_slice($all_faqs_flat, 0, 15)));

require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>

<section class="pt-32 pb-16 bg-surface-950 relative overflow-hidden">
  <div class="glow-orb w-96 h-96 bg-accent-500/10 -top-20 right-0"></div>
  <div class="absolute inset-0 grid-pattern opacity-20"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <div class="gsap-fade-up max-w-2xl mx-auto">
      <span class="badge-accent mb-4 inline-flex">Help Center</span>
      <h1 class="section-heading mb-4">Frequently Asked <em class="gradient-text not-italic">Questions</em></h1>
      <p class="section-subheading mx-auto">Everything you need to know about our services, pricing, and support.</p>
    </div>
  </div>
</section>

<section class="py-16 bg-surface-950" x-data="{ active: '<?php echo e($faqs_all[0]['category']); ?>' }">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Category tabs -->
    <div class="flex flex-wrap justify-center gap-2 mb-12">
      <?php foreach ($faqs_all as $cat): ?>
      <button
        @click="active = '<?php echo e($cat['category']); ?>'"
        :class="active === '<?php echo e($cat['category']); ?>' ? 'bg-accent-500 text-white shadow-lg shadow-accent-500/20' : 'card text-slate-400 hover:text-white'"
        class="px-4 py-2 rounded-xl text-sm font-medium transition-all"
      ><?php echo e($cat['category']); ?></button>
      <?php endforeach; ?>
    </div>

    <!-- FAQ sections -->
    <?php foreach ($faqs_all as $cat): ?>
    <div x-show="active === '<?php echo e($cat['category']); ?>'" style="display:none">
      <div class="space-y-3" data-accordion-group>
        <?php foreach ($cat['items'] as $faq): ?>
        <div class="card rounded-2xl overflow-hidden gsap-fade-up">
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
    <?php endforeach; ?>

    <!-- Still need help -->
    <div class="mt-16 text-center gsap-fade-up">
      <div class="card p-8 rounded-2xl max-w-xl mx-auto">
        <h3 class="font-display font-semibold text-xl text-white mb-2">Still have a question?</h3>
        <p class="text-slate-400 text-sm mb-5">Our support team is available 9am–8pm PT, 7 days a week.</p>
        <div class="flex flex-wrap justify-center gap-3">
          <a href="/contact" class="btn-primary text-sm px-6 py-2.5">Contact Us</a>
          <a href="tel:+12056494627" class="btn-outline text-sm px-6 py-2.5">Call Now</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
<?php require ROOT . '/partials/booking-widget.php'; ?>
</body>
</html>
