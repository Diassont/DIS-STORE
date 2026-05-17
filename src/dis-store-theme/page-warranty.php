<?php get_header(); ?>
<?php
wp_enqueue_style(
    'dis-page-warranty',
    get_template_directory_uri() . '/assets/css/warranty.css',
    ['dis-main'],
    wp_get_theme()->get('Version')
);
?>


<?php
/* ============================================================
   GUARANTEE.PHP — DIS STORE
   ACF: subtitle, content, info_cards
   ============================================================ */
$subtitle   = get_field('subtitle');
$content    = get_field('content');
$info_cards = get_field('info_cards');

$page_subtitle = $subtitle ?: 'Офіційна гарантія, просте повернення та підтримка на кожному кроці — ми піклуємось про кожного клієнта.';
?>

<!-- ═══════════════════════════ HERO ═══════════════════════════ -->
<section class="gp-hero">
  <div class="container gp-hero-inner">
    <div>
      <div class="gp-hero-badge">
        <span class="gp-badge-dot"></span>
        Офіційна гарантія DIS STORE
      </div>
      <h1 class="gp-hero-title"><?php the_title(); ?></h1>
      <p class="gp-hero-sub"><?php echo nl2br(esc_html($page_subtitle)); ?></p>
    </div>
    <div class="gp-hero-shield">
      <svg viewBox="0 0 24 24">
        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
        <polyline points="9 12 11 14 15 10"/>
      </svg>
    </div>
  </div>
</section>

<div class="gp-line"></div>

<!-- ═══════════════════════════ KEY CONDITIONS ═══════════════════════════ -->
<section class="gp-key-section container">
  <div class="gp-section-head fp-r">
    <h2 class="gp-section-title">Ключові умови</h2>
  </div>
  <div class="gp-key-grid">
    <div class="gp-key-card fp-r fp-d1">
      <span class="gp-key-num">01</span>
      <div class="gp-key-icon">
        <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      </div>
      <div class="gp-key-title">Офіційна гарантія</div>
      <div class="gp-key-val">12–36 міс</div>
      <div class="gp-key-desc">На всі товари від виробника. Сервісний центр в Україні без зайвих питань.</div>
    </div>
    <div class="gp-key-card fp-r fp-d2">
      <span class="gp-key-num">02</span>
      <div class="gp-key-icon">
        <svg viewBox="0 0 24 24"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 102.13-9.36L1 10"/></svg>
      </div>
      <div class="gp-key-title">Повернення</div>
      <div class="gp-key-val">14 днів</div>
      <div class="gp-key-desc">Не підійшов товар — повернемо гроші або обміняємо без зайвих питань.</div>
    </div>
    <div class="gp-key-card fp-r fp-d3">
      <span class="gp-key-num">03</span>
      <div class="gp-key-icon">
        <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
      </div>
      <div class="gp-key-title">Підтримка</div>
      <div class="gp-key-val">до 5 хв</div>
      <div class="gp-key-desc">Відповідь у Telegram, Viber або по телефону — швидко та без черг.</div>
    </div>
  </div>
</section>

<div class="gp-line"></div>

<!-- ═══════════════════════════ CONTENT + ACCORDION ═══════════════════════════ -->
<section class="gp-content-section container">
  <div class="gp-section-head fp-r">
    <h2 class="gp-section-title">Детальні умови</h2>
  </div>
  <div class="gp-content-wrap">
    <div class="gp-content-text fp-r fp-d1">
      <?php if ($content): ?>
        <div class="content"><?php echo wp_kses_post($content); ?></div>
      <?php else: ?>
        <div class="content">
          <h3>На що поширюється гарантія?</h3>
          <p>Гарантія покриває всі виробничі дефекти та несправності, що виникли з вини виробника протягом гарантійного терміну.</p>
          <ul>
            <li>Виробничі дефекти корпусу та компонентів</li>
            <li>Несправності електронних вузлів</li>
            <li>Відмова пам'яті, матриці або мікросхем</li>
            <li>Неякісна пайка або заводська збірка</li>
          </ul>
          <h3>Що не є гарантійним випадком?</h3>
          <ul>
            <li>Механічні пошкодження (тріщини, удари)</li>
            <li>Потрапляння вологи або рідин</li>
            <li>Самостійний ремонт або втручання третіх осіб</li>
            <li>Природне зношення (акумулятори, вентилятори)</li>
            <li>Пошкодження через перепади напруги</li>
          </ul>
        </div>
      <?php endif; ?>
    </div>

    <div class="gp-acc-list fp-r fp-d2">
      <div class="gp-acc-item">
        <button class="gp-acc-trigger" type="button">
          <span class="gp-acc-dot"></span>
          Як звернутись за гарантійним ремонтом?
          <span class="gp-acc-chevron"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span>
        </button>
        <div class="gp-acc-body">
          <ul>
            <li>Напишіть нам із описом несправності та фото/відео</li>
            <li>Ми надамо адресу сервісного центру або організуємо забір</li>
            <li>Після діагностики повідомимо про результат і строки</li>
            <li>Відремонтований товар доставимо за нашим коштом</li>
          </ul>
        </div>
      </div>
      <div class="gp-acc-item">
        <button class="gp-acc-trigger" type="button">
          <span class="gp-acc-dot"></span>
          Умови обміну товару
          <span class="gp-acc-chevron"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span>
        </button>
        <div class="gp-acc-body">
          <ul>
            <li>Товар у оригінальній упаковці з усіма комплектуючими</li>
            <li>Без слідів використання та зовнішніх пошкоджень</li>
            <li>Збережіть чек або підтвердження оплати</li>
            <li>Доставку при обміні оплачує покупець</li>
          </ul>
        </div>
      </div>
      <div class="gp-acc-item">
        <button class="gp-acc-trigger" type="button">
          <span class="gp-acc-dot"></span>
          Строки розгляду звернень
          <span class="gp-acc-chevron"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span>
        </button>
        <div class="gp-acc-body">
          <p>Діагностика — до 3 робочих днів. Ремонт — зазвичай 7–14 днів залежно від складності. Про кожен етап повідомляємо додатково.</p>
        </div>
      </div>
      <div class="gp-acc-item">
        <button class="gp-acc-trigger" type="button">
          <span class="gp-acc-dot"></span>
          Товар прийшов пошкодженим?
          <span class="gp-acc-chevron"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span>
        </button>
        <div class="gp-acc-body">
          <p>Зафіксуйте пошкодження на відео разом із представником Нової Пошти при отриманні та зверніться до нас — замінимо або повернемо гроші без питань.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="gp-line"></div>

