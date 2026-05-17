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

  // Всі фото для лайтбоксу
  $all_images = [];
  if ($image_url) $all_images[] = $image_url;
  foreach ($gallery_ids as $gid) {
    $url = wp_get_attachment_image_url($gid, 'large');
    if ($url) $all_images[] = $url;
  }

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

  <!-- Основна секція: фото + інфо -->
  <div class="sp-grid">

    <!-- Галерея -->
    <div class="sp-gallery sp-gallery-wrap">

      <div class="sp-gallery-back">
        <?php
          $back_url  = wc_get_page_permalink('shop');
          $back_text = 'Каталог';
          if (!empty($terms)) {
            $back_url  = get_term_link($terms[0]);
            $back_text = $terms[0]->name;
          }
        ?>
        <a href="<?php echo esc_url($back_url); ?>" class="sp-back-btn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <polyline points="15 18 9 12 15 6"/>
          </svg>
          <?php echo esc_html($back_text); ?>
        </a>
      </div>

      <div class="sp-main-img-wrap" id="spMainWrap">
        <?php if ($image_url): ?>
          <img id="spMainImg"
               src="<?php echo esc_url($image_url); ?>"
               alt="<?php echo esc_attr(get_the_title()); ?>"
               class="sp-main-img sp-main-img--zoom"
               data-index="0">
          <div class="sp-zoom-hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
              <line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/>
            </svg>
          </div>
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
               data-index="0"
               alt="">
        <?php endif; ?>
        <?php foreach ($gallery_ids as $i => $gid): ?>
          <img src="<?php echo esc_url(wp_get_attachment_image_url($gid, 'thumbnail')); ?>"
               class="sp-thumb"
               data-full="<?php echo esc_url(wp_get_attachment_image_url($gid, 'large')); ?>"
               data-index="<?php echo $i + 1; ?>"
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

      <!-- Короткий опис -->
      <?php
        $short_desc = $product->get_short_description();
        if ($short_desc):
      ?>
        <div class="sp-short-desc"><?php echo wp_kses_post($short_desc); ?></div>
      <?php endif; ?>

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

      <!-- Кількість + Кнопка купити в один рядок -->
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

  <!-- Вкладки -->
  <div class="sp-tabs-wrap">
    <div class="sp-tabs">
      <button class="sp-tab is-active" data-tab="desc">Опис</button>
      <?php if (!empty($attributes)): ?>
        <button class="sp-tab" data-tab="specs">Характеристики</button>
      <?php endif; ?>
      <button class="sp-tab" data-tab="delivery">Доставка і оплата</button>
      <button class="sp-tab" data-tab="warranty">Гарантія</button>
      <button class="sp-tab" data-tab="reviews">
        Відгуки
        <?php
          $count = get_comments_number($product_id);
          if ($count > 0) echo '<span class="sp-tab-count">' . $count . '</span>';
        ?>
      </button>
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

    <!-- Відгуки -->
    <div class="sp-tab-content" data-content="reviews">
      <div class="dis-reviews">

        <!-- Список відгуків -->
        <?php
          $comments = get_comments([
            'post_id' => $product_id,
            'status'  => 'approve',
            'type'    => 'review',
            'orderby' => 'comment_date',
            'order'   => 'DESC',
          ]);
        ?>

        <?php if (!empty($comments)): ?>
          <div class="dis-reviews-list">
            <?php foreach ($comments as $comment):
              $rating = intval(get_comment_meta($comment->comment_ID, 'rating', true));
            ?>
              <div class="dis-review-card">
                <div class="dis-review-head">
                  <div class="dis-review-author">
                    <div class="dis-review-avatar">
                      <?php echo mb_strtoupper(mb_substr($comment->comment_author, 0, 1)); ?>
                    </div>
                    <div>
                      <div class="dis-review-name"><?php echo esc_html($comment->comment_author); ?></div>
                      <div class="dis-review-date muted"><?php echo date_i18n('d F Y', strtotime($comment->comment_date)); ?></div>
                    </div>
                  </div>
                  <?php if ($rating > 0): ?>
                    <div class="dis-review-stars">
                      <?php for ($s = 1; $s <= 5; $s++): ?>
                        <span class="<?php echo $s <= $rating ? 'star-filled' : 'star-empty'; ?>">★</span>
                      <?php endfor; ?>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="dis-review-text"><?php echo wpautop(esc_html($comment->comment_content)); ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <div class="dis-reviews-empty">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
              <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
            </svg>
            <p>Відгуків поки немає. Будьте першим!</p>
          </div>
        <?php endif; ?>

        <!-- Форма відгуку -->
        <?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product_id) || current_user_can('manage_options')): ?>
        <div class="dis-review-form-wrap">
          <h3 class="dis-review-form-title">Залишити відгук</h3>
          <?php
            $commenter = wp_get_current_commenter();
            $user = wp_get_current_user();
          ?>
          <form class="dis-review-form" id="disReviewForm" method="post" action="<?php echo esc_url(site_url('/wp-comments-post.php')); ?>">

            <?php if (!is_user_logged_in()): ?>
            <div class="dis-review-row dis-review-row--2">
              <div class="dis-review-field">
                <label>Ім'я <span class="required">*</span></label>
                <input type="text" name="author" required placeholder="Ваше ім'я"
                       value="<?php echo esc_attr($commenter['comment_author']); ?>">
              </div>
              <div class="dis-review-field">
                <label>Email <span class="required">*</span></label>
                <input type="email" name="email" required placeholder="email@example.com"
                       value="<?php echo esc_attr($commenter['comment_author_email']); ?>">
              </div>
            </div>
            <?php endif; ?>

            <!-- Рейтинг -->
            <div class="dis-review-field">
              <label>Оцінка <span class="required">*</span></label>
              <div class="dis-star-rating" id="disStarRating">
                <?php for ($s = 1; $s <= 5; $s++): ?>
                  <span class="dis-star" data-value="<?php echo $s; ?>">★</span>
                <?php endfor; ?>
              </div>
              <input type="hidden" name="rating" id="disRatingInput" value="" required>
            </div>

            <div class="dis-review-field">
              <label>Відгук <span class="required">*</span></label>
              <textarea name="comment" rows="4" required placeholder="Ваш відгук про товар..."></textarea>
            </div>

            <input type="hidden" name="comment_post_ID" value="<?php echo $product_id; ?>">
            <input type="hidden" name="comment_parent" value="0">
            <?php wp_nonce_field('add-comment'); ?>

            <button type="submit" class="btn dis-review-submit">Надіслати відгук</button>
          </form>
        </div>
        <?php elseif (!is_user_logged_in()): ?>
          <p class="muted" style="margin-top:24px;">
            <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>">Увійдіть</a>, щоб залишити відгук.
          </p>
        <?php else: ?>
          <p class="muted" style="margin-top:24px;">Лише покупці можуть залишати відгуки.</p>
        <?php endif; ?>
      </div>
    </div>

  </div><!-- .sp-tabs-wrap -->

  <!-- Схожі товари -->
  <?php
    $related_ids = wc_get_related_products($product_id, 4);
    if (!empty($related_ids)):
      $related_products = array_map('wc_get_product', $related_ids);
      $related_products = array_filter($related_products);
  ?>
  <div class="sp-related">
    <h2 class="sp-related-title">З цієї категорії</h2>
    <div class="product-grid">
      <?php
        $label_map = [
          'ТОП'     => 'label-top',
          'Top'     => 'label-top',
          'Хіт'     => 'label-hit',
          'Hit'     => 'label-hit',
          'Новинка' => 'label-new',
          'New'     => 'label-new',
        ];
        foreach ($related_products as $related):
          $r_id    = $related->get_ID();
          $r_url   = get_permalink($r_id);
          $r_title = $related->get_name();
          $r_stock = $related->is_in_stock();
          $r_price = $related->get_price_html();
          $r_labels_raw = get_post_meta($r_id, '_dis_labels', true);
          $r_labels = is_string($r_labels_raw) ? array_filter(array_map('trim', explode(',', $r_labels_raw))) : [];
          $r_in_wishlist = false;
          $r_in_compare  = false;
          if (function_exists('yith_wcwl_wishlists')) {
            $r_in_wishlist = yith_wcwl_wishlists()->is_product_in_wishlist($r_id);
          }
          if (class_exists('YITH_WooCompare_Products_List')) {
            $r_in_compare = YITH_WooCompare_Products_List::instance()->has($r_id);
          }
      ?>
        <article class="p-card p-card-clickable"
                 data-href="<?php echo esc_url($r_url); ?>"
                 data-price="<?php echo esc_attr($related->get_price()); ?>"
                 data-name="<?php echo esc_attr(mb_strtolower($r_title)); ?>">

          <div class="p-imgwrap">
            <a href="<?php echo esc_url($r_url); ?>" class="p-img-link" tabindex="-1">
              <?php
                $r_thumb_id  = $related->get_image_id();
                $r_thumb_url = $r_thumb_id
                  ? wp_get_attachment_image($r_thumb_id, 'medium', false, ['class' => 'attachment-medium size-medium'])
                  : wc_placeholder_img('medium');
                echo $r_thumb_url;
              ?>
            </a>

            <?php if (!empty($r_labels)): ?>
              <div class="p-labels">
                <?php foreach ($r_labels as $lbl):
                  $cls = 'label-tag';
                  foreach ($label_map as $k => $c) {
                    if (mb_strtolower($lbl) === mb_strtolower($k)) { $cls = $c; break; }
                  }
                ?>
                  <span class="p-label <?php echo esc_attr($cls); ?>"><?php echo esc_html($lbl); ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <div class="p-hover-actions">
              <button class="p-action-btn wishlist-btn <?php echo $r_in_wishlist ? 'is-active' : ''; ?>"
                      data-product-id="<?php echo esc_attr($r_id); ?>"
                      aria-label="<?php echo $r_in_wishlist ? 'В обраному' : 'В обране'; ?>"
                      type="button" onclick="event.stopPropagation();">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                </svg>
              </button>
              <button class="p-action-btn compare-btn <?php echo $r_in_compare ? 'is-active' : ''; ?>"
                      data-product-id="<?php echo esc_attr($r_id); ?>"
                      type="button" onclick="event.stopPropagation();">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="18" y1="20" x2="18" y2="10"/>
                  <line x1="12" y1="20" x2="12" y2="4"/>
                  <line x1="6"  y1="20" x2="6"  y2="14"/>
                </svg>
              </button>
            </div>
          </div>

          <div class="p-body">
            <h3 class="p-title">
              <a href="<?php echo esc_url($r_url); ?>"><?php echo esc_html($r_title); ?></a>
            </h3>

            <p class="p-desc"><?php echo wp_trim_words($related->get_short_description() ?: $related->get_description(), 12); ?></p>

            <div class="p-meta p-meta-fixed">
              <?php if ($related->is_on_sale()): ?>
                <span class="pill pill-sale">Знижка</span>
              <?php else: ?>
                <span class="p-meta-placeholder"></span>
              <?php endif; ?>
            </div>

            <div class="p-bottom">
              <div class="p-price">
                <div class="price"><?php echo $r_price; ?></div>
                <div class="p-stock-text <?php echo $r_stock ? 'p-stock-in' : 'p-stock-out'; ?>">
                  <?php echo $r_stock ? 'В наявності' : 'Немає'; ?>
                </div>
              </div>
              <?php if ($r_stock && $related->is_type('simple')): ?>
                <a href="?add-to-cart=<?php echo esc_attr($r_id); ?>"
                   class="btn p-cart-btn ajax_add_to_cart add_to_cart_button"
                   data-product_id="<?php echo esc_attr($r_id); ?>"
                   data-quantity="1" rel="nofollow"
                   onclick="event.stopPropagation();">Купити</a>
              <?php else: ?>
                <a href="<?php echo esc_url($r_url); ?>"
                   class="btn btn-outline p-cart-btn"
                   onclick="event.stopPropagation();">Детальніше</a>
              <?php endif; ?>
            </div>
          </div>

        </article>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

