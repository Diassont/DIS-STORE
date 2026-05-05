<?php get_header(); ?>

<?php while (have_posts()): the_post(); global $product; ?>

<?php
  $product_id  = get_the_ID();
  $in_wishlist = false;
  if (function_exists('yith_wcwl_wishlists')) {
    $in_wishlist = yith_wcwl_wishlists()->is_product_in_wishlist($product_id);
  }
  $in_compare = false;
  if (class_exists('YITH_WooCompare_Products_List')) {
    $in_compare = YITH_WooCompare_Products_List::instance()->has($product_id);
  }

  $image_id  = $product->get_image_id();
  $image_url = wp_get_attachment_image_url($image_id, 'large');

  // Галерея
  $gallery_ids = $product->get_gallery_image_ids();

  // Кастомні лейбли
  $labels = get_post_meta($product_id, '_dis_labels', true);
  if (is_string($labels)) $labels = array_filter(array_map('trim', explode(',', $labels)));
  if (!is_array($labels)) $labels = [];

  // Атрибути для таблиці характеристик
  $attributes = $product->get_attributes();

  // Категорія
  $terms = get_the_terms($product_id, 'product_cat');
  $cat_name = $terms ? $terms[0]->name : '';
?>

<section class="container section sp-section">

  <!-- Breadcrumb -->
  <nav class="sp-breadcrumb">
    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">Каталог</a>
    <?php if ($cat_name): ?>
      <span class="sp-breadcrumb-sep">›</span>
      <span><?php echo esc_html($cat_name); ?></span>
    <?php endif; ?>
    <span class="sp-breadcrumb-sep">›</span>
    <span><?php the_title(); ?></span>
  </nav>

  <!-- =====================
       Основна секція: фото + інфо
       ===================== -->
  <div class="sp-grid">

    <!-- Галерея + кнопка назад -->
    <div class="sp-gallery sp-gallery-wrap">

      <!-- Кнопка повернення — над фото -->
      <div class="sp-gallery-back">
        <?php
          // Повернення до категорії або до каталогу
          $back_url  = wc_get_page_permalink('shop');
          $back_text = 'До каталогу';
          if (!empty($terms)) {
            $back_url  = get_term_link($terms[0]);
            $back_text = $terms[0]->name;
          } else {
            $back_text = 'Каталог';
          }
        ?>
        <a href="<?php echo esc_url($back_url); ?>" class="sp-back-btn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <polyline points="15 18 9 12 15 6"/>
          </svg>
          <?php echo esc_html($back_text); ?>
        </a>
      </div>

      <div class="sp-main-img-wrap">
        <?php if ($image_url): ?>
          <img id="spMainImg"
               src="<?php echo esc_url($image_url); ?>"
               alt="<?php echo esc_attr(get_the_title()); ?>"
               class="sp-main-img">
        <?php endif; ?>

        <!-- Лейбли -->
        <?php if (!empty($labels)): ?>
        <div class="sp-labels">
          <?php
          $label_colors = [
            'ТОП' => 'label-top', 'Top' => 'label-top',
            'Хіт' => 'label-hit', 'Hit' => 'label-hit',
            'Новинка' => 'label-new', 'New' => 'label-new',
          ];
          foreach ($labels as $lbl):
            $cls = 'label-tag';
            foreach ($label_colors as $key => $color) {
              if (mb_strtolower($lbl) === mb_strtolower($key)) { $cls = $color; break; }
            }
          ?>
            <span class="p-label <?php echo esc_attr($cls); ?>"><?php echo esc_html($lbl); ?></span>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>

      <!-- Мініатюри галереї -->
      <?php if (!empty($gallery_ids)): ?>
      <div class="sp-thumbs">
        <?php if ($image_id): ?>
          <img src="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'thumbnail')); ?>"
               class="sp-thumb is-active"
               data-full="<?php echo esc_url($image_url); ?>"
               alt="">
        <?php endif; ?>
        <?php foreach ($gallery_ids as $gid): ?>
          <img src="<?php echo esc_url(wp_get_attachment_image_url($gid, 'thumbnail')); ?>"
               class="sp-thumb"
               data-full="<?php echo esc_url(wp_get_attachment_image_url($gid, 'large')); ?>"
               alt="">
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>

    <!-- Інфо -->
    <div class="sp-info">

      <?php if ($cat_name): ?>
        <div class="sp-cat-tag"><?php echo esc_html($cat_name); ?></div>
      <?php endif; ?>

      <h1 class="sp-title"><?php the_title(); ?></h1>

      <!-- Ціна -->
      <div class="sp-price-wrap">
        <div class="sp-price"><?php echo $product->get_price_html(); ?></div>
        <?php if ($product->is_on_sale()): ?>
          <span class="pill pill-sale sp-sale-badge">Знижка</span>
        <?php endif; ?>
      </div>

      <!-- Наявність -->
      <div class="sp-stock <?php echo $product->is_in_stock() ? 'sp-stock-in' : 'sp-stock-out'; ?>">
        <?php if ($product->is_in_stock()): ?>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <polyline points="20 6 9 17 4 12"/>
          </svg>
          В наявності · відправка 1–2 дні
        <?php else: ?>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
          </svg>
          Немає в наявності
        <?php endif; ?>
      </div>

      <!-- Трастові маркери -->
      <div class="sp-trust">
        <div class="sp-trust-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
          </svg>
          <span>Офіційна гарантія</span>
        </div>
        <div class="sp-trust-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
            <circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>
          </svg>
          <span>Доставка 1–2 дні</span>
        </div>
        <div class="sp-trust-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
          </svg>
          <span>Самовивіз у Полтаві</span>
        </div>
      </div>

      <!-- Обране + Порівняння -->
      <div class="single-actions">
        <button class="single-action-btn wishlist-btn <?php echo $in_wishlist ? 'is-active' : ''; ?>"
                data-product-id="<?php echo $product_id; ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
          </svg>
          <span><?php echo $in_wishlist ? 'В обраному' : 'В обране'; ?></span>
        </button>

        <button class="single-action-btn compare-btn <?php echo $in_compare ? 'is-active' : ''; ?>"
                data-product-id="<?php echo $product_id; ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="18" y1="20" x2="18" y2="10"/>
            <line x1="12" y1="20" x2="12" y2="4"/>
            <line x1="6" y1="20" x2="6" y2="14"/>
          </svg>
          <span><?php echo $in_compare ? 'В порівнянні' : 'Порівняти'; ?></span>
        </button>
      </div>

      <!-- Кнопка кошика -->
      <div class="product-cart-btn">
        <?php woocommerce_template_single_add_to_cart(); ?>
      </div>

      <!-- SKU -->
      <div class="sp-meta-row">
        <?php if ($product->get_sku()): ?>
          <span class="sp-meta-item">Артикул: <b><?php echo esc_html($product->get_sku()); ?></b></span>
        <?php endif; ?>
      </div>

    </div><!-- .sp-info -->
  </div><!-- .sp-grid -->

  <!-- =====================
       Вкладки: Опис / Характеристики
       ===================== -->
  <div class="sp-tabs-wrap">
    <div class="sp-tabs">
      <button class="sp-tab is-active" data-tab="desc">Опис</button>
      <?php if (!empty($attributes)): ?>
        <button class="sp-tab" data-tab="specs">Характеристики</button>
      <?php endif; ?>
      <button class="sp-tab" data-tab="delivery">Доставка і оплата</button>
      <button class="sp-tab" data-tab="warranty">Гарантія</button>
    </div>

    <div class="sp-tab-content is-active" data-content="desc">
      <?php if (get_the_content()): ?>
        <div class="sp-desc-body"><?php the_content(); ?></div>
      <?php else: ?>
        <p class="muted">Детальний опис товару незабаром з'явиться.</p>
      <?php endif; ?>
    </div>

    <?php if (!empty($attributes)): ?>
    <div class="sp-tab-content" data-content="specs">
      <table class="sp-specs-table">
        <?php foreach ($attributes as $attribute): ?>
          <?php
            $name = wc_attribute_label($attribute->get_name());
            $values = $attribute->is_taxonomy()
              ? wc_get_product_terms($product_id, $attribute->get_name(), ['fields' => 'names'])
              : $attribute->get_options();
            $val = implode(', ', $values);
          ?>
          <tr>
            <td class="sp-spec-name"><?php echo esc_html($name); ?></td>
            <td class="sp-spec-val"><?php echo esc_html($val); ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <?php endif; ?>

    <div class="sp-tab-content" data-content="delivery">
      <div class="sp-info-blocks">
        <div class="sp-info-block">
          <div class="sp-info-block-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
              <circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>
            </svg>
          </div>
          <div>
            <div class="sp-info-block-title">Нова Пошта</div>
            <div class="muted">1–2 дні по Україні. Оплата при отриманні або онлайн.</div>
          </div>
        </div>
        <div class="sp-info-block">
          <div class="sp-info-block-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
            </svg>
          </div>
          <div>
            <div class="sp-info-block-title">Самовивіз у Полтаві</div>
            <div class="muted">Безкоштовно, в день замовлення. Уточнюйте адресу при оформленні.</div>
          </div>
        </div>
        <div class="sp-info-block">
          <div class="sp-info-block-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/>
            </svg>
          </div>
          <div>
            <div class="sp-info-block-title">Способи оплати</div>
            <div class="muted">Карта Visa/Mastercard, оплата при доставці, безготівковий розрахунок.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="sp-tab-content" data-content="warranty">
      <div class="sp-info-blocks">
        <div class="sp-info-block">
          <div class="sp-info-block-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            </svg>
          </div>
          <div>
            <div class="sp-info-block-title">Офіційна гарантія</div>
            <div class="muted">На всі товари надається офіційна гарантія від виробника. Термін залежить від категорії товару.</div>
          </div>
        </div>
        <div class="sp-info-block">
          <div class="sp-info-block-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-4.96"/>
            </svg>
          </div>
          <div>
            <div class="sp-info-block-title">Повернення товару</div>
            <div class="muted">Протягом 14 днів з дня отримання, якщо товар не підійшов або виявився дефектним.</div>
          </div>
        </div>
        <div class="sp-info-block">
          <div class="sp-info-block-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6 6l1.27-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 17z"/>
            </svg>
          </div>
          <div>
            <div class="sp-info-block-title">Підтримка</div>
            <div class="muted">+380 95 105 51 67 · support@disstore.ua · Відповідаємо щодня з 9:00 до 20:00.</div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .sp-tabs-wrap -->

</section>

<script>
// Вкладки
document.querySelectorAll('.sp-tab').forEach(function(btn) {
  btn.addEventListener('click', function() {
    var tab = this.dataset.tab;
    document.querySelectorAll('.sp-tab').forEach(function(b) { b.classList.remove('is-active'); });
    document.querySelectorAll('.sp-tab-content').forEach(function(c) { c.classList.remove('is-active'); });
    this.classList.add('is-active');
    var content = document.querySelector('.sp-tab-content[data-content="' + tab + '"]');
    if (content) content.classList.add('is-active');
  });
});

// Галерея мініатюр
document.querySelectorAll('.sp-thumb').forEach(function(thumb) {
  thumb.addEventListener('click', function() {
    var main = document.getElementById('spMainImg');
    if (main) main.src = this.dataset.full;
    document.querySelectorAll('.sp-thumb').forEach(function(t) { t.classList.remove('is-active'); });
    this.classList.add('is-active');
  });
});
</script>

<?php endwhile; ?>

<?php get_footer(); ?>
