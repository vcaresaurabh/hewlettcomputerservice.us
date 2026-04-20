<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';
$seo = new Seo('Uninstall Guide — Remove Remote Support Software', 'Step-by-step instructions to remove remote support tools from Windows, macOS, iOS, and Android devices used during a Hewlett Computer Service session.', SITE_URL . '/uninstall');
require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>
<div class="pt-28 pb-24 bg-surface-950">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mb-8">
  <span class="badge-accent mb-4 inline-flex">Support Guide</span>
  <h1 class="font-display font-bold text-4xl text-white mb-3">Uninstall Instructions</h1>
  <p class="text-slate-400 max-w-xl">After a remote support session, you may wish to remove any remote access tools that were installed. Here are step-by-step instructions for every major platform.</p>
</div>

<div class="space-y-5" x-data="{ tab: 'windows' }">
  <!-- Platform tabs -->
  <div class="flex flex-wrap gap-2">
    <?php $tabs = ['windows' => 'Windows', 'macos' => 'macOS', 'ios' => 'iOS / iPadOS', 'android' => 'Android']; ?>
    <?php foreach ($tabs as $key => $label): ?>
    <button
      @click="tab = '<?php echo e($key); ?>'"
      :class="tab === '<?php echo e($key); ?>' ? 'bg-accent-500 text-white' : 'card text-slate-400 hover:text-white'"
      class="px-4 py-2 rounded-xl text-sm font-medium transition-all"
    ><?php echo e($label); ?></button>
    <?php endforeach; ?>
  </div>

  <!-- Windows -->
  <div x-show="tab === 'windows'" class="space-y-4 text-slate-400 text-sm" style="display:none">
    <div class="card p-6 rounded-2xl">
      <h2 class="font-display font-semibold text-lg text-white mb-4">Removing Remote Access Software on Windows</h2>
      <h3 class="text-accent-400 font-semibold mb-2">TeamViewer</h3>
      <ol class="list-decimal list-inside space-y-2 ml-2 mb-5">
        <li>Open <strong class="text-white">Settings</strong> → <strong class="text-white">Apps</strong> → <strong class="text-white">Installed apps</strong></li>
        <li>Search for "TeamViewer" in the search box</li>
        <li>Click the three-dot menu next to TeamViewer → <strong class="text-white">Uninstall</strong></li>
        <li>Follow the uninstaller wizard and confirm all prompts</li>
        <li>Restart your computer to complete removal</li>
      </ol>
      <h3 class="text-accent-400 font-semibold mb-2">AnyDesk</h3>
      <ol class="list-decimal list-inside space-y-2 ml-2 mb-5">
        <li>Open <strong class="text-white">Control Panel</strong> → <strong class="text-white">Programs and Features</strong></li>
        <li>Find "AnyDesk" in the list</li>
        <li>Right-click → <strong class="text-white">Uninstall</strong></li>
        <li>Complete the uninstall wizard</li>
      </ol>
      <h3 class="text-white font-semibold mb-2">Post-Session Security Tips</h3>
      <ul class="list-disc list-inside space-y-1 ml-2">
        <li>Change your Windows account password after the session</li>
        <li>Run Windows Defender scan: <strong class="text-white">Settings → Windows Security → Virus &amp; threat protection → Quick scan</strong></li>
        <li>Review recently installed programs in <strong class="text-white">Apps → Installed apps</strong> sorted by install date</li>
        <li>Check <strong class="text-white">Task Manager → Startup</strong> tab for any unfamiliar entries</li>
      </ul>
    </div>
  </div>

  <!-- macOS -->
  <div x-show="tab === 'macos'" class="space-y-4 text-slate-400 text-sm" style="display:none">
    <div class="card p-6 rounded-2xl">
      <h2 class="font-display font-semibold text-lg text-white mb-4">Removing Remote Access Software on macOS</h2>
      <h3 class="text-accent-400 font-semibold mb-2">TeamViewer</h3>
      <ol class="list-decimal list-inside space-y-2 ml-2 mb-5">
        <li>Open <strong class="text-white">TeamViewer</strong> from Applications</li>
        <li>Click <strong class="text-white">TeamViewer</strong> in the menu bar → <strong class="text-white">Uninstall TeamViewer</strong></li>
        <li>If the menu option isn't available: Go to <strong class="text-white">Finder → Applications</strong>, find TeamViewer, drag to Trash</li>
        <li>Also remove TeamViewer from <strong class="text-white">System Preferences → Security &amp; Privacy → Privacy</strong> (remove any TeamViewer entries from Screen Recording, Accessibility, and Full Disk Access)</li>
        <li>Empty Trash and restart</li>
      </ol>
      <h3 class="text-accent-400 font-semibold mb-2">AnyDesk</h3>
      <ol class="list-decimal list-inside space-y-2 ml-2 mb-5">
        <li>Go to <strong class="text-white">Finder → Applications</strong></li>
        <li>Drag <strong class="text-white">AnyDesk</strong> to the Trash</li>
        <li>Remove accessibility permissions in <strong class="text-white">System Preferences → Security &amp; Privacy → Accessibility</strong></li>
        <li>Empty Trash</li>
      </ol>
      <h3 class="text-white font-semibold mb-2">Post-Session Security Tips</h3>
      <ul class="list-disc list-inside space-y-1 ml-2">
        <li>Change your macOS login password: <strong class="text-white">System Preferences → Users &amp; Groups</strong></li>
        <li>Review <strong class="text-white">System Preferences → Security &amp; Privacy → Privacy</strong> for all permission categories</li>
        <li>Check <strong class="text-white">System Preferences → Users &amp; Groups → Login Items</strong> for unfamiliar entries</li>
      </ul>
    </div>
  </div>

  <!-- iOS -->
  <div x-show="tab === 'ios'" class="space-y-4 text-slate-400 text-sm" style="display:none">
    <div class="card p-6 rounded-2xl">
      <h2 class="font-display font-semibold text-lg text-white mb-4">Removing Apps on iOS / iPadOS</h2>
      <p class="mb-4">Remote access apps on iOS (like TeamViewer QuickSupport) do not provide full remote control — they are used only for screen sharing and require your active participation. Standard iOS restrictions prevent apps from having background access to your device after the session ends.</p>
      <h3 class="text-accent-400 font-semibold mb-2">To delete any app</h3>
      <ol class="list-decimal list-inside space-y-2 ml-2 mb-5">
        <li>Long-press the app icon on your home screen</li>
        <li>Tap <strong class="text-white">Remove App</strong></li>
        <li>Tap <strong class="text-white">Delete App</strong> → <strong class="text-white">Delete</strong> to confirm</li>
      </ol>
      <h3 class="text-white font-semibold mb-2">Post-Session Security Tips</h3>
      <ul class="list-disc list-inside space-y-1 ml-2">
        <li>Go to <strong class="text-white">Settings → Privacy &amp; Security</strong> and review recently accessed permissions</li>
        <li>Check <strong class="text-white">Settings → Screen Time</strong> for any unfamiliar activity</li>
        <li>Consider changing your Apple ID password via <strong class="text-white">Settings → [Your Name] → Password &amp; Security</strong></li>
      </ul>
    </div>
  </div>

  <!-- Android -->
  <div x-show="tab === 'android'" class="space-y-4 text-slate-400 text-sm" style="display:none">
    <div class="card p-6 rounded-2xl">
      <h2 class="font-display font-semibold text-lg text-white mb-4">Removing Apps on Android</h2>
      <h3 class="text-accent-400 font-semibold mb-2">Standard App Uninstall</h3>
      <ol class="list-decimal list-inside space-y-2 ml-2 mb-5">
        <li>Go to <strong class="text-white">Settings → Apps</strong> (or Apps &amp; notifications)</li>
        <li>Find the remote access app (TeamViewer, AnyDesk, etc.)</li>
        <li>Tap the app name → <strong class="text-white">Uninstall</strong> → confirm</li>
      </ol>
      <h3 class="text-accent-400 font-semibold mb-2">Revoke Special Permissions First (if required)</h3>
      <ol class="list-decimal list-inside space-y-2 ml-2 mb-5">
        <li>Go to <strong class="text-white">Settings → Accessibility</strong> and disable any accessibility service for the remote app</li>
        <li>Go to <strong class="text-white">Settings → Security → Device Admin apps</strong> and revoke admin privileges if present</li>
        <li>Then return to Apps to uninstall</li>
      </ol>
      <h3 class="text-white font-semibold mb-2">Post-Session Security Tips</h3>
      <ul class="list-disc list-inside space-y-1 ml-2">
        <li>Review <strong class="text-white">Settings → Privacy → Permission manager</strong> for recently used permissions</li>
        <li>Change your Google account password at <strong class="text-white">myaccount.google.com</strong></li>
        <li>Run a scan with Google Play Protect: <strong class="text-white">Play Store → Profile icon → Play Protect</strong></li>
      </ul>
    </div>
  </div>

</div>

<div class="mt-8 card p-6 rounded-2xl">
  <p class="text-slate-400 text-sm">Questions? Contact our support team at <a href="mailto:support@hewlettcomputerservice.us" class="text-accent-400">support@hewlettcomputerservice.us</a> or call <a href="tel:+12056494627" class="text-accent-400">(205) 649-4627</a>.</p>
</div>

</div>
</div>
<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
</body></html>
