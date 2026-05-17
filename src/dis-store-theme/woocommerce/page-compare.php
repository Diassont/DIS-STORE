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

<?php get_footer(); ?>
