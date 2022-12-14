<h3>Categories</h3>
<?php 
 	wp_list_categories( array(
		'orderby'    	=> 'name',
		'show_count' 	=> true,
		'depth'			=> 1,
		'title_li'		=> ''
	) ); 
?> 