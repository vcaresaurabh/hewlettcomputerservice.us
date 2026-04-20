<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';

$seo = new Seo(
    'Book a Service — Hewlett Computer Service',
    'Book on-site or remote tech support in minutes. Choose your service, pick a time, and a certified technician will handle the rest.',
    SITE_URL . '/book'
);

$services = require ROOT . '/data/services.php';
$preselect = sanitize($_GET['service'] ?? '');

require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>

<section class="pt-28 pb-16 bg-surface-950 relative overflow-hidden">
  <div class="glow-orb w-80 h-80 bg-accent-500/8 -top-10 right-0"></div>
  <div class="absolute inset-0 dot-pattern opacity-15"></div>
  <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Heading -->
    <div class="text-center mb-10 gsap-fade-up">
      <span class="badge-accent mb-4 inline-flex">Book a Service</span>
      <h1 class="section-heading mb-3">Schedule Your Technician</h1>
      <p class="text-slate-400">Same-day and next-day slots available. Remote support available 7 days a week.</p>
    </div>

    <!-- 4-step booking form -->
    <div x-data="bookingForm()" class="card rounded-2xl overflow-hidden">

      <!-- Step indicators -->
      <div class="border-b border-[#1E2D42] p-5">
        <div class="flex items-center justify-between max-w-lg mx-auto">
          <template x-for="(stepName, idx) in steps" :key="idx">
            <div class="flex items-center" :class="idx < steps.length - 1 ? 'flex-1' : ''">
              <div class="flex items-center gap-2">
                <div
                  :class="{
                    'text-white': step === idx + 1,
                    'text-slate-600 border-slate-700': step < idx + 1,
                    'text-emerald-400 border-emerald-500/40': step > idx + 1
                  }"
                  class="w-8 h-8 rounded-full border-2 flex items-center justify-center text-xs font-bold transition-all"
                  :style="step === idx + 1 ? 'background:linear-gradient(135deg,#0EA5E9,#6366F1);border-color:transparent' : ''"
                >
                  <span x-show="step <= idx + 1" x-text="idx + 1"></span>
                  <svg x-show="step > idx + 1" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" style="display:none"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
                </div>
                <span class="hidden sm:block text-xs" :class="step >= idx + 1 ? 'text-white font-medium' : 'text-slate-500'" x-text="stepName"></span>
              </div>
              <div x-show="idx < steps.length - 1" class="flex-1 h-px mx-3 transition-colors" :class="step > idx + 1 ? 'bg-emerald-500/40' : 'bg-[#1E2D42]'" style="display:none; display:flex"></div>
            </div>
          </template>
        </div>
      </div>

      <!-- Form body -->
      <div class="p-6 md:p-8">

        <!-- STEP 1: Service -->
        <div x-show="step === 1">
          <h2 class="font-display font-semibold text-lg text-white mb-5">What service do you need?</h2>
          <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
            <?php foreach ($services as $svc): ?>
            <button
              type="button"
              @click="formData.service = '<?php echo e($svc['slug']); ?>'; formData.service_name = '<?php echo e(addslashes($svc['name'])); ?>'"
              :class="formData.service === '<?php echo e($svc['slug']); ?>' ? 'border-accent-500 bg-accent-500/10' : 'border-[#1E2D42] hover:border-accent-500/40'"
              class="flex flex-col items-start gap-2 p-4 rounded-xl border transition-all text-left"
            >
              <span class="text-accent-400"><?php echo service_icon($svc['slug'], 'w-5 h-5'); ?></span>
              <span class="text-sm font-medium text-white"><?php echo e($svc['name']); ?></span>
            </button>
            <?php endforeach; ?>
          </div>
          <p class="text-red-400 text-xs mt-2" x-show="errors.service" x-text="errors.service"></p>
        </div>

        <!-- STEP 2: Date & Time -->
        <div x-show="step === 2" style="display:none">
          <h2 class="font-display font-semibold text-lg text-white mb-5">When works for you?</h2>
          <div class="grid md:grid-cols-2 gap-5 mb-5">
            <div>
              <label class="form-label">Preferred Date <span class="text-red-400">*</span></label>
              <input type="date" x-model="formData.preferred_date" class="form-input" :min="minDate()">
              <p class="text-red-400 text-xs mt-1" x-show="errors.preferred_date" x-text="errors.preferred_date"></p>
            </div>
            <div>
              <label class="form-label">Preferred Time <span class="text-red-400">*</span></label>
              <select x-model="formData.preferred_time" class="form-input">
                <option value="">Choose a time slot</option>
                <option value="8:00am – 10:00am">8:00am – 10:00am</option>
                <option value="10:00am – 12:00pm">10:00am – 12:00pm</option>
                <option value="12:00pm – 2:00pm">12:00pm – 2:00pm</option>
                <option value="2:00pm – 4:00pm">2:00pm – 4:00pm</option>
                <option value="4:00pm – 6:00pm">4:00pm – 6:00pm</option>
                <option value="Remote – Morning">Remote – Morning (9am–12pm)</option>
                <option value="Remote – Afternoon">Remote – Afternoon (12pm–4pm)</option>
                <option value="Remote – Evening">Remote – Evening (4pm–8pm)</option>
              </select>
              <p class="text-red-400 text-xs mt-1" x-show="errors.preferred_time" x-text="errors.preferred_time"></p>
            </div>
          </div>
          <div>
            <label class="form-label">Additional Notes</label>
            <textarea x-model="formData.notes" rows="3" class="form-input resize-none" placeholder="Describe the issue in more detail. Include device make/model if applicable..."></textarea>
          </div>
        </div>

        <!-- STEP 3: Contact Details -->
        <div x-show="step === 3" style="display:none">
          <h2 class="font-display font-semibold text-lg text-white mb-5">Your contact details</h2>
          <div class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="form-label">Full Name <span class="text-red-400">*</span></label>
                <input type="text" x-model="formData.name" class="form-input" placeholder="Jane Smith" autocomplete="name">
                <p class="text-red-400 text-xs mt-1" x-show="errors.name" x-text="errors.name"></p>
              </div>
              <div>
                <label class="form-label">Email <span class="text-red-400">*</span></label>
                <input type="email" x-model="formData.email" class="form-input" placeholder="you@example.com" autocomplete="email">
                <p class="text-red-400 text-xs mt-1" x-show="errors.email" x-text="errors.email"></p>
              </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="form-label">Phone</label>
                <input type="tel" x-model="formData.phone" class="form-input" placeholder="+1 (555) 000-0000" autocomplete="tel">
              </div>
              <div>
                <label class="form-label">Country <span class="text-red-400">*</span></label>
                <select x-model="formData.country" class="form-input">
                  <option value="">Select country</option>
                  <option value="United States">United States</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="Canada">Canada</option>
                </select>
                <p class="text-red-400 text-xs mt-1" x-show="errors.country" x-text="errors.country"></p>
              </div>
            </div>
            <div>
              <label class="form-label">Service Address</label>
              <textarea x-model="formData.address" rows="2" class="form-input resize-none" placeholder="Street address, City, State/Province, ZIP" autocomplete="street-address"></textarea>
            </div>
          </div>
        </div>

        <!-- STEP 4: Review -->
        <div x-show="step === 4" style="display:none">
          <h2 class="font-display font-semibold text-lg text-white mb-5">Review your booking</h2>
          <div class="card rounded-xl p-5 space-y-3 mb-5">
            <div class="flex justify-between text-sm">
              <span class="text-slate-400">Service</span>
              <span class="text-white font-medium" x-text="formData.service_name"></span>
            </div>
            <div class="flex justify-between text-sm border-t border-[#1E2D42] pt-3">
              <span class="text-slate-400">Date</span>
              <span class="text-white" x-text="formData.preferred_date"></span>
            </div>
            <div class="flex justify-between text-sm border-t border-[#1E2D42] pt-3">
              <span class="text-slate-400">Time</span>
              <span class="text-white" x-text="formData.preferred_time"></span>
            </div>
            <div class="flex justify-between text-sm border-t border-[#1E2D42] pt-3">
              <span class="text-slate-400">Name</span>
              <span class="text-white" x-text="formData.name"></span>
            </div>
            <div class="flex justify-between text-sm border-t border-[#1E2D42] pt-3">
              <span class="text-slate-400">Email</span>
              <span class="text-white" x-text="formData.email"></span>
            </div>
            <template x-if="formData.notes">
              <div class="border-t border-[#1E2D42] pt-3">
                <span class="text-slate-400 text-sm block mb-1">Notes</span>
                <span class="text-white text-sm" x-text="formData.notes"></span>
              </div>
            </template>
          </div>
          <p x-show="submitError" x-text="submitError" class="text-red-400 text-sm mb-3"></p>
        </div>

        <!-- Navigation -->
        <div class="flex items-center justify-between mt-8 pt-5 border-t border-[#1E2D42]">
          <button type="button" @click="prevStep()" x-show="step > 1" class="btn-outline py-2.5 px-5 text-sm">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
            Back
          </button>
          <div x-show="step < 4">
            <button type="button" @click="nextStep()" class="btn-primary py-2.5 px-6 text-sm">
              Continue
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </button>
          </div>
          <button
            x-show="step === 4"
            type="button"
            @click="submitBooking()"
            :disabled="submitting"
            class="btn-primary py-2.5 px-6 text-sm"
            x-text="submitting ? 'Confirming...' : 'Confirm Booking'"
            style="display:none"
          ></button>
        </div>
      </div>
    </div>

    <!-- Success modal -->
    <div
      x-show="success"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      class="fixed inset-0 z-50 flex items-center justify-center p-4"
      style="background:rgba(8,11,18,0.92);backdrop-filter:blur(8px);display:none"
    >
      <div
        x-show="success"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90 translate-y-6"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        class="relative max-w-md w-full text-center overflow-hidden rounded-2xl"
        style="background:linear-gradient(145deg,#0D1829,#0F1F35);border:1px solid rgba(14,165,233,0.25);box-shadow:0 0 60px rgba(14,165,233,0.12),0 25px 50px rgba(0,0,0,0.5)"
      >
        <!-- Top glow bar -->
        <div class="h-1 w-full" style="background:linear-gradient(90deg,#0EA5E9,#6366F1,#0EA5E9)"></div>

        <div class="p-8">
          <!-- Animated check icon -->
          <div class="relative mx-auto mb-5 w-20 h-20">
            <div class="absolute inset-0 rounded-full animate-ping opacity-20" style="background:linear-gradient(135deg,#0EA5E9,#6366F1)"></div>
            <div class="relative w-20 h-20 rounded-full flex items-center justify-center" style="background:linear-gradient(135deg,#0EA5E9,#6366F1);box-shadow:0 0 30px rgba(14,165,233,0.4)">
              <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
              </svg>
            </div>
          </div>

          <h3 class="font-display font-bold text-2xl text-white mb-1">Booking Confirmed!</h3>
          <p class="text-slate-400 text-sm mb-5">You're all set. Here's your booking reference:</p>

          <!-- Booking ref card -->
          <div class="relative mb-5 rounded-xl p-4 cursor-pointer group" style="background:rgba(14,165,233,0.08);border:1px solid rgba(14,165,233,0.2)" @click="copyRef()">
            <p class="text-xs text-slate-500 mb-1 uppercase tracking-widest">Reference Number</p>
            <p class="font-mono font-bold text-accent-400 text-2xl tracking-widest" x-text="bookingRef"></p>
            <div class="absolute top-3 right-3 text-slate-500 group-hover:text-accent-400 transition-colors">
              <svg x-show="!refCopied" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
              <svg x-show="refCopied" class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:none"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <p x-show="refCopied" class="text-xs text-emerald-400 mt-1" style="display:none">Copied!</p>
          </div>

          <!-- Details -->
          <div class="rounded-xl p-4 mb-5 text-left space-y-2.5" style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06)">
            <div class="flex items-center gap-2 text-sm">
              <svg class="w-4 h-4 text-accent-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
              <span class="text-slate-400">Confirmation sent to</span>
              <span class="text-white font-medium truncate" x-text="formData.email"></span>
            </div>
            <div class="flex items-center gap-2 text-sm">
              <svg class="w-4 h-4 text-accent-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              <span class="text-slate-400">Technician assigned within</span>
              <span class="text-white font-medium">1 hour</span>
            </div>
            <div class="flex items-center gap-2 text-sm">
              <svg class="w-4 h-4 text-accent-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
              <span class="text-slate-400">Questions?</span>
              <a href="tel:+12056494627" class="text-accent-400 font-medium">(205) 649-4627</a>
            </div>
          </div>

          <!-- CTAs -->
          <div class="flex gap-3">
            <a href="/" class="flex-1 btn-outline py-2.5 text-sm justify-center">Home</a>
            <a href="/services" class="flex-1 btn-primary py-2.5 text-sm justify-center">
              Browse Services
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<script>
function bookingForm() {
  return {
    step: 1,
    steps: ['Service', 'Schedule', 'Contact', 'Confirm'],
    submitting: false,
    success: false,
    bookingRef: '',
    refCopied: false,
    submitError: '',
    formData: {
      service: '<?php echo e($preselect); ?>',
      service_name: '',
      preferred_date: '',
      preferred_time: '',
      notes: '',
      name: '',
      email: '',
      phone: '',
      country: '',
      address: '',
    },
    errors: {},

    minDate() {
      const d = new Date();
      d.setDate(d.getDate() + 0);
      return d.toISOString().split('T')[0];
    },

    validate() {
      this.errors = {};
      if (this.step === 1) {
        if (!this.formData.service) this.errors.service = 'Please select a service.';
      }
      if (this.step === 2) {
        if (!this.formData.preferred_date) this.errors.preferred_date = 'Please select a date.';
        if (!this.formData.preferred_time) this.errors.preferred_time = 'Please select a time slot.';
      }
      if (this.step === 3) {
        if (!this.formData.name.trim()) this.errors.name = 'Name is required.';
        if (!this.formData.email.trim()) this.errors.email = 'Email is required.';
        if (!this.formData.country) this.errors.country = 'Please select your country.';
      }
      return Object.keys(this.errors).length === 0;
    },

    nextStep() {
      if (this.validate()) this.step++;
    },

    prevStep() {
      if (this.step > 1) this.step--;
    },

    async submitBooking() {
      if (!this.validate()) return;
      this.submitting = true;
      this.submitError = '';
      try {
        const fd = new FormData();
        fd.append('csrf_token', '<?php echo csrf_token(); ?>');
        Object.entries(this.formData).forEach(([k, v]) => fd.append(k, v));
        const res = await fetch('/api/book', { method: 'POST', body: fd });
        const json = await res.json();
        if (json.success) {
          this.bookingRef = json.booking_ref || 'HCS000000';
          this.success = true;
        } else {
          this.submitError = json.message || 'Something went wrong. Please try again.';
        }
      } catch {
        this.submitError = 'Network error. Please try again.';
      }
      this.submitting = false;
    },

    copyRef() {
      if (this.bookingRef) {
        navigator.clipboard.writeText(this.bookingRef).then(() => {
          this.refCopied = true;
          setTimeout(() => this.refCopied = false, 2000);
        });
      }
    }
  };
}

// Set service name on init if preselected
document.addEventListener('alpine:init', () => {
  const preselect = '<?php echo e($preselect); ?>';
  if (preselect) {
    const names = {
      <?php foreach ($services as $svc): ?>
      '<?php echo e($svc['slug']); ?>': '<?php echo e(addslashes($svc['name'])); ?>',
      <?php endforeach; ?>
    };
    Alpine.store('preselect', { slug: preselect, name: names[preselect] || '' });
  }
});
</script>

<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
</body>
</html>
