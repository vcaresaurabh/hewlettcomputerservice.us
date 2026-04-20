<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';

$seo = new Seo(
    'Membership Plans — Premium, Premium Plus & Platinum',
    'Choose the right IT support membership plan. Starting at $15/mo. 30-day money-back guarantee. CompTIA-certified remote and on-site support for homes and businesses.',
    SITE_URL . '/membership'
);

$memberships = require ROOT . '/data/memberships.php';
$faqs_all    = require ROOT . '/data/faqs.php';
$faqs        = $faqs_all[2]['items']; // Membership FAQ category

require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>

<!-- Hero -->
<section class="pt-32 pb-20 bg-surface-950 relative overflow-hidden">
  <div class="glow-orb w-96 h-96 bg-accent-500/10 -top-20 left-0"></div>
  <div class="glow-orb w-96 h-96 bg-indigo-500/10 -top-20 right-0"></div>
  <div class="absolute inset-0 grid-pattern opacity-20"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <div class="gsap-fade-up max-w-3xl mx-auto">
      <span class="badge-accent mb-4 inline-flex">Membership Plans</span>
      <h1 class="section-heading mb-4">
        IT support you can <em class="gradient-text not-italic">rely on</em> every month.
      </h1>
      <p class="section-subheading mx-auto">
        Choose a plan that fits your needs. Certified technicians, defined response times, and monthly support hours — at a price that makes sense.
      </p>
    </div>
  </div>
</section>

<!-- Plans + Toggle -->
<section class="py-20 bg-surface-950" x-data="{ billing: '1yr' }">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Billing toggle -->
    <div class="flex justify-center mb-12">
      <div class="inline-flex items-center bg-surface-900 rounded-xl p-1 border border-[#1E2D42]">
        <?php $billing_labels = ['6mo' => '6 Months', '1yr' => '1 Year', '2yr' => '2 Years', '3yr' => '3 Years']; ?>
        <?php $billing_savings = ['6mo' => '', '1yr' => 'Save 17%', '2yr' => 'Save 34%', '3yr' => 'Save 48%']; ?>
        <?php foreach ($billing_labels as $key => $label): ?>
        <button
          @click="billing = '<?php echo e($key); ?>'"
          :class="billing === '<?php echo e($key); ?>' ? 'bg-accent-500 text-white shadow-lg shadow-accent-500/20' : 'text-slate-400 hover:text-white'"
          class="flex flex-col items-center px-4 py-2 rounded-lg text-xs font-semibold transition-all duration-200"
        >
          <?php echo e($label); ?>
          <?php if ($billing_savings[$key]): ?>
          <span class="text-[10px] opacity-80"><?php echo e($billing_savings[$key]); ?></span>
          <?php endif; ?>
        </button>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Plan cards -->
    <div class="gsap-stagger grid md:grid-cols-3 gap-6 max-w-5xl mx-auto mb-12">
      <?php foreach ($memberships as $plan): ?>
      <div class="rounded-2xl relative <?php echo $plan['popular'] ? 'gradient-border shadow-2xl shadow-indigo-500/10' : 'card'; ?> flex flex-col p-6">
        <?php if ($plan['popular']): ?>
        <div class="popular-badge">Most Popular</div>
        <?php endif; ?>

        <!-- Plan header -->
        <div class="mb-5">
          <?php if ($plan['color'] === 'gradient'): ?>
          <div class="w-10 h-10 rounded-xl mb-3" style="background:linear-gradient(135deg,#0EA5E9,#6366F1)"></div>
          <?php else: ?>
          <div class="w-10 h-10 rounded-xl mb-3 bg-accent-500/20"></div>
          <?php endif; ?>
          <h2 class="font-display font-bold text-2xl text-white mb-1"><?php echo e($plan['name']); ?></h2>
          <p class="text-xs text-slate-500"><?php echo e($plan['tagline']); ?></p>
        </div>

        <!-- Price -->
        <div class="mb-5 pb-5 border-b border-[#1E2D42]">
          <?php foreach ($plan['pricing'] as $period => $price): ?>
          <div x-show="billing === '<?php echo e($period); ?>'" class="flex items-end gap-2" style="display:none">
            <span class="font-display font-bold text-5xl text-white">$<?php echo e($price); ?></span>
            <div class="pb-2 text-slate-400 text-sm">
              <div>/month</div>
              <div class="text-xs text-slate-600">billed <?php
                $labels = ['6mo'=>'every 6 months','1yr'=>'annually','2yr'=>'every 2 years','3yr'=>'every 3 years'];
                echo e($labels[$period]); ?></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Features -->
        <ul class="space-y-2.5 mb-6 flex-1">
          <?php foreach ($plan['features'] as $feat): ?>
          <li class="flex items-center gap-2.5 text-sm <?php echo $feat['included'] ? 'text-slate-300' : 'text-slate-600'; ?>">
            <?php if ($feat['included']): ?>
            <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
            <?php else: ?>
            <svg class="w-4 h-4 shrink-0 text-slate-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            <?php endif; ?>
            <?php echo e($feat['text']); ?>
          </li>
          <?php endforeach; ?>
        </ul>

        <a href="/book" class="<?php echo $plan['popular'] ? 'btn-primary justify-center' : 'btn-outline justify-center'; ?> block text-center">
          <?php echo e($plan['cta_text']); ?>
        </a>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Guarantee callout -->
    <div class="max-w-2xl mx-auto text-center gsap-fade-up">
      <div class="card p-6 rounded-2xl">
        <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-3" style="background:linear-gradient(135deg,rgba(16,185,129,0.2),rgba(5,150,105,0.2))">
          <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
        </div>
        <h3 class="font-display font-semibold text-white mb-2">30-Day Money-Back Guarantee</h3>
        <p class="text-slate-400 text-sm">Not satisfied in your first 30 days? We'll refund your plan cost in full — no questions, no friction. We're that confident in the experience we provide.</p>
      </div>
    </div>
  </div>
