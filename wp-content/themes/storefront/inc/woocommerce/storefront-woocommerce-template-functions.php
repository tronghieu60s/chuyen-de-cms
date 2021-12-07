<?php
/**
 * WooCommerce Template Functions.
 *
 * @package storefront
 */

if ( ! function_exists( 'storefront_woo_cart_available' ) ) {
	/**
	 * Validates whether the Woo Cart instance is available in the request
	 *
	 * @since 2.6.0
	 * @return bool
	 */
	function storefront_woo_cart_available() {
		$woo = WC();
		return $woo instanceof \WooCommerce && $woo->cart instanceof \WC_Cart;
	}
}

if ( ! function_exists( 'storefront_before_content' ) ) {
	/**
	 * Before Content
	 * Wraps all WooCommerce content in wrappers which match the theme markup
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function storefront_before_content() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
		<?php
	}
}

if ( ! function_exists( 'storefront_after_content' ) ) {
	/**
	 * After Content
	 * Closes the wrapping divs
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function storefront_after_content() {
		?>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php
		do_action( 'storefront_sidebar' );
	}
}

if ( ! function_exists( 'storefront_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments
	 * Ensure cart contents update when products are added to the cart via AJAX
	 *
	 * @param  array $fragments Fragments to refresh via AJAX.
	 * @return array            Fragments to refresh via AJAX
	 */
	function storefront_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();
		storefront_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		ob_start();
		storefront_handheld_footer_bar_cart_link();
		$fragments['a.footer-cart-contents'] = ob_get_clean();

		return $fragments;
	}
}

if ( ! function_exists( 'storefront_cart_link' ) ) {
	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function storefront_cart_link() {
		if ( ! storefront_woo_cart_available() ) {
			return;
		}
		?>
			<!-- <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
				<?php /* translators: %d: number of items in cart */ ?>
				<?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
			</a> -->
		<?php
	}
}

