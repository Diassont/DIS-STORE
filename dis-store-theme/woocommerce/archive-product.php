<?php get_header(); ?>

<section class="container section">

  <div class="section-head">
    <div>
      <h1 class="page-title" style="margin-bottom:8px;">
        <?php woocommerce_page_title(); ?>
      </h1>
      <p class="muted" style="margin:0;">
        Оберіть категорію або перегляньте товари.
      </p>
    </div>
    <a class="head-link" href="<?php echo esc_url(home_url('/contacts')); ?>">
      Підібрати під бюджет <span class="arr">→</span>
    </a>
  </div>

  <!-- Категорії горизонтально -->
  <div class="cat-tabs">
    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
       class="cat-tab <?php echo is_shop() && !is_product_category() ? 'active' : ''; ?>">
      Всі товари
    </a>
    <?php
      $terms = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => 0,
        'exclude'    => get_option('default_product_cat'),
      ]);
      $current_id = is_product_category() ? get_queried_object()->term_id : 0;
    ?>
    <?php foreach ($terms as $term): ?>
      <a href="<?php echo esc_url(get_term_link($term)); ?>"
         class="cat-tab <?php echo $term->term_id === $current_id ? 'active' : ''; ?>">
        <?php echo esc_html($term->name); ?>
      </a>
    <?php endforeach; ?>
  </div>

  <!-- Фільтр -->
  <div class="filter-bar">
    <input class="filter-input" type="text" id="filterSearch" placeholder="Пошук товару...">
    <input class="filter-input" type="number" id="filterPriceMin" placeholder="Ціна від">
    <input class="filter-input" type="number" id="filterPriceMax" placeholder="Ціна до">
    <select class="filter-select" id="filterSort">
      <option value="">Сортування</option>
      <option value="price_asc">Ціна: дешевше</option>
      <option value="price_desc">Ціна: дорожче</option>
      <option value="name_asc">Назва А-Я</option>
      <option value="name_desc">Назва Я-А</option>
    </select>
    <button class="btn btn-outline" id="filterReset">Скинути</button>
  </div>

  <!-- Товари -->
  <div class="product-grid">
    <?php if (have_posts()): ?>
      <?php while (have_posts()): the_post(); global $product; ?>
        <article class="p-card">

          <a href="<?php the_permalink(); ?>" class="p-imgwrap">
            <?php echo woocommerce_get_product_thumbnail('medium'); ?>
          </a>

          <div class="p-body">
            <h3 class="p-title">
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h3>

            <p class="p-desc">
              <?php echo wp_trim_words(get_the_excerpt(), 12); ?>
            </p>

            <div class="p-meta">
              <?php if ($product->is_on_sale()): ?>
                <span class="pill">Знижка</span>
              <?php endif; ?>
              <?php if ($product->is_in_stock()): ?>
                <span class="pill pill-outline">В наявності</span>
              <?php else: ?>
                <span class="pill pill-outline" style="opacity:.5;">Немає</span>
              <?php endif; ?>
            </div>

            <div class="p-bottom">
              <div class="p-price">
                <div class="price"><?php echo $product->get_price_html(); ?></div>
                <div class="muted">
                  <?php echo $product->is_in_stock() ? 'в наявності' : 'немає'; ?>
                </div>
              </div>
              <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                Детальніше
              </a>
            </div>
          </div>

        </article>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="muted" style="grid-column:1/-1;">Товарів поки немає.</p>
    <?php endif; ?>
  </div>

  <div style="margin-top:24px;">
    <?php woocommerce_pagination(); ?>
  </div>

</section>

<?php get_footer(); ?>