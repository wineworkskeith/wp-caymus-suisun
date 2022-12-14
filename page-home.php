<?php
	//Template Name: Home Page
	get_header();
	?>

	<div class="banner-split">
		<div class="banner-split__half" style="background-image: url('<?= get_field('banner_image_left')['url'] ?>');">
			<a href="#explore" title="Explore Caymus Vineyards"></a>
			<h1 role="img" aria-label="<?= get_field('banner_image_right')['alt'] ?>"><?= get_field('banner_image_right')['alt'] ?></h1>
			<div class="banner-split__half-content">
				<img src="<?= get_template_directory_uri() ?>/images/logos/logo-white.svg" alt="Caymus Vineyard" />
				<a href="#explore" class="button">Explore</a>
				<div></div>
			</div><!--content-->
		</div><!--half-->
		<div class="banner-split__half" style="background-image: url('<?= get_field('banner_image_right')['url'] ?>');">
			<a href="https://www.caymus-suisun.com" title="Introducing Caymus-Suisun"></a>
			<span role="img" aria-label="<?= get_field('banner_image_right')['alt'] ?>"></span>
			<div class="banner-split__half-content">
				<span>Introducing</span>
				<img src="<?= get_template_directory_uri() ?>/images/logos/suisun-logo-white.svg" alt="Caymus Vineyard" />
				<a href="https://www.caymus-suisun.com" class="button">Explore</a>
			</div><!--content-->
		</div><!--half-->
	</div><!--banner-split-->


	<?php
	get_template_part('template-parts/_page-content');
	get_footer();
?>
