<?php
if (!defined('ROOT')) {
    define('ROOT', dirname(__DIR__));
    require_once ROOT . '/includes/helpers.php';
}
require_once ROOT . '/includes/seo.php';

$seo = new Seo('Page Not Found — Hewlett Computer Service', 'The page you\'re looking for doesn\'t exist.', SITE_URL . '/404');

require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>

<section class="pt-32 pb-24 bg-surface-950 relative overflow-hidden min-h-screen flex items-center">
  <div class="glow-orb w-96 h-96 bg-accent-500/8 top-0 left-1/4"></div>
  <div class="absolute inset-0 grid-pattern opacity-20"></div>
  <div class="relative max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full">
    <div class="gsap-fade-up">
      <p class="font-display font-bold text-8xl md:text-9xl gradient-text mb-4">404</p>
      <h1 class="font-display font-bold text-3xl md:text-4xl text-white mb-4">Page Not Found</h1>
      <p class="text-slate-400 text-lg mb-8">The page you're looking for doesn't exist or has been moved. Let's get you back on track.</p>
      <div class="flex flex-wrap justify-center gap-4">
        <a href="/" class="btn-primary">Go Home</a>
        <a href="/services" class="btn-outline">Browse Services</a>
      </div>
    </div>
  </div>
</section>

<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
</body>
</html>
