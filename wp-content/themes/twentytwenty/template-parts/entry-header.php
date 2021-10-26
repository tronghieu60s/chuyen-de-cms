<?php

/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$entry_header_classes = '';

if (is_singular()) {
	$entry_header_classes .= ' header-footer-group';
}
$post = get_post();

?>

<div class="row title">
	<div class="col-md-10 col-xs-9">
		<?php

		if (is_singular()) {
			the_title('<h1 class="entry-title">', '</h1>');
		} else {
			the_title('<h2 class="entry-title heading-size-1"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
		}

		$intro_text_width = '';

		if (is_singular()) {
			$intro_text_width = ' small';
		} else {
			$intro_text_width = ' thin';
		} ?>
		<!-- <h1>Khan hiếm nhân lực công nghệ thông tin</h1> -->
	</div>
	<div class="col-md-2 col-xs-3">
		<div class="headlinesdate">
			<div class="headlinesdm">
				<div class="headlinesday"><?php echo date('d', strtotime($post->post_date)) ?></div>
				<div class="headlinesmonth"><?php echo date('m', strtotime($post->post_date)) ?></div>
			</div>
			<div class="headlinesyear">'<?php echo date('y', strtotime($post->post_date)) ?></div>
		</div>
	</div>
</div>