<?php
$services_data = require ROOT . '/data/services.php';
?>
<header
  id="navbar"
  x-data="{ open: false, scrolled: false, servicesOpen: false }"
  x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
  :class="scrolled ? 'glassmorphic' : 'nav-transparent'"
  class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16 md:h-18">

      <!-- Logo -->
      <a href="/" class="flex items-center gap-2.5 shrink-0">
        <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0" style="background:linear-gradient(135deg,#0EA5E9,#6366F1)">
          <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0H3" />
          </svg>
        </div>
        <span class="font-display font-700 text-white text-sm leading-tight hidden sm:block">Hewlett<br><span class="gradient-text">Computer Service</span></span>
      </a>

      <!-- Desktop nav -->
      <nav class="hidden md:flex items-center gap-1">
        <a href="/" class="<?php echo nav_active('/'); ?> px-3 py-2 rounded-lg text-sm font-medium transition-colors">Home</a>

        <!-- Services dropdown -->
        <div class="relative" x-data="{ open: false, _t: null }" @mouseenter="clearTimeout(_t); open=true" @mouseleave="_t=setTimeout(()=>open=false,150)">
          <button class="flex items-center gap-1 text-slate-400 hover:text-white px-3 py-2 rounded-lg text-sm font-medium transition-colors" :class="open ? 'text-white' : ''">
            Services
            <svg class="w-3 h-3 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="absolute top-full left-0 mt-2 w-[560px] card shadow-2xl shadow-black/50 rounded-2xl p-4 grid grid-cols-3 gap-1.5" style="display:none">
            <?php foreach ($services_data as $svc): ?>
            <a href="/services/<?php echo e($svc['slug']); ?>" class="flex items-start gap-2.5 p-2.5 rounded-xl hover:bg-accent-500/5 hover:border hover:border-accent-500/10 transition-all group">
              <div class="text-accent-500 mt-0.5 shrink-0 group-hover:text-accent-400">
                <?php echo service_icon($svc['slug'], 'w-4 h-4'); ?>
              </div>
              <div>
                <p class="text-xs font-semibold text-white leading-snug"><?php echo e($svc['name']); ?></p>
                <p class="text-xs text-slate-500 leading-snug mt-0.5"><?php echo e(substr($svc['tagline'], 0, 40)); ?>...</p>
              </div>
            </a>
            <?php endforeach; ?>
          </div>
        </div>

        <a href="/membership" class="<?php echo nav_active('/membership'); ?> px-3 py-2 rounded-lg text-sm font-medium transition-colors">Membership</a>
        <a href="/about" class="<?php echo nav_active('/about'); ?> px-3 py-2 rounded-lg text-sm font-medium transition-colors">About</a>
        <a href="/contact" class="<?php echo nav_active('/contact'); ?> px-3 py-2 rounded-lg text-sm font-medium transition-colors">Contact</a>
      </nav>

      <!-- Right actions -->
      <div class="flex items-center gap-3">
        <a href="/book" class="hidden md:inline-flex btn-primary text-xs px-4 py-2">
          <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          <span>Book Now</span>
        </a>

        <!-- Mobile menu button -->
        <button @click="open=!open" class="md:hidden w-9 h-9 flex items-center justify-center rounded-lg text-slate-400 hover:text-white hover:bg-white/5 transition-all" aria-label="Toggle menu" :aria-expanded="open.toString()">
          <svg x-show="!open" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
          <svg x-show="open" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:none"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile drawer -->
  <div
    x-show="open"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-4"
    class="md:hidden glassmorphic border-t border-[#1E2D42]"
    style="display:none"
  >
    <div class="max-w-7xl mx-auto px-4 py-4 space-y-1">
      <a href="/" class="block px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">Home</a>
      <a href="/services" class="block px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">Services</a>
      <a href="/membership" class="block px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">Membership</a>
      <a href="/about" class="block px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">About</a>
      <a href="/faq" class="block px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">FAQ</a>
      <a href="/contact" class="block px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">Contact</a>
      <div class="pt-2">
        <a href="/book" class="btn-primary w-full justify-center">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          Book a Service
        </a>
      </div>
    </div>
  </div>
</header>
