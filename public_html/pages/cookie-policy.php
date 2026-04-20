<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';
$seo = new Seo('Cookie Policy — Hewlett Computer Service', 'Learn about the cookies and tracking technologies used on hewlettcomputerservice.us, their purpose, and how to control them.', SITE_URL . '/cookie-policy');
require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>
<div class="pt-28 pb-24 bg-surface-950">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mb-8">
  <span class="badge-accent mb-4 inline-flex">Legal</span>
  <h1 class="font-display font-bold text-4xl text-white mb-2">Cookie Policy</h1>
  <p class="text-slate-500 text-sm">Last updated: January 1, 2025</p>
</div>
<div class="space-y-6 text-slate-400 text-sm leading-relaxed">

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">What Are Cookies?</h2>
<p>Cookies are small text files stored on your device by your web browser when you visit a website. They allow websites to remember your preferences, analyze how you use the site, and deliver relevant functionality. Some cookies are essential for the site to function; others are used for analytics and marketing.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Cookies We Use</h2>
<div class="overflow-x-auto">
<table class="w-full text-xs mt-2">
<thead><tr class="border-b border-[#1E2D42]">
<th class="text-left py-2 pr-4 text-white font-semibold">Name</th>
<th class="text-left py-2 pr-4 text-white font-semibold">Type</th>
<th class="text-left py-2 pr-4 text-white font-semibold">Expiry</th>
<th class="text-left py-2 text-white font-semibold">Purpose</th>
</tr></thead>
<tbody class="divide-y divide-[#1E2D42]">
<tr><td class="py-2 pr-4 font-mono text-accent-400">PHPSESSID</td><td class="py-2 pr-4">Essential</td><td class="py-2 pr-4">Session</td><td class="py-2">PHP session management. Required for CSRF protection, booking flow, and form security.</td></tr>
<tr><td class="py-2 pr-4 font-mono text-accent-400">hcs-theme</td><td class="py-2 pr-4">Functional</td><td class="py-2 pr-4">1 year</td><td class="py-2">Stores your dark/light mode preference in localStorage (not a cookie but similar function).</td></tr>
<tr><td class="py-2 pr-4 font-mono text-accent-400">_ga</td><td class="py-2 pr-4">Analytics</td><td class="py-2 pr-4">2 years</td><td class="py-2">Google Analytics — distinguishes unique users. Anonymized IP addresses.</td></tr>
<tr><td class="py-2 pr-4 font-mono text-accent-400">_ga_*</td><td class="py-2 pr-4">Analytics</td><td class="py-2 pr-4">2 years</td><td class="py-2">Google Analytics 4 — stores session state and campaign data.</td></tr>
<tr><td class="py-2 pr-4 font-mono text-accent-400">_gid</td><td class="py-2 pr-4">Analytics</td><td class="py-2 pr-4">24 hours</td><td class="py-2">Google Analytics — distinguishes users within a 24-hour window.</td></tr>
<tr><td class="py-2 pr-4 font-mono text-accent-400">_gcl_au</td><td class="py-2 pr-4">Marketing</td><td class="py-2 pr-4">90 days</td><td class="py-2">Google Ads conversion tracking. Only present if Google Ads is active.</td></tr>
</tbody>
</table>
</div>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Google Analytics Opt-Out</h2>
<p>You can opt out of Google Analytics tracking by installing the <a href="https://tools.google.com/dlpage/gaoptout" class="text-accent-400 hover:underline" target="_blank" rel="noopener">Google Analytics Opt-out Browser Add-on</a>. Alternatively, visit <a href="https://www.google.com/settings/ads" class="text-accent-400 hover:underline" target="_blank" rel="noopener">Google Ads Settings</a> to manage your preferences.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">Do Not Track (DNT)</h2>
<p>Our website respects Do Not Track (DNT) browser signals. When a DNT signal is detected, we disable non-essential analytics cookies. Note that DNT is not a legally standardized signal and some third-party services may not honor it.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">How to Manage Cookies in Your Browser</h2>
<div class="space-y-3">
<?php $browsers = [
['name' => 'Chrome', 'steps' => 'Settings → Privacy and security → Cookies and other site data'],
['name' => 'Firefox', 'steps' => 'Preferences → Privacy & Security → Cookies and Site Data'],
['name' => 'Safari', 'steps' => 'Preferences → Privacy → Manage Website Data'],
['name' => 'Edge', 'steps' => 'Settings → Cookies and site permissions → Cookies and site data'],
['name' => 'Mobile (iOS Safari)', 'steps' => 'Settings → Safari → Privacy & Security → Block All Cookies'],
['name' => 'Mobile (Android Chrome)', 'steps' => 'Chrome Settings → Site settings → Cookies'],
]; ?>
<?php foreach ($browsers as $b): ?>
<div class="flex items-start gap-3">
<span class="text-accent-400 font-semibold shrink-0 w-40"><?php echo e($b['name']); ?></span>
<span><?php echo e($b['steps']); ?></span>
</div>
<?php endforeach; ?>
</div>
<p class="mt-3">Note: Disabling essential cookies will affect site functionality including the booking form and CSRF protection.</p>
</div>

</div>
</div>
</div>
<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
</body></html>