if ( ! function_exists( 'storefront_product_search' ) ) {
	/**
	 * Display Product Search
	 *
	 * @since  1.0.0
	 * @uses  storefront_is_woocommerce_activated() check if WooCommerce is activated
	 * @return void
	 */
	function storefront_product_search() {
		if ( storefront_is_woocommerce_activated() ) {
			?>
			<div class="site-search" style="margin-bottom: 10px;margin-right: 100px;">
			<form role="search" method="get" class="woocommerce-product-search" action="http://wordpress.project/" style="display: flex;>
			<label class=" screen-reader-text for="woocommerce-product-search-field-0">
					<input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Tìm Kiếm Theo Từ Khóa" value="" name="s"style="border: 1px solid #ababab;background-color: white;">
					<button class="search1" type="submit" value="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
					<input type="hidden" name="post_type" value="product">
					<div class="fr-header-button account" style="margin-left: 25px;"><a href="http://wordpress.project/my-account/" class="" title="Đăng nhập"><span class="fr-icon" aria-hidden="true" style="font-size: 24px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.4,21.9v-1.1c0-2.4,0.7-4.4,2.2-5.8C6.2,14.2,7,13.7,8,13.2l0.2-0.1L8,13.1c-1.6-1.3-2.4-3.3-2.2-5.4 c0.3-3.2,3-5.6,6.2-5.6c0.2,0,0.4,0,0.6,0c1.7,0.2,3.1,1,4.2,2.2s1.5,2.9,1.4,4.5C18,10.5,17.2,12,16,13l-0.1,0.1l0.2,0.1 c1,0.4,1.8,1,2.5,1.7c1.4,1.5,2.1,3.5,2.1,5.8v1.1L3.4,21.9L3.4,21.9z M12,14.5c-2.4,0-4.2,0.6-5.4,1.9c-0.7,0.7-1.2,1.9-1.5,3.5 l0,0.1h13.8l0-0.1c-0.3-1.7-0.7-2.8-1.4-3.6C16.2,15.1,14.4,14.5,12,14.5z M12,3.9c-2.3,0-4.2,1.7-4.4,4c-0.1,1.2,0.2,2.3,1,3.2 s1.8,1.5,3,1.6c0.2,0,0.3,0,0.4,0c2.3,0,4.2-1.7,4.4-4c0.1-1.2-0.2-2.3-1-3.2c-0.8-0.9-1.8-1.5-3-1.6C12.3,3.9,12.1,3.9,12,3.9z" fill="black" fill-rule="evenodd"></path></svg></span></a></div>
					<div class="fr-header-button" style="margin-left: 25px;"><a class="" title="Yêu thích" href="/vn/vi/wishlist" style=""><span class="fr-icon" aria-hidden="true" style="font-size: 24px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12,22.5c-0.2,0-0.4-0.1-0.6-0.2L9.9,21c-3.6-3.2-7.3-6.6-8.4-10.1c-1.3-4.1,0.4-8,4-9.2 c2.3-0.8,4.7,0,6.5,1.8c1.8-1.9,4.2-2.6,6.5-1.8c3.6,1.2,5.3,5.1,4,9.2c-1.1,3.5-4.8,6.9-8.4,10.1l-1.5,1.3 C12.4,22.5,12.2,22.5,12,22.5z M7.4,3.2C7,3.2,6.5,3.3,6.1,3.4c-2.6,0.9-3.8,3.8-2.9,6.9c1,3,4.5,6.2,7.9,9.3l0.8,0.8l0.8-0.8 c3.4-3.1,7-6.3,7.9-9.3c1-3.1-0.2-6.1-2.9-6.9c-2.8-0.9-4.7,1.4-5.2,2.1c-0.2,0.2-0.4,0.4-0.7,0.4l0,0c-0.3,0-0.6-0.1-0.7-0.4 C10.8,4.9,9.4,3.2,7.4,3.2z" fill="black" fill-rule="evenodd"></path></svg></span></a></div>
					<div class="fr-header-button" style="margin-left: 25px;"><a class="" title="Xe đẩy" href="/vn/vi/cart" style=""><span class="fr-icon" aria-hidden="true" style="font-size: 24px;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="black" d="M18.1,22.5c-1.5,0-2.6-1.2-2.6-2.6c0-0.3,0-0.6,0.2-0.9l0-0.1H9.5l0,0.1c0.1,0.3,0.2,0.6,0.2,0.9 c0,1.4-1.2,2.6-2.6,2.6c-1.5,0-2.6-1.2-2.6-2.6c0-0.3,0-0.6,0.2-0.9l0-0.1H4.5l-0.1,0c-1.3-0.1-2.3-1.3-2.3-2.6s1-2.4,2.3-2.6l0.1,0 V3.1H0.9V1.5h5.2V4l16.3,1.2c0.2,0,0.5,0.1,0.6,0.3c0.1,0.2,0.2,0.4,0.1,0.7l-2.4,8.5c-0.1,0.3-0.4,0.6-0.8,0.6H4.7 c-0.6,0-1,0.5-1,1s0.5,1,1,1h13.6l0.1,0c1.3,0.1,2.3,1.3,2.3,2.6C20.7,21.3,19.5,22.5,18.1,22.5z M18.1,18.9c-0.6,0-1,0.5-1,1 s0.5,1,1,1s1-0.5,1-1S18.6,18.9,18.1,18.9z M7.1,18.9c-0.6,0-1,0.5-1,1s0.5,1,1,1s1-0.5,1-1S7.7,18.9,7.1,18.9z M6.1,13.6h13.2l2-7 L6.1,5.6V13.6z"></path></svg></span></a></div>
			</form>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'storefront_header_cart' ) ) {
	/**
	 * Display Header Cart
	 *
	 * @since  1.0.0
	 * @uses  storefront_is_woocommerce_activated() check if WooCommerce is activated
	 * @return void
	 */
	function storefront_header_cart() {
		if ( storefront_is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
			?>
		<ul id="site-header-cart" class="site-header-cart menu">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php storefront_cart_link(); ?>
			</li>
			<li>
				<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
			</li>
		</ul>
			<?php
		}
	}
}

if ( ! function_exists( 'storefront_upsell_display' ) ) {
	/**
	 * Upsells
	 * Replace the default upsell function with our own which displays the correct number product columns
	 *
	 * @since   1.0.0
	 * @return  void
	 * @uses    woocommerce_upsell_display()
	 */
	function storefront_upsell_display() {
		$columns = apply_filters( 'storefront_upsells_columns', 3 );
		woocommerce_upsell_display( -1, $columns );
	}
}

if ( ! function_exists( 'storefront_sorting_wrapper' ) ) {
	/**
	 * Sorting wrapper
	 *
	 * @since   1.4.3
	 * @return  void
	 */
	function storefront_sorting_wrapper() {
		echo '<div class="storefront-sorting">';
	}
}

if ( ! function_exists( 'storefront_sorting_wrapper_close' ) ) {
	/**
	 * Sorting wrapper close
	 *
	 * @since   1.4.3
	 * @return  void
	 */
	function storefront_sorting_wrapper_close() {
		echo '</div>';
	}
}

if ( ! function_exists( 'storefront_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper
	 *
	 * @since   2.2.0
	 * @return  void
	 */
	function storefront_product_columns_wrapper() {
		$columns = storefront_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}

if ( ! function_exists( 'storefront_loop_columns' ) ) {
	/**
	 * Default loop columns on product archives
	 *
	 * @return integer products per row
	 * @since  1.0.0
	 */
	function storefront_loop_columns() {
		$columns = 3; // 3 products per row

		if ( function_exists( 'wc_get_default_products_per_row' ) ) {
			$columns = wc_get_default_products_per_row();
		}

		return apply_filters( 'storefront_loop_columns', $columns );
	}
}

if ( ! function_exists( 'storefront_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close
	 *
	 * @since   2.2.0
	 * @return  void
	 */
	function storefront_product_columns_wrapper_close() {
		echo '</div>';
	}
}

if ( ! function_exists( 'storefront_shop_messages' ) ) {
	/**
	 * Storefront shop messages
	 *
	 * @since   1.4.4
	 * @uses    storefront_do_shortcode
	 */
	function storefront_shop_messages() {
		if ( ! is_checkout() ) {
			echo wp_kses_post( storefront_do_shortcode( 'woocommerce_messages' ) );
		}
	}
}

if ( ! function_exists( 'storefront_woocommerce_pagination' ) ) {
	/**
	 * Storefront WooCommerce Pagination
	 * WooCommerce disables the product pagination inside the woocommerce_product_subcategories() function
	 * but since Storefront adds pagination before that function is excuted we need a separate function to
	 * determine whether or not to display the pagination.
	 *
	 * @since 1.4.4
	 */
	function storefront_woocommerce_pagination() {
		if ( woocommerce_products_will_display() ) {
			woocommerce_pagination();
		}
	}
}

if ( ! function_exists( 'storefront_product_categories' ) ) {
	/**
	 * Display Product Categories
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_product_categories( $args ) {
		$args = apply_filters(
			'storefront_product_categories_args',
			array(
				'limit'            => 3,
				'columns'          => 3,
				'child_categories' => 0,
				'orderby'          => 'menu_order',
				'title'            => __( 'Shop by Category', 'storefront' ),
			)
		);

		$shortcode_content = storefront_do_shortcode(
			'product_categories',
			apply_filters(
				'storefront_product_categories_shortcode_args',
				array(
					'number'  => intval( $args['limit'] ),
					'columns' => intval( $args['columns'] ),
					'orderby' => esc_attr( $args['orderby'] ),
					'parent'  => esc_attr( $args['child_categories'] ),
				)
			)
		);

		/**
		 * Only display the section if the shortcode returns product categories
		 */
		if ( false !== strpos( $shortcode_content, 'product-category' ) ) {
			echo '<section class="storefront-product-section storefront-product-categories" aria-label="' . esc_attr__( 'Product Categories', 'storefront' ) . '">';

			do_action( 'storefront_homepage_before_product_categories' );

			echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

			do_action( 'storefront_homepage_after_product_categories_title' );

			echo $shortcode_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			do_action( 'storefront_homepage_after_product_categories' );

			echo '</section>';
		}
	}
}

if ( ! function_exists( 'storefront_recent_products' ) ) {
	/**
	 * Display Recent Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_recent_products( $args ) {
		$args = apply_filters(
			'storefront_recent_products_args',
			array(
				'limit'   => 4,
				'columns' => 4,
				'orderby' => 'date',
				'order'   => 'desc',
				'title'   => __( 'New In', 'storefront' ),
			)
		);

		$shortcode_content = storefront_do_shortcode(
			'products',
			apply_filters(
				'storefront_recent_products_shortcode_args',
				array(
					'orderby'  => esc_attr( $args['orderby'] ),
					'order'    => esc_attr( $args['order'] ),
					'per_page' => intval( $args['limit'] ),
					'columns'  => intval( $args['columns'] ),
				)
			)
		);

		/**
		 * Only display the section if the shortcode returns products
		 */
		if ( false !== strpos( $shortcode_content, 'product' ) ) {
			echo '<section class="storefront-product-section storefront-recent-products" aria-label="' . esc_attr__( 'Recent Products', 'storefront' ) . '">';

			do_action( 'storefront_homepage_before_recent_products' );

			echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

			do_action( 'storefront_homepage_after_recent_products_title' );

			echo $shortcode_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			do_action( 'storefront_homepage_after_recent_products' );

			echo '</section>';
		}
	}
}

if ( ! function_exists( 'storefront_featured_products' ) ) {
	/**
	 * Display Featured Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_featured_products( $args ) {
		$args = apply_filters(
			'storefront_featured_products_args',
			array(
				'limit'      => 4,
				'columns'    => 4,
				'orderby'    => 'date',
				'order'      => 'desc',
				'visibility' => 'featured',
				'title'      => __( 'We Recommend', 'storefront' ),
			)
		);

		$shortcode_content = storefront_do_shortcode(
			'products',
			apply_filters(
				'storefront_featured_products_shortcode_args',
				array(
					'per_page'   => intval( $args['limit'] ),
					'columns'    => intval( $args['columns'] ),
					'orderby'    => esc_attr( $args['orderby'] ),
					'order'      => esc_attr( $args['order'] ),
					'visibility' => esc_attr( $args['visibility'] ),
				)
			)
		);

		/**
		 * Only display the section if the shortcode returns products
		 */
		if ( false !== strpos( $shortcode_content, 'product' ) ) {
			echo '<section class="storefront-product-section storefront-featured-products" aria-label="' . esc_attr__( 'Featured Products', 'storefront' ) . '">';

			do_action( 'storefront_homepage_before_featured_products' );

			echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

			do_action( 'storefront_homepage_after_featured_products_title' );

			echo $shortcode_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			do_action( 'storefront_homepage_after_featured_products' );

			echo '</section>';
		}
	}
}

if ( ! function_exists( 'storefront_popular_products' ) ) {
	/**
	 * Display Popular Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_popular_products( $args ) {
		$args = apply_filters(
			'storefront_popular_products_args',
			array(
				'limit'   => 4,
				'columns' => 4,
				'orderby' => 'rating',
				'order'   => 'desc',
				'title'   => __( 'Fan Favorites', 'storefront' ),
			)
		);

		$shortcode_content = storefront_do_shortcode(
			'products',
			apply_filters(
				'storefront_popular_products_shortcode_args',
				array(
					'per_page' => intval( $args['limit'] ),
					'columns'  => intval( $args['columns'] ),
					'orderby'  => esc_attr( $args['orderby'] ),
					'order'    => esc_attr( $args['order'] ),
				)
			)
		);

		/**
		 * Only display the section if the shortcode returns products
		 */
		if ( false !== strpos( $shortcode_content, 'product' ) ) {
			echo '<section class="storefront-product-section storefront-popular-products" aria-label="' . esc_attr__( 'Popular Products', 'storefront' ) . '">';

			do_action( 'storefront_homepage_before_popular_products' );

			echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

			do_action( 'storefront_homepage_after_popular_products_title' );

			echo $shortcode_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			do_action( 'storefront_homepage_after_popular_products' );

			echo '</section>';
		}
	}
}

