<?php get_header(); ?>
<?php
wp_enqueue_style(
    'dis-page-delivery',
    get_template_directory_uri() . '/assets/css/delivery.css',
    ['dis-main'],
    wp_get_theme()->get('Version')
);
?>


<?php
/* ============================================================
   DELIVERY-PAYMENT.PHP — DIS STORE
   Сторінка доставки та оплати.
   ACF: dp_title, dp_subtitle, dp_cards
   ============================================================ */
$title    = get_field('dp_title')    ?: 'Доставка та оплата';
$subtitle = get_field('dp_subtitle') ?: 'Швидка доставка по всій Україні та зручні способи оплати без прихованих комісій.';
$cards    = get_field('dp_cards');
?>

<!-- ═══════════════════════════ HERO ═══════════════════════════ -->
<section class="dp-hero">
  <div class="container dp-hero-inner">
    <div>
      <div class="dp-hero-badge">
        <span class="dp-badge-dot"></span>
        Доставка по всій Україні
      </div>
      <h1 class="dp-hero-title"><?php echo esc_html($title); ?></h1>
      <p class="dp-hero-sub"><?php echo nl2br(esc_html($subtitle)); ?></p>
    </div>
    <div class="dp-hero-icon-box">
      <svg viewBox="0 0 24 24">
        <rect x="1" y="3" width="15" height="13" rx="2"/>
        <path d="M16 8h4l3 3v5h-7V8z"/>
        <circle cx="5.5" cy="18.5" r="2.5"/>
        <circle cx="18.5" cy="18.5" r="2.5"/>
      </svg>
    </div>
  </div>
</section>

<!-- ═══════════════════════════ STATS BAR ═══════════════════════════ -->
<div class="dp-stats-bar fp-r">
  <div class="container">
    <div class="dp-stats-bar-inner">
      <div class="dp-sb-item">
        <div class="dp-sb-num">1–2<em> дні</em></div>
        <div class="dp-sb-label">Середній строк доставки</div>
      </div>
      <div class="dp-sb-item">
        <div class="dp-sb-num"><em>Без</em></div>
        <div class="dp-sb-label">Прихованих комісій</div>
      </div>
      <div class="dp-sb-item">
        <div class="dp-sb-num">4<em>+</em></div>
        <div class="dp-sb-label">Способи оплати</div>
      </div>
      <div class="dp-sb-item">
        <div class="dp-sb-num">24/7</div>
        <div class="dp-sb-label">Підтримка замовлень</div>
      </div>
    </div>
  </div>
</div>

<div class="dp-line"></div>

<!-- ═══════════════════════════ DELIVERY METHODS (TABS) ═══════════════════════════ -->
<section class="dp-delivery-section container">
  <div class="dp-section-head fp-r">
    <h2 class="dp-section-title">Способи доставки</h2>
  </div>
  <div class="dp-tabs fp-r">
    <button class="dp-tab active" data-tab="nova">Нова Пошта</button>
    <button class="dp-tab" data-tab="ukr">Укрпошта</button>
    <button class="dp-tab" data-tab="self">Самовивіз</button>
  </div>

  <!-- Нова Пошта -->
  <div class="dp-tab-panel dp-method-grid active" data-panel="nova">
    <div class="dp-method-card fp-r fp-d1">
      <div class="dp-method-icon">
        <svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
      </div>
      <div class="dp-method-title">До відділення</div>
      <div class="dp-method-val">1–2 дні</div>
      <div class="dp-method-desc">Відправка наступного дня після підтвердження. 4000+ відділень по всій Україні.</div>
      <span class="dp-method-tag">За тарифами Нової Пошти</span>
    </div>
    <div class="dp-method-card fp-r fp-d2">
      <div class="dp-method-icon">
        <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
      </div>
      <div class="dp-method-title">Адресна доставка</div>
      <div class="dp-method-val">1–3 дні</div>
      <div class="dp-method-desc">Кур'єр доставить прямо до дверей у зручний для вас час.</div>
      <span class="dp-method-tag">За тарифами Нової Пошти</span>
    </div>
    <div class="dp-method-card fp-r fp-d3">
      <div class="dp-method-icon">
        <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </div>
      <div class="dp-method-title">Поштомат</div>
      <div class="dp-method-val">1–2 дні</div>
      <div class="dp-method-desc">Зручно та швидко — заберіть посилку з поштомата 24/7 без черг.</div>
      <span class="dp-method-tag">За тарифами Нової Пошти</span>
    </div>
  </div>

  <!-- Укрпошта -->
  <div class="dp-tab-panel dp-method-grid" data-panel="ukr">
    <div class="dp-method-card fp-r fp-d1">
      <div class="dp-method-icon">
        <svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
      </div>
      <div class="dp-method-title">До відділення</div>
      <div class="dp-method-val">3–5 днів</div>
      <div class="dp-method-desc">Доставка до 11 000+ поштових відділень по всій Україні, включно з селами.</div>
      <span class="dp-method-tag">За тарифами Укрпошти</span>
    </div>
    <div class="dp-method-card fp-r fp-d2">
      <div class="dp-method-icon">
        <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
      </div>
      <div class="dp-method-title">Адресна доставка</div>
      <div class="dp-method-val">3–7 днів</div>
      <div class="dp-method-desc">Доставка кур'єром Укрпошти прямо до вашої адреси.</div>
      <span class="dp-method-tag">За тарифами Укрпошти</span>
    </div>
  </div>

  <!-- Самовивіз -->
  <div class="dp-tab-panel dp-method-grid" data-panel="self">
    <div class="dp-method-card fp-r fp-d1">
      <div class="dp-method-icon">
        <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      </div>
      <div class="dp-method-title">З нашого офісу</div>
      <div class="dp-method-val">Сьогодні</div>
      <div class="dp-method-desc">Забирайте одразу після підтвердження замовлення. Адресу надамо після оформлення.</div>
      <span class="dp-method-tag">Безкоштовно</span>
    </div>
  </div>
