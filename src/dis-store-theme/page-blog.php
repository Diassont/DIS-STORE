<?php get_header(); ?>
<?php
wp_enqueue_style(
    'dis-page-blog',
    get_template_directory_uri() . '/assets/css/blog.css',
    ['dis-main'],
    wp_get_theme()->get('Version')
);
?>


<?php
/* ============================================================
   BLOG.PHP — DIS STORE
   Статична сторінка блогу (заглушка / landing).
   ACF: blog_title, blog_subtitle
   ============================================================ */
$title    = get_field('blog_title')    ?: 'Блог DIS Store';
$subtitle = get_field('blog_subtitle') ?: 'Корисні статті, огляди техніки та новини магазину. Залишайтесь в курсі найкращих пропозицій.';
?>

<!-- ═══════════════════════════ HERO ═══════════════════════════ -->
<section class="bl-hero">
  <div class="container bl-hero-inner">
    <div>
      <div class="bl-hero-badge">
        <span class="bl-badge-dot"></span>
        Корисно та цікаво
      </div>
      <h1 class="bl-hero-title"><?php echo esc_html($title); ?></h1>
      <p class="bl-hero-sub"><?php echo nl2br(esc_html($subtitle)); ?></p>
    </div>
    <div class="bl-hero-icon-box">
      <svg viewBox="0 0 24 24">
        <path d="M12 20h9"/>
        <path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
      </svg>
    </div>
  </div>
</section>

<!-- ═══════════════════════════ STATS BAR ═══════════════════════════ -->
<div class="bl-stats-bar fp-r">
  <div class="container">
    <div class="bl-stats-bar-inner">
      <div class="bl-sb-item">
        <div class="bl-sb-num">50<em>+</em></div>
        <div class="bl-sb-label">Статей у блозі</div>
      </div>
      <div class="bl-sb-item">
        <div class="bl-sb-num">4<em> теми</em></div>
        <div class="bl-sb-label">Категорії матеріалів</div>
      </div>
      <div class="bl-sb-item">
        <div class="bl-sb-num"><em>Щo</em></div>
        <div class="bl-sb-label">Тижня нові публікації</div>
      </div>
      <div class="bl-sb-item">
        <div class="bl-sb-num">100%</div>
        <div class="bl-sb-label">Безкоштовно</div>
      </div>
    </div>
  </div>
</div>

<div class="bl-line"></div>

