<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';

$seo = new Seo(
    'Contact Us — Hewlett Computer Service',
    'Get in touch with our support team. Available 9am–8pm PT, 7 days a week. Call, email, or send a message online.',
    SITE_URL . '/contact'
);

require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>

<section class="pt-32 pb-16 bg-surface-950 relative overflow-hidden">
  <div class="glow-orb w-80 h-80 bg-accent-500/10 -top-20 right-0"></div>
  <div class="absolute inset-0 grid-pattern opacity-20"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="gsap-fade-up max-w-xl">
      <span class="badge-accent mb-4 inline-flex">Contact Us</span>
      <h1 class="section-heading mb-4">We're here to <em class="gradient-text not-italic">help.</em></h1>
      <p class="text-xl text-slate-400">Questions? Issues? Just want to talk to a human? We're available 9am–8pm PT, seven days a week.</p>
    </div>
  </div>
</section>

<section class="py-16 bg-surface-950">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-12">

    <!-- Form -->
    <div class="gsap-fade-up">
      <form id="contact-form" novalidate>
        <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
        <input type="text" name="hp_field" class="hidden" tabindex="-1" autocomplete="off">
        <div class="space-y-4">
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="form-label">Full Name <span class="text-red-400">*</span></label>
              <input type="text" name="name" required class="form-input" placeholder="Jane Smith" autocomplete="name">
            </div>
            <div>
              <label class="form-label">Email <span class="text-red-400">*</span></label>
              <input type="email" name="email" required class="form-input" placeholder="you@example.com" autocomplete="email">
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="form-label">Phone</label>
              <input type="tel" name="phone" class="form-input" placeholder="+1 (555) 000-0000" autocomplete="tel">
            </div>
            <div>
              <label class="form-label">Country</label>
              <select name="country" class="form-input">
                <option value="">Select country</option>
                <option value="US">United States</option>
                <option value="GB">United Kingdom</option>
                <option value="CA">Canada</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>
          <div>
            <label class="form-label">Subject <span class="text-red-400">*</span></label>
            <select name="subject" required class="form-input">
              <option value="">Select a subject</option>
              <option value="General Inquiry">General Inquiry</option>
              <option value="Booking Question">Booking Question</option>
              <option value="Membership Support">Membership Support</option>
              <option value="Billing Question">Billing Question</option>
              <option value="Technical Issue">Technical Issue</option>
              <option value="Complaint or Feedback">Complaint or Feedback</option>
              <option value="Partnership Inquiry">Partnership Inquiry</option>
            </select>
          </div>
          <div>
            <label class="form-label">Message <span class="text-red-400">*</span></label>
            <textarea name="message" required rows="5" class="form-input resize-none" placeholder="How can we help you?"></textarea>
          </div>
          <button type="submit" class="btn-primary w-full justify-center py-3.5">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
            Send Message
          </button>
        </div>
      </form>
    </div>

    <!-- Info sidebar -->
    <div class="space-y-5 gsap-fade-up">
      <!-- Contact details -->
      <div class="card p-6 rounded-2xl">
        <h3 class="font-display font-semibold text-white mb-4">Contact Details</h3>
        <div class="space-y-4">
          <?php $contacts = [
            ['icon' => 'phone', 'label' => 'Phone', 'value' => '(205) 649-4627', 'href' => 'tel:+12056494627'],
            ['icon' => 'email', 'label' => 'Support Email', 'value' => 'support@hewlettcomputerservice.us', 'href' => 'mailto:support@hewlettcomputerservice.us'],
            ['icon' => 'legal', 'label' => 'Legal Email', 'value' => 'legal@hewlettcomputerservice.us', 'href' => 'mailto:legal@hewlettcomputerservice.us'],
            ['icon' => 'location', 'label' => 'Address', 'value' => '2634 Cove Court, Vista, CA 92081-8701', 'href' => null],
          ]; ?>
          <?php foreach ($contacts as $c): ?>
          <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0 bg-accent-500/10">
              <svg class="w-4 h-4 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <?php if ($c['icon'] === 'phone'): ?>
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                <?php elseif ($c['icon'] === 'location'): ?>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                <?php else: ?>
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                <?php endif; ?>
              </svg>
            </div>
            <div>
              <p class="text-xs text-slate-500 mb-0.5"><?php echo e($c['label']); ?></p>
              <?php if ($c['href']): ?>
              <a href="<?php echo e($c['href']); ?>" class="text-sm text-white hover:text-accent-400 transition-colors"><?php echo e($c['value']); ?></a>
              <?php else: ?>
              <p class="text-sm text-white"><?php echo e($c['value']); ?></p>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Hours -->
      <div class="card p-6 rounded-2xl">
        <h3 class="font-display font-semibold text-white mb-4">Support Hours</h3>
        <div class="space-y-2">
          <?php $hours = [
            ['day' => 'Monday – Friday', 'hours' => '8:00am – 7:00pm PT'],
            ['day' => 'Saturday', 'hours' => '9:00am – 5:00pm PT'],
            ['day' => 'Sunday', 'hours' => 'Closed'],
            ['day' => 'Remote Support', 'hours' => '9:00am – 8:00pm PT, 7 days'],
          ]; ?>
          <?php foreach ($hours as $h): ?>
          <div class="flex items-center justify-between text-sm">
            <span class="text-slate-400"><?php echo e($h['day']); ?></span>
            <span class="<?php echo $h['hours'] === 'Closed' ? 'text-slate-600' : 'text-white'; ?> font-medium"><?php echo e($h['hours']); ?></span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Emergency -->
      <div class="rounded-2xl p-5" style="background:linear-gradient(135deg,rgba(14,165,233,0.1),rgba(99,102,241,0.1));border:1px solid rgba(14,165,233,0.2)">
        <div class="flex items-center gap-2 mb-2">
          <svg class="w-4 h-4 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
          <span class="text-accent-400 text-sm font-semibold">Urgent issue?</span>
        </div>
        <p class="text-xs text-slate-400 mb-3">Platinum members get under-30-minute response. Call for immediate assistance.</p>
        <a href="tel:+12056494627" class="btn-primary text-sm py-2.5 w-full justify-center">Call Now: (205) 649-4627</a>
      </div>
    </div>
  </div>
</section>

<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
<?php require ROOT . '/partials/booking-widget.php'; ?>
</body>
</html>