</section>

<div class="dp-line"></div>

<!-- ═══════════════════════════ PAYMENT ═══════════════════════════ -->
<section class="dp-pay-section container">
  <div class="dp-section-head fp-r">
    <h2 class="dp-section-title">Способи оплати</h2>
  </div>
  <div class="dp-pay-grid">
    <div class="dp-pay-card fp-r fp-d1">
      <div class="dp-pay-icon">
        <svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2"/><path d="M1 10h22"/></svg>
      </div>
      <div class="dp-pay-title">Карта онлайн</div>
      <div class="dp-pay-desc">Visa, Mastercard через захищений платіжний шлюз. Миттєво та безпечно.</div>
    </div>
    <div class="dp-pay-card fp-r fp-d2">
      <div class="dp-pay-icon">
        <svg viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z"/><path d="M12 6v6l4 2"/></svg>
      </div>
      <div class="dp-pay-title">Накладений платіж</div>
      <div class="dp-pay-desc">Оплата при отриманні у відділенні Нової Пошти. Комісія оператора.</div>
    </div>
    <div class="dp-pay-card fp-r fp-d3">
      <div class="dp-pay-icon">
        <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><path d="M12 18h.01"/></svg>
      </div>
      <div class="dp-pay-title">Monobank / ПриватБанк</div>
      <div class="dp-pay-desc">Оплата через мобільний банк або переказ на картку — швидко і зручно.</div>
    </div>
    <div class="dp-pay-card fp-r fp-d4">
      <div class="dp-pay-icon">
        <svg viewBox="0 0 24 24"><path d="M20 7H4a2 2 0 00-2 2v6a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
      </div>
      <div class="dp-pay-title">Безготівковий розрахунок</div>
      <div class="dp-pay-desc">Для юридичних осіб — виставимо рахунок-фактуру з усіма реквізитами.</div>
    </div>
  </div>
</section>

<div class="dp-line"></div>

<!-- ═══════════════════════════ ORDER STEPS ═══════════════════════════ -->
<section class="dp-steps-section container">
  <div class="dp-section-head fp-r">
    <h2 class="dp-section-title">Як оформити замовлення</h2>
  </div>
  <div class="dp-steps-grid">
    <div class="dp-step fp-r fp-d1">
      <span class="dp-step-num">01</span>
      <div class="dp-step-icon">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
      </div>
      <div class="dp-step-title">Обираєш товар</div>
      <div class="dp-step-desc">Каталог з фільтрами, характеристиками та фото. Або запитай менеджера.</div>
    </div>
    <div class="dp-step fp-r fp-d2">
      <span class="dp-step-num">02</span>
      <div class="dp-step-icon">
        <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
      </div>
      <div class="dp-step-title">Оформляєш замовлення</div>
      <div class="dp-step-desc">Заповни форму або напиши нам — підтвердимо та узгодимо деталі.</div>
    </div>
    <div class="dp-step fp-r fp-d3">
      <span class="dp-step-num">03</span>
      <div class="dp-step-icon">
        <svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2"/><path d="M1 10h22"/></svg>
      </div>
      <div class="dp-step-title">Оплачуєш</div>
      <div class="dp-step-desc">Обирай зручний спосіб: картка, мобільний банк або накладений платіж.</div>
    </div>
    <div class="dp-step fp-r fp-d4">
      <span class="dp-step-num">04</span>
      <div class="dp-step-icon">
        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div class="dp-step-title">Отримуєш</div>
      <div class="dp-step-desc">Відправимо 1–2 дні. Трек-номер надійде в SMS або Telegram.</div>
    </div>
  </div>
</section>

<div class="dp-line"></div>

