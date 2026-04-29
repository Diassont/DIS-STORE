<?php get_header(); ?>

<?php while (have_posts()): the_post(); global $product; ?>

<section class="container section">

  <!-- Назад до каталогу -->
  <nav style="margin-bottom:24px;">
    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-outline" style="width:fit-content;">
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
             alt="<?php echo esc_attr(get_the_title()); ?>"
             style="width:100%; border-radius:16px; border:1px solid var(--border);">
      <?php endif; ?>
    </div>

    <!-- Інфо -->
    <div class="product-info">

      <h1 class="page-title"><?php the_title(); ?></h1>

      <div class="product-price">
        <?php echo $product->get_price_html(); ?>
      </div>

      <div class="muted" style="margin-top:6px;">
        <?php echo $product->is_in_stock() ? '✓ В наявності • відправка 1–2 дні' : '✗ Немає в наявності'; ?>
      </div>

      <?php if (get_the_excerpt()): ?>
        <p class="product-excerpt muted">
          <?php the_excerpt(); ?>
        </p>
      <?php endif; ?>

      <div class="product-desc">
        <?php the_content(); ?>
      </div>

      <!-- Кнопка додати в кошик -->
      <div class="product-cart-btn">
        <?php woocommerce_template_single_add_to_cart(); ?>
      </div>

    </div>

  </div>

</section>

<?php endwhile; ?>

<?php get_footer(); ?>