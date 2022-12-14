<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<?php wp_head(); ?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/favicon/site.webmanifest">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon.ico">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/images/favicon/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
	</head>

	<body <?php body_class('suisun-page'); ?> id="top">
		<a class="screen-reader-text skip-link" href="#content">Skip to content</a>

		<button href="#" class="menu-toggle menu-toggle--suisun" id="mobile-menu-toggle">
			<div class="menu-toggle__container">
				<span class="menu-toggle__container-text">Menu</span>
				<div>
					<span></span>
				</div>
			</div><!--container-->
		</button><!--menu-toggle-->

		<header class="header">
			<div class="content-wrapper">
				<a href="/" class="header__logo" title="Caymus Suisun">
					<?php get_template_part('template-parts/svgs/logo-suisun'); ?>
				</a><!--logo-->
				<nav class="header__logos" role="dialog">
					<ul>
						<?php
						if(have_rows('brands_bar_suisun','option')){
							while(have_rows('brands_bar_suisun','option')){
								the_row();
								echo '<li><a href="'.get_sub_field('brand_url').'" style="max-height:'.get_sub_field('image_height').'px;">'.get_sub_field('brand_image_svg_code').'</a></li>';
							} // end while brands_bar_suisun
						} // end if  brands_bar_suisun
						?>
					</ul>
				</nav>
				<nav class="header__icons" role="dialog">
					<ul>
						<li>
							<a href="<?= get_field('wine_finder_url','option') ?>" target="_blank">
								<?php get_template_part('template-parts/svgs/icon-wine-finder'); ?>
							</a>
						</li>
						<li>
							<a href="<?= get_field('cart_url','option') ?>" target="_blank">
								<?php get_template_part('template-parts/svgs/icon-cart'); ?>
							</a>
						</li>
					</ul>
				</nav><!--icons-->
			</div><!--content-wrapper-->
		</header>
		<main id="content">

		<script>    !function(t,o,c,k){if(!t.tock){var e=t.tock=function(){e.callMethod?    e.callMethod.apply(e,arguments):e.queue.push(arguments)};t._tock||(t._tock=e),    e.push=e,e.loaded=!0,e.version='1.0',e.queue=[];var f=o.createElement(c);f.async=!0,    f.src=k;var g=o.getElementsByTagName(c)[0];g.parentNode.insertBefore(f,g)}}(    window,document,'script','https://www.exploretock.com/tock.js');    tock('init', 'caymussuisun');    </script>
