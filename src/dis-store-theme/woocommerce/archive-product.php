<?php
/**
 * archive-product.php — DIS Store
 * Каталог з розумним фільтром по атрибутах WooCommerce
 */
get_header();

$current_term   = is_product_category() ? get_queried_object() : null;
$current_cat    = $current_term ? $current_term->name : '';
$current_cat_id = $current_term ? $current_term->term_id : 0;

$cat_filter_attrs = [
  'Відеокарти'           => ['Бренд','Серія','VRAM','Призначення'],
  'Процесори'            => ['Бренд','Socket','Ядра','Серія','Клас'],
  'Ноутбуки'             => ['Процесор','Відеокарта','Екран','Накопичувач'],
  'Монітори'             => ['Діагональ','Матриця','Роздільна здатність','Частота'],
  'Навушники'            => ['Тип','Форма','ANC','Підключення'],
  'Клавіатури'           => ['Тип','Підключення','Підсвітка','Призначення','Формат'],
  'Мишки'                => ['Тип','Підключення'],
  'Накопичувачі'         => ['Тип','Обсяг','Інтерфейс'],
  "Оперативна пам'ять"   => ['Тип','Обсяг','Частота'],
  'Материнські плати'    => ['Socket','Чипсет','Форм-фактор'],
  'Блоки живлення'       => ['Потужність','Сертифікат','Модульність'],
  'Корпуси для ПК'       => ['Форм-фактор','Розмір','Скло','Особливість'],
  "Комп'ютери"           => ['Процесор','Відеокарта','Накопичувач'],
  'Системи охолодження'  => ['Тип','Socket','Розмір'],
  'Акустичні системи'    => ['Тип','Потужність'],
  'Мікрофони'            => ['Тип','Підключення'],
  'Принтери'             => ['Тип','Формат','Підключення','Колір'],
  'Кабелі мультимедійні' => ['Тип','Версія','Довжина','Роздільна здатність'],
  'Портативні системи'   => ['Тип','Батарея'],
];

$filter_attrs     = ( $current_cat && isset( $cat_filter_attrs[ $current_cat ] ) )
                    ? $cat_filter_attrs[ $current_cat ]
                    : [];
$is_category_page = (bool) ( $current_term && $current_cat_id );

// Збираємо унікальні значення атрибутів з реальних товарів категорії
$attr_values = [];
if ( ! empty( $filter_attrs ) && $is_category_page ) {
  $all_q = new WP_Query( [
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'fields'         => 'ids',
    'tax_query'      => [ [ 'taxonomy' => 'product_cat', 'field' => 'term_id', 'terms' => $current_cat_id ] ],
  ] );
  foreach ( $all_q->posts as $pid ) {
    $prod_attrs = get_post_meta( $pid, '_product_attributes', true );
    if ( ! is_array( $prod_attrs ) ) continue;
    foreach ( $prod_attrs as $ad ) {
      $name = isset( $ad['name'] ) ? $ad['name'] : '';
      if ( ! in_array( $name, $filter_attrs ) ) continue;
      $val_str = isset( $ad['value'] ) ? $ad['value'] : '';
      foreach ( explode( '|', $val_str ) as $v ) {
        $v = trim( $v );
        if ( ! $v ) continue;
        if ( ! isset( $attr_values[ $name ] ) ) $attr_values[ $name ] = [];
        if ( ! in_array( $v, $attr_values[ $name ] ) ) $attr_values[ $name ][] = $v;
      }
    }
  }
  foreach ( $attr_values as &$vals ) sort( $vals, SORT_NATURAL );
  unset( $vals );
}

$has_attr_filters = $is_category_page && ! empty( $attr_values );

// Активні фільтри з URL
$active_filters = [];
if ( isset( $_GET['attr'] ) && is_array( $_GET['attr'] ) ) {
  foreach ( $_GET['attr'] as $k => $v ) {
    $k = sanitize_text_field( $k );
    $v = sanitize_text_field( $v );
    if ( $k && $v ) $active_filters[ $k ] = $v;
  }
}

// Перебудовуємо WP_Query якщо є активні атрибутні фільтри
if ( ! empty( $active_filters ) && $is_category_page ) {
  $filtered_ids = null;
  foreach ( $active_filters as $attr_name => $attr_val ) {
    $q = new WP_Query( [
      'post_type'      => 'product',
      'posts_per_page' => -1,
      'fields'         => 'ids',
      'tax_query'      => [ [ 'taxonomy' => 'product_cat', 'field' => 'term_id', 'terms' => $current_cat_id ] ],
    ] );
    $matched = [];
    foreach ( $q->posts as $pid ) {
      $prod_attrs = get_post_meta( $pid, '_product_attributes', true );
      if ( ! is_array( $prod_attrs ) ) continue;
      foreach ( $prod_attrs as $ad ) {
        if ( isset( $ad['name'] ) && $ad['name'] === $attr_name ) {
          $vals = array_map( 'trim', explode( '|', isset( $ad['value'] ) ? $ad['value'] : '' ) );
          if ( in_array( $attr_val, $vals ) ) { $matched[] = $pid; break; }
        }
      }
    }
    $filtered_ids = ( $filtered_ids === null ) ? $matched : array_values( array_intersect( $filtered_ids, $matched ) );
  }
  $ids_to_query        = ! empty( $filtered_ids ) ? $filtered_ids : [ -1 ];
  $GLOBALS['wp_query'] = new WP_Query( [
    'post_type'      => 'product',
    'posts_per_page' => 24,
    'post__in'       => $ids_to_query,
    'orderby'        => 'post__in',
  ] );
}

