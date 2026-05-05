<?php
/**
 * Cart totals — DIS Store custom template
 * @version 2.3.6
 */
defined('ABSPATH') || exit;
?>

<div class="cart_totals dis-cart-totals <?php echo WC()->customer->has_calculated_shipping() ? 'calculated_shipping' : ''; ?>">

  <?php do_action('woocommerce_before_cart_totals'); ?>

  <div class="cart-totals-title">Підсумок замовлення</div>

  <div class="cart-totals-table">

    <!-- Підсумок -->
    <div class="cart-totals-row">
      <span>Підсумок</span>
      <span><?php wc_cart_totals_subtotal_html(); ?></span>
    </div>

    <!-- Купони -->
    <?php foreach (WC()->cart->get_coupons() as $code => $coupon): ?>
      <div class="cart-totals-row cart-totals-discount">
        <span><?php wc_cart_totals_coupon_label($coupon); ?></span>
        <span class="cart-totals-discount-val"><?php wc_cart_totals_coupon_html($coupon); ?></span>
      </div>
    <?php endforeach; ?>

    <!-- Доставка -->
    <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()): ?>
      <?php do_action('woocommerce_cart_totals_before_shipping'); ?>
      <?php wc_cart_totals_shipping_html(); ?>
      <?php do_action('woocommerce_cart_totals_after_shipping'); ?>
    <?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')): ?>
      <div class="cart-totals-row">
        <span>Доставка</span>
        <span><?php woocommerce_shipping_calculator(); ?></span>
      </div>
    <?php endif; ?>

    <!-- Збори -->
    <?php foreach (WC()->cart->get_fees() as $fee): ?>
      <div class="cart-totals-row">
        <span><?php echo esc_html($fee->name); ?></span>
        <span><?php wc_cart_totals_fee_html($fee); ?></span>
      </div>
    <?php endforeach; ?>

    <!-- Податки -->
    <?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()):
      $taxable_address = WC()->customer->get_taxable_address();
      $estimated_text  = '';
      if (WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()) {
        $estimated_text = sprintf(' <small>(%s)</small>', WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]]);
      }
      if ('itemized' === get_option('woocommerce_tax_total_display')) {
        foreach (WC()->cart->get_tax_totals() as $code => $tax): ?>
          <div class="cart-totals-row">
            <span><?php echo esc_html($tax->label) . $estimated_text; ?></span>
            <span><?php echo wp_kses_post($tax->formatted_amount); ?></span>
          </div>
        <?php endforeach;
      } else: ?>
        <div class="cart-totals-row">
          <span><?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; ?></span>
          <span><?php wc_cart_totals_taxes_total_html(); ?></span>
        </div>
      <?php endif;
    endif; ?>

    <?php do_action('woocommerce_cart_totals_before_order_total'); ?>

    <!-- Разом -->
    <div class="cart-totals-row cart-totals-total">
      <span>Разом</span>
      <span><?php wc_cart_totals_order_total_html(); ?></span>
    </div>

    <?php do_action('woocommerce_cart_totals_after_order_total'); ?>

  </div>

  <!-- Кнопка оформлення -->
  <div class="wc-proceed-to-checkout">
    <?php do_action('woocommerce_proceed_to_checkout'); ?>
  </div>

  <!-- Безпека -->
  <div class="cart-trust-row">
    <span class="cart-trust-item">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
        <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
      </svg>
      Безпечна оплата
    </span>
    <span class="cart-trust-item">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
        <path d="M5 12h14"/><path d="M12 5l7 7-7 7"/>
      </svg>
      Швидка доставка
    </span>
  </div>

  <?php do_action('woocommerce_after_cart_totals'); ?>

</div>
