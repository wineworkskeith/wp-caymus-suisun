<?php
//The template for displaying all single posts and attachments
get_header();
$current_post_id 	= get_the_ID();
$cat_ids 			= array();
$categories 		= get_the_category( $current_post_id );
if ( $categories && ! is_wp_error( $categories ) ) {  
    foreach ( $categories as $category ) {
        array_push( $cat_ids, $category->term_id );
    } 
}
?>
<div class="single-blog-page">
	<?php 
	
	echo '<div class="content-wrapper">';
	get_template_part( 'template-parts/_page-content' );
	the_content();
	echo '</div><!--content-wrapper-->';

	
	// NEXT/PREV POST
	?>
	<div class="content-wrapper c7t-content">
		<div class="prev-next-posts">
			<div class="prev-next-posts__button prev-next-posts__button--prev">
				<?php previous_post_link( '%link', '<span>&larr;</span> Older Post', false ); ?>
			</div>
			<div class="prev-next-posts__button prev-next-posts__button--next">
				<?php next_post_link( '%link', 'Newer Post <span>&rarr;</span>', false ); ?>
			</div>
		</div>
	</div><!--content-wrapper c7t-content-->


	<?php
	// RELATED POSTS:
	
	// posts from all categories are allowed
	$args1 = array(
		'post_type' 		=> 'post',
		'posts_per_page' 	=> 3,
		'post__not_in'		=> array($current_post_id),
		'category__in' 		=> $cat_ids,
	);

	$the_query1 = new WP_Query( $args1 );
	$post_counter = 0;

	// The Loop
	if ( $the_query1->have_posts() ) {

		while ( $the_query1->have_posts() ) {
			$the_query1->the_post();
			$post_counter++;
		}
	

		if($post_counter >= 3){

			echo '<div class="content-wrapper">';
			echo 	'<div class="blog-page blog-page--related blog-page--no-sidebar blog-page--3'.$number_of_posts_to_display.'">';
			echo 		'<h2>Related Posts</h2>';
			echo 		'<div class="blog-page__posts">';
						
						while ( $the_query1->have_posts() ) {
							$the_query1->the_post();
							get_template_part('template-parts/blog-post');					
						}; // end while have posts
						wp_reset_postdata();

			echo 		'</div><!--posts-->';

			echo 	'</div><!--blog-page-->';
			echo '</div><!--content-wrapper-->';
		}else{
			$args1 = array(
				'post_type' 		=> 'post',
				'posts_per_page' 	=> 3,
				'post__not_in'		=> array($current_post_id)
			);

			$the_query1 = new WP_Query( $args1 );

			// The Loop
			if ( $the_query1->have_posts() ) {

				echo '<div class="content-wrapper c7t-content">';
				echo 	'<div class="blog-page blog-page--related blog-page--no-sidebar blog-page--3'.$number_of_posts_to_display.'">';
				echo 		'<h2>Related Posts</h2>';
				echo 		'<div class="blog-page__posts">';
							
							while ( $the_query1->have_posts() ) {
								$the_query1->the_post();
								get_template_part('template-parts/blog-post');					
							}; // end while have posts
							wp_reset_postdata();

				echo 		'</div><!--posts-->';

				echo 	'</div><!--blog-page-->';
				echo '</div><!--content-wrapper-->';
			}; // end if
		}
	}else{
		//no related posts found, so just show 3 posts that aren't the current post:
		$args1 = array(
			'post_type' 		=> 'post',
			'posts_per_page' 	=> 3,
			'post__not_in'		=> array($current_post_id)
		);

		$the_query1 = new WP_Query( $args1 );

		// The Loop
		if ( $the_query1->have_posts() ) {

			echo '<div class="content-wrapper c7t-content">';
			echo 	'<div class="blog-page blog-page--related blog-page--no-sidebar blog-page--3'.$number_of_posts_to_display.'">';
			echo 		'<h2>Related Posts</h2>';
			echo 		'<div class="blog-page__posts">';
						
						while ( $the_query1->have_posts() ) {
							$the_query1->the_post();
							get_template_part('template-parts/blog-post');					
						}; // end while have posts
						wp_reset_postdata();

			echo 		'</div><!--posts-->';

			echo 	'</div><!--blog-page-->';
			echo '</div><!--content-wrapper-->';
		}; // end if
	}
	?>
	
</div><!--single-blog-page-->
<?php get_footer(); 