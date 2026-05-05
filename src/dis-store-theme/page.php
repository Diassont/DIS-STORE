<?php get_header(); ?>

<section class="container section">
  <?php if ( is_page('compare') ): ?>

    <div class="compare-page-header">
      <h1 class="page-title">Порівняння товарів</h1>
      <a href="<?php echo esc_url( function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/') ); ?>"
         class="compare-back-link">← Повернутись до каталогу</a>
    </div>

    <div class="compare-table-wrap">
      <?php
        if ( class_exists('YITH_WooCompare_Table') ) {
          // Підключаємо JS плагіну щоб видалення/оновлення таблиці працювало
          wp_enqueue_script('yith-woocompare-main');
          wp_enqueue_script('jquery-fixedheadertable');
          wp_enqueue_script('jquery-fixedcolumns');
          wp_enqueue_script('jquery-imagesloaded');

          YITH_WooCompare_Table::instance(['fixed' => false, 'iframe' => 'no'])->output_table();
        } else {
          echo '<p class="compare-empty">Плагін порівняння не активний.</p>';
        }
      ?>
    </div>

  <?php else: ?>

    <?php while (have_posts()): the_post(); ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
      <div class="content"><?php the_content(); ?></div>
    <?php endwhile; ?>

  <?php endif; ?>
</section>

<?php if ( is_page('compare') ): ?>
<style>
/* ── Скидаємо білий фон що додає плагін ── */
body.page-id-<?php echo (int) get_option('yith_woocompare_page_id'); ?> .yith-woocompare-table-wrapper,
.compare-table-wrap .yith-woocompare-table-wrapper,
.compare-table-wrap #yith-woocompare,
#yith-woocompare {
  background: transparent !important;
  color: #e8e8e8 !important;
}

/* Прибираємо білий фон з плагінського CSS */
.compare-table-wrap table.compare-list,
#yith-woocompare table.compare-list {
  background: transparent !important;
  border-collapse: collapse !important;
  width: 100% !important;
  color: #e8e8e8 !important;
}

.compare-table-wrap table.compare-list *,
#yith-woocompare table.compare-list * {
  background-color: transparent;
}

.compare-table-wrap table.compare-list td,
.compare-table-wrap table.compare-list th,
#yith-woocompare table.compare-list td,
#yith-woocompare table.compare-list th {
  border: 1px solid rgba(255,255,255,.08) !important;
  padding: 14px 16px !important;
  vertical-align: middle !important;
  background: rgba(255,255,255,.03) !important;
  color: #e8e8e8 !important;
  font-size: 14px !important;
}

#yith-woocompare table.compare-list th,
.compare-table-wrap table.compare-list th {
  background: rgba(255,255,255,.07) !important;
  font-weight: 700 !important;
  color: rgba(255,255,255,.55) !important;
  font-size: 12px !important;
  text-transform: uppercase !important;
  letter-spacing: .05em !important;
  width: 160px !important;
  min-width: 140px !important;
}

#yith-woocompare table.compare-list img {
  border-radius: 10px !important;
  border: 1px solid rgba(255,255,255,.1) !important;
  background: rgba(255,255,255,.04) !important;
  object-fit: contain !important;
  max-width: 160px !important;
}

#yith-woocompare table.compare-list a {
  color: #e8e8e8 !important;
  text-decoration: none !important;
  font-weight: 700 !important;
}

#yith-woocompare table.compare-list a:hover { color: #ff6a00 !important; }

#yith-woocompare table.compare-list .price,
#yith-woocompare table.compare-list .woocommerce-Price-amount {
  color: #e8e8e8 !important;
  font-weight: 800 !important;
  font-size: 16px !important;
}

#yith-woocompare table.compare-list .remove a {
  color: rgba(255,255,255,.4) !important;
  font-size: 13px !important;
  font-weight: 600 !important;
  text-decoration: none !important;
}

#yith-woocompare table.compare-list .remove a:hover { color: #fc8181 !important; }

#yith-woocompare table.compare-list .add_to_cart_button,
#yith-woocompare table.compare-list .button {
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  padding: 10px 18px !important;
  border-radius: 12px !important;
  border: 1px solid rgba(255,106,0,.4) !important;
  background: rgba(255,106,0,.18) !important;
  color: #e8e8e8 !important;
  font-size: 13px !important;
  font-weight: 800 !important;
  text-decoration: none !important;
  cursor: pointer !important;
  white-space: nowrap !important;
}

#yith-woocompare table.compare-list .add_to_cart_button:hover,
#yith-woocompare table.compare-list .button:hover {
  background: rgba(255,106,0,.3) !important;
  border-color: rgba(255,106,0,.6) !important;
}

#yith-woocompare table.compare-list .availability .in-stock,
#yith-woocompare table.compare-list ins { color: #9ae6b4 !important; font-weight: 700 !important; }

#yith-woocompare table.compare-list .availability .out-of-stock { color: #fc8181 !important; font-weight: 700 !important; }

#yith-woocompare table.compare-list tr:nth-child(even) td { background: rgba(255,255,255,.05) !important; }

#yith-woocompare .empty-comparison { text-align: center; padding: 60px 20px; color: rgba(255,255,255,.4); font-size: 15px; }

/* DataTables dark */
.dataTables_wrapper,
.DTFC_LeftWrapper table,
.DTFC_RightWrapper table {
  background: #0e0e0e !important;
  color: #e8e8e8 !important;
}

/* Заголовок таблиці від плагіну */
#yith-woocompare h2.table-title {
  color: #e8e8e8 !important;
  font-size: 22px !important;
  margin-bottom: 20px !important;
}

/* Layout */
.compare-page-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 12px;
  margin-bottom: 32px;
}
.compare-page-header .page-title { margin: 0; }
.compare-back-link {
  color: rgba(255,255,255,.55);
  font-size: 14px;
  font-weight: 600;
  text-decoration: none;
  transition: color .2s;
}
.compare-back-link:hover { color: #ff6a00; }
.compare-table-wrap {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}
.compare-empty {
  text-align: center;
  padding: 40px 0;
  color: rgba(255,255,255,.4);
}

/* Scrollbar */
.compare-table-wrap::-webkit-scrollbar { height: 6px; }
.compare-table-wrap::-webkit-scrollbar-track { background: rgba(255,255,255,.05); }
.compare-table-wrap::-webkit-scrollbar-thumb { background: rgba(255,255,255,.15); border-radius: 3px; }
.compare-table-wrap::-webkit-scrollbar-thumb:hover { background: rgba(255,106,0,.4); }
</style>
<?php endif; ?>

<?php get_footer(); ?>
