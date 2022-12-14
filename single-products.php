<?php
//The template for displaying single products
get_header();
 
if(!empty(get_field('header_image'))){
  $header_image = esc_url_raw(get_field('header_image'));
  $screen_reader_text_for_image = get_field('screen_reader_text_for_image');
?>
	<div class="header-image" role="img" aria-label="<?php echo $screen_reader_text_for_image; ?>" style="background-image:url('<?php echo $header_image; ?>');"></div>
<?php 
}
?>

<?php
echo '<div id="content"></div>';

get_template_part( 'template-parts/_page-content' );

get_footer(); 
?>