</section>

<!-- Feature comparison table -->
<section class="py-20 bg-surface-900">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-10 gsap-fade-up">
      <h2 class="section-heading">Compare all features</h2>
    </div>
    <div class="card rounded-2xl overflow-hidden gsap-fade-up">
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead>
            <tr class="border-b border-[#1E2D42]">
              <th class="text-left p-4 text-slate-400 font-medium w-2/5">Feature</th>
              <?php foreach ($memberships as $plan): ?>
              <th class="p-4 font-display font-semibold text-white text-center <?php echo $plan['popular'] ? 'text-accent-400' : ''; ?>"><?php echo e($plan['name']); ?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $allFeatures = [];
            foreach ($memberships[2]['features'] as $f) $allFeatures[] = $f['text'];
            foreach ($allFeatures as $feat):
            ?>
            <tr class="border-b border-[#1E2D42]/50 hover:bg-white/2 transition-colors">
              <td class="p-4 text-slate-300"><?php echo e($feat); ?></td>
              <?php foreach ($memberships as $plan): ?>
              <?php
              $included = false;
              foreach ($plan['features'] as $pf) {
                  if ($pf['text'] === $feat) { $included = $pf['included']; break; }
              }
              ?>
              <td class="p-4 text-center">
                <?php if ($included): ?>
                <svg class="w-5 h-5 text-emerald-400 mx-auto" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
                <?php else: ?>
                <svg class="w-5 h-5 text-slate-700 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                <?php endif; ?>
              </td>
              <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="py-20 bg-surface-950">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12 gsap-fade-up">
      <span class="badge-indigo mb-4 inline-flex">FAQ</span>
      <h2 class="section-heading mb-4">Membership questions answered</h2>
    </div>
    <div class="space-y-3" data-accordion-group>
      <?php foreach ($faqs as $faq): ?>
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

<?php
$cta_title = 'Start your membership today.';
$cta_sub   = '30-day money-back guarantee on all plans. No long-term commitment required.';
require ROOT . '/partials/cta.php'; ?>

<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
<?php require ROOT . '/partials/booking-widget.php'; ?>
</body>
</html>
