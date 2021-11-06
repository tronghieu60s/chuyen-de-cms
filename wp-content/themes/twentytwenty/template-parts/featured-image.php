<?php

/**
 * Displays the featured image
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

if (has_post_thumbnail() && !post_password_required()) {

	$featured_media_inner_classes = '';

	// Make the featured media thinner on archive pages.
	if (!is_singular()) {
		$featured_media_inner_classes .= ' medium';
	}
?>
	<div class="row">
		<div class="col-md-12">
			<div class="overviewline"></div>
		</div>

		<div class="row overview">
			<div class="col-md-12">
				<?php
				$caption = get_the_post_thumbnail_caption();
				if ($caption) {
				?>
					<p>
						<?php echo wp_kses_post($caption); ?>
					</p>

				<?php
				}
				?>
			</div>
		</div>
	</div>
<?php
}