<!-- ═══════════════════════════ CATEGORIES ═══════════════════════════ -->
<section class="bl-cats-section container">
  <div class="bl-section-head fp-r">
    <h2 class="bl-section-title">Категорії</h2>
  </div>
  <div class="bl-cats-grid">
    <a class="bl-cat-card fp-r fp-d1" href="<?php echo get_category_link(get_cat_ID('Огляди')); ?>">
      <div class="bl-cat-icon">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
      </div>
      <div class="bl-cat-title">Огляди</div>
      <div class="bl-cat-desc">Детальні огляди смартфонів, ноутбуків та аксесуарів з реальними тестами.</div>
      <span class="bl-cat-count">📱 Техніка</span>
    </a>
    <a class="bl-cat-card fp-r fp-d2" href="<?php echo get_category_link(get_cat_ID('Поради')); ?>">
      <div class="bl-cat-icon">
        <svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
      </div>
      <div class="bl-cat-title">Поради</div>
      <div class="bl-cat-desc">Як вибрати, як налаштувати, як зекономити. Практичні гайди для покупців.</div>
      <span class="bl-cat-count">💡 Корисне</span>
    </a>
    <a class="bl-cat-card fp-r fp-d3" href="<?php echo get_category_link(get_cat_ID('Новини')); ?>">
      <div class="bl-cat-icon">
        <svg viewBox="0 0 24 24"><path d="M4 22h16a2 2 0 002-2V4a2 2 0 00-2-2H8a2 2 0 00-2 2v16a2 2 0 01-2 2zm0 0a2 2 0 01-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8M15 18h-5M10 6h8v4h-8z"/></svg>
      </div>
      <div class="bl-cat-title">Новини</div>
      <div class="bl-cat-desc">Анонси нових товарів, акції та важливі оновлення від DIS Store.</div>
      <span class="bl-cat-count">🔔 Оновлення</span>
    </a>
    <a class="bl-cat-card fp-r fp-d4" href="<?php echo get_category_link(get_cat_ID('Порівняння')); ?>">
      <div class="bl-cat-icon">
        <svg viewBox="0 0 24 24"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>
      </div>
      <div class="bl-cat-title">Порівняння</div>
      <div class="bl-cat-desc">iPhone vs Android, бюджетний vs флагман — допомагаємо обрати правильно.</div>
      <span class="bl-cat-count">⚖️ Аналітика</span>
    </a>
    <a class="bl-cat-card fp-r fp-d1" href="<?php echo get_category_link(get_cat_ID('Акції')); ?>">
      <div class="bl-cat-icon">
        <svg viewBox="0 0 24 24"><path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
      </div>
      <div class="bl-cat-title">Акції</div>
      <div class="bl-cat-desc">Гарячі знижки, розпродажі та ексклюзивні пропозиції для підписників.</div>
      <span class="bl-cat-count">🔥 Вигідно</span>
    </a>
    <a class="bl-cat-card fp-r fp-d2" href="<?php echo get_category_link(get_cat_ID('Гайди')); ?>">
      <div class="bl-cat-icon">
        <svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/></svg>
      </div>
      <div class="bl-cat-title">Гайди</div>
      <div class="bl-cat-desc">Покрокові інструкції з налаштування, ремонту та догляду за технікою.</div>
      <span class="bl-cat-count">📖 Інструкції</span>
    </a>
  </div>
</section>

<div class="bl-line"></div>

<!-- ═══════════════════════════ LATEST POSTS (static placeholder) ═══════════════════════════ -->
<section class="bl-posts-section container">
  <div class="bl-section-head fp-r">
    <h2 class="bl-section-title">Останні публікації</h2>
    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-outline" style="font-size:13px;padding:8px 18px;">Всі статті →</a>
  </div>

  <?php
  $recent = new WP_Query(['posts_per_page' => 3, 'post_status' => 'publish']);
  if ($recent->have_posts()):
  ?>
  <div class="bl-posts-grid">
    <?php while ($recent->have_posts()): $recent->the_post(); ?>
    <a class="bl-post-card fp-r fp-d1" href="<?php the_permalink(); ?>">
      <div class="bl-post-thumb">
        <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail('medium', ['style' => 'width:100%;height:100%;object-fit:cover;position:absolute;inset:0;']); ?>
        <?php else: ?>
          <svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
        <?php endif; ?>
      </div>
      <div class="bl-post-body">
        <?php $cats = get_the_category(); if ($cats): ?>
          <span class="bl-post-tag"><?php echo esc_html($cats[0]->name); ?></span>
        <?php endif; ?>
        <div class="bl-post-title"><?php the_title(); ?></div>
        <div class="bl-post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></div>
        <div class="bl-post-meta">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          <?php echo get_the_date('d.m.Y'); ?>
        </div>
      </div>
    </a>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
  <?php else: ?>
    <p class="muted" style="margin-top:28px;">Поки публікацій немає — але незабаром з'являться! 🚀</p>
  <?php endif; ?>
</section>

<!-- ═══════════════════════════ CTA ═══════════════════════════ -->
<div class="container" style="padding-bottom:60px;">
  <div class="bl-cta-box fp-r">
    <div class="bl-cta-left">
      <h2 class="bl-cta-title">Хочете дізнаватися про нові статті першими?</h2>
      <p class="bl-cta-text">Підпишіться на наш Telegram-канал — там тільки корисне: огляди, знижки та поради без спаму.</p>
    </div>
    <div class="bl-cta-right">
      <a class="btn" href="https://t.me/disstore" target="_blank" rel="noopener">Telegram-канал</a>
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