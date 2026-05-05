<?php
/**
 * My Account Page — DIS Store custom template
 */
defined('ABSPATH') || exit;

do_action('woocommerce_before_account_navigation');
?>

<?php get_header(); ?>

<section class="container section">

  <div class="account-layout">

    <!-- ============================
         Sidebar навігація
         ============================ -->
    <aside class="account-sidebar">

      <?php if (is_user_logged_in()): ?>
        <?php $user = wp_get_current_user(); ?>
        <div class="account-user-card">
          <div class="account-avatar">
            <?php echo get_avatar($user->ID, 64, '', '', ['class' => 'account-avatar-img']); ?>
          </div>
          <div class="account-user-info">
            <div class="account-user-name"><?php echo esc_html($user->display_name); ?></div>
            <div class="account-user-email muted"><?php echo esc_html($user->user_email); ?></div>
          </div>
        </div>
      <?php endif; ?>

      <nav class="account-nav">
        <?php foreach (wc_get_account_menu_items() as $endpoint => $label): ?>
          <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"
             class="account-nav-item <?php echo wc_is_current_account_menu_item($endpoint) ? 'is-active' : ''; ?>">

            <span class="account-nav-icon">
              <?php echo dis_account_icon($endpoint); ?>
            </span>
            <?php echo esc_html($label); ?>

            <?php if ($endpoint === 'orders'): ?>
              <?php $count = wc_get_customer_order_count(get_current_user_id()); ?>
              <?php if ($count > 0): ?>
                <span class="account-nav-badge"><?php echo $count; ?></span>
              <?php endif; ?>
            <?php endif; ?>
          </a>
        <?php endforeach; ?>
      </nav>

    </aside>

    <!-- ============================
         Основний контент
         ============================ -->
    <div class="account-content">
      <?php
        do_action('woocommerce_before_account_content');
      ?>

      <div class="woocommerce">
        <?php woocommerce_output_all_notices(); ?>
        <?php do_action('woocommerce_account_content'); ?>
      </div>

      <?php do_action('woocommerce_after_account_content'); ?>
    </div>

  </div>

</section>

<?php get_footer(); ?>

<?php
// SVG-іконки для пунктів меню
function dis_account_icon($endpoint) {
  $icons = [
    'dashboard' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>',
    'orders'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
    'downloads' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>',
    'edit-address' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
    'edit-account' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
    'customer-logout' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>',
    'payment-methods' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>',
  ];
  return $icons[$endpoint] ?? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="4"/></svg>';
}
?>