if ( ! function_exists( 'storefront_on_sale_products' ) ) {
	/**
	 * Display On Sale Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @param array $args the product section args.
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_on_sale_products( $args ) {
		$args = apply_filters(
			'storefront_on_sale_products_args',
			array(
				'limit'   => 4,
				'columns' => 4,
				'orderby' => 'date',
				'order'   => 'desc',
				'on_sale' => 'true',
				'title'   => __( 'On Sale', 'storefront' ),
			)
		);

		$shortcode_content = storefront_do_shortcode(
			'products',
			apply_filters(
				'storefront_on_sale_products_shortcode_args',
				array(
					'per_page' => intval( $args['limit'] ),
					'columns'  => intval( $args['columns'] ),
					'orderby'  => esc_attr( $args['orderby'] ),
					'order'    => esc_attr( $args['order'] ),
					'on_sale'  => esc_attr( $args['on_sale'] ),
				)
			)
		);

		/**
		 * Only display the section if the shortcode returns products
		 */
		if ( false !== strpos( $shortcode_content, 'product' ) ) {
			echo '<section class="storefront-product-section storefront-on-sale-products" aria-label="' . esc_attr__( 'On Sale Products', 'storefront' ) . '">';

			do_action( 'storefront_homepage_before_on_sale_products' );

			echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

			do_action( 'storefront_homepage_after_on_sale_products_title' );

			echo $shortcode_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			do_action( 'storefront_homepage_after_on_sale_products' );

			echo '</section>';
		}
	}
}

