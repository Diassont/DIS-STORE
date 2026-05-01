<?php get_header(); ?>

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
    $compare_list = YITH_WooCompare_Products_List::instance();
    $in_compare   = $compare_list->has($product_id);
  }
?>

<section class="container section">

  <nav style="margin-bottom:24px;">
    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
       class="btn btn-outline" style="width:fit-content;">
      ← Назад до каталогу
    </a>
  </nav>

  <div class="product-page">

    <!-- Фото -->
    <div class="product-gallery">
      <?php
        $image_id  = $product->get_image_id();
        $image_url = wp_get_attachment_image_url($image_id, 'large');
      ?>
      <?php if ($image_url): ?>
        <img src="<?php echo esc_url($image_url); ?>"
             alt="<?php echo esc_attr(get_the_title()); ?>">
      <?php endif; ?>
    </div>

    <!-- Інфо -->
    <div class="product-info">

      <h1 class="page-title"><?php the_title(); ?></h1>

      <div class="product-price">
        <?php echo $product->get_price_html(); ?>
      </div>

      <div class="muted" style="margin-top:6px;">
        <?php echo $product->is_in_stock()
          ? '✓ В наявності • відправка 1–2 дні'
          : '✗ Немає в наявності'; ?>
      </div>

      <?php if (get_the_excerpt()): ?>
        <p class="product-excerpt muted">
          <?php the_excerpt(); ?>
        </p>
      <?php endif; ?>

      <div class="product-desc">
        <?php the_content(); ?>
      </div>

      <!-- Обране + Порівняння -->
      <div class="single-actions">

        <button
          class="single-action-btn wishlist-btn <?php echo $in_wishlist ? 'is-active' : ''; ?>"
          data-product-id="<?php echo $product_id; ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
          </svg>
          <span><?php echo $in_wishlist ? 'В обраному' : 'В обране'; ?></span>
        </button>

        <button
          class="single-action-btn compare-btn <?php echo $in_compare ? 'is-active' : ''; ?>"
          data-product-id="<?php echo $product_id; ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="18" y1="20" x2="18" y2="10"/>
            <line x1="12" y1="20" x2="12" y2="4"/>
            <line x1="6" y1="20" x2="6" y2="14"/>
          </svg>
          <span><?php echo $in_compare ? 'В порівнянні' : 'Порівняти'; ?></span>
        </button>

      </div>

      <!-- Кошик -->
      <div class="product-cart-btn">
        <?php woocommerce_template_single_add_to_cart(); ?>
      </div>

    </div>

  </div>

</section>

<?php endwhile; ?>

<?php get_footer(); ?>
