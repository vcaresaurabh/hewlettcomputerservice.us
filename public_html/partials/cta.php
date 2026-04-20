<?php
$cta_title   = $cta_title ?? 'Ready to fix it today?';
$cta_sub     = $cta_sub   ?? 'Book a CompTIA-certified technician for same-day on-site or remote service. 30-day money-back guarantee.';
$cta_primary = $cta_primary ?? ['text' => 'Book a Service', 'url' => '/book'];
$cta_secondary = $cta_secondary ?? ['text' => 'Explore Plans', 'url' => '/membership'];
?>
<section class="py-24 relative overflow-hidden">
  <div class="glow-orb w-96 h-96 bg-accent-500/15 -top-20 left-1/4"></div>
  <div class="glow-orb w-80 h-80 bg-indigo-500/15 -bottom-20 right-1/4"></div>
  <div class="absolute inset-0 dot-pattern opacity-20"></div>
  <div class="relative max-w-3xl mx-auto px-4 text-center">
    <div class="gsap-fade-up">
      <span class="badge-accent mb-4 inline-flex">30-Day Money-Back Guarantee</span>
      <h2 class="section-heading mb-4"><?php echo e($cta_title); ?></h2>
      <p class="section-subheading mb-8"><?php echo e($cta_sub); ?></p>
      <div class="flex flex-wrap items-center justify-center gap-4">
        <a href="<?php echo e($cta_primary['url']); ?>" class="btn-primary px-8 py-4 text-base">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          <?php echo e($cta_primary['text']); ?>
        </a>
        <a href="<?php echo e($cta_secondary['url']); ?>" class="btn-outline px-8 py-4 text-base">
          <?php echo e($cta_secondary['text']); ?>
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
        </a>
      </div>
      <div class="flex flex-wrap items-center justify-center gap-6 mt-8">
        <div class="flex items-center gap-2 text-sm text-slate-400">
          <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
          CompTIA A+ Certified
        </div>
        <div class="flex items-center gap-2 text-sm text-slate-400">
          <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
          Same-Day Service
        </div>
        <div class="flex items-center gap-2 text-sm text-slate-400">
          <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
          Licensed & Insured
        </div>
      </div>
    </div>
  </div>
</section>
