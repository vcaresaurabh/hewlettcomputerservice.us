<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';
$seo = new Seo('Opt-In & Opt-Out Policy — Hewlett Computer Service', 'Learn how to manage your marketing communications, SMS preferences, and data choices with Hewlett Computer Service.', SITE_URL . '/opt-in-opt-out');
require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>
<div class="pt-28 pb-24 bg-surface-950">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mb-8">
  <span class="badge-accent mb-4 inline-flex">Legal</span>
  <h1 class="font-display font-bold text-4xl text-white mb-2">Opt-In &amp; Opt-Out Policy</h1>
  <p class="text-slate-500 text-sm">Last updated: January 1, 2025 &bull; CCPA/CPRA &bull; TCPA Compliant</p>
</div>
<div class="space-y-6 text-slate-400 text-sm leading-relaxed">

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Email Communications</h2>
<p><strong class="text-white">Transactional emails</strong> (booking confirmations, service receipts, account notifications, password resets) are sent as part of our service relationship and do not require opt-in. You cannot opt out of transactional emails while maintaining an active account or booking.</p>
<p class="mt-3"><strong class="text-white">Marketing emails</strong> (newsletters, promotions, new service announcements, tech tips) require your opt-in consent. You may opt in by:</p>
<ul class="list-disc list-inside mt-2 space-y-1 ml-2">
<li>Subscribing via the newsletter form on our website</li>
<li>Checking the marketing consent box during account creation or booking</li>
<li>Explicitly requesting to be added to our mailing list</li>
</ul>
<p class="mt-3"><strong class="text-white">To opt out of marketing emails:</strong></p>
<ul class="list-disc list-inside mt-2 space-y-1 ml-2">
<li>Click the <strong class="text-white">Unsubscribe</strong> link at the bottom of any marketing email</li>
<li>Email <a href="mailto:support@hewlettcomputerservice.us" class="text-accent-400">support@hewlettcomputerservice.us</a> with "Unsubscribe" in the subject line</li>
<li>Call us at (205) 649-4627</li>
</ul>
<p class="mt-3">Unsubscribe requests are processed within 10 business days. You may continue to receive transactional emails after unsubscribing from marketing communications.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">SMS / Text Message Communications</h2>
<p>We may send SMS text messages for appointment reminders, booking confirmations, and service updates. By providing your mobile number and checking the SMS consent option, you consent to receive these messages.</p>
<p class="mt-3"><strong class="text-white">Standard message and data rates may apply.</strong> Message frequency varies based on your booking and account activity (typically 1–5 messages per booking).</p>
<p class="mt-4"><strong class="text-white">SMS Commands:</strong></p>
<div class="mt-2 space-y-2">
<div class="flex items-start gap-3">
  <span class="badge-accent text-xs shrink-0 mt-0.5">STOP</span>
  <span>Reply STOP to any SMS from us to immediately unsubscribe from all non-essential SMS messages. You will receive one final confirmation message.</span>
</div>
<div class="flex items-start gap-3">
  <span class="badge-indigo text-xs shrink-0 mt-0.5">START</span>
  <span>Reply START to re-subscribe to SMS communications after previously opting out.</span>
</div>
<div class="flex items-start gap-3">
  <span class="badge-green text-xs shrink-0 mt-0.5">HELP</span>
  <span>Reply HELP to receive information about our SMS program and support contact details.</span>
</div>
</div>
<p class="mt-3">To opt out by other means: email <a href="mailto:support@hewlettcomputerservice.us" class="text-accent-400">support@hewlettcomputerservice.us</a> with "Remove from SMS" in the subject line, or call (205) 649-4627.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Do Not Call (DNC) Registry</h2>
<p>We respect the National Do Not Call Registry (USA) and equivalent registries in the UK and Canada. If your number is registered on a DNC list, we will not make unsolicited marketing calls to that number.</p>
<p class="mt-3">If you receive an unwanted call from us, please notify us at <a href="mailto:legal@hewlettcomputerservice.us" class="text-accent-400">legal@hewlettcomputerservice.us</a> and we will add your number to our internal do-not-call list immediately. We will investigate any report of non-compliant calling.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">CCPA — Your California Privacy Rights</h2>
<p>California residents have specific rights under the CCPA/CPRA:</p>
<ul class="list-disc list-inside mt-2 space-y-2 ml-2">
<li><strong class="text-white">Right to Know:</strong> Request disclosure of what personal information we collect, use, disclose, and sell about you.</li>
<li><strong class="text-white">Right to Delete:</strong> Request deletion of your personal information (subject to legal exceptions).</li>
<li><strong class="text-white">Right to Opt Out of Sale:</strong> We do not sell, rent, or share personal information for cross-context behavioral advertising. This right is preserved regardless.</li>
<li><strong class="text-white">Right to Correct:</strong> Request correction of inaccurate personal information.</li>
<li><strong class="text-white">Right to Limit Sensitive Information Use:</strong> Request limitation on the use of sensitive personal information beyond what is necessary for service delivery.</li>
<li><strong class="text-white">Non-Discrimination:</strong> We will not discriminate against you for exercising any of these rights.</li>
</ul>
<p class="mt-3">To exercise California privacy rights, contact us at <a href="mailto:legal@hewlettcomputerservice.us" class="text-accent-400">legal@hewlettcomputerservice.us</a> or call (205) 649-4627. We will respond within 45 calendar days.</p>
</div>

</div>
</div>
</div>
<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
</body></html>
