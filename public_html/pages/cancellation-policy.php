<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';
$seo = new Seo('Cancellation & Refund Policy — Hewlett Computer Service', 'Learn about our 30-day money-back guarantee, cancellation terms, tech credits, and chargeback policy.', SITE_URL . '/cancellation-policy');
require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>
<div class="pt-28 pb-24 bg-surface-950">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mb-8">
  <span class="badge-accent mb-4 inline-flex">Legal</span>
  <h1 class="font-display font-bold text-4xl text-white mb-2">Cancellation &amp; Refund Policy</h1>
  <p class="text-slate-500 text-sm">Last updated: January 1, 2025</p>
</div>
<div class="space-y-6 text-slate-400 text-sm leading-relaxed">

<div class="card p-6 rounded-2xl" style="background:linear-gradient(135deg,rgba(16,185,129,0.05),rgba(5,150,105,0.05));border-color:rgba(16,185,129,0.2)">
<h2 class="font-display font-semibold text-lg text-emerald-400 mb-3">30-Day Money-Back Guarantee</h2>
<p class="text-slate-300">All membership plans come with a 30-day money-back guarantee. If you are not satisfied with your membership within the first 30 days of activation, contact us for a full refund of your plan cost — no questions asked, no hoops to jump through.</p>
<p class="mt-3">To request a refund under this guarantee, email <a href="mailto:support@hewlettcomputerservice.us" class="text-accent-400">support@hewlettcomputerservice.us</a> or call (205) 649-4627. Refunds are processed within 5–10 business days to your original payment method.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">One-Time Service Cancellations</h2>
<p><strong class="text-white">More than 24 hours before appointment:</strong> Cancel at no charge. Full refund if prepaid.</p>
<p class="mt-3"><strong class="text-white">Less than 24 hours before appointment:</strong> A $25 late cancellation fee applies. Alternatively, we will issue a full-value tech credit valid for 90 days — no fee in this case.</p>
<p class="mt-3"><strong class="text-white">Same-day cancellation (within 2 hours):</strong> A $49 same-day cancellation fee applies if a technician has already been dispatched. Tech credit equivalent is available as an alternative.</p>
<p class="mt-3"><strong class="text-white">No-show:</strong> If a technician arrives and is unable to access the property or complete the job through no fault of ours, the same-day cancellation fee applies.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Tech Credit System</h2>
<p>As an alternative to cancellation fees, we offer tech credits equal to the full value of the cancelled appointment. Tech credits:</p>
<ul class="list-disc list-inside mt-2 space-y-1 ml-2">
<li>Are valid for 90 days from the date of issue</li>
<li>Can be applied to any future service (same or different type)</li>
<li>Cannot be combined with other promotional credits</li>
<li>Are non-transferable and have no cash value</li>
<li>Are issued to the email address on file for the booking</li>
</ul>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Membership Cancellations</h2>
<p>You may cancel your membership at any time. Cancellations take effect at the end of the current billing period — you retain full access until that date. We do not offer prorated refunds for partial billing periods after the 30-day guarantee window, except in cases of our material failure to deliver services.</p>
<p class="mt-3">To cancel your membership, contact support at least 3 business days before your next billing date to ensure processing before the charge.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Refund Eligibility for Completed Services</h2>
<p>If we are unable to resolve the issue we were specifically hired to fix, we do not charge for the work. This is our baseline service guarantee, separate from the 30-day membership guarantee.</p>
<p class="mt-3">For services where the issue is partially resolved, we may offer a partial refund or tech credit at our discretion. Contact support within 5 business days of service completion to dispute a charge or request a review.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Chargeback Policy</h2>
<p>Before initiating a chargeback with your bank or credit card company, we ask that you contact us directly at <a href="mailto:support@hewlettcomputerservice.us" class="text-accent-400">support@hewlettcomputerservice.us</a>. Most disputes can be resolved quickly without the need for a formal chargeback process.</p>
<p class="mt-3">Unauthorized chargebacks where services were delivered as agreed may result in suspension of your account, referral to a collections process, and potential legal action to recover funds. We maintain detailed records of all service delivery for dispute resolution purposes.</p>
<p class="mt-3">We will cooperate fully with payment processor dispute processes and provide all relevant documentation demonstrating service delivery.</p>
</div>

</div>
</div>
</div>
<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
</body></html>
