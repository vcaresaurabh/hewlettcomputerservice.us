<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';
$seo = new Seo('Disclaimer — Hewlett Computer Service', 'Important disclaimers regarding results, third-party products, and professional advice.', SITE_URL . '/disclaimer');
require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>
<div class="pt-28 pb-24 bg-surface-950">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mb-8">
  <span class="badge-accent mb-4 inline-flex">Legal</span>
  <h1 class="font-display font-bold text-4xl text-white mb-2">Disclaimer</h1>
  <p class="text-slate-500 text-sm">Last updated: January 1, 2025</p>
</div>
<div class="space-y-6 text-slate-400 text-sm leading-relaxed">

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Results Disclaimer</h2>
<p>While we are committed to delivering high-quality tech support and installation services, we cannot guarantee specific outcomes for every service situation. Technology environments vary in complexity, and factors outside our control — including pre-existing hardware conditions, software conflicts, manufacturer defects, or user behavior following service — may affect the durability of results.</p>
<p class="mt-3">All price ranges and service estimates provided on this website are approximate guides based on typical cases. Your specific situation may result in a different price or time requirement. We will always provide a firm quote before beginning any work.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Third-Party Products Disclaimer</h2>
<p>References to third-party products, brands, or services (including but not limited to Microsoft, Apple, Google, Ring, Nest, Amazon, Arlo, Ecobee, Schlage, and others) are for identification purposes only. We are not affiliated with, endorsed by, or sponsored by these companies unless explicitly stated. Product names and logos are the property of their respective owners.</p>
<p class="mt-3">Compatibility of third-party products with your existing systems cannot be guaranteed in all cases. We perform compatibility checks as part of our service, but manufacturer changes, firmware updates, or system configurations may affect compatibility after installation.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">No Professional Advice Disclaimer</h2>
<p>Information provided on this website, in marketing materials, or through social media is for general informational purposes only. It does not constitute professional legal, financial, medical, architectural, or electrical engineering advice. For issues requiring licensed professionals (e.g., electrical work behind walls, structural modifications), you should consult appropriately licensed contractors.</p>
<p class="mt-3">Our handyman and installation services do not include work that requires licensed contractor status (e.g., running new electrical circuits, plumbing, HVAC modification). We will inform you if a task falls outside our scope and recommend appropriate licensed professionals.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Data Loss Disclaimer</h2>
<p>While we take reasonable precautions during all service visits, technology services inherently carry a risk of data loss. We strongly recommend that you maintain a current, complete backup of all data on any device you entrust to us before service begins. We are not liable for data loss resulting from pre-existing device conditions, hardware failure, or circumstances beyond our control, except where caused by our direct negligence.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Website Accuracy</h2>
<p>We make reasonable efforts to ensure that information on this website is accurate and up-to-date. However, we do not warrant that all content is free from errors or that it is continuously available. Pricing, service availability, and terms are subject to change without notice. Please contact us to confirm current pricing and availability before booking.</p>
</div>

</div>
</div>
</div>
<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
</body></html>
