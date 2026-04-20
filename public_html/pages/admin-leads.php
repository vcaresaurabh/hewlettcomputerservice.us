<?php
declare(strict_types=1);
require_once ROOT . '/includes/helpers.php';

if (empty($_SESSION['admin_logged_in'])) {
    header('Location: /admin');
    exit;
}

$bookings  = [];
$contacts  = [];
$db_error  = '';

try {
    require_once ROOT . '/includes/db.php';
    $pdo = get_db();
    $bookings = $pdo->query('SELECT * FROM bookings ORDER BY created_at DESC LIMIT 200')->fetchAll();
    $contacts = $pdo->query('SELECT * FROM contacts ORDER BY created_at DESC LIMIT 200')->fetchAll();
} catch (Exception $e) {
    $db_error = 'Database not connected. Configure config/config.php to view leads.';
}

$active_tab = $_GET['tab'] ?? 'bookings';
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin — Leads Dashboard</title>
<script>document.documentElement.classList.add('dark');</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap">
<link rel="stylesheet" href="<?php echo asset('assets/css/app.css'); ?>">
<meta name="robots" content="noindex,nofollow">
</head>
<body class="bg-surface-950 text-slate-300 min-h-screen">

<!-- Top bar -->
<header class="glassmorphic border-b border-[#1E2D42] px-6 py-3 flex items-center justify-between sticky top-0 z-10">
  <div class="flex items-center gap-3">
    <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0" style="background:linear-gradient(135deg,#0EA5E9,#6366F1)">
      <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0H3" /></svg>
    </div>
    <span class="font-display font-semibold text-white text-sm">Admin Dashboard</span>
  </div>
  <div class="flex items-center gap-4">
    <a href="/" class="text-xs text-slate-400 hover:text-white transition-colors">View Site</a>
    <a href="/admin/logout" class="text-xs text-red-400 hover:text-red-300 transition-colors">Logout</a>
  </div>
</header>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

  <!-- Stats -->
  <?php if (!$db_error): ?>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
    <?php $stats = [
      ['label' => 'Total Bookings', 'val' => count($bookings)],
      ['label' => 'Pending', 'val' => count(array_filter($bookings, fn($b) => $b['status'] === 'pending'))],
      ['label' => 'Confirmed', 'val' => count(array_filter($bookings, fn($b) => $b['status'] === 'confirmed'))],
      ['label' => 'Contact Forms', 'val' => count($contacts)],
    ]; ?>
    <?php foreach ($stats as $s): ?>
    <div class="card p-5 rounded-2xl text-center">
      <p class="font-display font-bold text-3xl text-white mb-1"><?php echo e($s['val']); ?></p>
      <p class="text-slate-400 text-xs"><?php echo e($s['label']); ?></p>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <?php if ($db_error): ?>
  <div class="card p-6 rounded-2xl mb-6 border-amber-500/30" style="border-color:rgba(245,158,11,0.3)">
    <div class="flex items-start gap-3">
      <svg class="w-5 h-5 text-amber-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
      <div>
        <p class="text-amber-400 font-medium text-sm"><?php echo e($db_error); ?></p>
        <p class="text-slate-500 text-xs mt-1">Steps: copy <code class="text-accent-400">config/config.sample.php</code> → <code class="text-accent-400">config/config.php</code>, fill DB credentials, import <code class="text-accent-400">sql/schema.sql</code></p>
      </div>
    </div>
  </div>
  <?php else: ?>

  <!-- Tabs -->
  <div class="flex gap-2 mb-6">
    <a href="?tab=bookings" class="px-4 py-2 rounded-xl text-sm font-medium transition-all <?php echo $active_tab === 'bookings' ? 'bg-accent-500 text-white' : 'text-slate-400 hover:text-white hover:bg-white/5'; ?>">
      Bookings (<?php echo count($bookings); ?>)
    </a>
    <a href="?tab=contacts" class="px-4 py-2 rounded-xl text-sm font-medium transition-all <?php echo $active_tab === 'contacts' ? 'bg-accent-500 text-white' : 'text-slate-400 hover:text-white hover:bg-white/5'; ?>">
      Contact Forms (<?php echo count($contacts); ?>)
    </a>
  </div>

  <?php if ($active_tab === 'bookings'): ?>
  <!-- Bookings table -->
  <div class="card rounded-2xl overflow-hidden">
    <?php if (empty($bookings)): ?>
    <div class="p-12 text-center text-slate-500">No bookings yet.</div>
    <?php else: ?>
    <div class="overflow-x-auto">
      <table class="w-full text-sm">
        <thead>
          <tr class="border-b border-[#1E2D42]">
            <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-400">Ref</th>
            <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-400">Customer</th>
            <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-400">Service</th>
            <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-400">Date / Time</th>
            <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-400">Status</th>
            <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-400">Submitted</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#1E2D42]">
          <?php foreach ($bookings as $b): ?>
          <tr class="hover:bg-white/2 transition-colors">
            <td class="px-5 py-4 font-mono text-xs text-accent-400"><?php echo e($b['booking_ref']); ?></td>
            <td class="px-5 py-4">
              <p class="text-white font-medium text-xs"><?php echo e($b['name']); ?></p>
              <p class="text-slate-500 text-xs"><?php echo e($b['email']); ?></p>
              <?php if ($b['phone']): ?><p class="text-slate-500 text-xs"><?php echo e($b['phone']); ?></p><?php endif; ?>
            </td>
            <td class="px-5 py-4 text-xs text-slate-300"><?php echo e($b['service_category']); ?></td>
            <td class="px-5 py-4 text-xs text-slate-300">
              <?php echo e($b['preferred_date']); ?><br>
              <span class="text-slate-500"><?php echo e($b['preferred_time']); ?></span>
            </td>
            <td class="px-5 py-4">
              <?php $sc = ['pending'=>'bg-amber-500/10 text-amber-400 border-amber-500/20','confirmed'=>'bg-emerald-500/10 text-emerald-400 border-emerald-500/20','completed'=>'bg-accent-500/10 text-accent-400 border-accent-500/20','cancelled'=>'bg-red-500/10 text-red-400 border-red-500/20']; ?>
              <span class="badge border <?php echo $sc[$b['status']] ?? 'bg-slate-500/10 text-slate-400 border-slate-500/20'; ?>"><?php echo e($b['status']); ?></span>
            </td>
            <td class="px-5 py-4 text-xs text-slate-500"><?php echo date('M j, Y g:ia', strtotime($b['created_at'])); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php endif; ?>
  </div>

  <?php else: ?>
  <!-- Contacts table -->
  <div class="card rounded-2xl overflow-hidden">
    <?php if (empty($contacts)): ?>
    <div class="p-12 text-center text-slate-500">No contact submissions yet.</div>
    <?php else: ?>
    <div class="overflow-x-auto">
      <table class="w-full text-sm">
        <thead>
          <tr class="border-b border-[#1E2D42]">
            <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-400">Name</th>
            <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-400">Subject</th>
            <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-400">Message</th>
            <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-400">Submitted</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#1E2D42]">
          <?php foreach ($contacts as $c): ?>
          <tr class="hover:bg-white/2 transition-colors">
            <td class="px-5 py-4">
              <p class="text-white font-medium text-xs"><?php echo e($c['name']); ?></p>
              <p class="text-slate-500 text-xs"><?php echo e($c['email']); ?></p>
              <?php if ($c['phone']): ?><p class="text-slate-500 text-xs"><?php echo e($c['phone']); ?></p><?php endif; ?>
            </td>
            <td class="px-5 py-4 text-xs text-slate-300"><?php echo e($c['subject'] ?? '—'); ?></td>
            <td class="px-5 py-4 text-xs text-slate-400 max-w-xs"><?php echo e(substr($c['message'], 0, 120)); ?><?php echo strlen($c['message']) > 120 ? '…' : ''; ?></td>
            <td class="px-5 py-4 text-xs text-slate-500"><?php echo date('M j, Y g:ia', strtotime($c['created_at'])); ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php endif; ?>
  </div>
  <?php endif; ?>
  <?php endif; ?>

</div>
</body>
</html>