// Визначаємо query для виводу
$the_query = ! empty( $active_filters ) ? $GLOBALS['wp_query'] : $GLOBALS['wp_the_query'];
?>

<div class="catalog-hero-gradient"></div>

<section class="container section" style="padding-top:32px; position:relative; z-index:1;">

  <!-- Заголовок -->
  <div class="section-head">
    <div>
      <h1 class="page-title" style="margin-bottom:8px;"><?php woocommerce_page_title(); ?></h1>
      <p class="muted" style="margin:0;">Оберіть категорію або перегляньте товари.</p>
    </div>
    <a class="head-link" href="<?php echo esc_url( home_url( '/contacts' ) ); ?>">
      Підібрати під бюджет <span class="arr">→</span>
    </a>
  </div>

  <!-- Категорії -->
  <div class="cat-tabs">
    <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
       class="cat-tab <?php echo ( is_shop() && ! is_product_category() ) ? 'active' : ''; ?>">
      Всі товари
    </a>
    <?php foreach ( get_terms( [ 'taxonomy' => 'product_cat', 'hide_empty' => true, 'parent' => 0 ] ) as $term ) : ?>
      <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"
         class="cat-tab <?php echo ( (int) $term->term_id === (int) $current_cat_id ) ? 'active' : ''; ?>">
        <?php echo esc_html( $term->name ); ?>
      </a>
    <?php endforeach; ?>
  </div>

  <!-- ═══ ЄДИНИЙ БЛОК ФІЛЬТРІВ ═══ -->
  <div class="dis-filter-wrap<?php echo $has_attr_filters ? ' has-attrs' : ''; ?>">

    <!-- Рядок 1: базові фільтри (завжди) -->
    <div class="dis-filter-main">

      <div class="dis-fsearch">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        <input type="text" id="filterSearch" placeholder="Пошук товару...">
      </div>

      <div class="dis-fprice">
        <input type="number" id="filterPriceMin" placeholder="Ціна від" min="0">
        <span class="dis-fprice-sep">—</span>
        <input type="number" id="filterPriceMax" placeholder="до" min="0">
      </div>

      <div class="dis-fsort">
        <!-- Прихований select для сумісності з JS -->
        <select id="filterSort" style="display:none;" aria-hidden="true">
          <option value="">Сортування</option>
          <option value="price_asc">Ціна ↑</option>
          <option value="price_desc">Ціна ↓</option>
          <option value="name_asc">Назва А–Я</option>
          <option value="name_desc">Назва Я–А</option>
        </select>
        <!-- Кастомний dropdown -->
        <div class="dis-dropdown" id="sortDropdown" role="listbox" aria-label="Сортування">
          <button class="dis-dropdown-btn" type="button" id="sortDropdownBtn" aria-expanded="false" aria-haspopup="listbox">
            <span class="dis-dropdown-label" id="sortDropdownLabel">Сортування</span>
            <svg class="dis-dropdown-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <polyline points="6 9 12 15 18 9"/>
            </svg>
          </button>
          <div class="dis-dropdown-menu" id="sortDropdownMenu">
            <button class="dis-dropdown-item is-selected" type="button" data-value="" data-label="Сортування" role="option" aria-selected="true">
              <svg class="dis-dropdown-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <span class="dis-item-label">Сортування</span>
            </button>
            <button class="dis-dropdown-item" type="button" data-value="price_asc" data-label="Ціна: дешевше" role="option" aria-selected="false">
              <svg class="dis-dropdown-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <span class="dis-item-label">Ціна: дешевше</span>
              <svg class="dis-dropdown-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="19" x2="12" y2="5"/><polyline points="5 12 12 5 19 12"/></svg>
            </button>
            <button class="dis-dropdown-item" type="button" data-value="price_desc" data-label="Ціна: дорожче" role="option" aria-selected="false">
              <svg class="dis-dropdown-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <span class="dis-item-label">Ціна: дорожче</span>
              <svg class="dis-dropdown-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/></svg>
            </button>
            <button class="dis-dropdown-item" type="button" data-value="name_asc" data-label="Назва А–Я" role="option" aria-selected="false">
              <svg class="dis-dropdown-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <span class="dis-item-label">Назва А–Я</span>
            </button>
            <button class="dis-dropdown-item" type="button" data-value="name_desc" data-label="Назва Я–А" role="option" aria-selected="false">
              <svg class="dis-dropdown-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <span class="dis-item-label">Назва Я–А</span>
            </button>
          </div>
        </div>
      </div>

      <button class="dis-freset" id="filterReset">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"/>
          <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
        Скинути
      </button>

    </div><!-- /.dis-filter-main -->

    <?php if ( $has_attr_filters ) : ?>
    <!-- Роздільник -->
    <div class="dis-fdivider"></div>

    <!-- Рядок 2: атрибутні фільтри -->
    <form class="dis-filter-attrs" method="get"
          action="<?php echo esc_url( get_term_link( $current_term ) ); ?>"
          id="attrFilterForm">

      <div class="dis-attrs-row">

        <?php
        $attr_idx = 0;
        foreach ( $filter_attrs as $attr_name ) :
          if ( empty( $attr_values[ $attr_name ] ) ) continue;
          $cur_val  = isset( $active_filters[ $attr_name ] ) ? $active_filters[ $attr_name ] : '';
          $attr_idx++;
          $dd_id    = 'attrDrop_' . $attr_idx;
        ?>
          <div class="dis-attr-col">
            <label class="dis-attr-label"><?php echo esc_html( $attr_name ); ?></label>

            <!-- Прихований select (для submit форми) -->
            <select class="dis-attr-hidden-select" name="attr[<?php echo esc_attr( $attr_name ); ?>]"
                    style="display:none;" aria-hidden="true">
              <option value="">Будь-який</option>
              <?php foreach ( $attr_values[ $attr_name ] as $val ) : ?>
                <option value="<?php echo esc_attr( $val ); ?>" <?php selected( $cur_val, $val ); ?>>
                  <?php echo esc_html( $val ); ?>
                </option>
              <?php endforeach; ?>
            </select>

            <!-- Кастомний dropdown -->
            <div class="dis-attr-dropdown" id="<?php echo esc_attr( $dd_id ); ?>"
                 data-attr="<?php echo esc_attr( $attr_name ); ?>">
              <button class="dis-attr-dd-btn" type="button"
                      aria-expanded="false" aria-haspopup="listbox">
                <span class="dis-attr-dd-label">
                  <?php echo $cur_val ? esc_html( $cur_val ) : 'Будь-який'; ?>
                </span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                  <polyline points="6 9 12 15 18 9"/>
                </svg>
              </button>
              <div class="dis-attr-dd-menu">
                <button class="dis-attr-dd-item <?php echo ! $cur_val ? 'is-selected' : ''; ?>"
                        type="button" data-value="" data-label="Будь-який">
                  <svg class="dis-attr-dd-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <polyline points="20 6 9 17 4 12"/>
                  </svg>
                  Будь-який
                </button>
                <?php foreach ( $attr_values[ $attr_name ] as $val ) : ?>
                  <button class="dis-attr-dd-item <?php echo ( $cur_val === $val ) ? 'is-selected' : ''; ?>"
                          type="button" data-value="<?php echo esc_attr( $val ); ?>"
                          data-label="<?php echo esc_attr( $val ); ?>">
                    <svg class="dis-attr-dd-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                      <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    <?php echo esc_html( $val ); ?>
                  </button>
                <?php endforeach; ?>
              </div>
            </div>

          </div>
        <?php endforeach; ?>

        <?php if ( ! empty( $active_filters ) ) : ?>
          <div class="dis-attr-col dis-attr-col--clear">
            <label class="dis-attr-label">&nbsp;</label>
            <a href="<?php echo esc_url( get_term_link( $current_term ) ); ?>" class="dis-attr-clear-btn">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
              </svg>
              Скинути
            </a>
          </div>
        <?php endif; ?>

      </div>

      <?php if ( ! empty( $active_filters ) ) : ?>
        <div class="dis-active-tags">
          <span class="dis-tags-label">Обрано:</span>
          <?php foreach ( $active_filters as $attr => $val ) :
            $rp  = $active_filters; unset( $rp[ $attr ] );
            $rurl = get_term_link( $current_term );
            if ( ! empty( $rp ) ) $rurl = add_query_arg( [ 'attr' => $rp ], $rurl );
          ?>
            <span class="dis-tag">
              <span class="dis-tag-name"><?php echo esc_html( $attr ); ?>:</span>
              <strong class="dis-tag-val"><?php echo esc_html( $val ); ?></strong>
              <a href="<?php echo esc_url( $rurl ); ?>" class="dis-tag-rm" aria-label="Видалити">×</a>
            </span>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </form>
    <?php endif; ?>

  </div><!-- /.dis-filter-wrap -->

  <!-- ═══ Сітка товарів ═══ -->
  <div class="product-grid" id="productGrid">

    <?php if ( $the_query->have_posts() ) : ?>

      <?php while ( $the_query->have_posts() ) : $the_query->the_post();
        global $product;
        $product = wc_get_product( get_the_ID() );
        if ( ! $product ) continue;

        $pid         = $product->get_id();
        $price_raw   = (float) $product->get_price();
        $in_wishlist = false;
        if ( function_exists( 'yith_wcwl_wishlists' ) ) {
          $in_wishlist = yith_wcwl_wishlists()->is_product_in_wishlist( $pid );
        }
        $in_compare = false;
        if ( class_exists( 'YITH_WooCompare_Products_List' ) ) {
          $in_compare = YITH_WooCompare_Products_List::instance()->has( $pid );
        }
        $labels = get_post_meta( $pid, '_dis_labels', true );
        if ( is_string( $labels ) ) $labels = array_filter( array_map( 'trim', explode( ',', $labels ) ) );
        if ( ! is_array( $labels ) ) $labels = [];
        $label_map = [
          'ТОП' => 'label-top', 'Top' => 'label-top',
          'Хіт' => 'label-hit', 'Hit' => 'label-hit',
          'Новинка' => 'label-new', 'New' => 'label-new',
        ];

        // Повний текст для пошуку: назва + опис + усі атрибути (назви і значення)
        $search_parts = [
          $product->get_name(),
          strip_tags( $product->get_short_description() ),
          strip_tags( $product->get_description() ),
        ];
        $raw_pattrs = get_post_meta( $pid, '_product_attributes', true );
        if ( is_array( $raw_pattrs ) ) {
          foreach ( $raw_pattrs as $ra ) {
            if ( ! empty( $ra['name'] ) )  $search_parts[] = $ra['name'];
            if ( ! empty( $ra['value'] ) ) $search_parts[] = str_replace( '|', ' ', $ra['value'] );
          }
        }
        $search_text = mb_strtolower( implode( ' ', array_filter( array_map( 'trim', $search_parts ) ) ) );
      ?>

        <article class="p-card p-card-clickable"
                 data-href="<?php echo esc_url( get_permalink() ); ?>"
                 data-price="<?php echo esc_attr( $price_raw ); ?>"
                 data-name="<?php echo esc_attr( mb_strtolower( $product->get_name() ) ); ?>"
                 data-search="<?php echo esc_attr( $search_text ); ?>">

          <div class="p-imgwrap">
            <a href="<?php echo esc_url( get_permalink() ); ?>" class="p-img-link" tabindex="-1">
              <?php echo woocommerce_get_product_thumbnail( 'medium' ); ?>
            </a>

            <?php if ( ! empty( $labels ) ) : ?>
              <div class="p-labels">
                <?php foreach ( $labels as $lbl ) :
                  $cls = 'label-tag';
                  foreach ( $label_map as $key => $color ) {
                    if ( mb_strtolower( $lbl ) === mb_strtolower( $key ) ) { $cls = $color; break; }
                  }
                ?>
                  <span class="p-label <?php echo esc_attr( $cls ); ?>"><?php echo esc_html( $lbl ); ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <div class="p-hover-actions">
              <button class="p-action-btn wishlist-btn <?php echo $in_wishlist ? 'is-active' : ''; ?>"
                      data-product-id="<?php echo esc_attr( $pid ); ?>"
                      aria-label="<?php echo $in_wishlist ? 'В обраному' : 'В обране'; ?>"
                      type="button">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                </svg>
              </button>

              <?php if ( class_exists( 'YITH_WooCompare_Frontend' ) ) : ?>
                <?php YITH_WooCompare_Frontend::instance()->output_button( $pid ); ?>
              <?php else : ?>
                <button class="p-action-btn compare-btn <?php echo $in_compare ? 'is-active' : ''; ?>"
                        data-product-id="<?php echo esc_attr( $pid ); ?>" type="button">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="20" x2="18" y2="10"/>
                    <line x1="12" y1="20" x2="12" y2="4"/>
                    <line x1="6"  y1="20" x2="6"  y2="14"/>
                  </svg>
                </button>
              <?php endif; ?>
            </div>
          </div>

          <div class="p-body">
            <h3 class="p-title">
              <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="p-desc"><?php echo wp_trim_words( get_the_excerpt(), 12 ); ?></p>

            <div class="p-meta p-meta-fixed">
              <?php if ( $product->is_on_sale() ) : ?>
                <span class="pill pill-sale">Знижка</span>
              <?php else : ?>
                <span class="p-meta-placeholder"></span>
              <?php endif; ?>
            </div>

            <div class="p-bottom">
              <div class="p-price">
                <div class="price"><?php echo $product->get_price_html(); ?></div>
                <div class="p-stock-text <?php echo $product->is_in_stock() ? 'p-stock-in' : 'p-stock-out'; ?>">
                  <?php echo $product->is_in_stock() ? 'В наявності' : 'Немає'; ?>
                </div>
              </div>

              <?php if ( $product->is_in_stock() && $product->is_type( 'simple' ) ) : ?>
                <a href="?add-to-cart=<?php echo esc_attr( $pid ); ?>"
                   class="btn p-cart-btn ajax_add_to_cart add_to_cart_button"
                   data-product_id="<?php echo esc_attr( $pid ); ?>"
                   data-quantity="1" rel="nofollow"
                   onclick="event.stopPropagation();">Купити</a>
              <?php else : ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>"
                   class="btn btn-outline p-cart-btn"
                   onclick="event.stopPropagation();">Детальніше</a>
              <?php endif; ?>
            </div>
          </div>

        </article>

      <?php endwhile; wp_reset_postdata(); ?>

    <?php else : ?>
      <div class="dis-empty">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <circle cx="11" cy="11" r="8"/>
          <line x1="21" y1="21" x2="16.65" y2="16.65"/>
          <line x1="8" y1="11" x2="14" y2="11"/>
        </svg>
        <p>
          <?php if ( ! empty( $active_filters ) && $current_term ) : ?>
            Товарів з такими фільтрами не знайдено.
            <a href="<?php echo esc_url( get_term_link( $current_term ) ); ?>">Скинути фільтри →</a>
          <?php else : ?>
            Товарів поки немає.
          <?php endif; ?>
        </p>
      </div>
    <?php endif; ?>

    <!-- JS пусто -->
    <div class="dis-empty js-noresult" style="display:none;">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <circle cx="11" cy="11" r="8"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        <line x1="8" y1="11" x2="14" y2="11"/>
      </svg>
      <p>Нічого не знайдено за вашим запитом.</p>
    </div>

  </div><!-- /#productGrid -->

  <!-- Пагінація -->
  <?php
    $pq = ! empty( $active_filters ) ? $GLOBALS['wp_query'] : $wp_query;
    $tp = isset( $pq->max_num_pages ) ? (int) $pq->max_num_pages : 0;
    $cp = max( 1, get_query_var( 'paged' ) );
    if ( $tp > 1 ) :
      $ls = paginate_links( [
        'base'      => esc_url( get_pagenum_link( 1 ) ) . '%_%',
        'format'    => '?paged=%#%',
        'current'   => $cp,
        'total'     => $tp,
        'show_all'  => true,
        'prev_next' => true,
        'prev_text' => '←',
        'next_text' => '→',
        'type'      => 'array',
      ] );
  ?>
  <nav class="woocommerce-pagination" style="margin-top:32px;">
    <ul class="page-numbers">
      <?php foreach ( $ls as $l ) : ?><li><?php echo $l; ?></li><?php endforeach; ?>
    </ul>
  </nav>
  <?php endif; ?>

