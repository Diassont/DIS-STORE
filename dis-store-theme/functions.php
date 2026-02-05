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
});

/* Demo posts */
add_action('after_setup_theme', 'disstore_create_demo_posts');

function disstore_create_demo_posts() {
  if (get_option('disstore_demo_posts_created')) return;

  $posts = [
    [
      'title' => 'Як обрати ноутбук для навчання у 2025 році',
      'excerpt' => 'Пояснюємо, на які характеристики ноутбука звернути увагу студенту або школяру.',
      'content' => "Навчальний ноутбук має бути швидким, легким та надійним.\n\nДля більшості завдань достатньо процесора Intel Core i5 або AMD Ryzen 5, мінімум 16 ГБ оперативної пам’яті та SSD-диска.\n\nТакож важливо звернути увагу на автономність — 6–8 годин роботи буде оптимально.\nМатове покриття екрану зменшить навантаження на очі.",
    ],
    [
      'title' => 'ПК чи ноутбук — що краще для програміста',
      'excerpt' => 'Розбираємо переваги та недоліки стаціонарних комп’ютерів і ноутбуків для розробки.',
      'content' => "Стаціонарний ПК має кращу продуктивність за ту ж ціну, ніж ноутбук.\n\nВін легше оновлюється та краще підходить для важких IDE, Docker та віртуальних машин.\n\nНоутбук забезпечує мобільність і зручність роботи з будь-якого місця.",
    ],
    [
      'title' => 'Чому SSD — обов’язковий компонент сучасного комп’ютера',
      'excerpt' => 'Розповідаємо, чому SSD у рази швидший за звичайний жорсткий диск.',
      'content' => "SSD-диск значно прискорює запуск системи, програм і ігор.\n\nНавіть бюджетний комп’ютер із SSD працює швидше, ніж дорогий ПК з HDD.\n\nРекомендуємо використовувати SSD мінімум на 512 ГБ.",
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
