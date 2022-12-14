<?php
	if(is_404()){ // if is 404 page
		if(have_rows('content_blocks','option')){
			while (have_rows('content_blocks','option')){
				the_row();
	
				
	
			}; // end while have rows
		}; // end if have rows
	}else{ // not 404, just regular page
		if(have_rows('content_blocks')){

			while (have_rows('content_blocks')){
				the_row();
	
				if(get_row_layout() == 'blockquote'){
					get_template_part('template-parts/page-content/blockquote');

				}elseif(get_row_layout() == 'full-width_image'){
					get_template_part('template-parts/page-content/full_width_image');

				}elseif(get_row_layout() == 'full-width_slider'){
					get_template_part('template-parts/page-content/full_width_slider');

				}elseif(get_row_layout() == 'image_gallery'){
					get_template_part('template-parts/page-content/image_gallery');

				}elseif(get_row_layout() == 'image_gallery_black_and_white'){
					get_template_part('template-parts/page-content/image_gallery_black_and_white');

				}elseif(get_row_layout() == 'regular_content_1_column'){
					get_template_part('template-parts/page-content/regular_content_1_column');
	
				}elseif(get_row_layout() == 'regular_content_2_columns'){
					get_template_part('template-parts/page-content/regular_content_2_columns');

				}elseif(get_row_layout() == 'two_images_and_text'){
					get_template_part('template-parts/page-content/two_images_and_text');

				}elseif(get_row_layout() == 'two_images_and_video_and_text'){
					get_template_part('template-parts/page-content/two_images_and_video_and_text');
					
				}elseif(get_row_layout() == 'video'){
					get_template_part('template-parts/page-content/video');
	

					
				} // end row layouts
	
			}; // end while have_rows
	
		}; // end if have rows
	} // else
	
?>
