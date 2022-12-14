<?php
/**
 * The template part for displaying single posts
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="post__single-link-overlay" href="<?php echo get_permalink(); ?>" aria-label="Read more about the blog post titled <?php echo get_the_title(); ?>"></a>
	
	<div class="post__single">
		<?php $hero_image = get_field('hero_image');
		if($hero_image){
			echo '<div class="post__single-image">';
			echo 	'<span></span>';
			echo 	'<img src="'. esc_url_raw($hero_image['url']) .'" alt="'. $hero_image['alt'] .'" />';
			echo '</div><!--image-->';
		}else{
			echo '<div class="post__single-image post__single-image--no-image">';
			echo 	'<span></span>';
			echo 	'<img src="'.get_template_directory_uri().'/images/logos/logo-black.svg" alt="" />';
			echo '</div><!--image-->';
		}
		?>
		
		<div class="post__single-content">
			<h2>
				<a href="<?php echo get_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>

			<div class="post__teaser-content">
				<?php
					echo get_field('the_teaser');
				?>
			</div><!-- post__teaser-content -->
			<div class="post__teaser-link">
				<p>
					<a href="<?php echo get_permalink(); ?>" aria-label="Read more about the blog post titled <?php echo get_the_title(); ?>"><?php if(get_field('read_more_link_text', 'option')){ echo get_field('read_more_link_text', 'option'); }else{ echo 'Read More'; } ?></a>
				</p>
			</div><!-- post__teaser-link -->
		</div><!--post__single-content-->
	</div><!--post__single-->
</article><!-- #post-## -->
