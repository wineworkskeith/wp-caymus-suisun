
	</main>
	<footer class="footer">
		<div class="content-wrapper">
			<div class="footer__column">
				<nav class="footer-menu" role="dialog">
					<?php echo wp_nav_menu(array('theme_location' => 'footer_suisun')); ?>
				</nav>
			</div><!--column-->
			<div class="footer__column">
				<a href="/" class="footer__column-logo" title="Go back to the home page">
					<?php get_template_part('template-parts/svgs/logo-suisun'); ?>
				</a>
				<div class="footer__column-text"><?= get_field('below_logo_text_suisun','option') ?></div>
				<div class="footer__column-buttons">
					<a href="<?= get_field('button_1_url_suisun','option') ?>" class="button"><?= get_field('button_1_text_suisun','option') ?></a>
					<a href="<?= get_field('button_2_url_suisun','option') ?>" class="button" <?php if(get_field('button_2_tock_id_suisun','option')){ ?>data-tock-experience="<?= get_field('button_2_tock_id_suisun','option') ?>" data-tock-reserve="true"<?php } ?>>
						<?= get_field('button_2_text_suisun','option') ?>
					</a>
				</div><!--buttons-->
				<div class="footer__column-info">
					<span><a href="<?= get_field('address_link_google_maps_suisun','option') ?>"><?= get_field('address_suisun','option') ?></a></span>
					<span><a href="tel:<?= get_field('phone_number_unformatted_suisun','option') ?>"><?= get_field('phone_number_formatted_suisun','option') ?></a></span>
					<span><a href="mailto:<?= get_field('email_address_suisun','option') ?>"><?= get_field('email_address_suisun','option') ?></a></span>
				</div><!--info-->
				<nav class="footer__column-social" role="dialog">
					<ul>
						<?php
							if(have_rows('social_media_suisun','option')){
								while(have_rows('social_media_suisun','option')){
									the_row();
									$link = get_sub_field('social_media_url');
									if(get_sub_field('social_media_icon') == 'image'){
										echo '<li><a href="'.$link.'"><img src="'.get_sub_field('social_media_image')['url'].'" alt="'.get_sub_field('social_media_image')['alt'].'" /></a></li>';
									}else{
										echo '<li><a href="'.$link.'" title="Visit us on '.get_sub_field('social_media_platform_name').'">'.get_sub_field('social_media_svg_code').'</a></li>';
									}
								} // end while social_media
							} // end if  social_media
						?>
					</ul>
				</nav><!--info-->
			</div><!--column-->
			<div class="footer__column">
				<div class="footer__column-other-logo">
					<a href="<?= get_field('caymus_main_url','option') ?>" title="Go back to the home page"><?php get_template_part( 'template-parts/svgs/logo-black' ); ?></a>
				</div><!--other-logo-->
				<div class="footer__column-other-logo-text">
					<a href="<?= get_field('caymus_main_url','option') ?>"><?= get_field('other_winery_text_suisun','option') ?></a>
				</div><!--other-logo-text-->
			</div><!--column-->
			<div class="footer__column">
				&copy; <?= date('Y') ?> Wagner Family of Wines
			</div><!--column-->
		</div><!--content-wrapper-->
	</footer>


	<?php get_template_part( 'template-parts/menu-suisun' ); ?>
	<?php get_template_part( 'template-parts/credits' ); ?>
	<?php wp_footer(); ?>
  	</body>
</html>