if ( ! function_exists( 'storefront_best_selling_products' ) ) {
	/**
	 * Display Best Selling Products
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since 2.0.0
	 * @param array $args the product section args.
	 * @return void
	 */
	function storefront_best_selling_products( $args ) {
		$args = apply_filters(
			'storefront_best_selling_products_args',
			array(
				'limit'   => 4,
				'columns' => 4,
				'orderby' => 'popularity',
				'order'   => 'desc',
				'title'   => esc_attr__( 'Best Sellers', 'storefront' ),
			)
		);

		$shortcode_content = storefront_do_shortcode(
			'products',
			apply_filters(
				'storefront_best_selling_products_shortcode_args',
				array(
					'per_page' => intval( $args['limit'] ),
					'columns'  => intval( $args['columns'] ),
					'orderby'  => esc_attr( $args['orderby'] ),
					'order'    => esc_attr( $args['order'] ),
				)
			)
		);

		/**
		 * Only display the section if the shortcode returns products
		 */
		if ( false !== strpos( $shortcode_content, 'product' ) ) {
			echo '<section class="storefront-product-section storefront-best-selling-products" aria-label="' . esc_attr__( 'Best Selling Products', 'storefront' ) . '">';

			do_action( 'storefront_homepage_before_best_selling_products' );

			echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

			do_action( 'storefront_homepage_after_best_selling_products_title' );

			echo $shortcode_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			do_action( 'storefront_homepage_after_best_selling_products' );

			echo '</section>';
		}
	}
}

