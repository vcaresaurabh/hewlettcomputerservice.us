/* Hewlett Computer Service — Main App JS */

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

// GSAP animations — initialize after GSAP loads
function initGSAP() {
  if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

  gsap.registerPlugin(ScrollTrigger);

  // Fade up on scroll
  gsap.utils.toArray('.gsap-fade-up').forEach(el => {
    gsap.from(el, {
      scrollTrigger: { trigger: el, start: 'top 92%', once: true },
      immediateRender: false,
      opacity: 0,
      y: 40,
      duration: 0.7,
      ease: 'power3.out',
    });
  });

  // Staggered children
  gsap.utils.toArray('.gsap-stagger').forEach(container => {
    gsap.from(container.children, {
      scrollTrigger: { trigger: container, start: 'top 92%', once: true },
      immediateRender: false,
      opacity: 0,
      y: 30,
      stagger: 0.1,
      duration: 0.6,
      ease: 'power2.out',
    });
  });

  // Counter animation
  document.querySelectorAll('[data-counter]').forEach(el => {
    const target = parseFloat(el.dataset.counter);
    const suffix = el.dataset.suffix || '';
    const prefix = el.dataset.prefix || '';
    const isFloat = el.dataset.float === 'true';
    const obj = { val: 0 };

    ScrollTrigger.create({
      trigger: el,
      start: 'top 88%',
      once: true,
      onEnter() {
        gsap.to(obj, {
          val: target,
          duration: 2,
          ease: 'power1.out',
          onUpdate() {
            el.textContent = prefix + (isFloat ? obj.val.toFixed(1) : Math.round(obj.val).toLocaleString()) + suffix;
          },
        });
      },
    });
  });

  // Hero entrance
  const heroContent = document.querySelector('.hero-content');
  if (heroContent) {
    gsap.from(heroContent.children, {
      opacity: 0,
      y: 50,
      stagger: 0.12,
      duration: 0.8,
      ease: 'power3.out',
      delay: 0.1,
    });
  }

  // Hero parallax
  const heroBg = document.querySelector('.hero-bg');
  if (heroBg) {
    gsap.to(heroBg, {
      scrollTrigger: {
        trigger: heroBg,
        start: 'top top',
        end: 'bottom top',
        scrub: true,
      },
      y: 100,
      ease: 'none',
    });
  }

  // Card hover effects via GSAP
  document.querySelectorAll('.card-hover').forEach(card => {
    card.addEventListener('mouseenter', () => {
      gsap.to(card, { y: -4, duration: 0.25, ease: 'power2.out' });
    });
    card.addEventListener('mouseleave', () => {
      gsap.to(card, { y: 0, duration: 0.3, ease: 'power2.inOut' });
    });
  });

  // Marquee — pause on hover
  document.querySelectorAll('.marquee-track-1, .marquee-track-2').forEach(track => {
    track.addEventListener('mouseenter', () => { track.style.animationPlayState = 'paused'; });
    track.addEventListener('mouseleave', () => { track.style.animationPlayState = 'running'; });
  });
}

// Wait for GSAP to load (it's deferred)
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    requestAnimationFrame(() => setTimeout(initGSAP, 100));
  });
} else {
  requestAnimationFrame(() => setTimeout(initGSAP, 100));
}

// Accordion helper
function initAccordions() {
  document.querySelectorAll('[data-accordion-trigger]').forEach(trigger => {
    trigger.addEventListener('click', () => {
      const content = trigger.nextElementSibling;
      const icon = trigger.querySelector('[data-accordion-icon]');
      const isOpen = content.classList.contains('open');

      // Close all siblings
      const parent = trigger.closest('[data-accordion-group]');
      if (parent) {
        parent.querySelectorAll('[data-accordion-trigger]').forEach(t => {
          const c = t.nextElementSibling;
          const i = t.querySelector('[data-accordion-icon]');
          c.classList.remove('open');
          if (i) i.style.transform = '';
          t.setAttribute('aria-expanded', 'false');
        });
      }

      if (!isOpen) {
        content.classList.add('open');
        if (icon) icon.style.transform = 'rotate(180deg)';
        trigger.setAttribute('aria-expanded', 'true');
      }
    });
  });
}

document.addEventListener('DOMContentLoaded', initAccordions);

// Form utilities
function showFormSuccess(formEl, message) {
  const success = document.createElement('div');
  success.className = 'mt-4 p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-xl text-emerald-400 text-sm font-medium';
  success.textContent = message;
  formEl.appendChild(success);
  setTimeout(() => success.remove(), 6000);
}

function showFormError(formEl, message) {
  const err = document.createElement('div');
  err.className = 'mt-4 p-4 bg-red-500/10 border border-red-500/30 rounded-xl text-red-400 text-sm font-medium';
  err.textContent = message;
  formEl.appendChild(err);
  setTimeout(() => err.remove(), 6000);
}

// Contact form AJAX
const contactForm = document.getElementById('contact-form');
if (contactForm) {
  contactForm.addEventListener('submit', async e => {
    e.preventDefault();
    const btn = contactForm.querySelector('button[type=submit]');
    const originalText = btn.textContent;
    btn.disabled = true;
    btn.textContent = 'Sending...';
    contactForm.querySelectorAll('.form-error').forEach(el => el.remove());

    try {
      const res = await fetch('/api/contact', { method: 'POST', body: new FormData(contactForm) });
      const json = await res.json();
      if (json.success) {
        contactForm.reset();
        showFormSuccess(contactForm, json.message || 'Message sent! We\'ll be in touch within 24 hours.');
      } else {
        showFormError(contactForm, json.message || 'Something went wrong. Please try again.');
        if (json.errors) {
          Object.entries(json.errors).forEach(([field, msg]) => {
            const input = contactForm.querySelector(`[name="${field}"]`);
            if (input) {
              const errEl = document.createElement('p');
              errEl.className = 'form-error';
              errEl.textContent = msg;
              input.parentNode.appendChild(errEl);
            }
          });
        }
      }
    } catch {
      showFormError(contactForm, 'Network error. Please try again.');
    }
    btn.disabled = false;
    btn.textContent = originalText;
  });
}
