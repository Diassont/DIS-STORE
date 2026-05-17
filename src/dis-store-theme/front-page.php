<?php get_header(); ?>
<?php
wp_enqueue_style(
    'dis-page-front-page',
    get_template_directory_uri() . '/assets/css/front-page.css',
    ['dis-main'],
    wp_get_theme()->get('Version')
);
?>

<?php
/* ============================================================
   FRONT-PAGE.PHP — DIS STORE
   ============================================================ */
$home_id = (int) get_option('page_on_front');
if (!$home_id) $home_id = get_queried_object_id();

// ACF — HERO
$hero_badge          = get_field('home_hero_badge',          $home_id);
$hero_title          = get_field('home_hero_title',          $home_id);
$hero_subtitle       = get_field('home_hero_subtitle',       $home_id);
$hero_btn1_text      = get_field('home_hero_btn1_text',      $home_id);
$hero_btn1_link      = get_field('home_hero_btn1_link',      $home_id);
$hero_btn2_text      = get_field('home_hero_btn2_text',      $home_id);
$hero_btn2_link      = get_field('home_hero_btn2_link',      $home_id);
$hero_stats          = get_field('home_hero_stats',          $home_id);
$hero_card_title     = get_field('home_hero_card_title',     $home_id);
$hero_card_name      = get_field('home_hero_card_name',      $home_id);
$hero_card_desc      = get_field('home_hero_card_desc',      $home_id);
$hero_card_btn1_text = get_field('home_hero_card_btn1_text', $home_id);
$hero_card_btn1_link = get_field('home_hero_card_btn1_link', $home_id);
$hero_card_btn2_text = get_field('home_hero_card_btn2_text', $home_id);
$hero_card_btn2_link = get_field('home_hero_card_btn2_link', $home_id);
$hero_strip          = get_field('home_hero_strip',          $home_id);

// ACF — інші секції
$features_title = get_field('home_features_title', $home_id);
$features       = get_field('home_features',       $home_id);
$top_title      = get_field('home_top_title',      $home_id);
$top_more_text  = get_field('home_top_more_text',  $home_id);
$top_more_link  = get_field('home_top_more_link',  $home_id);
$banner_title   = get_field('home_banner_title',   $home_id);
$banner_text    = get_field('home_banner_text',    $home_id);
$banner_btn_text= get_field('home_banner_btn_text',$home_id);
$banner_btn_link= get_field('home_banner_btn_link',$home_id);
$reviews_title  = get_field('home_reviews_title',  $home_id);
$reviews        = get_field('home_reviews',        $home_id);
$cta_title      = get_field('home_cta_title',      $home_id);
$cta_text       = get_field('home_cta_text',       $home_id);
$cta_btn1_text  = get_field('home_cta_btn1_text',  $home_id);
$cta_btn1_link  = get_field('home_cta_btn1_link',  $home_id);
$cta_btn2_text  = get_field('home_cta_btn2_text',  $home_id);
$cta_btn2_link  = get_field('home_cta_btn2_link',  $home_id);