if ( ! function_exists( 'storefront_promoted_products' ) ) {
	/**
	 * Featured and On-Sale Products
	 * Check for featured products then on-sale products and use the appropiate shortcode.
	 * If neither exist, it can fallback to show recently added products.
	 *
	 * @since  1.5.1
	 * @param integer $per_page total products to display.
	 * @param integer $columns columns to arrange products in to.
	 * @param boolean $recent_fallback Should the function display recent products as a fallback when there are no featured or on-sale products?.
	 * @uses  storefront_is_woocommerce_activated()
	 * @uses  wc_get_featured_product_ids()
	 * @uses  wc_get_product_ids_on_sale()
	 * @uses  storefront_do_shortcode()
	 * @return void
	 */
	function storefront_promoted_products( $per_page = '2', $columns = '2', $recent_fallback = true ) {
		if ( storefront_is_woocommerce_activated() ) {

			if ( wc_get_featured_product_ids() ) {

				echo '<h2>' . esc_html__( 'Featured Products', 'storefront' ) . '</h2>';

				// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
				echo storefront_do_shortcode(
					'featured_products',
					array(
						'per_page' => $per_page,
						'columns'  => $columns,
					)
				);
				// phpcs:enable
			} elseif ( wc_get_product_ids_on_sale() ) {

				echo '<h2>' . esc_html__( 'On Sale Now', 'storefront' ) . '</h2>';

				// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
				echo storefront_do_shortcode(
					'sale_products',
					array(
						'per_page' => $per_page,
						'columns'  => $columns,
					)
				);
				// phpcs:enable
			} elseif ( $recent_fallback ) {

				echo '<h2>' . esc_html__( 'New In Store', 'storefront' ) . '</h2>';

				// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
				echo storefront_do_shortcode(
					'recent_products',
					array(
						'per_page' => $per_page,
						'columns'  => $columns,
					)
				);
				// phpcs:enable
			}
		}
	}
}