</section>

<style>
/* ══════════════════════════════════════════════════════
   DIS FILTER — єдиний блок фільтрів
══════════════════════════════════════════════════════ */
.dis-filter-wrap {
  margin: 20px 0 30px;
  border-radius: 20px;
  border: 1px solid rgba(255,255,255,.10);
  background: linear-gradient(160deg, rgba(255,255,255,.055) 0%, rgba(255,255,255,.02) 100%);
  overflow: hidden;
  backdrop-filter: blur(2px);
}

/* ── Рядок 1 ── */
.dis-filter-main {
  display: flex;
  align-items: stretch;
  min-height: 54px;
}

/* Пошук */
.dis-fsearch {
  flex: 1 1 260px;
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 0 18px;
  border-right: 1px solid rgba(255,255,255,.08);
}

.dis-fsearch svg {
  width: 16px; height: 16px;
  stroke: rgba(243,244,246,.35);
  flex-shrink: 0;
}

.dis-fsearch input {
  flex: 1;
  background: transparent;
  border: none;
  outline: none;
  color: var(--text);
  font-size: 14px;
  font-family: inherit;
  height: 54px;
}

.dis-fsearch input::placeholder { color: rgba(243,244,246,.4); }

/* Ціна */
.dis-fprice {
  display: flex;
  align-items: center;
  gap: 0;
  padding: 0 4px 0 14px;
  border-right: 1px solid rgba(255,255,255,.08);
  flex-shrink: 0;
}

