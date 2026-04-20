<?php
require_once ROOT . '/includes/helpers.php';
require_once ROOT . '/includes/seo.php';

$seo = new Seo(
    'About Us — Hewlett Computer Service',
    '20+ years of certified technical assistance, smart home, and IT services. Meet our team, our mission, and the values that drive everything we do.',
    SITE_URL . '/about'
);
$seo->addSchema(org_schema());

require ROOT . '/partials/head.php';
require ROOT . '/partials/navbar.php';
?>

<!-- Hero -->
<section class="pt-32 pb-20 bg-surface-950 relative overflow-hidden">
  <div class="glow-orb w-96 h-96 bg-accent-500/10 -top-20 right-0"></div>
  <div class="absolute inset-0 grid-pattern opacity-20"></div>
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl gsap-fade-up">
      <span class="badge-accent mb-4 inline-flex">About Us</span>
      <h1 class="font-display font-bold text-5xl md:text-6xl text-white leading-tight mb-6">
        We fix tech. We build trust.<br><em class="gradient-text not-italic">We've done it for 20+ years.</em>
      </h1>
      <p class="text-xl text-slate-400 leading-relaxed">
        Hewlett Computer Service was founded on a simple belief: technology should work for you, not against you. When it doesn't, you deserve fast, honest help from someone who actually knows what they're doing.
      </p>
    </div>
  </div>
</section>