if ( ! function_exists( 'storefront_handheld_footer_bar' ) ) {
	/**
	 * Display a menu intended for use on handheld devices
	 *
	 * @since 2.0.0
	 */
	function storefront_handheld_footer_bar() {
		$links = array(
			'my-account' => array(
				'priority' => 10,
				'callback' => 'storefront_handheld_footer_bar_account_link',
			),
			'search'     => array(
				'priority' => 20,
				'callback' => 'storefront_handheld_footer_bar_search',
			),
			'cart'       => array(
				'priority' => 30,
				'callback' => 'storefront_handheld_footer_bar_cart_link',
			),
		);

		if ( did_action( 'woocommerce_blocks_enqueue_cart_block_scripts_after' ) || did_action( 'woocommerce_blocks_enqueue_checkout_block_scripts_after' ) ) {
			return;
		}

		if ( wc_get_page_id( 'myaccount' ) === -1 ) {
			unset( $links['my-account'] );
		}

		if ( wc_get_page_id( 'cart' ) === -1 ) {
			unset( $links['cart'] );
		}

		$links = apply_filters( 'storefront_handheld_footer_bar_links', $links );
		?>
		<div class="storefront-handheld-footer-bar">
			<ul class="columns-<?php echo count( $links ); ?>">
				<?php foreach ( $links as $key => $link ) : ?>
					<li class="<?php echo esc_attr( $key ); ?>">
						<?php
						if ( $link['callback'] ) {
							call_user_func( $link['callback'], $key, $link );
						}
						?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}

if ( ! function_exists( 'storefront_handheld_footer_bar_search' ) ) {
	/**
	 * The search callback function for the handheld footer bar
	 *
	 * @since 2.0.0
	 */
	function storefront_handheld_footer_bar_search() {
		echo '<a href="">' . esc_attr__( 'Search', 'storefront' ) . '</a>';
		storefront_product_search();
	}
}

if ( ! function_exists( 'storefront_handheld_footer_bar_cart_link' ) ) {
	/**
	 * The cart callback function for the handheld footer bar
	 *
	 * @since 2.0.0
	 */
	function storefront_handheld_footer_bar_cart_link() {
		if ( ! storefront_woo_cart_available() ) {
			return;
		}
		?>
			<a class="footer-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php esc_html_e( 'Cart', 'storefront' ); ?>
				<span class="count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'storefront_handheld_footer_bar_account_link' ) ) {
	/**
	 * The account callback function for the handheld footer bar
	 *
	 * @since 2.0.0
	 */
	function storefront_handheld_footer_bar_account_link() {
		echo '<a href="' . esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) . '">' . esc_attr__( 'My Account', 'storefront' ) . '</a>';
	}
}

if ( ! function_exists( 'storefront_single_product_pagination' ) ) {
	/**
	 * Single Product Pagination
	 *
	 * @since 2.3.0
	 */
	function storefront_single_product_pagination() {
		if ( class_exists( 'Storefront_Product_Pagination' ) || true !== get_theme_mod( 'storefront_product_pagination' ) ) {
			return;
		}

		// Show only products in the same category?
		$in_same_term   = apply_filters( 'storefront_single_product_pagination_same_category', true );
		$excluded_terms = apply_filters( 'storefront_single_product_pagination_excluded_terms', '' );
		$taxonomy       = apply_filters( 'storefront_single_product_pagination_taxonomy', 'product_cat' );

		$previous_product = storefront_get_previous_product( $in_same_term, $excluded_terms, $taxonomy );
		$next_product     = storefront_get_next_product( $in_same_term, $excluded_terms, $taxonomy );

		if ( ! $previous_product && ! $next_product ) {
			return;
		}

		?>
		<nav class="storefront-product-pagination" aria-label="<?php esc_attr_e( 'More products', 'storefront' ); ?>">
			<?php if ( $previous_product ) : ?>
				<a href="<?php echo esc_url( $previous_product->get_permalink() ); ?>" rel="prev">
					<?php echo wp_kses_post( $previous_product->get_image() ); ?>
					<span class="storefront-product-pagination__title"><?php echo wp_kses_post( $previous_product->get_name() ); ?></span>
				</a>
			<?php endif; ?>

			<?php if ( $next_product ) : ?>
				<a href="<?php echo esc_url( $next_product->get_permalink() ); ?>" rel="next">
					<?php echo wp_kses_post( $next_product->get_image() ); ?>
					<span class="storefront-product-pagination__title"><?php echo wp_kses_post( $next_product->get_name() ); ?></span>
				</a>
			<?php endif; ?>
		</nav><!-- .storefront-product-pagination -->
		<?php
	}
}

if ( ! function_exists( 'storefront_sticky_single_add_to_cart' ) ) {
	/**
	 * Sticky Add to Cart
	 *
	 * @since 2.3.0
	 */
	function storefront_sticky_single_add_to_cart() {
		global $product;

		if ( class_exists( 'Storefront_Sticky_Add_to_Cart' ) || true !== get_theme_mod( 'storefront_sticky_add_to_cart' ) ) {
			return;
		}

		if ( ! $product || ! is_product() ) {
			return;
		}

		$show = false;

		if ( $product->is_purchasable() && $product->is_in_stock() ) {
			$show = true;
		} elseif ( $product->is_type( 'external' ) ) {
			$show = true;
		}

		if ( ! $show ) {
			return;
		}

		$params = apply_filters(
			'storefront_sticky_add_to_cart_params',
			array(
				'trigger_class' => 'entry-summary',
			)
		);

		wp_localize_script( 'storefront-sticky-add-to-cart', 'storefront_sticky_add_to_cart_params', $params );

		wp_enqueue_script( 'storefront-sticky-add-to-cart' );
		?>
			<section class="storefront-sticky-add-to-cart">
				<div class="col-full">
					<div class="storefront-sticky-add-to-cart__content">
						<?php echo wp_kses_post( woocommerce_get_product_thumbnail() ); ?>
						<div class="storefront-sticky-add-to-cart__content-product-info">
							<span class="storefront-sticky-add-to-cart__content-title"><?php esc_html_e( 'You\'re viewing:', 'storefront' ); ?> <strong><?php the_title(); ?></strong></span>
							<span class="storefront-sticky-add-to-cart__content-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></span>
							<?php echo wp_kses_post( wc_get_rating_html( $product->get_average_rating() ) ); ?>
						</div>
						<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="storefront-sticky-add-to-cart__content-button button alt" rel="nofollow">
							<?php echo esc_attr( $product->add_to_cart_text() ); ?>
						</a>
					</div>
				</div>
			</section><!-- .storefront-sticky-add-to-cart -->
		<?php
	}
}

if ( ! function_exists( 'storefront_woocommerce_brands_homepage_section' ) ) {
	/**
	 * Display WooCommerce Brands
	 * Hooked into the `homepage` action in the homepage template.
	 * Requires WooCommerce Brands.
	 *
	 * @since  2.3.0
	 * @link   https://woocommerce.com/products/brands/
	 * @uses   apply_filters()
	 * @uses   storefront_do_shortcode()
	 * @uses   wp_kses_post()
	 * @uses   do_action()
	 * @return void
	 */
	function storefront_woocommerce_brands_homepage_section() {
		$args = apply_filters(
			'storefront_woocommerce_brands_args',
			array(
				'number'     => 6,
				'columns'    => 4,
				'orderby'    => 'name',
				'show_empty' => false,
				'title'      => __( 'Shop by Brand', 'storefront' ),
			)
		);

		$shortcode_content = storefront_do_shortcode(
			'product_brand_thumbnails',
			apply_filters(
				'storefront_woocommerce_brands_shortcode_args',
				array(
					'number'     => absint( $args['number'] ),
					'columns'    => absint( $args['columns'] ),
					'orderby'    => esc_attr( $args['orderby'] ),
					'show_empty' => (bool) $args['show_empty'],
				)
			)
		);

		echo '<section class="storefront-product-section storefront-woocommerce-brands" aria-label="' . esc_attr__( 'Product Brands', 'storefront' ) . '">';

		do_action( 'storefront_homepage_before_woocommerce_brands' );

		echo '<h2 class="section-title">' . wp_kses_post( $args['title'] ) . '</h2>';

		do_action( 'storefront_homepage_after_woocommerce_brands_title' );

		echo $shortcode_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		do_action( 'storefront_homepage_after_woocommerce_brands' );

		echo '</section>';
	}
}

if ( ! function_exists( 'storefront_woocommerce_brands_archive' ) ) {
	/**
	 * Display brand image on brand archives
	 * Requires WooCommerce Brands.
	 *
	 * @since  2.3.0
	 * @link   https://woocommerce.com/products/brands/
	 * @uses   is_tax()
	 * @uses   wp_kses_post()
	 * @uses   get_brand_thumbnail_image()
	 * @uses   get_queried_object()
	 * @return void
	 */
	function storefront_woocommerce_brands_archive() {
		if ( is_tax( 'product_brand' ) ) {
			echo wp_kses_post( get_brand_thumbnail_image( get_queried_object() ) );
		}
	}
}

if ( ! function_exists( 'storefront_woocommerce_brands_single' ) ) {
	/**
	 * Output product brand image for use on single product pages
	 * Requires WooCommerce Brands.
	 *
	 * @since  2.3.0
	 * @link   https://woocommerce.com/products/brands/
	 * @uses   storefront_do_shortcode()
	 * @uses   wp_kses_post()
	 * @return void
	 */
	function storefront_woocommerce_brands_single() {
		$brand = storefront_do_shortcode(
			'product_brand',
			array(
				'class' => '',
			)
		);

		if ( empty( $brand ) ) {
			return;
		}

		?>
		<div class="storefront-wc-brands-single-product">
			<?php echo wp_kses_post( $brand ); ?>
		</div>
		<?php
	}
}
