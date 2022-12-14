<div class="footer-credits" id="modal-1" aria-hidden="true">
	<div tabindex="-1" data-micromodal-close>
		<div role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
			<div class="content-wrapper">
				<header>
					<button aria-label="Close Credits modal" data-micromodal-close>&times;</button>
				</header>
				<div id="modal-1-content" class="modal__content">
					<h2 id="modal-1-title">Credits</h2>
					<?php
						if(have_rows('site_credits','option')){
							$count = count(get_field('site_credits','option'));
							$x = 0;
							while(have_rows('site_credits','option')){
								the_row();
								$x++;
								$credit_name 		= get_sub_field('credit_name');
								$credit_position 	= get_sub_field('credit_position');
								$credit_url 		= get_sub_field('credit_url');

								ob_start();
								if($x == $count){
									echo '<div class="footer-credits__credits-single footer-credits__credits-single--last">';
								}else{
									echo '<div class="footer-credits__credits-single">';
								}
									echo '<a href="'.$credit_url.'" target="_blank"><span>'.$credit_name.'</span><span>'.$credit_position.'</span></a>';
								echo '</div><!--single-->';

								$output = ob_get_clean();
								echo $output;
							} // end while
						} // end if
					?>
				</div><!--content-->
			</div><!--content-wrapper-->
		</div><!--dialog-->
	</div><!--overlay-->
</div><!--modal-wrapper-->