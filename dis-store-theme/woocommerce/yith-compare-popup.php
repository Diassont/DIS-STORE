<?php
/**
 * Woocommerce Compare page
 *
 * @author YITH <plugins@yithemes.com>
 * @package YITH\Compare
 * @version 1.1.4
 */

defined( 'YITH_WOOCOMPARE' ) || exit; // Exit if accessed directly.

do_action( 'yith_woocompare_before_compare' );

// Remove the style of woocommerce.
if ( defined( 'WOOCOMMERCE_USE_CSS' ) && WOOCOMMERCE_USE_CSS ) {
	wp_dequeue_style( 'woocommerce_frontend_styles' );
}

// Removes scripts for massive-dynamic theme.
remove_action( 'wp_enqueue_scripts', 'pixflow_theme_scripts' );

?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie"<?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie"<?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie"<?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie"<?php language_attributes(); ?>>
<![endif]-->
<!--[if gt IE 9]>
<html class="ie"<?php language_attributes(); ?>>
<![endif]-->
<!--[if !IE]>
<html <?php language_attributes(); ?>>
<![endif]-->

<!-- START HEAD -->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php esc_html_e( 'Product Comparison', 'yith-woocommerce-compare' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php wp_head(); ?>

	<?php
	/**
	 * DO_ACTION: yith_woocompare_popup_head
	 *
	 * Allows to render some content in the head of the comparison popup.
	 */
	do_action( 'yith_woocompare_popup_head' );

	// Підключаємо CSS теми щоб таблиця виглядала в нашому стилі
	$theme_css = get_template_directory_uri() . '/assets/css/main.css';
	?>
	<link rel="stylesheet" href="<?php echo esc_url($theme_css); ?>">

	<script type="text/javascript">
	/* DIS Store fix: визначаємо AjaxURL та yith_woocompare якщо не завантажились */
	(function() {
		var ajaxEndpoint = '<?php echo esc_js(admin_url('admin-ajax.php')); ?>';
		var wcAjaxEndpoint = '/?wc-ajax=%%endpoint%%';

		if (typeof AjaxURL === 'undefined') {
			window.AjaxURL = ajaxEndpoint;
		}
		if (typeof ajaxurl === 'undefined') {
			window.ajaxurl = ajaxEndpoint;
		}

		// Якщо yith_woocompare вже є але без ajaxurl — допишемо
		if (typeof yith_woocompare !== 'undefined' && !yith_woocompare.ajaxurl) {
			yith_woocompare.ajaxurl = wcAjaxEndpoint;
		}

		// Якщо yith_woocompare взагалі не визначено — створимо мінімальний об'єкт
		// (буде перезаписаний wp_localize_script якщо той спрацює)
		if (typeof yith_woocompare === 'undefined') {
			window.yith_woocompare = {
				ajaxurl: wcAjaxEndpoint,
				nonces: {
					add:    '<?php echo esc_js(wp_create_nonce('yith_woocompare_add_action')); ?>',
					remove: '<?php echo esc_js(wp_create_nonce('yith_woocompare_remove_action')); ?>',
					reload: '<?php echo esc_js(wp_create_nonce('yith_woocompare_reload_action')); ?>',
				},
				table_title: '<?php echo esc_js(apply_filters('yith_woocompare_compare_table_title', __('Product Comparison', 'yith-woocommerce-compare'))); ?>',
				loader: '',
				auto_open: false,
			};
		}
	})();
	</script>

	<style type="text/css">
		body.loading {
			background: url("<?php echo YITH_WOOCOMPARE_URL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>assets/images/colorbox/loading.gif") no-repeat scroll center center transparent;
		}

		/* DIS Store dark theme для сторінки порівняння */
		*, *::before, *::after { box-sizing: border-box; }

		body {
			background: #0e0e0e !important;
			color: #e8e8e8 !important;
			font-family: 'Inter', 'Segoe UI', sans-serif !important;
			margin: 0;
			padding: 20px;
		}

		h2 {
			font-size: 24px;
			font-weight: 900;
			color: #e8e8e8 !important;
			margin: 0 0 20px;
		}

		/* Таблиця */
		table.compare-list {
			background: transparent !important;
			border-collapse: collapse !important;
			width: 100% !important;
			color: #e8e8e8 !important;
		}

		table.compare-list td,
		table.compare-list th {
			border: 1px solid rgba(255,255,255,.08) !important;
			padding: 14px 16px !important;
			vertical-align: middle !important;
			background: rgba(255,255,255,.03) !important;
			color: #e8e8e8 !important;
			font-size: 14px !important;
		}

		table.compare-list .compare-heading td,
		table.compare-list td.label {
			background: rgba(255,255,255,.06) !important;
			font-weight: 700 !important;
			color: rgba(255,255,255,.55) !important;
			font-size: 12px !important;
			text-transform: uppercase !important;
			letter-spacing: .05em !important;
			width: 160px !important;
			min-width: 140px !important;
		}

		/* Фото товару */
		table.compare-list img {
			border-radius: 10px !important;
			border: 1px solid rgba(255,255,255,.1) !important;
			background: rgba(255,255,255,.04) !important;
			object-fit: contain !important;
			max-width: 140px !important;
		}

		/* Назва товару */
		table.compare-list .product-title a,
		table.compare-list a {
			color: #e8e8e8 !important;
			text-decoration: none !important;
			font-weight: 700 !important;
		}

		table.compare-list a:hover {
			color: #ff6a00 !important;
		}

		/* Ціна */
		table.compare-list .price,
		table.compare-list .woocommerce-Price-amount {
			color: #e8e8e8 !important;
			font-weight: 800 !important;
			font-size: 16px !important;
		}

		/* Кнопка видалити */
		table.compare-list .remove a,
		table.compare-list .remove span {
			color: rgba(255,255,255,.4) !important;
			font-size: 13px !important;
			font-weight: 600 !important;
			text-decoration: none !important;
			transition: color .2s !important;
		}

		table.compare-list .remove a:hover {
			color: #fc8181 !important;
		}

		/* Кнопка додати в кошик */
		table.compare-list .add_to_cart_button,
		table.compare-list .button {
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

		table.compare-list .add_to_cart_button:hover,
		table.compare-list .button:hover {
			background: rgba(255,106,0,.3) !important;
			border-color: rgba(255,106,0,.6) !important;
		}

		/* Наявність */
		table.compare-list .availability .in-stock,
		table.compare-list ins {
			color: #9ae6b4 !important;
			font-weight: 700 !important;
		}

		table.compare-list .availability .out-of-stock {
			color: #fc8181 !important;
			font-weight: 700 !important;
		}

		/* Чергування рядків */
		table.compare-list tr:nth-child(even) td {
			background: rgba(255,255,255,.05) !important;
		}

		/* DataTables overrides */
		.dataTables_wrapper { color: #e8e8e8 !important; }
		.DTFC_LeftWrapper, .DTFC_RightWrapper { background: #0e0e0e !important; }

		/* Scrollbar */
		::-webkit-scrollbar { width: 6px; height: 6px; }
		::-webkit-scrollbar-track { background: rgba(255,255,255,.05); }
		::-webkit-scrollbar-thumb { background: rgba(255,255,255,.15); border-radius: 3px; }
		::-webkit-scrollbar-thumb:hover { background: rgba(255,106,0,.4); }
	</style>
</head>
<!-- END HEAD -->

<?php global $product; ?>

<!-- START BODY -->
<body <?php body_class( 'woocommerce yith-woocompare-popup' ); ?>>

<?php wc_get_template( 'yith-compare-table.php', $args, '', YITH_WOOCOMPARE_TEMPLATE_PATH ); ?>

<?php
/**
 * DO_ACTION: yith_woocompare_popup_footer
 *
 * Allows to render some content in the footer of the comparison popup.
 */
do_action( 'yith_woocompare_popup_footer' );
?>

<?php do_action( 'wp_print_footer_scripts' ); ?>

<script type="text/javascript">

	jQuery(document).ready(function($){

		$('a').attr('target', '_parent');

		var body = $('body'),
			redirect_to_cart = false;

		// close colorbox if redirect to cart is active after add to cart
		body.on( 'adding_to_cart', function ( $thisbutton, data ) {
			if( wc_add_to_cart_params.cart_redirect_after_add == 'yes' ) {
				wc_add_to_cart_params.cart_redirect_after_add = 'no';
				redirect_to_cart = true;
			}
		});

		// remove add to cart button after added
		body.on('added_to_cart', function( ev, fragments, cart_hash, button ){

			if( redirect_to_cart == true ) {
				// redirect
				parent.window.location = wc_add_to_cart_params.cart_url;
				return;
			}

			$('a').attr('target', '_parent');

			// Replace fragments
			if ( fragments ) {
				$.each(fragments, function(key, value) {
					$(key, window.parent.document).replaceWith(value);
				});
			}
		});
	});

</script>

</body>
</html>

<?php

do_action( 'yith_woocompare_after_compare' );