.dis-fprice input {
  width: 90px;
  background: transparent;
  border: none;
  outline: none;
  color: var(--text);
  font-size: 14px;
  font-family: inherit;
  text-align: center;
  height: 54px;
  /* Прибрати стандартні стрілки браузера */
  -moz-appearance: textfield;
}

.dis-fprice input::-webkit-outer-spin-button,
.dis-fprice input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.dis-fprice input::placeholder { color: rgba(243,244,246,.38); }

.dis-fprice-sep {
  color: rgba(243,244,246,.22);
  font-size: 13px;
  padding: 0 6px;
  flex-shrink: 0;
  user-select: none;
}

/* Сортування — обгортка */
.dis-fsort {
  display: flex;
  align-items: center;
  border-right: 1px solid rgba(255,255,255,.08);
  flex-shrink: 0;
  position: relative;
}

/* ── Кастомний dropdown ── */
.dis-dropdown {
  position: relative;
}

.dis-dropdown-btn {
  display: flex;
  align-items: center;
  gap: 10px;
  height: 54px;
  padding: 0 18px;
  background: transparent;
  border: none;
  color: var(--text);
  font-size: 14px;
  font-family: inherit;
  cursor: pointer;
  white-space: nowrap;
  min-width: 168px;
  justify-content: space-between;
  transition: color .2s;
}

