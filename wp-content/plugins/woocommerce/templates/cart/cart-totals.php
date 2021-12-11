<?php

/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined('ABSPATH') || exit;

?>

<div class="cart_totals <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">
<div class="rightContainer _35UhWqITiPo_hn8H_mdxEs">
		<div class="_1xOpEOMVyIf24Utw-g4qb7" data-test="order-summary">
		
			<div class="fr-table">
				<table>
					<tbody>
						<tr class="">
							<td data-test="tổng-gia-cac-sản-phẩm-label">Tổng giá (các) sản phẩm</td>
							<td data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
						</tr>
						<tr class="header-row">
							<th data-test="tổng-label">Tổng</th>
							<th data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></th>
						</tr>
						<tr class="">
							<td data-test="da-bao-gồm-thuế-gia-trị-gia-tang-label">Đã bao gồm thuế giá trị gia tăng</td>
							<td data-test="da-bao-gồm-thuế-gia-trị-gia-tang"><span class="fr-price-currency fr-price-currency-order-change"><abbr class="fr-no-uppercase fr-price-currency-margin" title="Vietnamese dong">VND</abbr><span>36.273 </span></span></td>
						</tr>
					</tbody>
					<tfoot>
						<tr class="">
							<th data-test="tổng-dơn-dặt-hang-label">Tổng đơn đặt hàng</th>
							<th data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		
		<div class="fr-contents-card">
			<div>
				<div class="fr-wrapper mb-l" style="width: auto;">
					<div class="fr-text withtooltip fr-system-text"><span class="text">Các sản phẩm bạn chọn sẽ được đặt trước trong vòng 30 phút sau khi nhấn nút "Thanh toán".</span>
						<div class="css-1oin9j2">
							<div class="fr-tooltip-icon fr-tooltip-icon--pc"><span class="fr-icon info" style="font-size: 24px;" aria-hidden="true"></span></div>
						</div>
					</div>
				</div>
				<div class="fr-wrapper mt-s" style="width: auto;"><button class="fr-btn attention wundefined-f" type="button" data-test="thanh-toán-button"><a style="color:black" href="<?php echo esc_url( wc_get_checkout_url() ); ?>" >	
Thanh toán</button></a></div>
				<div class="fr-wrapper mb-xs" style="width: auto;"><button class="fr-btn mt-s wundefined-f" type="button" data-test="tiếp-tục-mua-sắm-button"><a style="color:black" href="http://wordpress.project/">Tiếp tục mua sắm</button></a></div>
				
		</div>
	</div>
	

</div>