// TOP PRODUCTS — беремо реальні WooCommerce товари
// Вкажи свої ID або залишай порожнім — підтягнуться останні 8
$top_product_ids = [
  // 101, 245, 378, 412, 556, 689, 720, 803
];
if (empty($top_product_ids)) {
  $q = new WP_Query([
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => 8,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);
  $top_product_ids = wp_list_pluck($q->posts, 'ID');
}

// CAROUSEL — категорії з SVG іконками
$carousel_cats = [
  [
    'name'   => 'Ноутбуки',
    'link'   => '/product-category/noutbuky/',
    'color'  => 'rgba(59,130,246,.15)',
    'stroke' => '#3b82f6',
    'svg'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M0 21h24M8 17v4M16 17v4"/></svg>',
  ],
  [
    'name'   => 'Комп\'ютери',
    'link'   => '/product-category/kompyutery/',
    'color'  => 'rgba(168,85,247,.15)',
    'stroke' => '#a855f7',
    'svg'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M12 17v4M8 21h8"/></svg>',
  ],
  [
    'name'   => 'Відеокарти',
    'link'   => '/product-category/videokart/',
    'color'  => 'rgba(255,106,0,.15)',
    'stroke' => '#ff6a00',
    'svg'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="10" rx="2"/><path d="M6 7V5m4 2V5m4 2V5m4 2V5M6 17v2m4-2v2m4-2v2m4-2v2M8 12h2m2 0h2"/></svg>',
  ],
  [
    'name'   => 'Процесори',
    'link'   => '/product-category/procesory/',
    'color'  => 'rgba(34,197,94,.15)',
    'stroke' => '#22c55e',
    'svg'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="7" width="10" height="10" rx="1"/><path d="M9 7V4m6 3V4M9 20v-3m6 3v-3M4 9h3M4 15h3m10-6h3m-3 6h3"/></svg>',
  ],
  [
    'name'   => 'Клавіатури',
    'link'   => '/product-category/klaviatury/',
    'color'  => 'rgba(245,158,11,.15)',
    'stroke' => '#f59e0b',
    'svg'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 10h.01M10 10h.01M14 10h.01M18 10h.01M6 14h.01M8 14h8M18 14h.01"/></svg>',
  ],
  [
    'name'   => 'Миші',
    'link'   => '/product-category/myshi/',
    'color'  => 'rgba(236,72,153,.15)',
    'stroke' => '#ec4899',
    'svg'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C8.686 2 6 4.686 6 8v8c0 3.314 2.686 6 6 6s6-2.686 6-6V8c0-3.314-2.686-6-6-6z"/><path d="M12 2v8M6 8h12"/></svg>',
  ],
  [
    'name'   => 'Навушники',
    'link'   => '/product-category/navushnyky/',
    'color'  => 'rgba(20,184,166,.15)',
    'stroke' => '#14b8a6',
    'svg'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0118 0v6"/><path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3v5zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3v5z"/></svg>',
  ],
  [
    'name'   => 'Монітори',
    'link'   => '/product-category/monitory/',
    'color'  => 'rgba(99,102,241,.15)',
    'stroke' => '#6366f1',
    'svg'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>',
  ],
];
$c_total = count($carousel_cats);
?>

<?php
/* Іконки SVG для features */
$feat_icons = [
  '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
  '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
  '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
  '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 3H8M12 3v4"/></svg>',
];
?>

<!-- ═══════ HERO ═══════ -->
<section class="hero">
  <div class="container hero-inner">

    <div class="hero-left">
      <?php if ($hero_badge): ?>
        <div class="badge">
          <span class="fp-badge-dot"></span>
          <?php echo esc_html($hero_badge); ?>
        </div>
      <?php endif; ?>

      <?php if ($hero_title): ?>
        <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
      <?php endif; ?>

      <?php if ($hero_subtitle): ?>
        <p class="hero-sub muted"><?php echo nl2br(esc_html($hero_subtitle)); ?></p>
      <?php endif; ?>

      <?php if (($hero_btn1_text && $hero_btn1_link) || ($hero_btn2_text && $hero_btn2_link)): ?>
        <div class="hero-actions">
          <?php if ($hero_btn1_text && $hero_btn1_link): ?>
            <a class="btn" href="<?php echo esc_url($hero_btn1_link); ?>">
              <?php echo esc_html($hero_btn1_text); ?>
            </a>
          <?php endif; ?>
          <?php if ($hero_btn2_text && $hero_btn2_link): ?>
            <a class="btn btn-outline" href="<?php echo esc_url($hero_btn2_link); ?>">
              <?php echo esc_html($hero_btn2_text); ?>
            </a>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if (is_array($hero_stats) && count($hero_stats)): ?>
        <div class="hero-stats">
          <?php foreach ($hero_stats as $s): ?>
            <div class="stat">
              <div class="stat-num"><?php echo esc_html($s['num'] ?? ''); ?></div>
              <div class="muted"><?php echo esc_html($s['label'] ?? ''); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="hero-right">
      <div class="hero-card">
        <?php if ($hero_card_title): ?>
          <div class="hero-card-title"><?php echo esc_html($hero_card_title); ?></div>
        <?php endif; ?>
        <div class="hero-product">
          <?php if ($hero_card_name): ?>
            <div class="hp-name"><?php echo esc_html($hero_card_name); ?></div>
          <?php endif; ?>
          <?php if ($hero_card_desc): ?>
            <div class="muted"><?php echo esc_html($hero_card_desc); ?></div>
          <?php endif; ?>
          <div class="hp-actions">
            <?php if ($hero_card_btn1_text && $hero_card_btn1_link): ?>
              <a class="btn btn-outline"
                 href="<?php echo esc_url($hero_card_btn1_link); ?>">
                <?php echo esc_html($hero_card_btn1_text); ?>
              </a>
            <?php endif; ?>
            <?php if ($hero_card_btn2_text && $hero_card_btn2_link): ?>
              <a class="btn"
                 href="<?php echo esc_url($hero_card_btn2_link); ?>">
                <?php echo esc_html($hero_card_btn2_text); ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <?php if (is_array($hero_strip) && count($hero_strip)): ?>
        <div class="fp-ticker">
          <div class="fp-ticker-track">
            <?php foreach ($hero_strip as $row): ?>
              <span class="fp-ticker-item"><?php echo esc_html($row['text'] ?? ''); ?></span>
            <?php endforeach; ?>
            <?php foreach ($hero_strip as $row): ?>
              <span class="fp-ticker-item"><?php echo esc_html($row['text'] ?? ''); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>

<!-- ═══════ STATS BAR ═══════ -->
<div class="fp-stats-bar fp-r">
  <div class="container">
    <div class="fp-stats-bar-inner">
      <div class="fp-sb-item">
        <div class="fp-sb-num">100<em>+</em></div>
        <div class="fp-sb-label">Товарів в наявності</div>
      </div>
      <div class="fp-sb-item">
        <div class="fp-sb-num">1–2<em> дні</em></div>
        <div class="fp-sb-label">Доставка по Україні</div>
      </div>
      <div class="fp-sb-item">
        <div class="fp-sb-num">12<em>+ міс</em></div>
        <div class="fp-sb-label">Офіційна гарантія</div>
      </div>
      <div class="fp-sb-item">
        <div class="fp-sb-num">98<em>%</em></div>
        <div class="fp-sb-label">Задоволених клієнтів</div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════ 3D CAROUSEL ═══════ -->
<section class="fp-carousel-section">
  <div class="container">

    <div class="fp-carousel-head fp-r">
      <h2 class="fp-title">Популярні категорії</h2>
      <a class="head-link" href="/shop/">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <!-- ДЕСКТОП — 3D карусель -->
    <div class="fp-c-scene fp-r">
      <div class="fp-c3d" id="fpCarousel"
           style="--fp-n:<?php echo $c_total; ?>;">
        <?php foreach ($carousel_cats as $i => $cat): ?>
          <div class="fp-c3d-item"
               style="--fp-i:<?php echo $i+1; ?>;
                      --fp-color:<?php echo esc_attr($cat['color']); ?>;
                      --fp-stroke:<?php echo esc_attr($cat['stroke']); ?>;">
            <a class="fp-c3d-card"
               href="<?php echo esc_url($cat['link']); ?>">
              <div class="fp-c3d-icon">
                <?php echo $cat['svg']; ?>
              </div>
              <div class="fp-c3d-name"><?php echo esc_html($cat['name']); ?></div>
              <div class="fp-c3d-arrow">
                <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="fp-c-glow"></div>
      <div class="fp-c-shadow"></div>
    </div>
    <p class="fp-carousel-hint">Перетягни або наведи щоб зупинити · Натисни для переходу</p>

    <!-- МОБІЛЬНИЙ — слайдер з автопрокруткою -->
    <div class="fp-mobile-slider fp-r" id="fpMobileSlider">
      <div class="fp-ms-track-wrap">
        <div class="fp-ms-track" id="fpMsTrack">
          <?php foreach ($carousel_cats as $i => $cat): ?>
            <div class="fp-ms-slide">
              <a class="fp-ms-card"
                 href="<?php echo esc_url($cat['link']); ?>"
                 style="--fp-color:<?php echo esc_attr($cat['color']); ?>;
                        --fp-stroke:<?php echo esc_attr($cat['stroke']); ?>;">
                <div class="fp-ms-icon">
                  <?php echo $cat['svg']; ?>
                </div>
                <div class="fp-ms-name"><?php echo esc_html($cat['name']); ?></div>
                <span class="fp-ms-btn">
                  Переглянути
                  <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </span>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="fp-ms-dots" id="fpMsDots">
        <?php foreach ($carousel_cats as $i => $cat): ?>
          <div class="fp-ms-dot <?php echo $i === 0 ? 'is-active' : ''; ?>"
               data-idx="<?php echo $i; ?>"></div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>

<div class="fp-line"></div>

<!-- ═══════ HOW IT WORKS ═══════ -->
<section class="fp-how-section container">
  <h2 class="fp-title fp-r">Як це працює</h2>
  <div class="fp-how-grid">
    <div class="fp-how-step fp-r fp-d1">
      <span class="fp-how-num">01</span>
      <div class="fp-how-icon">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
      </div>
      <div class="fp-how-title">Обираєш товар</div>
      <div class="fp-how-desc">
        Зручний каталог з фільтрами, фото та порівнянням характеристик.
      </div>
    </div>
    <div class="fp-how-step fp-r fp-d2">
      <span class="fp-how-num">02</span>
      <div class="fp-how-icon">
        <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
      </div>
      <div class="fp-how-title">Консультація</div>
      <div class="fp-how-desc">
        Допоможемо підібрати під бюджет та завдання — безкоштовно.
      </div>
    </div>
    <div class="fp-how-step fp-r fp-d3">
      <span class="fp-how-num">03</span>
      <div class="fp-how-icon">
        <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div class="fp-how-title">Перевірка якості</div>
      <div class="fp-how-desc">
        Кожен товар проходить контроль перед відправкою.
      </div>
    </div>
    <div class="fp-how-step fp-r fp-d4">
      <span class="fp-how-num">04</span>
      <div class="fp-how-icon">
        <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </div>
      <div class="fp-how-title">Швидка доставка</div>
      <div class="fp-how-desc">
        Відправка 1–2 дні. Нова Пошта та Укрпошта по всій Україні.
      </div>
    </div>
  </div>
</section>

<div class="fp-line"></div>

<!-- ═══════ ЧОМУ DIS STORE ═══════ -->
<section class="container section">
  <div class="section-head fp-r">
    <h2 class="fp-title"><?php echo esc_html($features_title ?: 'Чому DIS STORE'); ?></h2>
  </div>
  <div class="grid grid-4" style="counter-reset: fp-fc;">
    <?php
    $feat_defaults = [
      ['title'=>'Офіційні товари',      'desc'=>'Тільки оригінальна продукція від перевірених дистриб\'юторів.'],
      ['title'=>'Технічна підтримка',   'desc'=>'Допоможемо підібрати, налаштувати та вирішити будь-яке питання.'],
      ['title'=>'Перевірка якості',      'desc'=>'Кожен товар проходить контроль перед відправкою клієнту.'],
      ['title'=>'Вигідні ціни',          'desc'=>'Найкращі ціни на ринку без прихованих доплат та комісій.'],
    ];
    $feat_list = (is_array($features) && count($features)) ? $features : $feat_defaults;
    foreach ($feat_list as $i => $f):
    ?>
      <div class="card feature-card fp-r fp-d<?php echo min($i+1, 4); ?>">
        <div class="fp-feat-icon">
          <?php echo $feat_icons[$i % count($feat_icons)]; ?>
        </div>
        <strong><?php echo esc_html($f['title'] ?? ''); ?></strong>
        <div class="muted" style="margin-top:6px;font-size:13px;">
          <?php echo esc_html($f['desc'] ?? ''); ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<div class="fp-line"></div>

<!-- ═══════ ТОП ТОВАРИ ═══════ -->
<section class="container section">
  <div class="section-head fp-r">
    <h2 class="fp-title"><?php echo esc_html($top_title ?: 'Топ товари 2025'); ?></h2>
    <?php if ($top_more_text && $top_more_link): ?>
      <a class="head-link" href="<?php echo esc_url($top_more_link); ?>">
        <?php echo esc_html($top_more_text); ?> <span class="arr">→</span>
      </a>
    <?php else: ?>
      <a class="head-link" href="/shop/">Всі товари <span class="arr">→</span></a>
    <?php endif; ?>
  </div>

  <div class="fp-products-grid">
    <?php
    foreach (array_slice($top_product_ids, 0, 8) as $i => $pid):
      $product = wc_get_product($pid);
      if (!$product) continue;
      $name      = $product->get_name();
      $link      = get_permalink($pid);
      $img_url   = get_the_post_thumbnail_url($pid, 'woocommerce_single')
                   ?: get_the_post_thumbnail_url($pid, 'full');
      $is_sale   = $product->is_on_sale();
      $reg_price = $product->get_regular_price();
    ?>
      <a class="fp-wc-card fp-r fp-d<?php echo min($i+1, 4); ?>"
         href="<?php echo esc_url($link); ?>">
        <div class="fp-wc-img">
          <?php if ($img_url): ?>
            <img src="<?php echo esc_url($img_url); ?>"
                 alt="<?php echo esc_attr($name); ?>"
                 loading="lazy">
          <?php else: ?>
            <div class="fp-wc-img-placeholder">
              <svg viewBox="0 0 24 24" stroke-width="1.5">
                <rect x="2" y="3" width="20" height="14" rx="2"/>
                <path d="M8 21h8M12 17v4"/>
              </svg>
            </div>
          <?php endif; ?>
          <?php if ($is_sale): ?>
            <span class="fp-wc-sale-badge">SALE</span>
          <?php endif; ?>
        </div>
        <div class="fp-wc-body">
          <div class="fp-wc-name"><?php echo esc_html($name); ?></div>
          <div class="fp-wc-bottom">
            <div class="fp-wc-price">
              <?php if ($is_sale && $reg_price): ?>
                <del><?php echo wc_price($reg_price); ?></del>
              <?php endif; ?>
              <?php echo wc_price($product->get_price()); ?>
            </div>
            <span class="fp-wc-btn">В кошик</span>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <?php if ($banner_title || $banner_text || $banner_btn_text): ?>
    <div class="banner fp-r">
      <div>
        <?php if ($banner_title): ?>
          <strong style="font-size:18px;"><?php echo esc_html($banner_title); ?></strong>
        <?php endif; ?>
        <?php if ($banner_text): ?>
          <div class="muted" style="margin-top:6px;">
            <?php echo nl2br(esc_html($banner_text)); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if ($banner_btn_text && $banner_btn_link): ?>
        <a class="btn" href="<?php echo esc_url($banner_btn_link); ?>">
          <?php echo esc_html($banner_btn_text); ?>
        </a>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</section>

<div class="fp-line"></div>

<!-- ═══════ ГАРАНТІЇ ═══════ -->
<section class="fp-guarantee-section container">
  <div class="section-head fp-r">
    <h2 class="fp-title">Гарантії та переваги</h2>
  </div>
  <div class="fp-guarantee-grid">
    <div class="fp-g-card fp-r fp-d1">
      <div class="fp-g-icon">
        <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      </div>
      <div>
        <div class="fp-g-title">Офіційна гарантія</div>
        <div class="fp-g-desc">Від 12 місяців на всі товари. Сервісний центр в Україні.</div>
      </div>
    </div>
    <div class="fp-g-card fp-r fp-d2">
      <div class="fp-g-icon">
        <svg viewBox="0 0 24 24"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 102.13-9.36L1 10"/></svg>
      </div>
      <div>
        <div class="fp-g-title">Повернення 14 днів</div>
        <div class="fp-g-desc">Не підійшло — повернемо гроші або обміняємо без зайвих питань.</div>
      </div>
    </div>
    <div class="fp-g-card fp-r fp-d3">
      <div class="fp-g-icon">
        <svg viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
      </div>
      <div>
        <div class="fp-g-title">Швидка доставка</div>
        <div class="fp-g-desc">1–2 дні після підтвердження. Нова Пошта по всій Україні.</div>
      </div>
    </div>
  </div>
</section>

<div class="fp-line"></div>

<!-- ═══════ ВІДГУКИ ═══════ -->
<section class="container section">
  <div class="section-head fp-r">
    <h2 class="fp-title"><?php echo esc_html($reviews_title ?: 'Відгуки клієнтів'); ?></h2>
  </div>
  <?php
  $rev_defaults = [
    ['name'=>'Олексій М.','stars'=>'★★★★★','text'=>'Монітор прийшов швидко, упакований ідеально. Якість відповідає опису. Буду замовляти ще!'],
    ['name'=>'Ірина К.',  'stars'=>'★★★★★','text'=>'Зверталась за порадою — менеджер дуже допоміг обрати клавіатуру під мій бюджет. Дякую!'],
    ['name'=>'Максим Д.', 'stars'=>'★★★★☆','text'=>'Гарна відеокарта, чудово грає в сучасні ігри. Ціна краща ніж в інших магазинах.'],
  ];
  $rev_list = (is_array($reviews) && count($reviews)) ? $reviews : $rev_defaults;
  ?>
  <div class="fp-reviews-grid">
    <?php foreach ($rev_list as $i => $r):
      $r_name  = $r['name']  ?? '';
      $r_text  = $r['text']  ?? '';
      $r_stars = $r['stars'] ?? '★★★★★';
      $initial = mb_strtoupper(mb_substr($r_name, 0, 1, 'UTF-8'));
    ?>
      <div class="card fp-rev-card fp-r fp-d<?php echo min($i+1, 4); ?>">
        <div class="fp-rev-header">
          <div class="fp-rev-avatar"><?php echo esc_html($initial); ?></div>
          <div>
            <div class="fp-rev-name"><?php echo esc_html($r_name); ?></div>
            <div class="fp-rev-stars"><?php echo esc_html($r_stars); ?></div>
          </div>
        </div>
        <div class="fp-rev-text"><?php echo nl2br(esc_html($r_text)); ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<div class="fp-line"></div>

<!-- ═══════ CTA ═══════ -->
<section class="fp-cta-section container">
  <div class="fp-cta-box fp-r">
    <div class="fp-cta-left">
      <h2 class="fp-cta-title">
        <?php echo esc_html($cta_title ?: 'Потрібна допомога з вибором?'); ?>
      </h2>
      <p class="fp-cta-text">
        <?php echo nl2br(esc_html($cta_text ?: 'Наші менеджери підберуть конфігурацію під бюджет, дадуть пораду або зберуть ПК під ключ.')); ?>
      </p>
      <div class="fp-cta-chips">
        <span class="fp-cta-chip">
          <svg viewBox="0 0 24 24" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          Безкоштовна консультація
        </span>
        <span class="fp-cta-chip">
          <svg viewBox="0 0 24 24" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          Відповідь за 5 хвилин
        </span>
        <span class="fp-cta-chip">
          <svg viewBox="0 0 24 24" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          Збірка ПК під ключ
        </span>
      </div>
    </div>
    <div class="fp-cta-right">
      <?php if ($cta_btn1_text && $cta_btn1_link): ?>
        <a class="btn" href="<?php echo esc_url($cta_btn1_link); ?>">
          <?php echo esc_html($cta_btn1_text); ?>
        </a>
      <?php else: ?>
        <a class="btn" href="/contact/">Написати нам</a>
      <?php endif; ?>
      <?php if ($cta_btn2_text && $cta_btn2_link): ?>
        <a class="btn btn-outline" href="<?php echo esc_url($cta_btn2_link); ?>">
          <?php echo esc_html($cta_btn2_text); ?>
        </a>
      <?php else: ?>
        <a class="btn btn-outline" href="/shop/">Перейти до каталогу</a>
      <?php endif; ?>
    </div>
  </div>
</section>

<div class="fp-line"></div>

<!-- ═══════ БРЕНДИ ═══════ -->
<section class="fp-brands-section container fp-r">
  <div class="fp-brands-title">Офіційні постачальники та бренди</div>
  <div class="fp-brands-row">
    <?php
    $brands = [
      'ASUS','MSI','Gigabyte','Kingston','Samsung',
      'Western Digital','Logitech','HyperX','Razer',
      'Noctua','be quiet!','Corsair','Intel','AMD','NVIDIA',
    ];
    foreach ($brands as $b):
    ?>
      <span class="fp-brand"><?php echo esc_html($b); ?></span>
    <?php endforeach; ?>
  </div>
</section>

<script>
/* ============================================================
   SCROLL REVEAL
   ============================================================ */
(function () {
  var els = document.querySelectorAll('.fp-r');
  if (!els.length) return;
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) {
        e.target.classList.add('fp-on');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.07, rootMargin: '0px 0px -30px 0px' });
  els.forEach(function (el) { io.observe(el); });
}());

