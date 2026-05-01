<?php
/**
 * Cart Page — DIS Store custom template
 * @package WooCommerce\Templates
 * @version 10.1.0
 */
defined('ABSPATH') || exit;
do_action('woocommerce_before_cart');
?>

<?php get_header(); ?>

<section class="container section">

  <div class="cart-page-head">
    <h1 class="page-title">Кошик</h1>
    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-outline">
      ← Продовжити покупки
    </a>
  </div>

  <?php if (WC()->cart->is_empty()): ?>

    <div class="cart-empty-state">
      <div class="cart-empty-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
        </svg>
      </div>
      <p class="cart-empty-text">Ваш кошик порожній</p>
      <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn">
        До каталогу
      </a>
    </div>

  <?php else: ?>

    <div class="cart-layout">

      <!-- ========== Ліва колонка: товари ========== -->
      <div class="cart-items-col">

        <?php woocommerce_output_all_notices(); ?>

        <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
          <?php do_action('woocommerce_before_cart_table'); ?>

          <div class="cart-items-list">

            <!-- Заголовок -->
            <div class="cart-items-header">
              <span>Товар</span>
              <span class="cart-col-price">Ціна</span>
              <span class="cart-col-qty">Кількість</span>
              <span class="cart-col-sub">Сума</span>
              <span class="cart-col-rm"></span>
            </div>

            <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item):
              $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
              $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
              $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);

              if (!$_product || !$_product->exists() || $cart_item['quantity'] <= 0) continue;
              if (!apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) continue;

              $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
              $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image('woocommerce_thumbnail'), $cart_item, $cart_item_key);
            ?>

            <div class="cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>"
                 data-cart-item="<?php echo esc_attr($cart_item_key); ?>">

              <!-- Фото -->
              <div class="cart-item-img">
                <?php if ($product_permalink): ?>
                  <a href="<?php echo esc_url($product_permalink); ?>"><?php echo $thumbnail; ?></a>
                <?php else: ?>
                  <?php echo $thumbnail; ?>
                <?php endif; ?>
              </div>

              <!-- Назва + мета -->
              <div class="cart-item-info">
                <a class="cart-item-name" href="<?php echo esc_url($product_permalink ?: '#'); ?>">
                  <?php echo wp_kses_post($product_name); ?>
                </a>
                <?php echo wc_get_formatted_cart_item_data($cart_item); ?>
                <?php if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])): ?>
                  <p class="cart-item-backorder muted">Під замовлення</p>
                <?php endif; ?>
              </div>

              <!-- Ціна за од. -->
              <div class="cart-col-price cart-item-price">
                <?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
              </div>

              <!-- Кількість -->
              <div class="cart-col-qty cart-item-qty">
                <?php
                  if ($_product->is_sold_individually()) {
                    $min_qty = $max_qty = 1;
                  } else {
                    $min_qty = 0;
                    $max_qty = $_product->get_max_purchase_quantity();
                  }
                  $product_quantity = woocommerce_quantity_input([
                    'input_name'   => "cart[{$cart_item_key}][qty]",
                    'input_value'  => $cart_item['quantity'],
                    'max_value'    => $max_qty,
                    'min_value'    => $min_qty,
                    'product_name' => $product_name,
                  ], $_product, false);
                  echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                ?>
              </div>

              <!-- Сума -->
              <div class="cart-col-sub cart-item-subtotal">
                <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
              </div>

              <!-- Видалити -->
              <div class="cart-col-rm">
                <?php echo apply_filters('woocommerce_cart_item_remove_link',
                  sprintf('<a role="button" href="%s" class="cart-remove-btn" aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg></a>',
                    esc_url(wc_get_cart_remove_url($cart_item_key)),
                    esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
                    esc_attr($product_id),
                    esc_attr($_product->get_sku())
                  ),
                  $cart_item_key
                ); ?>
              </div>

            </div>

            <?php endforeach; ?>

            <?php do_action('woocommerce_cart_contents'); ?>

          </div>

          <!-- Дії: купон + оновити -->
          <div class="cart-actions-row">
            <?php if (wc_coupons_enabled()): ?>
              <div class="cart-coupon">
                <input type="text" name="coupon_code" class="cart-coupon-input" id="coupon_code" value=""
                       placeholder="Промокод">
                <button type="submit" class="btn btn-outline" name="apply_coupon"
                        value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>">
                  Застосувати
                </button>
                <?php do_action('woocommerce_cart_coupon'); ?>
              </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-outline cart-update-btn" name="update_cart"
                    value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                <polyline points="1 4 1 10 7 10"/><polyline points="23 20 23 14 17 14"/>
                <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"/>
              </svg>
              Оновити кошик
            </button>

            <?php do_action('woocommerce_cart_actions'); ?>
            <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
          </div>

          <?php do_action('woocommerce_after_cart_table'); ?>
        </form>

      </div>

      <!-- ========== Права колонка: підсумок ========== -->
      <div class="cart-totals-col">
        <?php do_action('woocommerce_before_cart_collaterals'); ?>
        <?php do_action('woocommerce_cart_collaterals'); ?>
      </div>

    </div>

  <?php endif; ?>

</section>

<?php do_action('woocommerce_after_cart'); ?>
<?php get_footer(); ?>
