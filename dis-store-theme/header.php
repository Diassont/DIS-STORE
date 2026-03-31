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
  $logo = get_field('header_logo', 'option');
?>

<header class="site-header">
  <div class="header-shell">

    <div class="header-logo-outside">
      <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
        <?php if (!empty($logo) && !empty($logo['url'])): ?>
          <img
            src="<?php echo esc_url($logo['url']); ?>"
            alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
          >
        <?php else: ?>
          DIS<span>STORE</span>
        <?php endif; ?>
      </a>
    </div>

    <div class="header-center">
      <nav class="main-nav desktop-nav" aria-label="Головне меню">
        <?php
          wp_nav_menu([
            'theme_location' => 'header_menu',
            'container'      => false,
            'menu_class'     => 'menu',
            'fallback_cb'    => false,
          ]);
        ?>
      </nav>

      <form class="header-search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input
          class="search-input"
          type="search"
          name="s"
          placeholder="Пошук..."
          value="<?php echo esc_attr(get_search_query()); ?>"
        >
      </form>
    </div>

    <div class="header-actions-outside">
      <a class="header-action-link" href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/')); ?>">
        Увійти
      </a>

      <a class="header-action-link" href="<?php echo esc_url(function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/')); ?>">
        Кошик
      </a>

      <button class="burger" type="button" aria-label="Відкрити меню" aria-expanded="false" aria-controls="mobileMenu">
        <span></span><span></span><span></span>
      </button>
    </div>

  </div>

  <div class="mobile-menu" id="mobileMenu" hidden>
    <div class="container mobile-menu-inner">

      <form class="header-search mobile-search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input
          class="search-input"
          type="search"
          name="s"
          placeholder="Пошук..."
          value="<?php echo esc_attr(get_search_query()); ?>"
        >
      </form>

      <div class="mobile-header-actions">
        <a class="header-action-link" href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/')); ?>">
          Увійти
        </a>

        <a class="header-action-link" href="<?php echo esc_url(function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/')); ?>">
          Кошик
        </a>
      </div>

      <nav class="main-nav mobile-nav" aria-label="Мобільне меню">
        <?php
          wp_nav_menu([
            'theme_location' => 'header_menu',
            'container'      => false,
            'menu_class'     => 'menu mobile-menu-list',
            'fallback_cb'    => false,
          ]);
        ?>
      </nav>

    </div>
  </div>
</header>

<main class="site-main">