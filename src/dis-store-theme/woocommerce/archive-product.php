<?php get_header(); ?>

<!-- ======================================
     Каталог: градієнт як на головній
     ====================================== -->
<div class="catalog-hero-gradient"></div>

<section class="container section" style="padding-top:32px;">

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

  <!-- Категорії -->
  <div class="cat-tabs">
    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
       class="cat-tab <?php echo is_shop() && !is_product_category() ? 'active' : ''; ?>">
      Всі товари
    </a>
    <?php
      $terms = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => true, 'parent' => 0, 'orderby' => 'menu_order', 'order' => 'ASC']);
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
        <?php
          $product_id  = get_the_ID();

          // Wishlist
          $in_wishlist = false;
          if (function_exists('yith_wcwl_wishlists')) {
            $in_wishlist = yith_wcwl_wishlists()->is_product_in_wishlist($product_id);
          }

          // Compare
          $in_compare = false;
          if (class_exists('YITH_WooCompare_Products_List')) {
            $in_compare = YITH_WooCompare_Products_List::instance()->has($product_id);
          }

          // Кастомні лейбли (ACF або custom field)
          $labels = get_post_meta($product_id, '_dis_labels', true);
          if (is_string($labels)) {
            $labels = array_filter(array_map('trim', explode(',', $labels)));
          }
          if (!is_array($labels)) $labels = [];

          // Кольори лейблів
          $label_colors = [
            'ТОП'    => 'label-top',
            'Top'    => 'label-top',
            'Хіт'    => 'label-hit',
            'Hit'    => 'label-hit',
            'Новинка'=> 'label-new',
            'New'    => 'label-new',
          ];
          // Решта (Gaming, Pro, тощо) — дефолтний стиль
        ?>

        <!-- Вся картка клікабельна через JS -->
        <article class="p-card p-card-clickable"
                 data-product-id="<?php echo $product_id; ?>"
                 data-href="<?php the_permalink(); ?>">

          <div class="p-imgwrap">
            <a href="<?php the_permalink(); ?>" class="p-img-link" tabindex="-1">
              <?php echo woocommerce_get_product_thumbnail('medium'); ?>
            </a>

            <!-- Лейбли на фото -->
            <?php if (!empty($labels)): ?>
            <div class="p-labels">
              <?php foreach ($labels as $lbl): ?>
                <?php
                  $cls = '';
                  foreach ($label_colors as $key => $color) {
                    if (mb_strtolower($lbl) === mb_strtolower($key)) { $cls = $color; break; }
                  }
                  if (!$cls) $cls = 'label-tag';
                ?>
                <span class="p-label <?php echo esc_attr($cls); ?>"><?php echo esc_html($lbl); ?></span>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div class="p-hover-actions">
              <!-- Wishlist -->
              <button
                class="p-action-btn wishlist-btn <?php echo $in_wishlist ? 'is-active' : ''; ?>"
                data-product-id="<?php echo $product_id; ?>"
                aria-label="<?php echo $in_wishlist ? 'В обраному' : 'В обране'; ?>"
                title="<?php echo $in_wishlist ? 'В обраному' : 'В обране'; ?>"
                type="button">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                </svg>
              </button>

              <!-- Compare -->
              <?php if (class_exists('YITH_WooCompare_Frontend')): ?>
                <?php YITH_WooCompare_Frontend::instance()->output_button($product_id); ?>
              <?php else: ?>
                <button
                  class="p-action-btn compare-btn <?php echo $in_compare ? 'is-active' : ''; ?>"
                  data-product-id="<?php echo $product_id; ?>"
                  type="button">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="20" x2="18" y2="10"/>
                    <line x1="12" y1="20" x2="12" y2="4"/>
                    <line x1="6" y1="20" x2="6" y2="14"/>
                  </svg>
                </button>
              <?php endif; ?>
            </div>
          </div>

          <div class="p-body">
            <h3 class="p-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>

            <p class="p-desc">
              <?php echo wp_trim_words(get_the_excerpt(), 12); ?>
            </p>

            <!-- Бейджики статусу — тільки знижка, наявність під ціною -->
            <div class="p-meta p-meta-fixed">
              <?php if ($product->is_on_sale()): ?>
                <span class="pill pill-sale">Знижка</span>
              <?php else: ?>
                <span class="p-meta-placeholder"></span>
              <?php endif; ?>
            </div>

            <!-- Ціна + кнопка -->
            <div class="p-bottom">
              <div class="p-price">
                <div class="price"><?php echo $product->get_price_html(); ?></div>
                <div class="p-stock-text <?php echo $product->is_in_stock() ? 'p-stock-in' : 'p-stock-out'; ?>">
                <?php echo $product->is_in_stock() ? 'В наявності' : 'Немає'; ?>
              </div>
              </div>

              <?php if ($product->is_in_stock() && $product->is_type('simple')): ?>
                <!-- Кнопка "Купити" — додає в кошик через AJAX WooCommerce -->
                <a href="?add-to-cart=<?php echo $product_id; ?>"
                   class="btn p-cart-btn ajax_add_to_cart add_to_cart_button"
                   data-product_id="<?php echo $product_id; ?>"
                   data-quantity="1"
                   rel="nofollow"
                   onclick="event.stopPropagation();">
                  Купити
                </a>
              <?php else: ?>
                <a href="<?php the_permalink(); ?>"
                   class="btn btn-outline p-cart-btn"
                   onclick="event.stopPropagation();">
                  Детальніше
                </a>
              <?php endif; ?>
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

<script>
// Вся картка клікабельна (крім кнопок)
document.querySelectorAll('.p-card-clickable').forEach(function(card) {
  card.addEventListener('click', function(e) {
    // Не переходимо якщо клік по кнопці / посиланню
    if (e.target.closest('a, button')) return;
    var href = card.dataset.href;
    if (href) window.location.href = href;
  });
  card.style.cursor = 'pointer';
});
</script>

<?php get_footer(); ?>