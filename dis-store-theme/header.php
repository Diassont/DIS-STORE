<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
  $logo        = get_field('header_logo', 'option');
  $is_logged   = is_user_logged_in();
  $user_name   = $is_logged ? wp_get_current_user()->display_name : '';
  $account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
  $cart_url    = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
  $cart_count  = function_exists('WC') ? WC()->cart->get_cart_contents_count() : 0;

  // Обране
  $wishlist_count    = 0;
  $wishlist_page_url = home_url('/wishlist/');
  if (function_exists('YITH_WCWL')) {
    $wishlist_count = YITH_WCWL()->count_products();
  }
  if (function_exists('yith_wcwl_get_wishlist_url')) {
    $wishlist_page_url = yith_wcwl_get_wishlist_url();
  }

  // Порівняння
  $compare_page_url = home_url('/compare/');
  if (function_exists('yith_woocompare_get_compare_url')) {
    $compare_page_url = yith_woocompare_get_compare_url();
  }
  $compare_count = 0;
  if (class_exists('YITH_WooCompare_Products_List')) {
    $compare_count = YITH_WooCompare_Products_List::instance()->count();
  }
?>

<header class="site-header">
  <div class="header-shell">

    <!-- LOGO -->
    <div class="header-logo-outside">
      <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
        <?php if (!empty($logo) && !empty($logo['url'])): ?>
          <img src="<?php echo esc_url($logo['url']); ?>"
               alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
        <?php else: ?>
          DIS<span>STORE</span>
        <?php endif; ?>
      </a>
    </div>

    <!-- NAV -->
    <div class="header-center">
      <nav class="main-nav desktop-nav" aria-label="Головне меню">
        <?php wp_nav_menu([
          'theme_location' => 'header_menu',
          'container'      => false,
          'menu_class'     => 'menu',
          'fallback_cb'    => false,
        ]); ?>
      </nav>
    </div>

    <!-- ACTIONS -->
    <div class="header-actions-outside">

      <!-- Обране -->
      <a class="header-action-link header-action-icon cart-icon-wrap has-tooltip"
         data-tooltip="Обране"
         href="<?php echo esc_url($wishlist_page_url); ?>"
         id="wishlist-header-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
        </svg>
        <span class="cart-count wishlist-count"
              id="wishlist-count"
              <?php echo $wishlist_count > 0 ? '' : 'style="display:none"'; ?>>
          <?php echo esc_html($wishlist_count); ?>
        </span>
      </a>

      <!-- Порівняння -->
      <a class="header-action-link header-action-icon cart-icon-wrap has-tooltip"
         data-tooltip="Порівняння"
         href="<?php echo esc_url($compare_page_url); ?>"
         id="compare-header-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="20" x2="18" y2="10"/>
          <line x1="12" y1="20" x2="12" y2="4"/>
          <line x1="6" y1="20" x2="6" y2="14"/>
        </svg>
        <span class="cart-count compare-count"
              id="compare-count"
              <?php echo $compare_count > 0 ? '' : 'style="display:none"'; ?>>
          <?php echo esc_html($compare_count); ?>
        </span>
      </a>

      <!-- Кошик -->
      <a class="header-action-link header-action-icon cart-icon-wrap has-tooltip"
         data-tooltip="Кошик"
         href="<?php echo esc_url($cart_url); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
        </svg>
        <?php if ($cart_count > 0): ?>
          <span class="cart-count"><?php echo esc_html($cart_count); ?></span>
        <?php endif; ?>
      </a>

      <!-- Увійти / Ім'я -->
      <a class="header-action-link header-action-text"
         href="<?php echo esc_url($account_url); ?>">
        <?php echo $is_logged ? esc_html($user_name) : 'Увійти'; ?>
      </a>

      <!-- Бургер -->
      <button class="burger" type="button"
              aria-label="Відкрити меню"
              aria-expanded="false"
              aria-controls="mobileMenu">
        <span></span><span></span><span></span>
      </button>

    </div>

    <!-- ПОШУК (десктоп) -->
    <div class="header-search-rail">
      <form class="header-search desktop-search" role="search" method="get"
            action="<?php echo esc_url(home_url('/')); ?>">
        <input class="search-input" type="search" name="s"
               placeholder="Пошук..."
               value="<?php echo esc_attr(get_search_query()); ?>">
      </form>
    </div>

  </div><!-- /header-shell -->

  <!-- МОБІЛЬНЕ МЕНЮ -->
  <div class="mobile-menu" id="mobileMenu" hidden>
    <div class="container mobile-menu-inner">

      <!-- Пошук -->
      <form class="header-search mobile-search" role="search" method="get"
            action="<?php echo esc_url(home_url('/')); ?>">
        <input class="search-input" type="search" name="s"
               placeholder="Пошук..."
               value="<?php echo esc_attr(get_search_query()); ?>">
      </form>

      <!-- Кнопки дій -->
      <div class="mobile-header-actions">

        <a class="header-action-link header-action-text"
           href="<?php echo esc_url($account_url); ?>">
          <?php echo $is_logged ? esc_html($user_name) : 'Увійти'; ?>
        </a>

        <!-- Обране -->
        <a class="header-action-link header-action-icon cart-icon-wrap"
           href="<?php echo esc_url($wishlist_page_url); ?>"
           aria-label="Обране">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
          </svg>
          <?php if ($wishlist_count > 0): ?>
            <span class="cart-count wishlist-count">
              <?php echo esc_html($wishlist_count); ?>
            </span>
          <?php endif; ?>
        </a>

        <!-- Порівняння -->
        <a class="header-action-link header-action-icon cart-icon-wrap"
           href="<?php echo esc_url($compare_page_url); ?>"
           aria-label="Порівняння">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="20" x2="18" y2="10"/>
            <line x1="12" y1="20" x2="12" y2="4"/>
            <line x1="6" y1="20" x2="6" y2="14"/>
          </svg>
          <?php if ($compare_count > 0): ?>
            <span class="cart-count compare-count">
              <?php echo esc_html($compare_count); ?>
            </span>
          <?php endif; ?>
        </a>

        <!-- Кошик -->
        <a class="header-action-link header-action-icon cart-icon-wrap"
           href="<?php echo esc_url($cart_url); ?>"
           aria-label="Кошик">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
          </svg>
          <?php if ($cart_count > 0): ?>
            <span class="cart-count"><?php echo esc_html($cart_count); ?></span>
          <?php endif; ?>
        </a>

      </div>

      <!-- Навігація -->
      <nav class="main-nav mobile-nav" aria-label="Мобільне меню">
        <?php wp_nav_menu([
          'theme_location' => 'header_menu',
          'container'      => false,
          'menu_class'     => 'menu mobile-menu-list',
          'fallback_cb'    => false,
        ]); ?>
      </nav>

    </div>
  </div><!-- /mobile-menu -->

</header>

<main class="site-main">