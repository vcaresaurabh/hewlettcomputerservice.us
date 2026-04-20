<!-- Floating Book Now button -->
<a
  href="/book"
  id="floating-book"
  class="fixed bottom-6 right-6 z-40 btn-primary shadow-2xl shadow-accent-500/30 hidden md:inline-flex opacity-0 transition-opacity duration-300"
  style="border-radius:9999px; padding:14px 22px;"
  aria-label="Book a service"
>
  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
  <span class="text-sm font-semibold">Book Now</span>
</a>
<script>
(function(){
  var btn = document.getElementById('floating-book');
  if (!btn) return;
  window.addEventListener('scroll', function() {
    if (window.scrollY > 300) {
      btn.style.opacity = '1';
    } else {
      btn.style.opacity = '0';
    }
  });
})();
</script>
