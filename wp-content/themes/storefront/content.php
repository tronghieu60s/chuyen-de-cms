<?php

/**
 * Template used to display post content.
 *
 * @package storefront
 */
$post = get_post();
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="fr-contents-card full">
	<div class="fr-spacer l"></div>
		<div>
			<div id="" class="fr-list mt-xxs mbt-xxs mb-xxs bordered-between-content">
					<div class="fr-link-wrapper block">
						<div class="fr-image-plus-text left">
							<div class="image">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('medium'); ?>
								</a>
							</div>
							<div class="info">
								<div class="title"><?php do_action('storefront_loop_post');?></div>
								<div class="description"><?php echo substr($post -> post_content,0,90)?></div>
							</div>
						</div>
					</div>
				</div>
		</div>
	<div class="fr-spacer l"></div>
</div>	

</article><!-- #post-## -->