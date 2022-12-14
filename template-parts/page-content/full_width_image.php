<?php if(get_sub_field('show_this_content_block')){ ?>
    <div class="content-block content-block__full-width-image <?php if(get_sub_field('crop_images_height')){ echo 'content-block__full-width-image--cropped'; }; ?> <?= get_sub_field('custom_css_classes') ?>" <?php if(get_sub_field('id_anchor')){echo 'id="'.get_sub_field('id_anchor').'"'; }; ?>>
        <div class="content-wrapper">
           <img src="<?= get_sub_field('image')['url'] ?>" alt="<?= get_sub_field('image')['alt'] ?>" <?php if(get_sub_field('crop_images_height')){ echo 'style="max-height: '.get_sub_field('image_height').'px;"'; }; ?> />
        </div><!--content-wrapper-->
    </div><!--content-block-->
<?php }; // end if show_this_content_block ?>