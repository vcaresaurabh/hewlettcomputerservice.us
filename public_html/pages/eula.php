<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';
$seo = new Seo('End User License Agreement (EULA) — Hewlett Computer Service', 'End User License Agreement for remote support tools and software installed by Hewlett Computer Service.', SITE_URL . '/eula');
require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>
<div class="pt-28 pb-24 bg-surface-950">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mb-8">
  <span class="badge-accent mb-4 inline-flex">Legal</span>
  <h1 class="font-display font-bold text-4xl text-white mb-2">End User License Agreement</h1>
  <p class="text-slate-500 text-sm">Last updated: January 1, 2025</p>
</div>
<div class="space-y-6 text-slate-400 text-sm leading-relaxed">

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">1. Remote Support Tools — License Grant</h2>
<p>To facilitate remote support services, we may ask you to install or run a remote access tool (such as TeamViewer, AnyDesk, or a similar application) on your device. By installing and running such software at our direction, you are granted a limited, non-exclusive, non-transferable, revocable license to use that software solely for the purpose of receiving remote support from Hewlett Computer Service during an active support session.</p>
<p class="mt-3">This license terminates automatically at the end of the support session. You may uninstall the software at any time. See our Uninstall Guide for instructions specific to your operating system.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">2. Remote Support Terms</h2>
<p>During a remote support session, our technician will have access to your screen and may operate your device. You acknowledge and agree that:</p>
<ul class="list-disc list-inside mt-2 space-y-1 ml-2">
<li>You must be present during the session or have explicitly authorized us to proceed in your absence</li>
<li>You retain the ability to terminate the session at any time by closing the remote access application</li>
<li>We will only access files, folders, and settings necessary to address the specific support issue</li>
<li>We will not access, copy, or transmit personal data beyond what is necessary for the support task</li>
<li>Sessions are not recorded by us unless you explicitly request a recording for your own reference</li>
</ul>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">3. Intellectual Property</h2>
<p>Any scripts, configurations, tools, or methods used by our technicians during service visits remain the intellectual property of Hewlett Computer Service. You are granted permission to use any configurations, scripts, or software we install as part of your service delivery, subject to the relevant third-party licenses.</p>
<p class="mt-3">You may not reproduce, distribute, reverse-engineer, or create derivative works of any proprietary materials, documentation, or software provided by Hewlett Computer Service without our prior written consent.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">4. Warranty Disclaimer</h2>
<p>REMOTE ACCESS TOOLS AND ANY SOFTWARE RECOMMENDED OR INSTALLED BY OUR TECHNICIANS ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT.</p>
<p class="mt-3">We do not warrant that remote access software will be free from errors, interruptions, or security vulnerabilities. You are responsible for maintaining current antivirus software and system security practices on your device.</p>
</div>

<div class="card p-6 rounded-2xl">
<h2 class="font-display font-semibold text-lg text-white mb-3">5. Acceptable Use</h2>
<p>You agree not to use our services or any software provided by us to:</p>
<ul class="list-disc list-inside mt-2 space-y-1 ml-2">
<li>Engage in any unlawful activity</li>
<li>Transmit viruses, malware, or any harmful software</li>
<li>Access systems or data without authorization</li>
<li>Violate any third-party rights, including intellectual property rights</li>
<li>Provide false information that may endanger our technicians</li>
</ul>
<p class="mt-3">Violation of these terms may result in immediate termination of services and potential legal action.</p>
</div>

</div>
</div>
</div>
<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
</body></html>
