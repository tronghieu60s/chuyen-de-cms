<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<tbody>
			<?php
			foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
				$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
				$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

				if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
					$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
			?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
						<td>
							<div class="leftContainer ">
								<ol class="fr-list cart-product">
									<div class="panel-contents">
										<div id="1" class="fr-product-card list cart cartList" data-test="439065">
											<div class="image-section">
												<div class="fr-product-image">
													<?php
													$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

													if (!$product_permalink) {
														echo $thumbnail; // PHPCS: XSS ok.
													} else {
														printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
													}
													?>
												</div>
											</div>
											<div class="product-content-container">
												<div class="content-wrapper">
													<div class="info">
														<p class="description product-title fr-no-uppercase">
															<?php
															if (!$product_permalink) {
																echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
															} else {
																echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
															}

															do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

															// Meta data.
															echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

															// Backorder notification.
															if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
																echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
															}
															?>
														</p>
														<div class="fr-product-price">
															<div class="fr-product-price-info">
																<div class="price fr-no-uppercase" data-test="price">
																	<?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
																</div>
															</div>
														</div>
													</div>
													<div class="product-right-column">
														<button class="product-close-button" type="button" data-test="remove-item-button">
															<span class="fr-icon" style="font-size: 30px;">
																<span class="fr-implicit">textClose</span>
																<?php
																echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
																	'woocommerce_cart_item_remove_link',
																	sprintf(
																		'<a href="%s" class="" aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30"><path xmlns="http://www.w3.org/2000/svg" fill="#000" fill-rule="evenodd" d="M16.63 6L12 10.62 7.38 6 6 7.38 10.63 12 6 16.62 7.38 18 12 13.38 16.63 18 18 16.62 13.38 12 18 7.38 16.63 6z"></path></svg></a>',
																		esc_url(wc_get_cart_remove_url($cart_item_key)),
																		esc_html__('Remove this item', 'woocommerce'),
																		esc_attr($product_id),
																		esc_attr($_product->get_sku())
																	),
																	$cart_item_key
																);
																?></span>
														</button>
													</div>
												</div>
												<div class="fr-flbox between middle">
													<div class="pulldown-wrapper ml-m mt-xs w2-f">
														<div class="fr-pull-down-styled">
															<div role="combobox" aria-haspopup="listbox" aria-labelledby="downshift-3-label"><span class="fr-form-label xwCfXbAbJscRLQ9Eixvn_" htmlfor="downshift-3-input" id="downshift-3-label">Số lượng&nbsp;</span>

																<div class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
																	<?php
																	if ($_product->is_sold_individually()) {
																		$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
																	} else {
																		$product_quantity = woocommerce_quantity_input(
																			array(
																				'input_name'   => "cart[{$cart_item_key}][qty]",
																				'input_value'  => $cart_item['quantity'],
																				'max_value'    => $_product->get_max_purchase_quantity(),
																				'min_value'    => '0',
																				'product_name' => $_product->get_name(),
																			),
																			$_product,
																			false
																		);
																	}

																	echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
																	?>
																</div>
															</div>
														</div>
													</div>
													<div class="subtotal-wrapper mt-l" data-test="product-subtotal"><span>
															<dl class="fr-definition-list price inline">
																<dt class="fr-definition-list-term fr-definition-list-description">Tổng</dt>
																<dd class="fr-definition-list-description fr-no-uppercase price-original">
																	<?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
																</dd>
															</dl>
														</span></div>
												</div>
											</div>
										</div>
									</div>
								</ol>
							</div>
						</td>
					</tr>
			<?php
				}
			}
			?>
			<tr>
				<td>
					<button type="submit" class="buttonUpdate" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>
				</td>
			</tr>
		</tbody>
	</table>
	<?php do_action('woocommerce_after_cart_table'); ?>
</form>

<?php do_action('woocommerce_before_cart_collaterals'); ?>

<div class="cart-collaterals">
	<?php
	/**
	 * Cart collaterals hook.
	 *
	 * @hooked woocommerce_cross_sell_display
	 * @hooked woocommerce_cart_totals - 10
	 */
	do_action('woocommerce_cart_collaterals');
	?>
</div>

<?php do_action('woocommerce_after_cart'); ?>