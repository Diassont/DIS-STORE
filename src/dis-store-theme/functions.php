<?php

add_action('after_setup_theme', function () {
  register_nav_menus([
    'header_menu' => 'Header Menu',
    'footer_menu' => 'Footer Menu',
  ]);

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('woocommerce');
});

/* =========================================================
   CSS + JS
   Структура стилів:
     style.css         — WordPress-хедер теми (обов'язковий)
     assets/css/main.css       — глобальні стилі (всі сторінки)
     assets/css/front-page.css — тільки головна (front-page.php)
     assets/css/home.css       — тільки блог (home.php)
     assets/css/about.css      — сторінка "Про нас"
     assets/css/blog.css       — сторінка блогу (page-blog.php)
     assets/css/contacts.css   — сторінка контактів
     assets/css/delivery.css   — сторінка доставки
     assets/css/faq.css        — сторінка FAQ
     assets/css/warranty.css   — сторінка гарантії
     assets/css/compare.css    — сторінка порівняння
   ========================================================= */
add_action('wp_enqueue_scripts', function () {
  $ver = wp_get_theme()->get('Version');
  $uri = get_template_directory_uri();

  // 1. WordPress-хедер теми (обов'язковий)
  wp_enqueue_style('dis-style', get_stylesheet_uri(), [], $ver);

  // 2. Глобальні стилі — завжди на всіх сторінках
  wp_enqueue_style('dis-main', $uri . '/assets/css/main.css', ['dis-style'], $ver);

  // 3. Сторінко-специфічні стилі — завантажуємо тільки де потрібно
  $page_css_map = [
    'is_front_page' => 'front-page',   // Головна (front-page.php)
    'is_home'       => 'home',          // Блог-архів (home.php)
  ];

  foreach ($page_css_map as $condition => $slug) {
    if (function_exists($condition) && $condition()) {
      wp_enqueue_style(
        "dis-page-{$slug}",
        $uri . "/assets/css/{$slug}.css",
        ['dis-main'],
        $ver
      );
    }
  }

  // Для page-*.php шаблонів — визначаємо по slug/назві сторінки АБО по template
  // (get_page_template_slug() працює тільки якщо шаблон вибраний через адмінку,
  //  тому перевіряємо обидва варіанти)
  if (is_page()) {
    // Варіант 1: по template slug (якщо вибраний в адмінці)
    $template = get_page_template_slug();

    // Варіант 2: по page slug (завжди надійно)
    $page_slug = get_post_field('post_name', get_queried_object_id());

    $by_template = [
      'page-about.php'    => 'about',
      'page-blog.php'     => 'blog',
      'page-contacts.php' => 'contacts',
      'page-delivery.php' => 'delivery',
      'page-faq.php'      => 'faq',
      'page-warranty.php' => 'warranty',
    ];

    // Slug сторінки → CSS (відповідає WordPress page slugs)
    $by_page_slug = [
      'about'    => 'about',
      'pro-nas'  => 'about',
      'contacts' => 'contacts',
      'contact'  => 'contacts',
      'kontakty' => 'contacts',
      'delivery' => 'delivery',
      'dostavka' => 'delivery',
      'faq'      => 'faq',
      'warranty' => 'warranty',
      'garantiya'=> 'warranty',
      'blog'     => 'blog',
    ];

    $css_slug = null;

    if (!empty($template) && isset($by_template[$template])) {
      $css_slug = $by_template[$template];
    } elseif (!empty($page_slug) && isset($by_page_slug[$page_slug])) {
      $css_slug = $by_page_slug[$page_slug];
    }

    if ($css_slug) {
      wp_enqueue_style(
        "dis-page-{$css_slug}",
        $uri . "/assets/css/{$css_slug}.css",
        ['dis-main'],
        $ver
      );
    }
  }

  // Сторінка порівняння (page-compare.php через woocommerce/)
  $compare_page_id = get_option('yith_woocompare_page_id');
  if (($compare_page_id && is_page($compare_page_id)) || is_page('compare')) {
    wp_enqueue_style('dis-page-compare', $uri . '/assets/css/compare.css', ['dis-main'], $ver);
  }

  // 4. JS
  wp_enqueue_script('dis-main-js', $uri . '/assets/js/main.js', [], $ver, true);

  // filter.js — тільки якщо файл існує (на архіві товарів)
  $filter_js = get_template_directory() . '/assets/js/filter.js';
  if (file_exists($filter_js)) {
    wp_enqueue_script('disstore-filter', $uri . '/assets/js/filter.js', [], $ver, true);
  }

  // Lucide icons (CDN)
  wp_enqueue_script('lucide', 'https://unpkg.com/lucide@latest/dist/umd/lucide.min.js', [], null, true);

  // 5. Передаємо дані для wishlist/compare у JS
  $compare_list = [];
  if (class_exists('YITH_WooCompare_Products_List')) {
    $list = YITH_WooCompare_Products_List::instance();
    $compare_list = array_map('intval', (array) $list->get());
  }

  $wishlist_count_init = 0;
  if (function_exists('yith_wcwl_wishlists')) {
    $wishlist_count_init = yith_wcwl_wishlists()->count_items_in_wishlist();
  }

  wp_localize_script('dis-main-js', 'disStoreData', [
    'ajaxUrl'           => admin_url('admin-ajax.php'),
    'nonce'             => wp_create_nonce('dis_wishlist_nonce'),
    'compareList'       => $compare_list,
    'compareCookieName' => class_exists('YITH_WooCompare_Products_List')
                            ? YITH_WooCompare_Products_List::get_cookie_name()
                            : 'YITH_WooCompare_Products_List',
    'siteUrl'           => site_url(),
  ]);
});

