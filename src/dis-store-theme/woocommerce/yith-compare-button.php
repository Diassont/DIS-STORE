<?php
/**
 * Compare button — DIS Store override
 * Замінює стандартну кнопку плагіну на нашу стилізовану
 *
 * Змінні: $product_id, $added, $compare_url, $compare_label, $compare_classes, $style
 */
if (!isset($product_id)) return;
?>
<button
  class="p-action-btn compare-btn <?php echo !empty($added) ? 'is-active' : ''; ?>"
  data-product-id="<?php echo (int) $product_id; ?>"
  data-product_id="<?php echo (int) $product_id; ?>"
  aria-label="<?php echo !empty($added) ? 'В порівнянні' : 'Порівняти'; ?>"
  title="<?php echo !empty($added) ? 'В порівнянні' : 'Порівняти'; ?>"
  type="button"
>
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
    <line x1="18" y1="20" x2="18" y2="10"/>
    <line x1="12" y1="20" x2="12" y2="4"/>
    <line x1="6" y1="20" x2="6" y2="14"/>
  </svg>
</button>
<?php wp_enqueue_script('yith-woocompare-main'); ?>