.dis-dropdown-btn:hover { color: var(--orange2); }

.dis-dropdown-label { flex: 1; text-align: left; }

.dis-dropdown-arrow {
  width: 14px; height: 14px;
  stroke: rgba(243,244,246,.5);
  flex-shrink: 0;
  transition: transform .22s ease, stroke .2s;
}

.dis-dropdown-btn[aria-expanded="true"] .dis-dropdown-arrow {
  transform: rotate(180deg);
  stroke: var(--orange2);
}

.dis-dropdown-menu {
  position: absolute;
  top: calc(100% + 8px);
  left: 0;
  min-width: 200px;
  z-index: 500;
  background: rgba(12,16,22,.97);
  border: 1px solid rgba(255,255,255,.12);
  border-radius: 14px;
  box-shadow: 0 24px 56px rgba(0,0,0,.6), 0 0 0 1px rgba(255,255,255,.04);
  padding: 5px;
  backdrop-filter: blur(14px);
  /* Анімація через visibility + opacity (не hidden attr) */
  opacity: 0;
  visibility: hidden;
  transform: translateY(-8px) scale(.97);
  pointer-events: none;
  transition: opacity .18s ease, transform .18s ease, visibility .18s;
}

.dis-dropdown-menu.is-open {
  opacity: 1;
  visibility: visible;
  transform: translateY(0) scale(1);
  pointer-events: auto;
}
.dis-dropdown-item {
  display: flex;
  align-items: center;
  gap: 8px;
  width: 100%;
  padding: 9px 12px;
  border-radius: 9px;
  border: none;
  background: transparent;
  color: rgba(243,244,246,.8);
  font-size: 14px;
  font-family: inherit;
  text-align: left;
  cursor: pointer;
  transition: background .15s, color .15s;
}

.dis-dropdown-item:hover {
  background: rgba(255,106,0,.10);
  color: var(--text);
}

.dis-dropdown-item.is-selected {
  color: var(--orange2);
  font-weight: 700;
}

/* Галочка — видима тільки на вибраному */
.dis-dropdown-check {
  width: 13px; height: 13px;
  stroke: var(--orange2);
  flex-shrink: 0;
  opacity: 0;
  transition: opacity .15s;
}

.dis-dropdown-item.is-selected .dis-dropdown-check { opacity: 1; }

/* Іконка напрямку (ціна ↑ ↓) */
.dis-dropdown-ico {
  width: 13px; height: 13px;
  stroke: rgba(243,244,246,.45);
  flex-shrink: 0;
  margin-left: auto;
}

/* Скинути */
.dis-freset {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 0 20px;
  background: transparent;
  border: none;
  color: rgba(243,244,246,.5);
  font-size: 14px;
  font-weight: 700;
  font-family: inherit;
  cursor: pointer;
  white-space: nowrap;
  transition: color .2s, background .2s;
  flex-shrink: 0;
}

