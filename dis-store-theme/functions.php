<?php

add_action('after_setup_theme', function () {
  register_nav_menus([
    'header_menu' => 'Header Menu',
    'footer_menu' => 'Footer Menu',
  ]);

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
});

/* CSS + JS */
add_action('wp_enqueue_scripts', function () {
  $ver = wp_get_theme()->get('Version');

  wp_enqueue_style('dis-style', get_stylesheet_uri(), [], $ver);

  wp_enqueue_style(
    'dis-main',
    get_template_directory_uri() . '/assets/css/main.css',
    ['dis-style'],
    $ver
  );

  wp_enqueue_script(
    'dis-main-js',
    get_template_directory_uri() . '/assets/js/main.js',
    [],
    $ver,
    true
  );

  wp_enqueue_script(
    'disstore-filter',
    get_template_directory_uri() . '/assets/js/filter.js',
    [],
    $ver,
    true
  );

  // Передаємо дані для wishlist/compare у JS
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
      'excerpt' => 'Розбираємо переваги та недоліки стаціонарних комп\'ютерів і ноутбуків для розробки.',
      'content' => "Стаціонарний ПК має кращу продуктивність за ту ж ціну, ніж ноутбук.\n\nВін легше оновлюється та краще підходить для важких IDE, Docker та віртуальних машин.\n\nНоутбук забезпечує мобільність і зручність роботи з будь-якого місця.",
    ],
    [
      'title' => 'Чому SSD — обов\'язковий компонент сучасного комп\'ютера',
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

wp_enqueue_script(
  'lucide',
  'https://unpkg.com/lucide@latest/dist/umd/lucide.min.js',
  [],
  null,
  true
);

add_action('after_setup_theme', function() {
    add_theme_support('woocommerce');
});

// Форсуємо збереження сесії WooCommerce
add_filter('woocommerce_session_handler', function($handler) {
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
      // Знаходимо wishlist і видаляємо товар
      $wishlist = YITH_WCWL_Wishlist_Factory::get_wishlist(false);
      $wishlist_id = $wishlist ? $wishlist->get_id() : 0;
      $wishlists->remove_item([
        'product_id'  => $product_id,
        'wishlist_id' => $wishlist_id,
      ]);
      $now_active = false;
    } else {
      // Додаємо в обране
      $wishlists->add_item([
        'product_id'  => $product_id,
        'wishlist_id' => 0,
      ]);
      $now_active = true;
    }
  } catch (Exception $e) {
    // Якщо товар вже є або виникла помилка — визначаємо поточний стан
    $now_active = $wishlists->is_product_in_wishlist($product_id);
  }

  $count = $wishlists->count_items_in_wishlist();

  wp_send_json_success([
    'active' => $now_active,
    'count'  => (int) $count,
  ]);
}

/* =========================================================
   Compare toggle — тепер обробляється нативним плагіном
   через WC AJAX (yith-woocompare-add-product / remove-product)
   Наш обробник більше не потрібен.
   ========================================================= */

/* =========================================================
   Compare page redirect — перенаправляємо зі сторінки
   /compare/ на реальний URL таблиці плагіну
   ========================================================= */
add_action('template_redirect', function () {
  $compare_page_id = get_option('yith_woocompare_page_id');
  if (!$compare_page_id) return;

  // Якщо ми на сторінці порівняння і це не AJAX
  if (is_page($compare_page_id) && !wp_doing_ajax()) {
    // Формуємо правильний URL таблиці порівняння
    $compare_url = add_query_arg(
      ['action' => 'yith-woocompare-view-table'],
      site_url()
    );
    wp_redirect($compare_url, 302);
    exit;
  }
}, 5);

/* =========================================================
   Виправити посилання на порівняння в шапці — щоб одразу
   вело на таблицю, а не на сторінку зі шорткодом
   ========================================================= */
if (!function_exists('yith_woocompare_get_compare_url')) {
  function yith_woocompare_get_compare_url() {
    return add_query_arg(['action' => 'yith-woocompare-view-table'], site_url());
  }
}
