<?php get_header(); ?>
<?php
wp_enqueue_style(
    'dis-page-about',
    get_template_directory_uri() . '/assets/css/about.css',
    ['dis-main'],
    wp_get_theme()->get('Version')
);
?>


<?php
/* ============================================================
   ABOUT.PHP — DIS STORE
   Сторінка "Про нас".
   ACF: ab_title, ab_subtitle, ab_content, ab_cards
   ============================================================ */
$title    = get_field('ab_title')    ?: 'Про DIS Store';
$subtitle = get_field('ab_subtitle') ?: 'Ми — команда, яка щодня допомагає українцям обирати та купувати техніку без переплат та зайвих клопотів.';
$content  = get_field('ab_content');
$cards    = get_field('ab_cards');
?>

<!-- ═══════════════════════════ HERO ═══════════════════════════ -->
<section class="ab-hero">
  <div class="container ab-hero-inner">
    <div>
      <div class="ab-hero-badge">
        <span class="ab-badge-dot"></span>
        З 2019 року в Україні
      </div>
      <h1 class="ab-hero-title"><?php echo esc_html($title); ?></h1>
      <p class="ab-hero-sub"><?php echo nl2br(esc_html($subtitle)); ?></p>
    </div>
    <div class="ab-hero-icon-box">
      <svg viewBox="0 0 24 24">
        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
        <circle cx="9" cy="7" r="4"/>
        <path d="M23 21v-2a4 4 0 00-3-3.87"/>
        <path d="M16 3.13a4 4 0 010 7.75"/>
      </svg>
    </div>
  </div>
</section>

<!-- ═══════════════════════════ STATS BAR ═══════════════════════════ -->
<div class="ab-stats-bar fp-r">
  <div class="container">
    <div class="ab-stats-bar-inner">
      <div class="ab-sb-item">
        <div class="ab-sb-num">5<em>+ років</em></div>
        <div class="ab-sb-label">На ринку України</div>
      </div>
      <div class="ab-sb-item">
        <div class="ab-sb-num">12<em>к+</em></div>
        <div class="ab-sb-label">Задоволених клієнтів</div>
      </div>
      <div class="ab-sb-item">
        <div class="ab-sb-num">500<em>+</em></div>
        <div class="ab-sb-label">Товарів у каталозі</div>
      </div>
      <div class="ab-sb-item">
        <div class="ab-sb-num">4.9<em>★</em></div>
        <div class="ab-sb-label">Середня оцінка магазину</div>
      </div>
    </div>
  </div>
</div>

<div class="ab-line"></div>

<!-- ═══════════════════════════ STORY ═══════════════════════════ -->
<section class="ab-story-section container">
  <div class="ab-story-grid">

    <div class="ab-story-content fp-r">
      <h2 class="ab-section-title">Наша історія</h2>
      <?php if ($content): ?>
        <div style="font-size:15px;color:var(--muted);line-height:1.8;">
          <?php echo wp_kses_post($content); ?>
        </div>
      <?php else: ?>
        <p style="font-size:15px;color:var(--muted);line-height:1.8;margin:0;">
          DIS Store виник із простої ідеї: <strong style="color:var(--text)">зробити купівлю техніки зручною та чесною</strong>.
          Ми почали в 2019 році як невелика команда ентузіастів і виросли до повноцінного онлайн-магазину
          з тисячами клієнтів по всій Україні.
        </p>
        <p style="font-size:15px;color:var(--muted);line-height:1.8;margin:0;">
          Кожен товар у нашому каталозі ми перевіряємо особисто. Ми не продаємо те, чому самі не довіряємо.
          Це дозволяє нам давати <strong style="color:var(--text)">чесні рекомендації</strong> та підтримувати
          репутацію, яку будували роками.
        </p>
        <p style="font-size:15px;color:var(--muted);line-height:1.8;margin:0;">
          Сьогодні DIS Store — це не просто магазин. Це команда людей, яка щиро хоче, щоб ви отримали
          найкраще за свої гроші.
        </p>
      <?php endif; ?>
    </div>

    <div class="ab-story-img fp-r fp-d2">
      <?php
      $img = get_field('ab_image');
      if ($img): ?>
        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
      <?php else: ?>
        <svg viewBox="0 0 24 24">
          <rect x="3" y="3" width="18" height="18" rx="3"/>
          <circle cx="8.5" cy="8.5" r="1.5"/>
          <polyline points="21 15 16 10 5 21"/>
        </svg>
      <?php endif; ?>
    </div>

  </div>