.dis-freset svg { width: 14px; height: 14px; stroke: currentColor; }
.dis-freset:hover { color: var(--orange2); background: rgba(255,106,0,.07); }

/* Hover підсвітка полів */
.dis-fsearch:focus-within,
.dis-fprice:focus-within { background: rgba(255,255,255,.03); }

/* ── Роздільник ── */
.dis-fdivider {
  height: 1px;
  background: rgba(255,255,255,.08);
}

/* ── Атрибути ── */
.dis-filter-attrs {
  padding: 16px 18px 18px;
}

.dis-attrs-row {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  align-items: flex-end;
}

.dis-attr-col {
  display: flex;
  flex-direction: column;
  gap: 5px;
  flex: 1 1 130px;
}

.dis-attr-label {
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: .07em;
  color: rgba(243,244,246,.42);
  padding-left: 2px;
  white-space: nowrap;
}

.dis-attr-select { display: none; } /* прихований, використовується лише для submit */

/* ── Кастомний dropdown атрибутів ── */
.dis-attr-dropdown {
  position: relative;
  width: 100%;
}

.dis-attr-dd-btn {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 8px;
  width: 100%;
  height: 40px;
  padding: 0 12px;
  border-radius: 10px;
  border: 1px solid rgba(255,255,255,.10);
  background: rgba(255,255,255,.05);
  color: var(--text);
  font-size: 13px;
  font-family: inherit;
  cursor: pointer;
  text-align: left;
  transition: border-color .2s, background .2s;
  white-space: nowrap;
  overflow: hidden;
}

.dis-attr-dd-btn svg {
  width: 13px; height: 13px;
  stroke: rgba(243,244,246,.45);
  flex-shrink: 0;
  transition: transform .2s, stroke .2s;
}

.dis-attr-dd-btn[aria-expanded="true"] {
  border-color: rgba(255,106,0,.4);
  background: rgba(255,255,255,.07);
}

.dis-attr-dd-btn[aria-expanded="true"] svg {
  transform: rotate(180deg);
  stroke: var(--orange2);
}

.dis-attr-dd-btn:hover {
  border-color: rgba(255,106,0,.35);
  background: rgba(255,255,255,.07);
}

