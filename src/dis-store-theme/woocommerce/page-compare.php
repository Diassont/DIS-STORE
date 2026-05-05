<?php
/**
 * Template Name: Compare Page
 *
 * Сторінка порівняння товарів — рендерить таблицю напряму через PHP
 * без шорткоду (шорткод таблиці є тільки в PRO-версії плагіну).
 */

get_header();
?>

<section class="container section compare-page-section">

  <div class="compare-page-header">
    <h1 class="page-title">Порівняння товарів</h1>
    <a href="<?php echo esc_url( function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/') ); ?>"
       class="compare-back-link">
      ← Повернутись до каталогу
    </a>
  </div>

  <div class="compare-table-wrap">
    <?php
    if ( class_exists('YITH_WooCompare_Table') ) {
      // Рендеримо таблицю напряму через клас плагіну
      $args = [
        'fixed'  => false,
        'iframe' => 'no',
      ];
      YITH_WooCompare_Table::instance( $args )->output_table();
    } else {
      echo '<p style="color:rgba(255,255,255,.5);text-align:center;padding:40px 0;">Плагін порівняння не активний.</p>';
    }
    ?>
  </div>

</section>

<style>
.compare-page-section {
  padding-top: 40px;
  padding-bottom: 60px;
}

.compare-page-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 12px;
  margin-bottom: 32px;
}

.compare-page-header .page-title {
  margin: 0;
}

.compare-back-link {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  color: rgba(255,255,255,.55);
  font-size: 14px;
  font-weight: 600;
  text-decoration: none;
  transition: color .2s;
}

.compare-back-link:hover {
  color: #ff6a00;
}

.compare-table-wrap {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.compare-table-wrap #yith-woocompare,
#yith-woocompare { background: transparent !important; }

.compare-table-wrap table.compare-list {
  background: transparent !important;
  border-collapse: collapse !important;
  width: 100% !important;
  color: #e8e8e8 !important;
}

.compare-table-wrap table.compare-list td,
.compare-table-wrap table.compare-list th {
  border: 1px solid rgba(255,255,255,.08) !important;
  padding: 14px 16px !important;
  vertical-align: middle !important;
  background: rgba(255,255,255,.03) !important;
  color: #e8e8e8 !important;
  font-size: 14px !important;
}

.compare-table-wrap table.compare-list th {
  background: rgba(255,255,255,.06) !important;
  font-weight: 700 !important;
  color: rgba(255,255,255,.55) !important;
  font-size: 12px !important;
  text-transform: uppercase !important;
  letter-spacing: .05em !important;
  width: 160px !important;
  min-width: 140px !important;
}

.compare-table-wrap table.compare-list img {
  border-radius: 10px !important;
  border: 1px solid rgba(255,255,255,.1) !important;
  background: rgba(255,255,255,.04) !important;
  object-fit: contain !important;
  max-width: 160px !important;
}

.compare-table-wrap table.compare-list a {
  color: #e8e8e8 !important;
  text-decoration: none !important;
  font-weight: 700 !important;
}

.compare-table-wrap table.compare-list a:hover {
  color: #ff6a00 !important;
}

.compare-table-wrap table.compare-list .price,
.compare-table-wrap table.compare-list .woocommerce-Price-amount {
  color: #e8e8e8 !important;
  font-weight: 800 !important;
  font-size: 16px !important;
}

.compare-table-wrap table.compare-list .remove a {
  color: rgba(255,255,255,.4) !important;
  font-size: 13px !important;
  font-weight: 600 !important;
  text-decoration: none !important;
  transition: color .2s !important;
}

.compare-table-wrap table.compare-list .remove a:hover {
  color: #fc8181 !important;
}

.compare-table-wrap table.compare-list .add_to_cart_button,
.compare-table-wrap table.compare-list .button {
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
  transition: background .2s, border-color .2s !important;
  white-space: nowrap !important;
}

.compare-table-wrap table.compare-list .add_to_cart_button:hover,
.compare-table-wrap table.compare-list .button:hover {
  background: rgba(255,106,0,.3) !important;
  border-color: rgba(255,106,0,.6) !important;
}

.compare-table-wrap table.compare-list .availability .in-stock,
.compare-table-wrap table.compare-list ins {
  color: #9ae6b4 !important;
  font-weight: 700 !important;
}

.compare-table-wrap table.compare-list .availability .out-of-stock {
  color: #fc8181 !important;
  font-weight: 700 !important;
}

.compare-table-wrap table.compare-list tr:nth-child(even) td {
  background: rgba(255,255,255,.05) !important;
}

.compare-table-wrap table.compare-list .no-products td {
  text-align: center !important;
  padding: 60px 20px !important;
  color: rgba(255,255,255,.4) !important;
  font-size: 15px !important;
}

.compare-table-wrap .dataTables_wrapper { color: #e8e8e8 !important; }
.compare-table-wrap .DTFC_LeftWrapper,
.compare-table-wrap .DTFC_RightWrapper { background: #0e0e0e !important; }

.compare-table-wrap::-webkit-scrollbar { height: 6px; }
.compare-table-wrap::-webkit-scrollbar-track { background: rgba(255,255,255,.05); border-radius: 3px; }
.compare-table-wrap::-webkit-scrollbar-thumb { background: rgba(255,255,255,.15); border-radius: 3px; }
.compare-table-wrap::-webkit-scrollbar-thumb:hover { background: rgba(255,106,0,.4); }
</style>

<?php get_footer(); ?>