</section>

<div class="ab-line"></div>

<!-- ═══════════════════════════ VALUES / ACF CARDS ═══════════════════════════ -->
<?php if (is_array($cards) && count($cards)): ?>
<section class="ab-values-section container">
  <div class="ab-section-head fp-r">
    <h2 class="ab-section-title">Наші цінності</h2>
  </div>
  <div class="ab-values-grid">
    <?php foreach ($cards as $i => $c): ?>
      <div class="ab-val-card fp-r fp-d<?php echo min($i % 4 + 1, 4); ?>">
        <div class="ab-val-icon">
          <?php if (!empty($c['icon'])): ?>
            <?php echo esc_html($c['icon']); ?>
          <?php else: ?>
            <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
          <?php endif; ?>
        </div>
        <div class="ab-val-title"><?php echo esc_html($c['title'] ?? ''); ?></div>
        <?php if (!empty($c['text'])): ?>
          <div class="ab-val-text"><?php echo wp_kses_post($c['text']); ?></div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php else: ?>
<!-- Fallback values якщо ACF не заповнено -->
<section class="ab-values-section container">
  <div class="ab-section-head fp-r">
    <h2 class="ab-section-title">Наші цінності</h2>
  </div>
  <div class="ab-values-grid">
    <div class="ab-val-card fp-r fp-d1">
      <div class="ab-val-icon"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
      <div class="ab-val-title">Чесність</div>
      <div class="ab-val-text">Ніяких прихованих комісій та маніпулятивних акцій. Тільки реальні ціни та правдиві описи товарів.</div>
    </div>
    <div class="ab-val-card fp-r fp-d2">
      <div class="ab-val-icon"><svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
      <div class="ab-val-title">Якість</div>
      <div class="ab-val-text">Кожен товар проходить перевірку перед відправкою. Гарантія на всі позиції від виробника.</div>
    </div>
    <div class="ab-val-card fp-r fp-d3">
      <div class="ab-val-icon"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg></div>
      <div class="ab-val-title">Клієнт перш за все</div>
      <div class="ab-val-text">Ми відповідаємо протягом 5 хвилин. Якщо щось пішло не так — вирішуємо без бюрократії.</div>
    </div>
    <div class="ab-val-card fp-r fp-d4">
      <div class="ab-val-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
      <div class="ab-val-title">Швидкість</div>
      <div class="ab-val-text">Відправка наступного дня після оплати. Трек-номер одразу в SMS або Telegram.</div>
    </div>
    <div class="ab-val-card fp-r fp-d1">
      <div class="ab-val-icon"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div>
      <div class="ab-val-title">Широкий вибір</div>
      <div class="ab-val-text">500+ товарів у каталозі: смартфони, ноутбуки, аксесуари та все для сучасного життя.</div>
    </div>
    <div class="ab-val-card fp-r fp-d2">
      <div class="ab-val-icon"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg></div>
      <div class="ab-val-title">Команда</div>
      <div class="ab-val-text">Кожен у нашій команді — ентузіаст технологій. Ми знаємо продукт зсередини.</div>
    </div>
  </div>
</section>
<?php endif; ?>

<div class="ab-line"></div>