/* ============================================================
   3D CAROUSEL — DESKTOP (drag to rotate)
   ============================================================ */
(function () {
  var el = document.getElementById('fpCarousel');
  if (!el) return;

  var angle    = 0;
  var speed    = 0.28;
  var dragging = false;
  var startX   = 0;
  var startA   = 0;
  var moved    = false;

  /* Вимикаємо CSS animation, керуємо через JS */
  el.style.animation = 'none';

  function setY(d) {
    el.style.transform =
      'perspective(1100px) rotateX(-8deg) rotateY(' + d + 'deg)';
  }

  /* Авто-обертання */
  (function loop() {
    if (!dragging) { angle += speed; setY(angle); }
    requestAnimationFrame(loop);
  }());

  /* Hover — пауза */
  var scene = el.closest('.fp-c-scene');
  if (scene) {
    scene.addEventListener('mouseenter', function () { speed = 0; });
    scene.addEventListener('mouseleave', function () { speed = 0.28; });
  }

  /* Mouse drag */
  el.addEventListener('mousedown', function (e) {
    dragging = true;
    moved    = false;
    startX   = e.clientX;
    startA   = angle;
    e.preventDefault();
  });
  window.addEventListener('mousemove', function (e) {
    if (!dragging) return;
    var dx = e.clientX - startX;
    if (Math.abs(dx) > 4) moved = true;
    angle = startA + dx * 0.45;
    setY(angle);
  });
  window.addEventListener('mouseup', function (e) {
    if (dragging && moved) {
      var link = e.target.closest('a');
      if (link) {
        var stop = function (ev) {
          ev.preventDefault();
          link.removeEventListener('click', stop);
        };
        link.addEventListener('click', stop);
      }
    }
    dragging = false;
  });

  /* Touch drag */
  el.addEventListener('touchstart', function (e) {
    dragging = true;
    moved    = false;
    startX   = e.touches[0].clientX;
    startA   = angle;
  }, { passive: true });
  window.addEventListener('touchmove', function (e) {
    if (!dragging) return;
    var dx = e.touches[0].clientX - startX;
    if (Math.abs(dx) > 6) moved = true;
    angle = startA + dx * 0.45;
    setY(angle);
  }, { passive: true });
  window.addEventListener('touchend', function () { dragging = false; });
}());

