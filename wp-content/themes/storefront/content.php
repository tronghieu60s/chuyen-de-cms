<?php

/**
 * Template used to display post content.
 *
 * @package storefront
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="fr-contents-card full">
	<div class="fr-spacer l"></div>
		<div>
			<div id="" class="fr-list mt-xxs mbt-xxs mb-xxs bordered-between-content"><a href="https://www.uniqlo.com/vn/vi/news/topics/2021101901/" target="_self" class="">
					<div class="fr-link-wrapper block">
						<div class="fr-image-plus-text left">
							<div class="image"><img src="//im.uniqlo.com/global-cms/spa/rese1ec9c647e0afe41eada1ae669695e79fr.jpg" alt="Eight Clean-Look Sweats"></div>
							<div class="info">
								<div class="title"><?php do_action('storefront_loop_post');?></div>
								<div class="description"><?php do_action('storefront_loop_post_content');?></div>
							</div>
						</div>
					</div>
				</a></div>
		</div>
	<div class="fr-spacer l"></div>
</div>	

</article><!-- #post-## -->