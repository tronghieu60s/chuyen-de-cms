<?php

/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.0.0
 */

defined('ABSPATH') || exit;
$product_tabs = apply_filters('woocommerce_product_tabs', array());
global $product;

?>
<?php if (isset($product)) : ?>
	<div class="description-custom-post-detail">
		<?= substr($product->get_description(), 0 ,100) ?>
	</div>
<?php endif; ?>

<div style="margin-top: 20px;">
	<?php
	foreach ($product_tabs as $key => $product_tab) : ?>
		<div class="additional_information-custom-post-detail">
			<?php
			if (isset($product_tab['callback']) && $key == 'additional_information') {
				call_user_func($product_tab['callback'], $key, $product_tab);
			}
			?>
		</div>
	<?php endforeach; ?>
</div>

<script>
	const attributesSelectors = document.querySelectorAll(".woocommerce-product-attributes-item__value p");

	for (let index = 0; index < attributesSelectors.length; index += 1) {
		attributesSelectors[index].style.display = "flex";
		const arrText = attributesSelectors[index].textContent.split(",");
		attributesSelectors[index].innerHTML = "";
		arrText.forEach(function(item) {
			if (item.trim()[0] === "#") {
				attributesSelectors[index].innerHTML += `<label class="fr-chip-label custom" for="product-size-picker0" 
				style="background-color: ${item}; background-size: 50px; background-position: center center; width: 50px; height: 50px; display: flex; min-height: 0px; min-width: 0px;">
				<span class="fr-chip-text"></span></label>`;
			} else {
				attributesSelectors[index].innerHTML += `<label class="fr-chip-label custom" for="product-size-picker0" 
				style="background-size: 50px; background-position: center center; width: 50px; height: 50px; display: flex; min-height: 0px; min-width: 0px;">
				<span class="fr-chip-text">${item.trim()}</span></label>`;
			}
		});
	}
</script>

<?php
if ($max_value && $min_value === $max_value) {
?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr($input_id); ?>" class="qty" name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($min_value); ?>" />
	</div>
<?php
} else {
	/* translators: %s: Quantity. */
	$label = !empty($args['product_name']) ? sprintf(esc_html__('%s quantity', 'woocommerce'), wp_strip_all_tags($args['product_name'])) : esc_html__('Quantity', 'woocommerce');
?>
	<div class="woocommerce-product-attributes-item__label" style="margin-bottom: 10px;">Số lượng</div>
	<div class="quantity">
		<?php do_action('woocommerce_before_quantity_input_field'); ?>
		<label class="screen-reader-text" for="<?php echo esc_attr($input_id); ?>"><?php echo esc_attr($label); ?></label>
		<input type="number" id="<?php echo esc_attr($input_id); ?>" class="<?php echo esc_attr(join(' ', (array) $classes)); ?> quantity input custom" step="<?php echo esc_attr($step); ?>" min="<?php echo esc_attr($min_value); ?>" max="<?php echo esc_attr(0 < $max_value ? $max_value : ''); ?>" name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($input_value); ?>" title="<?php echo esc_attr_x('Qty', 'Product quantity input tooltip', 'woocommerce'); ?>" size="4" placeholder="<?php echo esc_attr($placeholder); ?>" inputmode="<?php echo esc_attr($inputmode); ?>" />
		<?php do_action('woocommerce_after_quantity_input_field'); ?>
	</div>
	<div class="fr-text-annotation custom">Vui lòng chọn màu và kích cỡ.&nbsp;</div>
<?php
}