<!-- Stats -->
<section class="py-16 bg-surface-900">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="gsap-stagger grid grid-cols-2 lg:grid-cols-4 gap-6">
      <?php $stats = [
        ['val' => '20',  'suffix' => '+', 'label' => 'Years of Trust',       'sub' => 'Founded in 2003'],
        ['val' => '150', 'suffix' => '+', 'label' => 'Certified Technicians', 'sub' => 'CompTIA, Apple, Google'],
        ['val' => '50000', 'suffix' => '+', 'label' => 'Happy Customers',    'sub' => 'Across 3 countries'],
        ['val' => '4.9', 'suffix' => '★', 'label' => '5-Star Ratings',       'sub' => 'Verified reviews', 'float' => true],
      ]; ?>
      <?php foreach ($stats as $s): ?>
      <div class="card p-6 rounded-2xl text-center">
        <p class="font-display font-bold text-4xl text-white mb-1"
           data-counter="<?php echo e($s['val']); ?>"
           data-suffix="<?php echo e($s['suffix']); ?>"
           <?php if (!empty($s['float'])): ?>data-float="true"<?php endif; ?>>
          <?php echo e($s['val'] >= 1000 ? number_format((int)$s['val']) : $s['val']); ?><?php echo e($s['suffix']); ?>
        </p>
        <p class="text-slate-300 text-sm font-medium mb-0.5"><?php echo e($s['label']); ?></p>
        <p class="text-slate-500 text-xs"><?php echo e($s['sub']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Mission & Story -->
<section class="py-24 bg-surface-950">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-16 items-center">
    <div class="gsap-fade-up">
      <span class="badge-indigo mb-4 inline-flex">Our Mission</span>
      <h2 class="font-display font-bold text-4xl text-white mb-6 leading-tight">
        Technology that actually <em class="gradient-text not-italic">works.</em>
      </h2>
      <div class="space-y-4 text-slate-400 leading-relaxed">
        <p>Hewlett Computer Service was founded in 2003 in Vista, California by a group of CompTIA-certified engineers who were tired of watching people get taken advantage of by overpriced, underperforming technical services.</p>
        <p>Twenty years later, we've grown into a nationwide service team — but our core commitment hasn't changed. We show up on time. We explain what we're doing in plain language. We only charge for work that actually fixes the problem. And if it comes back, we come back — for free.</p>
        <p>We now serve customers across the USA, United Kingdom, and Canada, with both on-site technicians in major metro areas and remote support available seven days a week. Every technician on our team is certified, background-checked, and continuously trained on the latest technology.</p>
        <p>We're proud to have earned a 4.9-star average from over 50,000 verified customer reviews. That number didn't come from marketing — it came from doing the work right, every time.</p>
      </div>
    </div>

    <!-- Values grid -->
    <div class="gsap-stagger grid grid-cols-2 gap-4">
      <?php $values = [
        ['icon' => 'shield-check', 'title' => 'Certified Expertise', 'desc' => 'Every technician is CompTIA A+ certified and undergoes continuous training on evolving technology.', 'color' => 'accent'],
        ['icon' => 'clock', 'title' => 'Reliability First', 'desc' => 'We arrive on time, finish on time, and follow up. Your time is valuable — we treat it that way.', 'color' => 'indigo'],
        ['icon' => 'eye', 'title' => 'Radical Transparency', 'desc' => 'You know what we\'re doing and why before we start. No surprise charges. No unnecessary work.', 'color' => 'accent'],
        ['icon' => 'heart', 'title' => 'Genuine Care', 'desc' => 'We\'re not a call center. We\'re technicians who care about the outcome — because our reputation depends on it.', 'color' => 'indigo'],
      ]; ?>
      <?php foreach ($values as $v): ?>
      <div class="card p-5 rounded-2xl">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-3" style="background:linear-gradient(135deg,rgba(14,165,233,0.15),rgba(99,102,241,0.15))">
          <svg class="w-5 h-5 text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <?php if ($v['icon'] === 'shield-check'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
            <?php elseif ($v['icon'] === 'clock'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            <?php elseif ($v['icon'] === 'eye'): ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <?php else: ?>
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
            <?php endif; ?>
          </svg>
        </div>
        <h3 class="font-display font-semibold text-white text-sm mb-2"><?php echo e($v['title']); ?></h3>
        <p class="text-slate-500 text-xs leading-relaxed"><?php echo e($v['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Service areas -->
<section class="py-20 bg-surface-900">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12 gsap-fade-up">
      <span class="badge-accent mb-4 inline-flex">Service Areas</span>
      <h2 class="section-heading mb-4">Serving USA, UK &amp; Canada</h2>
      <p class="section-subheading mx-auto">On-site technicians in major metro areas. Remote support available everywhere.</p>
    </div>
    <div class="gsap-stagger grid md:grid-cols-3 gap-6">
      <?php $areas = [
        ['flag' => '🇺🇸', 'country' => 'United States', 'cities' => ['San Diego, CA', 'Los Angeles, CA', 'San Francisco, CA', 'New York, NY', 'Chicago, IL', 'Houston, TX', 'Phoenix, AZ', 'Seattle, WA', 'Miami, FL', 'And many more...']],
        ['flag' => '🇬🇧', 'country' => 'United Kingdom', 'cities' => ['London', 'Manchester', 'Birmingham', 'Edinburgh', 'Bristol', 'Leeds', 'Liverpool', 'Glasgow', 'Sheffield', 'And more...']],
        ['flag' => '🇨🇦', 'country' => 'Canada', 'cities' => ['Toronto, ON', 'Vancouver, BC', 'Montreal, QC', 'Calgary, AB', 'Ottawa, ON', 'Edmonton, AB', 'Winnipeg, MB', 'Quebec City', 'Halifax, NS', 'And more...']],
      ]; ?>
      <?php foreach ($areas as $area): ?>
      <div class="card p-6 rounded-2xl">
        <div class="text-3xl mb-3"><?php echo $area['flag']; ?></div>
        <h3 class="font-display font-semibold text-white mb-3"><?php echo e($area['country']); ?></h3>
        <ul class="space-y-1.5">
          <?php foreach ($area['cities'] as $city): ?>
          <li class="text-xs text-slate-400 flex items-center gap-2">
            <svg class="w-3 h-3 text-accent-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd"/></svg>
            <?php echo e($city); ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<?php
$cta_title = 'Ready to work with us?';
$cta_sub = 'Book a service today and see why 50,000+ customers choose Hewlett Computer Service.';
require ROOT . '/partials/cta.php'; ?>

<?php require ROOT . '/partials/footer.php'; ?>
<?php require ROOT . '/partials/scripts.php'; ?>
<?php require ROOT . '/partials/booking-widget.php'; ?>
</body>
</html>