/* Demo posts */
add_action('after_setup_theme', 'disstore_create_demo_posts');

function disstore_create_demo_posts() {
  if (get_option('disstore_demo_posts_created')) return;

  $posts = [
    [
      'title' => 'Як обрати ноутбук для навчання у 2025 році',
      'excerpt' => 'Пояснюємо, на які характеристики ноутбука звернути увагу студенту або школяру.',
      'content' => "Навчальний ноутбук має бути швидким, легким та надійним.\n\nДля більшості завдань достатньо процесора Intel Core i5 або AMD Ryzen 5, мінімум 16 ГБ оперативної пам'яті та SSD-диска.\n\nТакож важливо звернути увагу на автономність — 6–8 годин роботи буде оптимально.\nМатове покриття екрану зменшить навантаження на очі.",
    ],
    [
      'title' => 'ПК чи ноутбук — що краще для програміста',
      'excerpt' => "Розбираємо переваги та недоліки стаціонарних комп'ютерів і ноутбуків для розробки.",
      'content' => "Стаціонарний ПК має кращу продуктивність за ту ж ціну, ніж ноутбук.\n\nВін легше оновлюється та краще підходить для важких IDE, Docker та віртуальних машин.\n\nНоутбук забезпечує мобільність і зручність роботи з будь-якого місця.",
    ],
    [
      'title' => "Чому SSD — обов'язковий компонент сучасного комп'ютера",
      'excerpt' => 'Розповідаємо, чому SSD у рази швидший за звичайний жорсткий диск.',
      'content' => "SSD-диск значно прискорює запуск системи, програм і ігор.\n\nНавіть бюджетний комп'ютер із SSD працює швидше, ніж дорогий ПК з HDD.\n\nРекомендуємо використовувати SSD мінімум на 512 ГБ.",
    ],
    [
      'title' => 'Як правильно підібрати комплектуючі для ігрового ПК',
      'excerpt' => 'Основні поради щодо вибору процесора, відеокарти та блоку живлення.',
      'content' => "Головне в ігровому ПК — баланс.\n\nПотужна відеокарта без відповідного процесора не дасть очікуваної продуктивності.\n\nТакож важливо не економити на блоці живлення та охолодженні.",
    ],
  ];

  foreach ($posts as $post) {
    wp_insert_post([
      'post_title'   => $post['title'],
      'post_excerpt' => $post['excerpt'],
      'post_content' => $post['content'],
      'post_status'  => 'publish',
      'post_type'    => 'post',
    ]);
  }

  update_option('disstore_demo_posts_created', true);
}

add_action('acf/init', function () {
  if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
      'page_title' => 'Налаштування сайту',
      'menu_title' => 'Налаштування сайту',
      'menu_slug'  => 'site-settings',
      'capability' => 'edit_posts',
      'redirect'   => false,
    ]);
  }
});

// Форсуємо збереження сесії WooCommerce
add_filter('woocommerce_session_handler', function ($handler) {
  return 'WC_Session_Handler';
});

/* =========================================================
   AJAX: Wishlist toggle
   ========================================================= */
add_action('wp_ajax_dis_wishlist_toggle',        'dis_wishlist_toggle_handler');
add_action('wp_ajax_nopriv_dis_wishlist_toggle', 'dis_wishlist_toggle_handler');

function dis_wishlist_toggle_handler() {
  check_ajax_referer('dis_wishlist_nonce', 'nonce');

  $product_id = intval($_POST['product_id'] ?? 0);
  if (!$product_id) {
    wp_send_json_error(['message' => 'Invalid product ID']);
  }

  if (!function_exists('yith_wcwl_wishlists')) {
    wp_send_json_error(['message' => 'Wishlist plugin not active']);
  }

  $wishlists   = yith_wcwl_wishlists();
  $in_wishlist = $wishlists->is_product_in_wishlist($product_id);

  try {
    if ($in_wishlist) {
      $wishlist    = YITH_WCWL_Wishlist_Factory::get_wishlist(false);
      $wishlist_id = $wishlist ? $wishlist->get_id() : 0;
      $wishlists->remove_item([
        'product_id'  => $product_id,
        'wishlist_id' => $wishlist_id,
      ]);
      $now_active = false;
    } else {
      $wishlists->add_item([
        'product_id'  => $product_id,
        'wishlist_id' => 0,
      ]);
      $now_active = true;
    }
  } catch (Exception $e) {
    $now_active = $wishlists->is_product_in_wishlist($product_id);
  }

  $count = $wishlists->count_items_in_wishlist();

  wp_send_json_success([
    'active' => $now_active,
    'count'  => (int) $count,
  ]);
}

