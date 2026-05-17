<?php get_header(); ?>
<?php
wp_enqueue_style(
    'dis-page-faq',
    get_template_directory_uri() . '/assets/css/faq.css',
    ['dis-main'],
    wp_get_theme()->get('Version')
);
?>


<?php
/* ============================================================
   FAQ.PHP — DIS STORE
   Сторінка часті запитання.
   ACF: faq_title, faq_subtitle, faq_items (icon / question / answer)
   ============================================================ */
$title    = get_field('faq_title')    ?: 'Часті запитання';
$subtitle = get_field('faq_subtitle') ?: 'Зібрали відповіді на найпоширеніші питання. Не знайшли свого — напишіть нам, відповімо за 5 хвилин.';
$items    = get_field('faq_items');

/* Fallback-питання якщо ACF не заповнено */
$fallback = [
  ['icon'=>'🚚','question'=>'Скільки коштує доставка?',
   'answer'=>'Вартість доставки розраховується за тарифами перевізника (Нова Пошта або Укрпошта) залежно від ваги та габаритів посилки. Самовивіз з нашого офісу — безкоштовно.'],
  ['icon'=>'💳','question'=>'Які способи оплати доступні?',
   'answer'=>'Приймаємо оплату карткою онлайн (Visa/Mastercard), через Monobank або ПриватБанк, накладений платіж (оплата при отриманні) та безготівковий розрахунок для юридичних осіб.'],
  ['icon'=>'📦','question'=>'Як отримати трек-номер посилки?',
   'answer'=>'Трек-номер надсилається в SMS або Telegram одразу після відправки замовлення. Також ви можете уточнити його у менеджера в будь-який час.'],
  ['icon'=>'🔄','question'=>'Чи можна повернути або обміняти товар?',
   'answer'=>'Так, протягом 14 днів з дати отримання за умови збереження товарного вигляду та комплектації. Для повернення зв\'яжіться з менеджером — вирішимо без зайвої бюрократії.'],
  ['icon'=>'🛡','question'=>'Яка гарантія на товари?',
   'answer'=>'Всі товари мають офіційну гарантію від виробника. Термін гарантії зазначено на сторінці кожного товару і становить від 12 до 24 місяців залежно від категорії.'],
  ['icon'=>'💰','question'=>'Чи можна оплатити частинами?',
   'answer'=>'Так! Ми співпрацюємо з Monobank та ПриватБанком — ви можете оформити оплату частинами або кредит прямо при замовленні. Уточніть деталі у менеджера.'],
  ['icon'=>'⚡','question'=>'Як швидко оброблятиметься моє замовлення?',
   'answer'=>'Підтвердження замовлення надходить протягом 5–15 хвилин після оформлення. Відправка — наступного робочого дня. У сезон пікового попиту можливі незначні затримки.'],
  ['icon'=>'📍','question'=>'Чи є доставка в зону бойових дій?',
   'answer'=>'Доставляємо в усі регіони, куди здійснює відправку Нова Пошта або Укрпошта. Актуальні обмеження уточнюйте у перевізника або у нашого менеджера.'],
  ['icon'=>'🤝','question'=>'Чи працюєте ви з юридичними особами?',
   'answer'=>'Так, виставляємо рахунок-фактуру з усіма реквізитами. Для оптових замовлень діють спеціальні умови — зверніться до менеджера для узгодження деталей.'],
  ['icon'=>'📱','question'=>'Як зв\'язатися з підтримкою?',
   'answer'=>'Пишіть у Telegram або на email — відповідаємо протягом 5 хвилин у робочий час. Також доступна форма зворотного зв\'язку на сторінці "Контакти".'],
];

/* Групи для фільтрації */
$groups = [
  'all'      => 'Усі питання',
  'delivery' => 'Доставка',
  'payment'  => 'Оплата',
  'warranty' => 'Гарантія',
  'other'    => 'Інше',
];
?>

<!-- ═══════════════════════════ HERO ═══════════════════════════ -->
<section class="fq-hero">
  <div class="container fq-hero-inner">
    <div>
      <div class="fq-hero-badge">
        <span class="fq-badge-dot"></span>
        Відповідаємо за 5 хвилин
      </div>
      <h1 class="fq-hero-title"><?php echo esc_html($title); ?></h1>
      <p class="fq-hero-sub"><?php echo nl2br(esc_html($subtitle)); ?></p>
    </div>
    <div class="fq-hero-icon-box">
      <svg viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10"/>
        <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/>
        <line x1="12" y1="17" x2="12.01" y2="17" stroke-width="2.5"/>
      </svg>
    </div>
  </div>
</section>