.dis-attr-dd-label {
  flex: 1;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

/* Вибране значення — помаранчеве */
.dis-attr-dd-btn.has-value { border-color: rgba(255,106,0,.35); }
.dis-attr-dd-btn.has-value .dis-attr-dd-label { color: var(--orange2); font-weight: 700; }

.dis-attr-dd-menu {
  position: absolute;
  top: calc(100% + 6px);
  left: 0;
  right: 0;
  z-index: 400;
  background: rgba(12,16,22,.97);
  border: 1px solid rgba(255,255,255,.12);
  border-radius: 12px;
  box-shadow: 0 20px 48px rgba(0,0,0,.6), 0 0 0 1px rgba(255,255,255,.04);
  padding: 5px;
  backdrop-filter: blur(14px);
  max-height: 260px;
  overflow-y: auto;
  /* Скролбар */
  scrollbar-width: thin;
  scrollbar-color: rgba(255,106,0,.3) transparent;
  /* Анімація */
  opacity: 0;
  visibility: hidden;
  transform: translateY(-6px) scale(.98);
  pointer-events: none;
  transition: opacity .17s ease, transform .17s ease, visibility .17s;
}

.dis-attr-dd-menu::-webkit-scrollbar { width: 4px; }
.dis-attr-dd-menu::-webkit-scrollbar-thumb { background: rgba(255,106,0,.3); border-radius: 4px; }

.dis-attr-dd-menu.is-open {
  opacity: 1;
  visibility: visible;
  transform: translateY(0) scale(1);
  pointer-events: auto;
}

.dis-attr-dd-item {
  display: flex;
  align-items: center;
  gap: 8px;
  width: 100%;
  padding: 8px 10px;
  border-radius: 8px;
  border: none;
  background: transparent;
  color: rgba(243,244,246,.8);
  font-size: 13px;
  font-family: inherit;
  text-align: left;
  cursor: pointer;
  transition: background .13s, color .13s;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.dis-attr-dd-item:hover {
  background: rgba(255,106,0,.10);
  color: var(--text);
}

.dis-attr-dd-item.is-selected {
  color: var(--orange2);
  font-weight: 700;
}

.dis-attr-dd-check {
  width: 12px; height: 12px;
  stroke: var(--orange2);
  flex-shrink: 0;
  opacity: 0;
  transition: opacity .13s;
}

.dis-attr-dd-item.is-selected .dis-attr-dd-check { opacity: 1; }

/* Кнопка скинути атрибути */
.dis-attr-col--clear { flex: 0 0 auto; }

.dis-attr-clear-btn {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  height: 40px;
  padding: 0 14px;
  border-radius: 10px;
  border: 1px solid rgba(229,62,62,.28);
  background: rgba(229,62,62,.07);
  color: #fc8181;
  text-decoration: none;
  font-size: 13px;
  font-weight: 700;
  white-space: nowrap;
  transition: background .2s, border-color .2s;
}

.dis-attr-clear-btn svg { width: 12px; height: 12px; flex-shrink: 0; }
.dis-attr-clear-btn:hover { background: rgba(229,62,62,.14); border-color: rgba(229,62,62,.45); }

/* Активні теги */
.dis-active-tags {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: wrap;
  margin-top: 12px;
  padding-top: 12px;
  border-top: 1px solid rgba(255,255,255,.07);
}

.dis-tags-label {
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: .06em;
  color: rgba(243,244,246,.38);
}

.dis-tag {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 4px 8px 4px 10px;
  border-radius: 999px;
  background: rgba(255,106,0,.11);
  border: 1px solid rgba(255,106,0,.26);
  font-size: 13px;
}

.dis-tag-name { color: rgba(243,244,246,.65); }
.dis-tag-val  { color: var(--orange2); font-weight: 800; }

.dis-tag-rm {
  color: rgba(243,244,246,.4);
  text-decoration: none;
  font-size: 15px;
  line-height: 1;
  margin-left: 2px;
  transition: color .2s;
}

.dis-tag-rm:hover { color: #fc8181; }

/* Пусто */
.dis-empty {
  grid-column: 1 / -1;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 14px;
  padding: 60px 20px;
  text-align: center;
}

.dis-empty svg { width: 52px; height: 52px; stroke: rgba(255,255,255,.14); }

.dis-empty p {
  font-size: 16px;
  color: var(--muted);
  margin: 0;
}

.dis-empty a {
  color: var(--orange2);
  text-decoration: none;
  margin-left: 6px;
}

.dis-empty a:hover { text-decoration: underline; }

/* ── Адаптив ── */
@media (max-width: 860px) {
  .dis-filter-main { flex-wrap: wrap; }
  .dis-fsearch { flex: 1 1 100%; border-right: none; border-bottom: 1px solid rgba(255,255,255,.08); }
  .dis-fprice  { flex: 1 1 auto; }
  .dis-fsort   { border-right: 1px solid rgba(255,255,255,.08); }
  .dis-attr-col { flex: 1 1 calc(50% - 5px); }
}

@media (max-width: 560px) {
  .dis-fprice  { flex: 1 1 100%; border-right: none; border-bottom: 1px solid rgba(255,255,255,.08); padding: 4px 14px; }
  .dis-fprice input { width: 100%; text-align: left; }
  .dis-fsort   { flex: 1 1 auto; border-right: none; border-bottom: 1px solid rgba(255,255,255,.08); }
  .dis-dropdown-btn { min-width: 0; width: 100%; }
  .dis-freset  { padding: 0 14px; }
  .dis-attr-col { flex: 1 1 calc(50% - 5px); min-width: 0; }
  .dis-attr-col--clear { flex: 1 1 100%; }
  .dis-attr-clear-btn { width: 100%; justify-content: center; }
  .dis-dropdown-menu { left: 0; right: 0; min-width: unset; }
}
</style>

<script>
(function () {
  'use strict';

  /* ── Clickable cards ── */
  document.querySelectorAll('.p-card-clickable').forEach(function (card) {
    card.addEventListener('click', function (e) {
      if (e.target.closest('a,button,select,input,form')) return;
      var href = card.dataset.href;
      if (href) window.location.href = href;
    });
    card.style.cursor = 'pointer';
  });

  /* ══════════════════════════════════════════
     КАСТОМНИЙ DROPDOWN (сортування)
  ══════════════════════════════════════════ */
  var sortSelect  = document.getElementById('filterSort');
  var dropBtn     = document.getElementById('sortDropdownBtn');
  var dropMenu    = document.getElementById('sortDropdownMenu');
  var dropLabel   = document.getElementById('sortDropdownLabel');
  var dropItems   = dropMenu ? Array.from(dropMenu.querySelectorAll('.dis-dropdown-item')) : [];

  function openDrop() {
    dropMenu.classList.add('is-open');
    dropBtn.setAttribute('aria-expanded', 'true');
  }

  function closeDrop() {
    dropMenu.classList.remove('is-open');
    dropBtn.setAttribute('aria-expanded', 'false');
  }

  function isOpen() { return dropMenu.classList.contains('is-open'); }

  if (dropBtn && dropMenu) {
    dropBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      isOpen() ? closeDrop() : openDrop();
    });

    dropItems.forEach(function (item) {
      item.addEventListener('click', function () {
        var val   = item.dataset.value;
        var label = item.querySelector('.dis-dropdown-item-text');
        // Оновити вибір
        dropItems.forEach(function (i) {
          i.classList.remove('is-selected');
          i.setAttribute('aria-selected', 'false');
        });
        item.classList.add('is-selected');
        item.setAttribute('aria-selected', 'true');
        // Оновити label кнопки
        if (dropLabel) dropLabel.textContent = item.dataset.label || item.querySelector('.dis-item-label').textContent;
        // Синхронізувати прихований select → trigger change
        if (sortSelect) {
          sortSelect.value = val;
          sortSelect.dispatchEvent(new Event('change'));
        }
        closeDrop();
      });
    });

    // Закрити при кліку поза dropdown
    document.addEventListener('click', function (e) {
      if (!e.target.closest('#sortDropdown')) closeDrop();
    });

    // Клавіатура
    dropBtn.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') { closeDrop(); }
      if (e.key === 'ArrowDown') { e.preventDefault(); openDrop(); dropItems[0] && dropItems[0].focus(); }
    });
    dropMenu.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') { closeDrop(); dropBtn.focus(); }
    });
  }

  /* ══════════════════════════════════════════
     CLIENT-SIDE ФІЛЬТР (пошук / ціна / сорт)
  ══════════════════════════════════════════ */
  var grid     = document.getElementById('productGrid');
  var searchEl = document.getElementById('filterSearch');
  var minEl    = document.getElementById('filterPriceMin');
  var maxEl    = document.getElementById('filterPriceMax');
  var resetBtn = document.getElementById('filterReset');
  var noRes    = grid ? grid.querySelector('.js-noresult') : null;

  if (!grid) return;

  var allCards  = Array.from(grid.querySelectorAll('.p-card'));
  var origOrder = allCards.slice();

  function price(card) { return parseFloat(card.dataset.price) || 0; }
  function sname(card) { return card.dataset.name   || ''; }
  function stxt(card)  { return card.dataset.search || card.dataset.name || ''; }

  function run() {
    var q    = searchEl ? searchEl.value.toLowerCase().trim() : '';
    var minP = minEl && minEl.value !== '' ? parseFloat(minEl.value) : 0;
    var maxP = maxEl && maxEl.value !== '' ? parseFloat(maxEl.value) : Infinity;
    var sort = sortSelect ? sortSelect.value : '';

    var visible = [];
    origOrder.forEach(function (c) {
      var p   = price(c);
      // Пошук по повному тексту data-search (назва + опис + атрибути)
      var ok  = ( !q || stxt(c).includes(q) ) && p >= minP && p <= maxP;
      c.style.display = ok ? '' : 'none';
      if (ok) visible.push(c);
    });

    // Сортування
    if (sort && visible.length > 1) {
      visible.sort(function (a, b) {
        if (sort === 'price_asc')  return price(a) - price(b);
        if (sort === 'price_desc') return price(b) - price(a);
        if (sort === 'name_asc')   return sname(a).localeCompare(sname(b), 'uk');
        if (sort === 'name_desc')  return sname(b).localeCompare(sname(a), 'uk');
        return 0;
      });
      visible.forEach(function (c) { grid.appendChild(c); });
    }

    if (noRes) noRes.style.display = visible.length === 0 ? 'flex' : 'none';
  }

  // Скинути все (і dropdown теж)
  if (resetBtn) {
    resetBtn.addEventListener('click', function () {
      if (searchEl)   searchEl.value = '';
      if (minEl)      minEl.value    = '';
      if (maxEl)      maxEl.value    = '';
      if (sortSelect) sortSelect.value = '';
      // Скинути dropdown UI
      dropItems.forEach(function (i) { i.classList.remove('is-selected'); i.setAttribute('aria-selected','false'); });
      if (dropItems[0]) { dropItems[0].classList.add('is-selected'); dropItems[0].setAttribute('aria-selected','true'); }
      if (dropLabel)  dropLabel.textContent = 'Сортування';
      closeDrop();
      // Відновити порядок карток
      origOrder.forEach(function (c) { c.style.display = ''; grid.appendChild(c); });
      if (noRes) noRes.style.display = 'none';
    });
  }

  var t;
  function debounced() { clearTimeout(t); t = setTimeout(run, 200); }

  if (searchEl) searchEl.addEventListener('input', debounced);
  if (minEl)    minEl.addEventListener('input', run);
  if (maxEl)    maxEl.addEventListener('input', run);
  if (sortSelect) sortSelect.addEventListener('change', run);

  /* ══════════════════════════════════════════
     КАСТОМНІ DROPDOWN АТРИБУТІВ
  ══════════════════════════════════════════ */
  document.querySelectorAll('.dis-attr-dropdown').forEach(function (dd) {
    var btn   = dd.querySelector('.dis-attr-dd-btn');
    var menu  = dd.querySelector('.dis-attr-dd-menu');
    var label = dd.querySelector('.dis-attr-dd-label');
    var items = Array.from(dd.querySelectorAll('.dis-attr-dd-item'));
    var hiddenSelect = dd.closest('.dis-attr-col')
                        ? dd.closest('.dis-attr-col').querySelector('.dis-attr-hidden-select')
                        : null;

    if (!btn || !menu) return;

    function openAttr() { menu.classList.add('is-open'); btn.setAttribute('aria-expanded','true'); }
    function closeAttr() { menu.classList.remove('is-open'); btn.setAttribute('aria-expanded','false'); }
    function isOpenAttr() { return menu.classList.contains('is-open'); }

    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      // Закрити всі інші attr dropdown
      document.querySelectorAll('.dis-attr-dd-menu.is-open').forEach(function (m) {
        if (m !== menu) {
          m.classList.remove('is-open');
          m.closest('.dis-attr-dropdown').querySelector('.dis-attr-dd-btn').setAttribute('aria-expanded','false');
        }
      });
      isOpenAttr() ? closeAttr() : openAttr();
    });

    items.forEach(function (item) {
      item.addEventListener('click', function () {
        var val = item.dataset.value;
        // Оновити UI
        items.forEach(function (i) { i.classList.remove('is-selected'); });
        item.classList.add('is-selected');
        // Оновити label і клас кнопки
        var itemLabel = item.dataset.label || (val ? item.textContent.trim() : 'Будь-який');
        label.textContent = val ? itemLabel : 'Будь-який';
        if (val) { btn.classList.add('has-value'); } else { btn.classList.remove('has-value'); }
        // Оновити прихований select і відправити форму
        if (hiddenSelect) {
          hiddenSelect.value = val;
          // Відправити батьківську форму
          var form = hiddenSelect.closest('form');
          if (form) form.submit();
        }
        closeAttr();
      });
    });

    // Закрити при кліку поза
    document.addEventListener('click', function (e) {
      if (!e.target.closest('.dis-attr-dropdown')) closeAttr();
    });

    btn.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeAttr();
    });
  });

})();
</script>

<?php get_footer(); ?>