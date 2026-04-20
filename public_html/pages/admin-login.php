<?php
declare(strict_types=1);
require_once ROOT . '/includes/helpers.php';

// Already logged in
if (!empty($_SESSION['admin_logged_in'])) {
    header('Location: /admin/leads');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $admin_user = 'admin';
    $admin_hash = '$2y$12$Ci27eOorUbfwE5vNSSmkXuNffCt977SdujzgpH5WfQCHxxmESeckm';
    if ($username === $admin_user && password_verify($password, $admin_hash)) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: /admin/leads');
        exit;
    }
    $error = 'Invalid credentials.';
}
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login — Hewlett Computer Service</title>
<script>document.documentElement.classList.add('dark');</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap">
<link rel="stylesheet" href="<?php echo asset('assets/css/app.css'); ?>">
<meta name="robots" content="noindex,nofollow">
</head>
<body class="bg-surface-950 text-slate-300 min-h-screen flex items-center justify-center">
<div class="w-full max-w-sm mx-auto px-4">
  <div class="card p-8 rounded-2xl">
    <div class="text-center mb-8">
      <div class="w-12 h-12 rounded-xl flex items-center justify-center mx-auto mb-4" style="background:linear-gradient(135deg,#0EA5E9,#6366F1)">
        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
      </div>
      <h1 class="font-display font-bold text-xl text-white">Admin Login</h1>
      <p class="text-slate-500 text-sm mt-1">Hewlett Computer Service</p>
    </div>
    <?php if ($error): ?>
    <div class="mb-4 p-3 bg-red-500/10 border border-red-500/30 rounded-xl text-red-400 text-sm text-center"><?php echo e($error); ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="mb-4">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-input" autocomplete="username" required>
      </div>
      <div class="mb-6">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-input" autocomplete="current-password" required>
      </div>
      <button type="submit" class="btn-primary w-full justify-center">Sign In</button>
    </form>
  </div>
  <p class="text-center text-xs text-slate-600 mt-4"><a href="/" class="hover:text-accent-400 transition-colors">← Back to website</a></p>
</div>
</body>
</html>
