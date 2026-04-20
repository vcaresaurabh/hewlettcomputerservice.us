<!DOCTYPE html>
<html lang="en" class="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Dark mode — always on -->
<script>document.documentElement.classList.add('dark');</script>

<?php if (isset($seo)): ?>
<?php $seo->render(); ?>
<?php endif; ?>

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="/favicon.ico?v=2">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon.ico?v=2">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png?v=2">
<link rel="shortcut icon" href="/favicon.ico?v=2">
<meta name="theme-color" content="#080B12">
<meta name="msapplication-TileColor" content="#080B12">
<meta name="msapplication-config" content="none">

<!-- Additional SEO meta -->
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="author" content="Hewlett Computer Service">
<meta name="geo.region" content="US-CA">
<meta name="geo.placename" content="Vista, California">
<meta name="geo.position" content="33.1983;-117.2425">
<meta name="ICBM" content="33.1983, -117.2425">
<meta name="format-detection" content="telephone=no">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&family=JetBrains+Mono:wght@400;500&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="<?php echo asset('assets/css/app.css'); ?>">

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-surface-950 text-slate-300 min-h-screen">
