<footer class="bg-surface-950 border-t border-[#1E2D42] pt-16 pb-8 mt-auto">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Newsletter row -->
    <div class="card p-6 md:p-8 rounded-2xl mb-12 flex flex-col md:flex-row items-center gap-6 justify-between">
      <div>
        <h3 class="font-display font-semibold text-lg text-white mb-1">Tech tips, updates & exclusive deals</h3>
        <p class="text-sm text-slate-400">No spam. Unsubscribe anytime. Sent monthly at most.</p>
      </div>
      <form id="newsletter-form" class="flex gap-2 w-full md:w-auto">
        <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
        <input type="text" name="hp_email" class="hidden" tabindex="-1" autocomplete="off">
        <input type="email" name="email" placeholder="your@email.com" required class="form-input md:w-64 text-sm" aria-label="Email address">
        <button type="submit" class="btn-primary shrink-0 text-sm px-5 py-2.5">Subscribe</button>
      </form>
    </div>

    <!-- 4-column grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
      <!-- Brand column -->
      <div class="col-span-2 md:col-span-1">
        <a href="/" class="flex items-center gap-2 mb-4">
          <div class="w-7 h-7 rounded-lg flex items-center justify-center" style="background:linear-gradient(135deg,#0EA5E9,#6366F1)">
            <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0H3"/></svg>
          </div>
          <span class="font-display font-600 text-white text-sm">Hewlett Computer Service</span>
        </a>
        <p class="text-xs text-slate-500 leading-relaxed mb-4">Expert technical assistance, smart home installation, and IT services delivered to your door.</p>
        <div class="space-y-2">
          <a href="tel:+12056494627" class="flex items-center gap-2 text-xs text-slate-400 hover:text-accent-400 transition-colors">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
            (205) 649-4627
          </a>
          <a href="mailto:support@hewlettcomputerservice.us" class="flex items-center gap-2 text-xs text-slate-400 hover:text-accent-400 transition-colors">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
            support@hewlettcomputerservice.us
          </a>
          <p class="flex items-start gap-2 text-xs text-slate-500">
            <svg class="w-3.5 h-3.5 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
            2634 Cove Court, Vista, CA 92081
          </p>
        </div>
      </div>

      <!-- Services -->
      <div>
        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-4">Services</h4>
        <ul class="space-y-2.5">
          <li><a href="/services/computers-printers" class="text-xs text-slate-400 hover:text-white transition-colors">Computers & Printers</a></li>
          <li><a href="/services/wifi-network" class="text-xs text-slate-400 hover:text-white transition-colors">WiFi & Network</a></li>
          <li><a href="/services/smart-home" class="text-xs text-slate-400 hover:text-white transition-colors">Smart Home</a></li>
          <li><a href="/services/audio-video" class="text-xs text-slate-400 hover:text-white transition-colors">Audio & Video</a></li>
          <li><a href="/services/tv-mounting" class="text-xs text-slate-400 hover:text-white transition-colors">TV Mounting</a></li>
          <li><a href="/services/home-security" class="text-xs text-slate-400 hover:text-white transition-colors">Home Security</a></li>
          <li><a href="/services/mobile-devices" class="text-xs text-slate-400 hover:text-white transition-colors">Mobile Devices</a></li>
          <li><a href="/services/handyman" class="text-xs text-slate-400 hover:text-white transition-colors">Around the Home</a></li>
          <li><a href="/services/website-seo" class="text-xs text-slate-400 hover:text-white transition-colors">Website & SEO</a></li>
        </ul>
      </div>

      <!-- Company -->
      <div>
        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-4">Company</h4>
        <ul class="space-y-2.5">
          <li><a href="/about" class="text-xs text-slate-400 hover:text-white transition-colors">About Us</a></li>
          <li><a href="/membership" class="text-xs text-slate-400 hover:text-white transition-colors">Membership Plans</a></li>
          <li><a href="/partners" class="text-xs text-slate-400 hover:text-white transition-colors">Partner Program</a></li>
          <li><a href="/faq" class="text-xs text-slate-400 hover:text-white transition-colors">FAQ</a></li>
          <li><a href="/contact" class="text-xs text-slate-400 hover:text-white transition-colors">Contact Us</a></li>
          <li><a href="/book" class="text-xs text-slate-400 hover:text-white transition-colors">Book a Service</a></li>
        </ul>
        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-4 mt-6">Hours</h4>
        <p class="text-xs text-slate-500 leading-relaxed">Mon–Fri 8am–7pm PT<br>Sat 9am–5pm PT<br>Sun Closed<br><span class="text-slate-400">Support: 9am–8pm, 7 days</span></p>
      </div>

      <!-- Legal -->
      <div>
        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-4">Legal</h4>
        <ul class="space-y-2.5">
          <li><a href="/privacy" class="text-xs text-slate-400 hover:text-white transition-colors">Privacy Policy</a></li>
          <li><a href="/terms" class="text-xs text-slate-400 hover:text-white transition-colors">Terms of Service</a></li>
          <li><a href="/cookie-policy" class="text-xs text-slate-400 hover:text-white transition-colors">Cookie Policy</a></li>
          <li><a href="/disclaimer" class="text-xs text-slate-400 hover:text-white transition-colors">Disclaimer</a></li>
          <li><a href="/cancellation-policy" class="text-xs text-slate-400 hover:text-white transition-colors">Cancellation Policy</a></li>
          <li><a href="/eula" class="text-xs text-slate-400 hover:text-white transition-colors">EULA</a></li>
          <li><a href="/uninstall" class="text-xs text-slate-400 hover:text-white transition-colors">Uninstall Guide</a></li>
          <li><a href="/opt-in-opt-out" class="text-xs text-slate-400 hover:text-white transition-colors">Opt-In / Opt-Out</a></li>
        </ul>
      </div>
    </div>

    <!-- Bottom bar -->
    <div class="border-t border-[#1E2D42] pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
      <p class="text-xs text-slate-500">&copy; <?php echo date('Y'); ?> Hewlett Computer Service. All rights reserved.</p>
      <div class="flex items-center gap-4">
        <span class="badge-green text-xs">CompTIA A+ Certified</span>
        <span class="badge-accent text-xs">Licensed & Insured</span>
        <span class="badge badge-indigo text-xs">30-Day Guarantee</span>
      </div>
    </div>
  </div>
</footer>

<script>
document.getElementById('newsletter-form')?.addEventListener('submit', async function(e) {
  e.preventDefault();
  const btn = this.querySelector('button[type=submit]');
  const data = new FormData(this);
  btn.disabled = true;
  btn.textContent = 'Subscribing...';
  try {
    const res = await fetch('/api/newsletter', { method: 'POST', body: data });
    const json = await res.json();
    if (json.success) {
      btn.textContent = 'Subscribed!';
      this.querySelector('input[type=email]').value = '';
    } else {
      btn.textContent = 'Try again';
      btn.disabled = false;
    }
  } catch {
    btn.textContent = 'Error';
    btn.disabled = false;
  }
});
</script>