<!-- ═══════════════════════════ STATS BAR ═══════════════════════════ -->
<div class="fq-stats-bar fp-r">
  <div class="container">
    <div class="fq-stats-bar-inner">
      <div class="fq-sb-item">
        <div class="fq-sb-num"><?php echo is_array($items) ? count($items) : count($fallback); ?><em>+</em></div>
        <div class="fq-sb-label">Відповідей у базі</div>
      </div>
      <div class="fq-sb-item">
        <div class="fq-sb-num">5<em> хв</em></div>
        <div class="fq-sb-label">Час відповіді менеджера</div>
      </div>
      <div class="fq-sb-item">
        <div class="fq-sb-num">24/7</div>
        <div class="fq-sb-label">Telegram-підтримка</div>
      </div>
      <div class="fq-sb-item">
        <div class="fq-sb-num"><em>Без</em></div>
        <div class="fq-sb-label">Прихованих умов</div>
      </div>
    </div>
  </div>
</div>

<div class="fq-line"></div>

<!-- ═══════════════════════════ MAIN ═══════════════════════════ -->
<div class="container">
  <div class="fq-layout">

    <!-- ── FAQ LIST ── -->
    <main>
      <!-- Search -->
      <div class="fq-search-wrap fp-r">
        <input class="fq-search-input" type="text" id="fqSearch"
               placeholder="Пошук серед питань…" autocomplete="off">
        <span class="fq-search-icon">
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        </span>
      </div>

      <!-- Category tabs -->
      <div class="fq-tabs fp-r">
        <button class="fq-tab active" data-group="all">Усі питання</button>
        <button class="fq-tab" data-group="delivery">🚚 Доставка</button>
        <button class="fq-tab" data-group="payment">💳 Оплата</button>
        <button class="fq-tab" data-group="warranty">🛡 Гарантія</button>
        <button class="fq-tab" data-group="other">💬 Інше</button>
      </div>

      <!-- Accordion -->
      <?php
      $source = (is_array($items) && count($items)) ? $items : $fallback;

      /* Мапи іконок → групи для fallback/автовизначення */
      $icon_group_map = [
        '🚚'=>'delivery','📦'=>'delivery','🏠'=>'delivery',
        '💳'=>'payment','💰'=>'payment','💵'=>'payment',
        '🛡'=>'warranty','🔄'=>'warranty','✅'=>'warranty',
      ];
      ?>
      <div class="fq-list" id="fqList">
        <?php foreach ($source as $i => $it):
          $icon  = trim($it['icon'] ?? '❓');
          $q     = $it['question'] ?? '';
          $a     = $it['answer']   ?? '';
          if (!$q) continue;

          /* визначаємо групу: якщо є поле group — беремо його, інакше по іконці */
          $group = $it['group'] ?? ($icon_group_map[$icon] ?? 'other');
        ?>
        <div class="fq-item fp-r fp-d<?php echo min($i % 4 + 1, 4); ?>"
             data-group="<?php echo esc_attr($group); ?>"
             data-q="<?php echo esc_attr(mb_strtolower($q)); ?>">
          <button class="fq-trigger" type="button">
            <span class="fq-icon-wrap"><?php echo esc_html($icon); ?></span>
            <span class="fq-question"><?php echo esc_html($q); ?></span>
            <span class="fq-chevron">
              <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
            </span>
          </button>
          <?php if ($a): ?>
          <div class="fq-body">
            <p class="fq-answer"><?php echo nl2br(esc_html($a)); ?></p>
          </div>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="fq-no-results" id="fqNoResults">
        Нічого не знайдено за вашим запитом.<br>
        <a href="/contact/" style="color:var(--orange2);text-decoration:none;font-weight:700;">
          Задайте питання менеджеру →
        </a>
      </div>
    </main>

    <!-- ── SIDEBAR ── -->
    <aside class="fq-sidebar">

      <!-- Quick links -->
      <div class="fq-widget fp-r">
        <div class="fq-widget-title">Швидка навігація</div>
        <div class="fq-quick-list">
          <a class="fq-quick-link" href="#" data-scroll-group="delivery">
            <svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
            Доставка
          </a>
          <a class="fq-quick-link" href="#" data-scroll-group="payment">
            <svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2"/><path d="M1 10h22"/></svg>
            Оплата
          </a>
          <a class="fq-quick-link" href="#" data-scroll-group="warranty">
            <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            Гарантія і повернення
          </a>
          <a class="fq-quick-link" href="#" data-scroll-group="other">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17" stroke-width="2"/></svg>
            Інші питання
          </a>
        </div>
      </div>

      <!-- Popular -->
      <div class="fq-widget fp-r fp-d1">
        <div class="fq-widget-title">Популярні питання</div>
        <div class="fq-popular-list" id="fqPopular">
          <?php
          $top = array_slice($source, 0, 4);
          foreach ($top as $idx => $it):
            if (empty($it['question'])) continue;
          ?>
          <div class="fq-popular-item" data-open-idx="<?php echo $idx; ?>">
            <span class="fq-popular-num"><?php echo $idx + 1; ?></span>
            <span class="fq-popular-q"><?php echo esc_html($it['question']); ?></span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Contact -->
      <div class="fq-widget fq-contact-widget fp-r fp-d2">
        <div class="fq-widget-title">Не знайшли відповідь?</div>
        <p class="fq-contact-text">
          Наш менеджер відповість протягом 5 хвилин і допоможе вирішити будь-яке питання.
        </p>
        <a class="btn fq-contact-btn" href="/contact/">Написати нам</a>
        <a class="btn btn-outline fq-contact-btn" href="https://t.me/disstore"
           target="_blank" rel="noopener" style="margin-top:8px;">
          Telegram →
        </a>
      </div>

    </aside>
  </div>
