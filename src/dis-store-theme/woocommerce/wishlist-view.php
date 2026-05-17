<?php
/**
 * Wishlist view — DIS STORE custom template
 * Шлях: wp-content/themes/dis-store-theme/woocommerce/wishlist-view.php
 * Шлях (мобілка): wp-content/themes/dis-store-theme/woocommerce/wishlist-view-mobile.php
 */
if ( ! defined( 'YITH_WCWL' ) ) exit;
?>

<div class="wl-grid">
<?php foreach ( $wishlist_items as $item ) :
    $product = $item->get_product();
    if ( ! $product || ! $product->exists() ) continue;

    $pid        = $item->get_product_id();
    $permalink  = get_permalink( $pid );
    $remove_url = $item->get_remove_url();
    $in_stock   = $product->is_in_stock();
    $is_simple  = $product->is_type( 'simple' );
    $on_sale    = $product->is_on_sale();
    $excerpt    = wp_trim_words(
        $product->get_short_description() ?: strip_tags( $product->get_description() ),
        12
    );
?>
<article class="p-card">

    <a href="<?php echo esc_url( $remove_url ); ?>"
       class="wl-remove"
       title="Видалити з обраного"
       onclick="event.preventDefault();var c=this.closest('.p-card');c.style.cssText='transition:opacity .25s,transform .25s;opacity:0;transform:scale(.96)';setTimeout(function(){window.location.href='<?php echo esc_js( $remove_url ); ?>';},260);">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="14" height="14"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </a>

    <div class="p-imgwrap">
        <a href="<?php echo esc_url( $permalink ); ?>" class="p-img-link" tabindex="-1">
            <?php echo $product->get_image( 'medium' ); ?>
        </a>
    </div>

    <div class="p-body">
        <h3 class="p-title">
            <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $product->get_name() ); ?></a>
        </h3>

        <p class="p-desc"><?php echo $excerpt ? esc_html( $excerpt ) : '&nbsp;'; ?></p>

        <div class="p-meta p-meta-fixed">
            <?php if ( $on_sale ) : ?>
                <span class="pill pill-sale">Знижка</span>
            <?php else : ?>
                <span class="p-meta-placeholder"></span>
            <?php endif; ?>
        </div>

        <div class="p-bottom">
            <div class="p-price">
                <div class="price"><?php echo $product->get_price_html(); ?></div>
                <div class="p-stock-text <?php echo $in_stock ? 'p-stock-in' : 'p-stock-out'; ?>">
                    <?php echo $in_stock ? 'В наявності' : 'Немає'; ?>
                </div>
            </div>

            <?php if ( $in_stock && $is_simple ) : ?>
                <a href="<?php echo esc_url( add_query_arg([
                    'add-to-cart'                            => $pid,
                    'remove_from_wishlist_after_add_to_cart' => $pid,
                    'wishlist_id'                            => $wishlist->get_id(),
                    'wishlist_token'                         => $wishlist->get_token(),
                ], wc_get_cart_url()) ); ?>"
                   class="btn p-cart-btn ajax_add_to_cart add_to_cart_button"
                   data-product_id="<?php echo esc_attr( $pid ); ?>"
                   data-quantity="1"
                   rel="nofollow">Додати в кошик</a>
            <?php else : ?>
                <a href="<?php echo esc_url( $permalink ); ?>"
                   class="btn btn-outline p-cart-btn">Детальніше</a>
            <?php endif; ?>
        </div>
    </div>

</article>
<?php endforeach; ?>
</div>