<!-- ═══════════════════════════ INFO CARDS (ACF) ═══════════════════════════ -->
<?php if (is_array($info_cards) && count($info_cards)): ?>
<section class="gp-info-section container">
  <div class="gp-section-head fp-r">
    <h2 class="gp-section-title">Додаткова інформація</h2>
  </div>
  <div class="gp-info-grid">
    <?php foreach ($info_cards as $i => $card): ?>
      <div class="gp-info-card fp-r fp-d<?php echo min($i+1,4); ?>">
        <?php if (!empty($card['icon'])): ?>
          <div class="gp-info-icon"><?php echo esc_html($card['icon']); ?></div>
        <?php endif; ?>
        <div>
          <div class="gp-info-title"><?php echo esc_html($card['title'] ?? ''); ?></div>
          <?php if (!empty($card['desc'])): ?>
            <div class="gp-info-desc"><?php echo esc_html($card['desc']); ?></div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<div class="gp-line"></div>
<?php endif; ?>

<!-- ═══════════════════════════ RETURN STEPS ═══════════════════════════ -->
<section class="gp-steps-section container">
  <div class="gp-section-head fp-r">
    <h2 class="gp-section-title">Як повернути товар</h2>
  </div>
  <div class="gp-steps-grid">
    <div class="gp-step fp-r fp-d1">
      <span class="gp-step-num">01</span>
      <div class="gp-step-icon"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
      <div class="gp-step-title">Зверніться до нас</div>
      <div class="gp-step-desc">Напишіть у Telegram або зателефонуйте. Опишіть ситуацію та вкажіть номер замовлення.</div>
    </div>
    <div class="gp-step fp-r fp-d2">
      <span class="gp-step-num">02</span>
      <div class="gp-step-icon"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
      <div class="gp-step-title">Заповніть заявку</div>
      <div class="gp-step-desc">Менеджер надішле просту форму — заповнення займає 2 хвилини.</div>
    </div>
    <div class="gp-step fp-r fp-d3">
      <span class="gp-step-num">03</span>
      <div class="gp-step-icon"><svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg></div>
      <div class="gp-step-title">Відправте товар</div>
      <div class="gp-step-desc">Надішліть посилку Новою Поштою. Упакуйте надійно — збережіть ТТН.</div>
    </div>
    <div class="gp-step fp-r fp-d4">
      <span class="gp-step-num">04</span>
      <div class="gp-step-icon"><svg viewBox="0 0 24 24"><path d="M20 7H4a2 2 0 00-2 2v6a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg></div>
      <div class="gp-step-title">Отримайте кошти</div>
      <div class="gp-step-desc">Після перевірки повернемо гроші протягом 3 робочих днів на вашу картку.</div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════ CTA ═══════════════════════════ -->
<div class="container" style="padding-bottom:60px;">
  <div class="gp-cta-box fp-r">
    <div class="gp-cta-left">
      <h2 class="gp-cta-title">Залишились питання щодо гарантії?</h2>
      <p class="gp-cta-text">Підтримка відповість протягом 5 хвилин і допоможе вирішити будь-яке питання без стресу.</p>
    </div>
    <div class="gp-cta-right">
      <a class="btn" href="/contact/">Написати нам</a>
      <a class="btn btn-outline" href="/shop/">До каталогу</a>
    </div>
  </div>
</div>

<script>
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

(function(){
  document.querySelectorAll('.gp-acc-trigger').forEach(function(btn){
    btn.addEventListener('click', function(){
      var item = btn.closest('.gp-acc-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.gp-acc-item.open').forEach(function(el){ el.classList.remove('open'); });
      if (!isOpen) item.classList.add('open');
    });
  });
}());
</script>

<?php get_footer(); ?>