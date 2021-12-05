<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>
	<div class="fr-header-wrapper a11y-focus-section"><div class="fr-header contained js-fr-header fr-header-nav"><div data-test="tickerRoot"></div>
	<div class="fr-header js-fr-header fr-header-nav cursor-pointer">
		<div class="nav-item"><a href="https://faq-vn.uniqlo.com/pkb_Home_UQ_VN?l=vi" target="_self" class="" data-category="header" data-action="open" data-label="contact" style="
    color: black">
		<span>Trợ giúp</span></a></div><div class="nav-item" data-test="store-locator-link">
			<button type="button" class = "HT"><span>Hệ thống cửa hàng</span></button></div><div class="nav-item language-selector"><div class="fr-language-selector"><span lang="en-CA"><button type="button"><span class="Eng">English</span></button><span> | </span></span><span lang="fr-CA"><button type="button"><span class="active-language">Tiếng Việt</span></button><span></span></span></div></div></div></div></div>
	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
		<?php
		/**
		 * Functions hooked into storefront_header action
		 *
		 * @hooked storefront_header_container                 - 0
		 * @hooked storefront_skip_links                       - 5
		 * @hooked storefront_social_icons                     - 10
		 * @hooked storefront_site_branding                    - 20
		 * @hooked storefront_secondary_navigation             - 30
		 * @hooked storefront_product_search                   - 40
		 * @hooked storefront_header_container_close           - 41
		 * @hooked storefront_primary_navigation_wrapper       - 42
		 * @hooked storefront_primary_navigation               - 50
		 * @hooked storefront_header_cart                      - 60
		 * @hooked storefront_primary_navigation_wrapper_close - 68
		 */
		do_action( 'storefront_header' );
		?>

	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">
		<?php
		do_action( 'storefront_content_top' );
	
