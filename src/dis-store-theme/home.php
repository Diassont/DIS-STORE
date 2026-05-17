<?php get_header(); ?>
<?php
wp_enqueue_style(
    'dis-page-home',
    get_template_directory_uri() . '/assets/css/home.css',
    ['dis-main'],
    wp_get_theme()->get('Version')
);
?>


<?php
/* ============================================================
   HOME.PHP — DIS STORE
   Сторінка записів блогу (Loop page).
   Використовується коли в налаштуваннях WP обрано
   "Сторінка записів" = ця сторінка.
   ============================================================ */
?>

<!-- ═══════════════════════════ HERO ═══════════════════════════ -->
<section class="hm-hero">
  <div class="container hm-hero-inner">
    <div>
      <div class="hm-hero-badge">
        <span class="hm-badge-dot"></span>
        Корисні матеріали
      </div>
      <h1 class="hm-hero-title">Блог DIS Store</h1>
      <p class="hm-hero-sub">Огляди, поради та новини про техніку. Допомагаємо обрати найкраще — чесно та без реклами.</p>
    </div>
    <div class="hm-hero-icon-box">
      <svg viewBox="0 0 24 24">
        <path d="M12 20h9"/>
        <path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
      </svg>
    </div>
  </div>
</section>

<!-- ═══════════════════════════ FILTER BAR (Categories) ═══════════════════════════ -->
<div class="hm-filter-bar">
  <div class="container">
    <div class="hm-filter-inner">
      <a class="hm-filter-btn <?php echo !is_category() ? 'active' : ''; ?>"
         href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Всі</a>
      <?php
      $cats = get_categories(['hide_empty' => true, 'number' => 8]);
      foreach ($cats as $cat):
      ?>
        <a class="hm-filter-btn <?php echo is_category($cat->term_id) ? 'active' : ''; ?>"
           href="<?php echo get_category_link($cat->term_id); ?>">
          <?php echo esc_html($cat->name); ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- ═══════════════════════════ MAIN LAYOUT ═══════════════════════════ -->
<div class="container">
  <div class="hm-layout">

    <!-- ── POSTS ── -->
    <main>
      <?php if (have_posts()): ?>

        <div class="hm-posts-grid">
          <?php
          $is_first = true;
          while (have_posts()): the_post();
            $cats      = get_the_category();
            $cat_label = $cats ? esc_html($cats[0]->name) : '';
          ?>
          <a class="hm-post-card fp-r <?php echo $is_first ? 'featured' : ''; ?>"
             href="<?php the_permalink(); ?>">
            <div class="hm-post-thumb">
              <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('medium_large'); ?>
              <?php else: ?>
                <svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
              <?php endif; ?>
            </div>
            <div class="hm-post-body">
              <?php if ($cat_label): ?>
                <span class="hm-post-tag"><?php echo $cat_label; ?></span>
              <?php endif; ?>
              <div class="hm-post-title"><?php the_title(); ?></div>
              <div class="hm-post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), $is_first ? 28 : 18); ?></div>
              <div class="hm-post-meta">
                <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <?php echo get_the_date('d.m.Y'); ?>
                <?php if ($is_first): ?>
                  &nbsp;·&nbsp;
                  <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                  <?php the_author(); ?>
                <?php endif; ?>
              </div>
            </div>
          </a>
          <?php $is_first = false; endwhile; ?>
        </div>

        <!-- Pagination -->
        <nav class="hm-pagination">
          <?php
          echo paginate_links([
            'type'      => 'list',
            'prev_text' => '← Назад',
            'next_text' => 'Далі →',
          ]);
          // paginate_links повертає <ul> — можна кастомізувати через walker або CSS
          ?>
        </nav>

      <?php else: ?>
        <div class="hm-posts-grid">
          <div class="hm-empty fp-r">
            <div class="hm-empty-icon">
              <svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
            </div>
            <div class="hm-empty-title">Поки публікацій немає</div>
            <p class="hm-empty-text">Але ми вже готуємо матеріали! Перевірте згодом або перегляньте наш каталог.</p>
            <a class="btn" href="/shop/">До каталогу →</a>
          </div>
        </div>
      <?php endif; ?>
    </main>

    <!-- ── SIDEBAR ── -->
    <aside class="hm-sidebar">

      <!-- Search -->
      <div class="hm-widget fp-r">
        <div class="hm-widget-title">Пошук</div>
        <form class="hm-search-wrap" role="search" method="get" action="<?php echo home_url('/'); ?>">
          <input class="hm-search-input" type="search" placeholder="Знайти статтю…"
                 name="s" value="<?php echo get_search_query(); ?>">
          <button class="hm-search-btn" type="submit" aria-label="Пошук">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
          </button>
        </form>
      </div>

      <!-- Categories -->
      <div class="hm-widget fp-r fp-d1">
        <div class="hm-widget-title">Категорії</div>
        <div class="hm-cat-list">
          <?php
          $all_cats = get_categories(['hide_empty' => true]);
          foreach ($all_cats as $cat):
          ?>
            <a class="hm-cat-item" href="<?php echo get_category_link($cat->term_id); ?>">
              <?php echo esc_html($cat->name); ?>
              <span><?php echo $cat->count; ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Recent posts -->
      <div class="hm-widget fp-r fp-d2">
        <div class="hm-widget-title">Останні статті</div>
        <div class="hm-recent-list">
          <?php
          $recent = new WP_Query(['posts_per_page' => 4, 'post_status' => 'publish',
                                  'post__not_in'   => [get_the_ID()]]);
          while ($recent->have_posts()): $recent->the_post();
          ?>
            <a class="hm-recent-item" href="<?php the_permalink(); ?>">
              <div class="hm-recent-thumb">
                <?php if (has_post_thumbnail()): the_post_thumbnail('thumbnail');
                else: ?>
                  <svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                <?php endif; ?>
              </div>
              <div class="hm-recent-info">
                <div class="hm-recent-title"><?php the_title(); ?></div>
                <div class="hm-recent-date"><?php echo get_the_date('d.m.Y'); ?></div>
              </div>
            </a>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>

      <!-- Promo widget -->
      <div class="hm-widget fp-r fp-d3" style="border-color:rgba(255,106,0,.22);background:radial-gradient(300px 200px at 50% 0%,rgba(255,106,0,.08),transparent),linear-gradient(160deg,rgba(255,255,255,.06),rgba(255,255,255,.02));">
        <div class="hm-widget-title">Telegram-канал</div>
        <p style="font-size:13px;color:var(--muted);line-height:1.65;margin:0 0 14px;">
          Акції, огляди та знижки — першими дізнаються підписники.
        </p>
        <a class="btn" href="https://t.me/disstore" target="_blank" rel="noopener"
           style="width:100%;justify-content:center;font-size:13px;">
          Підписатися →
        </a>
      </div>

    </aside>
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