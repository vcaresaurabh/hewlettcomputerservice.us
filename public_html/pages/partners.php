<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';

$seo = new Seo(
    'Partner Program — Hewlett Computer Service',
    'Join the Hewlett partner program. Earn referral commissions, co-market with a trusted tech brand, and provide your clients premium technical assistance.',
    SITE_URL . '/partners'
);

$partners_data = require ROOT . '/data/partners.php';

require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>

<!-- Hero -->
<section class="pt-32 pb-20 bg-surface-950 relative overflow-hidden">
  <div class="glow-orb w-96 h-96 bg-indigo-500/10 -top-20 left-0"></div>
  <div class="glow-orb w-80 h-80 bg-accent-500/10 -bottom-20 right-0"></div>
  <div class="absolute inset-0 grid-pattern opacity-20"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <div class="gsap-fade-up max-w-3xl mx-auto">
      <span class="badge-indigo mb-4 inline-flex">Partner Program</span>
      <h1 class="section-heading mb-4">
        Grow your business by <em class="gradient-text not-italic">referring us.</em>
      </h1>
      <p class="section-subheading mx-auto">
        Earn 15–25% commission on every referral, co-market with a trusted brand, and give your clients access to the best technical assistance in the business.
      </p>
    </div>
  </div>
</section>

<!-- Benefits -->
<section class="py-20 bg-surface-900">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12 gsap-fade-up">
      <h2 class="section-heading mb-4">Why partner with us?</h2>
    </div>
    <div class="gsap-stagger grid md:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($partners_data['program_benefits'] as $b): ?>
      <div class="card p-6 rounded-2xl card-hover">
        <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4" style="background:linear-gradient(135deg,rgba(99,102,241,0.2),rgba(14,165,233,0.2))">
          <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <?php if ($b['icon'] === 'briefcase'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
            <?php elseif ($b['icon'] === 'users'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
            <?php elseif ($b['icon'] === 'zap'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>
            <?php elseif ($b['icon'] === 'award'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0"/>
            <?php elseif ($b['icon'] === 'bar-chart'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
            <?php else: ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/>
            <?php endif; ?>
          </svg>
        </div>
        <h3 class="font-display font-semibold text-white mb-2"><?php echo e($b['title']); ?></h3>
        <p class="text-slate-400 text-sm leading-relaxed"><?php echo e($b['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Ideal partners -->
<section class="py-20 bg-surface-950">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-16 items-center">
    <div class="gsap-fade-up">
      <span class="badge-accent mb-4 inline-flex">Who should apply</span>
      <h2 class="section-heading mb-6">Built for businesses that <em class="gradient-text not-italic">serve homeowners.</em></h2>
      <p class="text-slate-400 mb-6 leading-relaxed">Our partner program is designed for businesses that regularly interact with homeowners, property managers, and small businesses — and have clients who need reliable technical assistance.</p>
      <div class="grid grid-cols-2 gap-3">
        <?php foreach ($partners_data['ideal_partners'] as $type): ?>
        <div class="flex items-center gap-2 text-sm text-slate-300">
          <svg class="w-4 h-4 text-accent-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
          <?php echo e($type); ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Application form -->
    <div class="gsap-fade-up">
      <div class="card p-8 rounded-2xl">
        <h3 class="font-display font-semibold text-xl text-white mb-6">Apply to Partner</h3>
        <form id="partner-form" novalidate>
          <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
          <input type="text" name="hp_website" class="hidden" tabindex="-1" autocomplete="off">
          <div class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="form-label">Company Name <span class="text-red-400">*</span></label>
                <input type="text" name="company" required class="form-input" placeholder="Acme Realty">
              </div>
              <div>
                <label class="form-label">Contact Name <span class="text-red-400">*</span></label>
                <input type="text" name="contact_name" required class="form-input" placeholder="Your Name">
              </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="form-label">Work Email <span class="text-red-400">*</span></label>
                <input type="email" name="email" required class="form-input" placeholder="you@company.com">
              </div>
              <div>
                <label class="form-label">Phone</label>
                <input type="tel" name="phone" class="form-input" placeholder="+1 (555) 000-0000">
              </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="form-label">Region / Market</label>
                <select name="region" class="form-input">
                  <option value="">Select region</option>
                  <option>United States — West</option>
                  <option>United States — East</option>
                  <option>United States — Central</option>
                  <option>United Kingdom</option>
                  <option>Canada</option>
                  <option>Multiple Regions</option>
                </select>
              </div>
              <div>
                <label class="form-label">Services You Offer</label>
                <input type="text" name="services_offered" class="form-input" placeholder="e.g. Real estate, Moving">
              </div>
            </div>
            <div>
              <label class="form-label">Why do you want to partner?</label>
              <textarea name="message" rows="3" class="form-input resize-none" placeholder="Tell us about your business and clients..."></textarea>
            </div>
            <button type="submit" class="btn-primary w-full justify-center py-3.5">
              Submit Application
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
document.getElementById('partner-form')?.addEventListener('submit', async function(e) {
  e.preventDefault();
  const btn = this.querySelector('button[type=submit]');
  btn.disabled = true;
  btn.textContent = 'Submitting...';
  try {
    const res = await fetch('/api/partners', { method: 'POST', body: new FormData(this) });
    const json = await res.json();
    if (json.success) {
      this.innerHTML = '<div class="text-center py-8"><svg class="w-12 h-12 text-emerald-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg><h4 class=\"font-display font-semibold text-white text-xl mb-2\">Application Received!</h4><p class=\"text-slate-400 text-sm\">We\'ll review your application and reach out within 2 business days.</p></div>';
    } else {
      btn.disabled = false;
      btn.textContent = 'Submit Application';
      alert(json.message || 'Something went wrong. Please try again.');
    }
  } catch {
    btn.disabled = false;
    btn.textContent = 'Submit Application';
  }
});
</script>

<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
<?php require ROOT . '/partials/booking-widget.php'; ?>
</body>
</html>
