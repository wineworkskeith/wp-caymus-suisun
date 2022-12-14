<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header();
get_template_part('template-parts/blog-cat-banners');
?>
<div class="c7t-template-width">
	<div class="blog-page">
		<div class="blog-page__posts">
			<?php if ( have_posts() ){

				the_archive_title( '<h1 class="page-title">', '</h1>' );
				
				// Start the loop.
				while ( have_posts() ){
					the_post();
					get_template_part('template-parts/blog-post');
				};//endwhile

				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page' ),
					'next_text'          => __( 'Next page' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page') . ' </span>',
				) );

			}else{
				//If no content, include the "No posts found" template.
				get_template_part( 'template-parts/no-posts' );
			};//endif
			?>
		</div><!--posts-->
		<div class="blog-page__sidebar">
			<?php get_sidebar(); ?>
		</div><!--sidebar-->
	</div><!--blog-page-->
</div><!--c7t-template-width-->
<?php get_footer(); ?>
