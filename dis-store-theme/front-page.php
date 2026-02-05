<?php get_header(); ?>

<?php
  $home_id = (int) get_option('page_on_front');

  if (!$home_id) {
    $home_id = get_queried_object_id();
  }

  // ===== HERO (Page fields) =====
  $hero_badge    = get_field('home_hero_badge', $home_id);
  $hero_title    = get_field('home_hero_title', $home_id);
  $hero_subtitle = get_field('home_hero_subtitle', $home_id);

  $hero_btn1_text = get_field('home_hero_btn1_text', $home_id);
  $hero_btn1_link = get_field('home_hero_btn1_link', $home_id);
  $hero_btn2_text = get_field('home_hero_btn2_text', $home_id);
  $hero_btn2_link = get_field('home_hero_btn2_link', $home_id);

  $hero_stats = get_field('home_hero_stats', $home_id); 

  $hero_card_title = get_field('home_hero_card_title', $home_id);
  $hero_card_name  = get_field('home_hero_card_name', $home_id);
  $hero_card_desc  = get_field('home_hero_card_desc', $home_id);

  $hero_card_btn1_text = get_field('home_hero_card_btn1_text', $home_id);
  $hero_card_btn1_link = get_field('home_hero_card_btn1_link', $home_id);
  $hero_card_btn2_text = get_field('home_hero_card_btn2_text', $home_id);
  $hero_card_btn2_link = get_field('home_hero_card_btn2_link', $home_id);

  $hero_strip = get_field('home_hero_strip', $home_id); 

  // ===== CATEGORIES (Page fields) =====
  $cat_title    = get_field('home_cat_title', $home_id);
  $cat_all_text = get_field('home_cat_all_text', $home_id);
  $cat_all_link = get_field('home_cat_all_link', $home_id);
  $categories   = get_field('home_categories', $home_id); 

  // ===== FEATURES (Page fields) =====
  $features_title = get_field('home_features_title', $home_id);
  $features       = get_field('home_features', $home_id); 

  // ===== TOP PRODUCTS (Page fields) =====
  $top_title     = get_field('home_top_title', $home_id);
  $top_more_text = get_field('home_top_more_text', $home_id);
  $top_more_link = get_field('home_top_more_link', $home_id);
  $top_products  = get_field('home_top_products', $home_id); 

  // ===== BANNER (Page fields) =====
  $banner_title    = get_field('home_banner_title', $home_id);
  $banner_text     = get_field('home_banner_text', $home_id);
  $banner_btn_text = get_field('home_banner_btn_text', $home_id);
  $banner_btn_link = get_field('home_banner_btn_link', $home_id);

  // ===== REVIEWS (Page fields) =====
  $reviews_title = get_field('home_reviews_title', $home_id);
  $reviews       = get_field('home_reviews', $home_id); 

  // ===== CTA (Page fields) =====
  $cta_title = get_field('home_cta_title', $home_id);
  $cta_text  = get_field('home_cta_text', $home_id);
  $cta_btn1_text = get_field('home_cta_btn1_text', $home_id);
  $cta_btn1_link = get_field('home_cta_btn1_link', $home_id);
  $cta_btn2_text = get_field('home_cta_btn2_text', $home_id);
  $cta_btn2_link = get_field('home_cta_btn2_link', $home_id);
?>

<!-- HERO -->
<section class="hero">
  <div class="container hero-inner">
    <div class="hero-left">

      <?php if ($hero_badge): ?>
        <div class="badge"><?php echo esc_html($hero_badge); ?></div>
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

      <div class="hero-stats">
        <?php if (is_array($hero_stats) && count($hero_stats)): ?>
          <?php foreach ($hero_stats as $s): ?>
            <div class="stat">
              <div class="stat-num"><?php echo esc_html($s['num'] ?? ''); ?></div>
              <div class="muted"><?php echo esc_html($s['label'] ?? ''); ?></div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
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
              <a class="btn btn-outline" href="<?php echo esc_url($hero_card_btn1_link); ?>">
                <?php echo esc_html($hero_card_btn1_text); ?>
              </a>
            <?php endif; ?>

            <?php if ($hero_card_btn2_text && $hero_card_btn2_link): ?>
              <a class="btn" href="<?php echo esc_url($hero_card_btn2_link); ?>">
                <?php echo esc_html($hero_card_btn2_text); ?>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="hero-strip">
        <?php if (is_array($hero_strip) && count($hero_strip)): ?>
          <?php foreach ($hero_strip as $row): ?>
            <div class="strip-item"><?php echo esc_html($row['text'] ?? ''); ?></div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- CATEGORIES -->