/* =========================================================
   Compare — відключаємо хук плагіну що додає кнопку
   після товару в каталозі (ми самі виводимо її в шаблоні)
   ========================================================= */
add_action('wp', function () {
  if (class_exists('YITH_WooCompare_Frontend')) {
    remove_action('woocommerce_after_shop_loop_item', [YITH_WooCompare_Frontend::instance(), 'output_button'], 20);
  }
});

/* =========================================================
   Compare — посилання в хедері веде на сторінку /compare/.
   ========================================================= */
if (!function_exists('yith_woocompare_get_compare_url')) {
  function yith_woocompare_get_compare_url() {
    $page_id = get_option('yith_woocompare_page_id');
    if ($page_id) {
      return get_permalink($page_id);
    }
    return home_url('/compare/');
  }
}

/* =========================================================
   Compare — примушуємо плагін переходити на сторінку
   замість відкриття popup/iframe.
   ========================================================= */
add_filter('yith_woocompare_main_script_localize_array', function ($args) {
  $page_id  = get_option('yith_woocompare_page_id');
  $page_url = $page_id ? get_permalink($page_id) : home_url('/compare/');

  $args['is_page']  = true;
  $args['page_url'] = $page_url;

  return $args;
});

/* =========================================================
   Compare — відключаємо нижній preview-bar плагіну.
   ========================================================= */
add_filter('yith_woocompare_should_show_preview_bar', '__return_false');

/* =========================================================
   Compare — підключаємо наш шаблон для сторінки порівняння.
   ========================================================= */
add_filter('template_include', function ($template) {
  if (wp_doing_ajax()) return $template;
  if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'yith-woocompare-view-table') return $template;

  $compare_page_id = get_option('yith_woocompare_page_id');
  $is_compare_page = ($compare_page_id && is_page($compare_page_id)) || is_page('compare');

  if ($is_compare_page) {
    $custom = get_stylesheet_directory() . '/woocommerce/page-compare.php';
    if (file_exists($custom)) {
      return $custom;
    }
  }

  return $template;
}, 99);

/* =========================================================
   Метабокс: лейбли товару (_dis_labels)
   ========================================================= */
add_action('add_meta_boxes', function () {
  add_meta_box(
    'dis_labels_box',
    'Лейбли товару',
    'dis_labels_metabox_html',
    'product',
    'side',
    'default'
  );
});

function dis_labels_metabox_html($post) {
  $value = get_post_meta($post->ID, '_dis_labels', true);
  wp_nonce_field('dis_labels_save', 'dis_labels_nonce');
  ?>
  <p style="margin:0 0 6px;font-size:12px;color:#666;">
    Введи через кому. Приклади: <code>ТОП</code>, <code>Хіт</code>, <code>Новинка</code>, <code>Gaming</code>
  </p>
  <input
    type="text"
    name="dis_labels"
    value="<?php echo esc_attr($value); ?>"
    style="width:100%;padding:6px 8px;border-radius:4px;border:1px solid #ddd;"
    placeholder="ТОП, Gaming"
  >
  <p style="margin:6px 0 0;font-size:11px;color:#999;">
    ТОП — помаранчевий · Хіт — червоний · Новинка — зелений · решта — сірий
  </p>
  <?php
}

add_action('save_post_product', function ($post_id) {
  if (!isset($_POST['dis_labels_nonce'])) return;
  if (!wp_verify_nonce($_POST['dis_labels_nonce'], 'dis_labels_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $labels = sanitize_text_field($_POST['dis_labels'] ?? '');
  update_post_meta($post_id, '_dis_labels', $labels);
});

/* =========================================================
   Сортування товарів: нові додаються в кінець (date ASC)
   ========================================================= */
add_filter('woocommerce_get_catalog_ordering_args', function ($args) {
  if (empty($_GET['orderby'])) {
    $args['orderby'] = 'date';
    $args['order']   = 'ASC';
  }
  return $args;
});

/* =========================================================
   Кнопка "Купити" замість "Додати в кошик" на сторінці товару
   ========================================================= */
add_filter('woocommerce_product_single_add_to_cart_text', function () {
  return 'Купити';
});

/* =========================================================
   Wishlist: переносимо дату над кнопку (десктоп)
   ========================================================= */
add_action('wp_footer', function () {
  ?>
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.wishlist_table tbody tr').forEach(function (row) {
      var dateTd  = row.querySelector('td.product-date');
      var cartTd  = row.querySelector('td.product-add-to-cart');
      if (!dateTd || !cartTd) return;
      var dateText = dateTd.textContent.trim();
      if (!dateText) return;
      var label = document.createElement('div');
      label.className = 'wishlist-date-label';
      label.innerHTML = 'Додано: <span>' + dateText + '</span>';
      cartTd.insertBefore(label, cartTd.firstChild);
    });
  });
  </script>
  <?php
});