/* ============================================================
   MOBILE SLIDER — auto-play, одна картка за раз
   ============================================================ */
(function () {
  var track  = document.getElementById('fpMsTrack');
  var dotsEl = document.getElementById('fpMsDots');
  if (!track || !dotsEl) return;

  var slides = track.querySelectorAll('.fp-ms-slide');
  var dots   = dotsEl.querySelectorAll('.fp-ms-dot');
  var total  = slides.length;
  var current = 0;
  var timer;
  var INTERVAL = 3000; /* 3 секунди на слайд */

  function goTo(idx) {
    current = (idx + total) % total;
    track.style.transform = 'translateX(-' + (current * 100) + '%)';
    dots.forEach(function (d, i) {
      d.classList.toggle('is-active', i === current);
    });
  }

  function next() {
    goTo(current + 1);
  }

  function startAuto() {
    clearInterval(timer);
    timer = setInterval(next, INTERVAL);
  }

  /* Клік по dots */
  dots.forEach(function (d) {
    d.addEventListener('click', function () {
      goTo(parseInt(d.dataset.idx, 10));
      startAuto(); /* перезапуск таймера */
    });
  });

  /* Touch swipe */
  var touchStartX = 0;
  track.addEventListener('touchstart', function (e) {
    touchStartX = e.touches[0].clientX;
    clearInterval(timer);
  }, { passive: true });
  track.addEventListener('touchend', function (e) {
    var dx = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(dx) > 40) {
      goTo(dx < 0 ? current + 1 : current - 1);
    }
    startAuto();
  }, { passive: true });

  /* Старт */
  startAuto();
}());
</script>

<?php get_footer(); ?>