<!-- ═══════════════════════════ ACF CARDS ═══════════════════════════ -->
<?php if (is_array($cards) && count($cards)): ?>
<section class="container section">
  <div class="dp-section-head fp-r">
    <h2 class="dp-section-title">Додаткова інформація</h2>
  </div>
  <div class="dp-acf-grid">
    <?php foreach ($cards as $i => $card): ?>
      <div class="dp-acf-card fp-r fp-d<?php echo min($i+1,4); ?>">
        <?php if (!empty($card['icon'])): ?>
          <div class="dp-acf-icon"><?php echo esc_html($card['icon']); ?></div>
        <?php endif; ?>
        <div>
          <div class="dp-acf-title"><?php echo esc_html($card['title'] ?? ''); ?></div>
          <?php if (!empty($card['text'])): ?>
            <div class="dp-acf-text"><?php echo nl2br(esc_html($card['text'])); ?></div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<div class="dp-line"></div>
<?php endif; ?>

<!-- ═══════════════════════════ FAQ ═══════════════════════════ -->
<section class="dp-faq-section container">
  <div class="dp-section-head fp-r">
    <h2 class="dp-section-title">Часті запитання</h2>
  </div>
  <div class="dp-faq-list">

    <div class="dp-faq-item fp-r fp-d1">
      <button class="dp-faq-trigger" type="button">
        <span class="dp-faq-dot"></span>
        Скільки коштує доставка?
        <span class="dp-faq-chevron"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span>
      </button>
      <div class="dp-faq-body">
        <p>Вартість доставки розраховується за тарифами перевізника (Нова Пошта або Укрпошта) залежно від ваги та габаритів посилки. Самовивіз — безкоштовно.</p>
      </div>
    </div>

    <div class="dp-faq-item fp-r fp-d2">
      <button class="dp-faq-trigger" type="button">
        <span class="dp-faq-dot"></span>
        Як отримати трек-номер?
        <span class="dp-faq-chevron"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span>
      </button>
      <div class="dp-faq-body">
        <p>Трек-номер посилки надсилається в SMS або Telegram одразу після відправки. Також ви можете уточнити його у менеджера.</p>
      </div>
    </div>

    <div class="dp-faq-item fp-r fp-d3">
      <button class="dp-faq-trigger" type="button">
        <span class="dp-faq-dot"></span>
        Чи можна оплатити частинами?
        <span class="dp-faq-chevron"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span>
      </button>
      <div class="dp-faq-body">
        <p>Так! Ми співпрацюємо з Monobank та ПриватБанком — ви можете оформити оплату частинами або кредит прямо при оформленні замовлення. Уточніть деталі у менеджера.</p>
      </div>
    </div>

    <div class="dp-faq-item fp-r fp-d4">
      <button class="dp-faq-trigger" type="button">
        <span class="dp-faq-dot"></span>
        Чи є доставка в зону бойових дій?
        <span class="dp-faq-chevron"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span>
      </button>
      <div class="dp-faq-body">
        <p>Доставляємо в усі регіони, куди здійснює відправку Нова Пошта або Укрпошта. Актуальні обмеження уточнюйте у перевізника або у нашого менеджера.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════ CTA ═══════════════════════════ -->
<div class="container" style="padding-bottom:60px;">
  <div class="dp-cta-box fp-r">
    <div class="dp-cta-left">
      <h2 class="dp-cta-title">Є питання щодо доставки або оплати?</h2>
      <p class="dp-cta-text">Менеджер відповість протягом 5 хвилин і допоможе оформити замовлення зручним способом.</p>
    </div>
    <div class="dp-cta-right">
      <a class="btn" href="/contact/">Написати нам</a>
      <a class="btn btn-outline" href="/shop/">До каталогу</a>
    </div>
  </div>
</div>

<script>
/* ── Scroll Reveal ── */
(function(){
  var els = document.querySelectorAll('.fp-r');
  if (!els.length) return;
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(e){
      if (e.isIntersecting){ e.target.classList.add('fp-on'); io.unobserve(e.target); }
    });
  }, { threshold: 0.07, rootMargin: '0px 0px -30px 0px' });
  els.forEach(function(el){ io.observe(el); });
}());

/* ── Tabs ── */
(function(){
  document.querySelectorAll('.dp-tab').forEach(function(tab){
    tab.addEventListener('click', function(){
      var key = tab.dataset.tab;
      document.querySelectorAll('.dp-tab').forEach(function(t){ t.classList.remove('active'); });
      document.querySelectorAll('.dp-tab-panel').forEach(function(p){ p.classList.remove('active'); });
      tab.classList.add('active');
      var panel = document.querySelector('[data-panel="'+key+'"]');
      if (panel) panel.classList.add('active');
    });
  });
}());

/* ── FAQ Accordion ── */
(function(){
  document.querySelectorAll('.dp-faq-trigger').forEach(function(btn){
    btn.addEventListener('click', function(){
      var item = btn.closest('.dp-faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.dp-faq-item.open').forEach(function(el){ el.classList.remove('open'); });
      if (!isOpen) item.classList.add('open');
    });
  });
}());
</script>

<?php get_footer(); ?>