</div>

<!-- ═══════════════════════════ CTA ═══════════════════════════ -->
<div class="container" style="padding-bottom:60px;">
  <div class="fq-cta-box fp-r">
    <div class="fq-cta-left">
      <h2 class="fq-cta-title">Залишились питання?</h2>
      <p class="fq-cta-text">Менеджер відповість за 5 хвилин та допоможе з вибором, доставкою або поверненням — без зайвих кроків.</p>
    </div>
    <div class="fq-cta-right">
      <a class="btn" href="/contact/">Написати нам</a>
      <a class="btn btn-outline" href="/shop/">До каталогу</a>
    </div>
  </div>
</div>

<script>
(function () {

  /* ── Scroll Reveal ── */
  var els = document.querySelectorAll('.fp-r');
  if (els.length) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add('fp-on'); io.unobserve(e.target); }
      });
    }, { threshold: 0.07, rootMargin: '0px 0px -30px 0px' });
    els.forEach(function (el) { io.observe(el); });
  }

  /* ── Accordion ── */
  var items = document.querySelectorAll('.fq-item');

  function openItem(item) {
    /* закрити всі інші */
    items.forEach(function (el) { if (el !== item) el.classList.remove('open'); });
    item.classList.toggle('open');
    /* scroll до питання якщо воно не повністю видиме */
    if (item.classList.contains('open')) {
      setTimeout(function () {
        var rect = item.getBoundingClientRect();
        if (rect.top < 80) item.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }, 60);
    }
  }

  document.querySelectorAll('.fq-trigger').forEach(function (btn) {
    btn.addEventListener('click', function () { openItem(btn.closest('.fq-item')); });
  });

  /* ── Tabs (filter by group) ── */
  var activeGroup = 'all';

  function applyFilter() {
    var q = document.getElementById('fqSearch').value.toLowerCase().trim();
    var count = 0;
    items.forEach(function (item) {
      var groupMatch = activeGroup === 'all' || item.dataset.group === activeGroup;
      var searchMatch = !q || (item.dataset.q && item.dataset.q.includes(q));
      var visible = groupMatch && searchMatch;
      item.classList.toggle('hidden', !visible);
      if (visible) count++;
    });
    document.getElementById('fqNoResults').style.display = count === 0 ? 'block' : 'none';
  }

  document.querySelectorAll('.fq-tab').forEach(function (tab) {
    tab.addEventListener('click', function () {
      document.querySelectorAll('.fq-tab').forEach(function (t) { t.classList.remove('active'); });
      tab.classList.add('active');
      activeGroup = tab.dataset.group;
      applyFilter();
    });
  });

  /* ── Search ── */
  var searchTimer;
  document.getElementById('fqSearch').addEventListener('input', function () {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(applyFilter, 160);
  });

  /* ── Sidebar quick links → tab click ── */
  document.querySelectorAll('[data-scroll-group]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      var g = link.dataset.scrollGroup;
      var tab = document.querySelector('.fq-tab[data-group="' + g + '"]');
      if (tab) { tab.click(); tab.scrollIntoView({ behavior: 'smooth', block: 'nearest' }); }
    });
  });

  /* ── Sidebar popular → open item ── */
  document.querySelectorAll('.fq-popular-item').forEach(function (el) {
    el.addEventListener('click', function () {
      var idx = parseInt(el.dataset.openIdx, 10);
      var target = items[idx];
      if (!target) return;
      /* скинути фільтр */
      activeGroup = 'all';
      document.querySelectorAll('.fq-tab').forEach(function (t) { t.classList.remove('active'); });
      document.querySelector('.fq-tab[data-group="all"]').classList.add('active');
      applyFilter();
      /* відкрити */
      setTimeout(function () {
        openItem(target);
        target.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }, 80);
    });
  });

}());
</script>

<?php get_footer(); ?>