<section class="container section">
  <div class="section-head">
    <h2 class="section-title"><?php echo esc_html($cat_title ?: 'Категорії'); ?></h2>

    <?php if ($cat_all_text && $cat_all_link): ?>
      <a class="head-link" href="<?php echo esc_url($cat_all_link); ?>">
        <?php echo esc_html($cat_all_text); ?> <span class="arr">→</span>
      </a>
    <?php endif; ?>
  </div>

  <div class="grid grid-4">
    <?php if (is_array($categories) && count($categories)): ?>
      <?php foreach ($categories as $c): ?>
        <a class="card cat-card" href="<?php echo esc_url($c['link'] ?? '#'); ?>">
          <div class="cat-emoji"><?php echo esc_html($c['emoji'] ?? ''); ?></div>
          <strong><?php echo esc_html($c['title'] ?? ''); ?></strong>
        </a>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<!-- FEATURES -->
<section class="container section">
  <h2 class="section-title"><?php echo esc_html($features_title ?: 'Переваги'); ?></h2>

  <div class="grid grid-4">
    <?php if (is_array($features) && count($features)): ?>
      <?php foreach ($features as $f): ?>
        <div class="card feature-card">
          <strong><?php echo esc_html($f['title'] ?? ''); ?></strong>
          <div class="muted" style="margin-top:8px;"><?php echo esc_html($f['desc'] ?? ''); ?></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<!-- TOP PRODUCTS -->
<section class="container section">
  <div class="section-head">
    <h2 class="section-title"><?php echo esc_html($top_title ?: 'Топ товари'); ?></h2>

    <?php if ($top_more_text && $top_more_link): ?>
      <a class="head-link" href="<?php echo esc_url($top_more_link); ?>">
        <?php echo esc_html($top_more_text); ?> <span class="arr">→</span>
      </a>
    <?php endif; ?>
  </div>

  <div class="grid grid-4">
    <?php if (is_array($top_products) && count($top_products)): ?>
      <?php foreach ($top_products as $p): ?>
        <?php
          $p_link  = $p['link']  ?? '#';
          $p_tag1  = $p['tag1']  ?? '';
          $p_tag2  = $p['tag2']  ?? '';
          $p_title = $p['title'] ?? '';
          $p_spec  = $p['spec']  ?? '';
          $p_price = $p['price'] ?? '';
          $p_stock = $p['stock'] ?? '';
        ?>

        <a class="card product-card" href="<?php echo esc_url($p_link); ?>">
          <div class="product-top">
            <?php if ($p_tag1): ?><span class="pill"><?php echo esc_html($p_tag1); ?></span><?php endif; ?>
            <?php if ($p_tag2): ?><span class="pill pill-outline"><?php echo esc_html($p_tag2); ?></span><?php endif; ?>
          </div>

          <?php if ($p_title): ?><strong><?php echo esc_html($p_title); ?></strong><?php endif; ?>
          <?php if ($p_spec): ?><div class="muted" style="margin-top:8px;"><?php echo esc_html($p_spec); ?></div><?php endif; ?>

          <div class="price-row">
            <?php if ($p_price): ?><span class="price"><?php echo esc_html($p_price); ?></span><?php endif; ?>
            <?php if ($p_stock): ?><span class="muted"><?php echo esc_html($p_stock); ?></span><?php endif; ?>
          </div>
        </a>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

  <?php if ($banner_title || $banner_text || $banner_btn_text): ?>
    <div class="banner">
      <div>
        <?php if ($banner_title): ?>
          <strong style="font-size:18px;"><?php echo esc_html($banner_title); ?></strong>
        <?php endif; ?>

        <?php if ($banner_text): ?>
          <div class="muted" style="margin-top:6px;"><?php echo nl2br(esc_html($banner_text)); ?></div>
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

<!-- REVIEWS -->
<section class="container section">
  <h2 class="section-title"><?php echo esc_html($reviews_title ?: 'Відгуки'); ?></h2>

  <div class="grid grid-3">
    <?php if (is_array($reviews) && count($reviews)): ?>
      <?php foreach ($reviews as $r): ?>
        <div class="card review-card">
          <strong><?php echo esc_html($r['name'] ?? ''); ?></strong>
          <div class="muted" style="margin-top:6px;"><?php echo nl2br(esc_html($r['text'] ?? '')); ?></div>
          <div class="rating"><?php echo esc_html($r['stars'] ?? '★★★★★'); ?></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<!-- FAQ CTA -->
<section class="container section">
  <div class="faq-box">
    <div>
      <h2 class="section-title" style="margin:0;"><?php echo esc_html($cta_title ?: 'Потрібна допомога?'); ?></h2>
      <div class="muted" style="margin-top:8px;"><?php echo nl2br(esc_html($cta_text ?: '')); ?></div>
    </div>

    <div class="faq-actions">
      <?php if ($cta_btn1_text && $cta_btn1_link): ?>
        <a class="btn" href="<?php echo esc_url($cta_btn1_link); ?>"><?php echo esc_html($cta_btn1_text); ?></a>
      <?php endif; ?>

      <?php if ($cta_btn2_text && $cta_btn2_link): ?>
        <a class="btn btn-outline" href="<?php echo esc_url($cta_btn2_link); ?>"><?php echo esc_html($cta_btn2_text); ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
