<?php get_header(); ?>

<section class="section hero" style="padding-top:16px;">
  <div class="container">

    <div class="section-head">
      <div>
        <h1 class="page-title" style="margin-bottom:6px;">
          Результати пошуку: “<?php echo esc_html(get_search_query()); ?>”
        </h1>
        <p class="muted" style="margin:0;">
          Знайдено: <?php echo intval($wp_query->found_posts); ?>
        </p>
      </div>

      <a class="head-link" href="<?php echo esc_url(home_url('/catalog/')); ?>">
        Весь каталог <span class="arr">→</span>
      </a>
    </div>

    <div style="margin-top:14px;">
      <form class="header-search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input class="search-input" type="search" name="s" placeholder="Пошук..." value="<?php echo esc_attr(get_search_query()); ?>">
      </form>
    </div>

    <div style="margin-top:14px;">
      <?php if (have_posts()): ?>

        <?php
          $has_products = false;
          foreach ($wp_query->posts as $p) {
            if ($p->post_type === 'product') { $has_products = true; break; }
          }
        ?>

        <?php if ($has_products): ?>
          <div class="product-grid">
            <?php while (have_posts()): the_post(); ?>
              <?php if (get_post_type() !== 'product') continue; ?>

              <?php
                $product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : null;

                $price_html = $product ? $product->get_price_html() : '';
                $img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                if (!$img_url) $img_url = get_template_directory_uri() . '/assets/img/placeholder.png';
              ?>

              <article class="p-card">
                <div class="p-imgwrap">
                  <img class="p-img" src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                </div>

                <div class="p-body">
                  <h3 class="p-title"><?php the_title(); ?></h3>

                  <p class="p-desc">
                    <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                  </p>

                  <div class="p-bottom">
                    <div class="p-price">
                      <div class="price"><?php echo $price_html ? $price_html : '<span class="muted">Ціна уточнюється</span>'; ?></div>
                    </div>

                    <a class="btn btn-outline" href="<?php the_permalink(); ?>">
                      Детальніше
                    </a>
                  </div>
                </div>
              </article>

            <?php endwhile; ?>
          </div>

        <?php else: ?>
          <div class="grid">
            <?php while (have_posts()): the_post(); ?>
              <a class="card" href="<?php the_permalink(); ?>">
                <strong><?php the_title(); ?></strong>
                <div class="muted" style="margin-top:8px;">
                  <?php echo wp_trim_words(get_the_excerpt(), 22); ?>
                </div>
              </a>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>

        <div style="margin-top:18px;">
          <?php the_posts_pagination(); ?>
        </div>

      <?php else: ?>
        <p class="muted" style="margin-top:14px;">Нічого не знайдено. Спробуй інший запит.</p>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php get_footer(); ?>
