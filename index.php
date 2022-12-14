<?php 
// Blog List template
get_header(); 
$posts_per_row = 3;
?>
<div class="content-wrapper">
	<div class="blog-page blog-page--no-sidebar blog-page--<?php echo $posts_per_row; ?>">
		<div class="blog-page__posts">
			<?php if ( have_posts() ){ ?>

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				<?php endif; ?>

				<?php
				// Start the loop.
				while ( have_posts() ){
					the_post();
					get_template_part('template-parts/blog-post');
				};//endwhile

			}else{
				//If no content, include the "No posts found" template.
				echo '<p>Sorry, no posts were found.</p>';
			};//endif
			?>
		</div><!--posts-->
		<div class="blog-page__sidebar">
			<?php get_sidebar(); ?>
		</div><!--sidebar-->
		<?php 
			// Previous/next page navigation.
			wp_pagenavi();
		?>
	</div><!--blog-page-->

</div><!--content-wrapper-->

<?php get_footer(); ?>