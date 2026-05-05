<?php
/**
 * My Account Dashboard — DIS Store
 */
defined('ABSPATH') || exit;

$user_id   = get_current_user_id();
$user      = wp_get_current_user();
$order_count = wc_get_customer_order_count($user_id);

// Останнє замовлення
$last_orders = wc_get_orders(['customer' => $user_id, 'limit' => 1, 'orderby' => 'date', 'order' => 'DESC']);
$last_order  = !empty($last_orders) ? $last_orders[0] : null;
?>

<div class="account-dashboard">

  <!-- Привітання -->
  <div class="account-welcome">
    <h1 class="account-welcome-title">
      Вітаємо, <?php echo esc_html($user->display_name); ?>! 👋
    </h1>
    <p class="muted">Керуйте своїм акаунтом, замовленнями та адресами.</p>
  </div>

  <!-- Статистика -->
  <div class="account-stats">

    <div class="account-stat-card">
      <div class="account-stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
          <polyline points="14 2 14 8 20 8"/>
          <line x1="16" y1="13" x2="8" y2="13"/>
          <line x1="16" y1="17" x2="8" y2="17"/>
        </svg>
      </div>
      <div class="account-stat-value"><?php echo $order_count; ?></div>
      <div class="account-stat-label muted">Замовлень</div>
    </div>

    <?php
      $wishlist_count = 0;
      if (function_exists('yith_wcwl_wishlists')) {
        $wishlist_count = yith_wcwl_wishlists()->count_items_in_wishlist();
      }
    ?>
    <div class="account-stat-card">
      <div class="account-stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
        </svg>
      </div>
      <div class="account-stat-value"><?php echo $wishlist_count; ?></div>
      <div class="account-stat-label muted">В обраному</div>
    </div>

    <div class="account-stat-card">
      <div class="account-stat-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
          <circle cx="12" cy="7" r="4"/>
        </svg>
      </div>
      <div class="account-stat-value" style="font-size:15px;line-height:1.3;"><?php echo esc_html($user->user_email); ?></div>
      <div class="account-stat-label muted">Пошта</div>
    </div>

  </div>

  <!-- Останнє замовлення -->
  <?php if ($last_order): ?>
    <div class="account-last-order">
      <div class="account-section-title">Останнє замовлення</div>
      <div class="account-order-row">
        <div class="account-order-meta">
          <span class="account-order-num">№<?php echo $last_order->get_order_number(); ?></span>
          <span class="muted"><?php echo wc_format_datetime($last_order->get_date_created()); ?></span>
        </div>
        <span class="account-order-status status-<?php echo esc_attr($last_order->get_status()); ?>">
          <?php echo wc_get_order_status_name($last_order->get_status()); ?>
        </span>
        <div class="account-order-total">
          <?php echo $last_order->get_formatted_order_total(); ?>
        </div>
        <a href="<?php echo esc_url($last_order->get_view_order_url()); ?>" class="btn btn-outline" style="flex-shrink:0;">
          Деталі
        </a>
      </div>
    </div>
  <?php endif; ?>

  <!-- Швидкі дії -->
  <div class="account-section-title">Швидкі дії</div>
  <div class="account-quick-links">
    <a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>" class="account-quick-card">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
        <polyline points="14 2 14 8 20 8"/>
      </svg>
      <span>Мої замовлення</span>
    </a>
    <a href="<?php echo esc_url(wc_get_account_endpoint_url('edit-address')); ?>" class="account-quick-card">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
        <circle cx="12" cy="10" r="3"/>
      </svg>
      <span>Мої адреси</span>
    </a>
    <a href="<?php echo esc_url(wc_get_account_endpoint_url('edit-account')); ?>" class="account-quick-card">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
        <circle cx="12" cy="7" r="4"/>
      </svg>
      <span>Особисті дані</span>
    </a>
    <?php if (function_exists('YITH_WCWL')): ?>
      <a href="<?php echo esc_url(function_exists('yith_wcwl_get_wishlist_url') ? yith_wcwl_get_wishlist_url() : home_url('/wishlist/')); ?>" class="account-quick-card">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
        </svg>
        <span>Обране</span>
      </a>
    <?php endif; ?>
    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="account-quick-card">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
      </svg>
      <span>До каталогу</span>
    </a>
  </div>

</div>