<!-- ═══════════════════════════ HOW WE WORK ═══════════════════════════ -->
<section class="ab-how-section container">
  <div class="ab-section-head fp-r">
    <h2 class="ab-section-title">Як ми працюємо</h2>
  </div>
  <div class="ab-how-grid">
    <div class="ab-how-step fp-r fp-d1">
      <span class="ab-how-num">01</span>
      <div class="ab-how-icon">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
      </div>
      <div class="ab-how-title">Підбираємо</div>
      <div class="ab-how-desc">Особисто тестуємо товари та вносимо до каталогу тільки те, що рекомендуємо.</div>
    </div>
    <div class="ab-how-step fp-r fp-d2">
      <span class="ab-how-num">02</span>
      <div class="ab-how-icon">
        <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
      </div>
      <div class="ab-how-title">Приймаємо замовлення</div>
      <div class="ab-how-desc">Менеджер підтверджує замовлення та уточнює деталі протягом кількох хвилин.</div>
    </div>
    <div class="ab-how-step fp-r fp-d3">
      <span class="ab-how-num">03</span>
      <div class="ab-how-icon">
        <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
      </div>
      <div class="ab-how-title">Перевіряємо</div>
      <div class="ab-how-desc">Кожна одиниця товару проходить контроль якості перед пакуванням.</div>
    </div>
    <div class="ab-how-step fp-r fp-d4">
      <span class="ab-how-num">04</span>
      <div class="ab-how-icon">
        <svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
      </div>
      <div class="ab-how-title">Доставляємо</div>
      <div class="ab-how-desc">Відправляємо наступного дня. Трек-номер одразу в SMS або Telegram.</div>
    </div>
  </div>
</section>

<div class="ab-line"></div>

<!-- ═══════════════════════════ TEAM ═══════════════════════════ -->
<section class="ab-team-section container">
  <div class="ab-section-head fp-r">
    <h2 class="ab-section-title">Наша команда</h2>
  </div>
  <div class="ab-team-grid">

    <div class="ab-team-card fp-r fp-d1">
      <div class="ab-team-avatar">👨‍💼</div>
      <div class="ab-team-name">Олексій Д.</div>
      <div class="ab-team-role">Засновник та CEO</div>
      <div class="ab-team-socials">
        <a href="#" aria-label="Instagram">
          <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="#" aria-label="Telegram">
          <svg viewBox="0 0 24 24"><path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z"/></svg>
        </a>
      </div>
    </div>

    <div class="ab-team-card fp-r fp-d2">
      <div class="ab-team-avatar">👩‍💻</div>
      <div class="ab-team-name">Марія К.</div>
      <div class="ab-team-role">Менеджер з продажів</div>
      <div class="ab-team-socials">
        <a href="#" aria-label="Instagram">
          <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="#" aria-label="Telegram">
          <svg viewBox="0 0 24 24"><path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z"/></svg>
        </a>
      </div>
    </div>

    <div class="ab-team-card fp-r fp-d3">
      <div class="ab-team-avatar">🧑‍🔧</div>
      <div class="ab-team-name">Ігор В.</div>
      <div class="ab-team-role">Технічний спеціаліст</div>
      <div class="ab-team-socials">
        <a href="#" aria-label="Instagram">
          <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="#" aria-label="Telegram">
          <svg viewBox="0 0 24 24"><path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z"/></svg>
        </a>
      </div>
    </div>

    <div class="ab-team-card fp-r fp-d4">
      <div class="ab-team-avatar">👩‍🎨</div>
      <div class="ab-team-name">Аня С.</div>
      <div class="ab-team-role">Контент та маркетинг</div>
      <div class="ab-team-socials">
        <a href="#" aria-label="Instagram">
          <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="#" aria-label="Telegram">
          <svg viewBox="0 0 24 24"><path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z"/></svg>
        </a>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════ CTA ═══════════════════════════ -->
<div class="container" style="padding-bottom:60px;">
  <div class="ab-cta-box fp-r">
    <div class="ab-cta-left">
      <h2 class="ab-cta-title">Залишились питання? Ми поруч.</h2>
      <p class="ab-cta-text">Команда DIS Store відповідає протягом 5 хвилин. Напишіть нам або перегляньте каталог — знайдемо найкраще рішення разом.</p>
    </div>
    <div class="ab-cta-right">
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
</script>

<?php get_footer(); ?>