</section>

<!-- Лайтбокс -->
<div class="sp-lightbox" id="spLightbox" aria-hidden="true">
  <div class="sp-lightbox-overlay" id="spLightboxOverlay"></div>
  <button class="sp-lightbox-close" id="spLightboxClose" aria-label="Закрити">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
      <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
    </svg>
  </button>
  <button class="sp-lightbox-prev" id="spLightboxPrev" aria-label="Попереднє">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
      <polyline points="15 18 9 12 15 6"/>
    </svg>
  </button>
  <button class="sp-lightbox-next" id="spLightboxNext" aria-label="Наступне">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
      <polyline points="9 18 15 12 9 6"/>
    </svg>
  </button>
  <div class="sp-lightbox-img-wrap">
    <img src="" alt="" id="spLightboxImg" class="sp-lightbox-img">
  </div>
  <div class="sp-lightbox-counter" id="spLightboxCounter"></div>
</div>

<script>
(function() {

  // ── Вкладки ──────────────────────────────────────────────
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

  // ── Галерея мініатюр ──────────────────────────────────────
  document.querySelectorAll('.sp-thumb').forEach(function(thumb) {
    thumb.addEventListener('click', function() {
      var main = document.getElementById('spMainImg');
      if (main) {
        main.src = this.dataset.full;
        main.dataset.index = this.dataset.index;
      }
      document.querySelectorAll('.sp-thumb').forEach(function(t) { t.classList.remove('is-active'); });
      this.classList.add('is-active');
    });
  });

  // ── Лайтбокс ──────────────────────────────────────────────
  var allImages = <?php echo json_encode(array_values($all_images)); ?>;
  var currentIndex = 0;
  var lightbox = document.getElementById('spLightbox');
  var lbImg    = document.getElementById('spLightboxImg');
  var lbCounter= document.getElementById('spLightboxCounter');

  function openLightbox(index) {
    currentIndex = index;
    lbImg.src = allImages[currentIndex];
    updateCounter();
    lightbox.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    updateNavBtns();
  }

  function closeLightbox() {
    lightbox.classList.remove('is-open');
    document.body.style.overflow = '';
  }

  function updateCounter() {
    if (allImages.length > 1) {
      lbCounter.textContent = (currentIndex + 1) + ' / ' + allImages.length;
    }
  }

  function updateNavBtns() {
    var prev = document.getElementById('spLightboxPrev');
    var next = document.getElementById('spLightboxNext');
    if (allImages.length <= 1) {
      prev.style.display = 'none';
      next.style.display = 'none';
    } else {
      prev.style.display = '';
      next.style.display = '';
    }
  }

  function showPrev() {
    currentIndex = (currentIndex - 1 + allImages.length) % allImages.length;
    lbImg.src = allImages[currentIndex];
    updateCounter();
    syncThumb();
  }

  function showNext() {
    currentIndex = (currentIndex + 1) % allImages.length;
    lbImg.src = allImages[currentIndex];
    updateCounter();
    syncThumb();
  }

  function syncThumb() {
    document.querySelectorAll('.sp-thumb').forEach(function(t) {
      t.classList.toggle('is-active', parseInt(t.dataset.index) === currentIndex);
    });
    var mainImg = document.getElementById('spMainImg');
    if (mainImg) mainImg.src = allImages[currentIndex];
  }

  // Відкрити при кліку на головне фото
  var mainWrap = document.getElementById('spMainWrap');
  if (mainWrap) {
    mainWrap.addEventListener('click', function() {
      var main = document.getElementById('spMainImg');
      var idx = main ? parseInt(main.dataset.index || 0) : 0;
      openLightbox(idx);
    });
  }

  document.getElementById('spLightboxClose').addEventListener('click', closeLightbox);
  document.getElementById('spLightboxOverlay').addEventListener('click', closeLightbox);
  document.getElementById('spLightboxPrev').addEventListener('click', showPrev);
  document.getElementById('spLightboxNext').addEventListener('click', showNext);

  // Клавіатура
  document.addEventListener('keydown', function(e) {
    if (!lightbox.classList.contains('is-open')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft') showPrev();
    if (e.key === 'ArrowRight') showNext();
  });

  // Свайп на мобільному
  var touchStartX = 0;
  lbImg.addEventListener('touchstart', function(e) {
    touchStartX = e.touches[0].clientX;
  }, { passive: true });
  lbImg.addEventListener('touchend', function(e) {
    var diff = touchStartX - e.changedTouches[0].clientX;
    if (Math.abs(diff) > 50) {
      diff > 0 ? showNext() : showPrev();
    }
  });

  // ── Зірочки рейтингу у формі ─────────────────────────────
  var stars = document.querySelectorAll('.dis-star');
  var ratingInput = document.getElementById('disRatingInput');

  stars.forEach(function(star) {
    star.addEventListener('mouseenter', function() {
      var val = parseInt(this.dataset.value);
      stars.forEach(function(s) {
        s.classList.toggle('hovered', parseInt(s.dataset.value) <= val);
      });
    });

    star.addEventListener('mouseleave', function() {
      stars.forEach(function(s) { s.classList.remove('hovered'); });
    });

    star.addEventListener('click', function() {
      var val = parseInt(this.dataset.value);
      if (ratingInput) ratingInput.value = val;
      stars.forEach(function(s) {
        s.classList.toggle('selected', parseInt(s.dataset.value) <= val);
      });
    });
  });

  // ── Прибрати spinner у кількості, зробити чистий input ───
  var qtyInput = document.querySelector('.product-cart-btn .quantity input[type="number"]');
  if (qtyInput) {
    qtyInput.setAttribute('type', 'text');
    qtyInput.setAttribute('inputmode', 'numeric');
    qtyInput.setAttribute('pattern', '[0-9]*');
    qtyInput.addEventListener('input', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
      if (this.value === '' || parseInt(this.value) < 1) this.value = '1';
    });
  }

})();
</script>

<?php endwhile; ?>

<?php get_footer(); ?>