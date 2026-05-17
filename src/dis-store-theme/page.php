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
/* Dynamic selector з PHP: потребує inline через page ID */
body.page-id-<?php echo (int) get_option('yith_woocompare_page_id'); ?> .yith-woocommerce-table-wrapper {
  background: transparent !important;
}
</style>
<?php endif; ?>

<?php get_footer(); ?>
