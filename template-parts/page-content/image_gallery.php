<?php if(get_sub_field('show_this_content_block')){ ?>
    <div class="content-block content-block__image-gallery <?= get_sub_field('custom_css_classes') ?>" <?php if(get_sub_field('id_anchor')){echo 'id="'.get_sub_field('id_anchor').'"'; }; ?>>
        <div class="content-wrapper">
            <div class="content-block__image-gallery-row">
                <?php
                    $row_2_tall = FALSE;
                    if(get_sub_field('row_2_tall_image_check')){
                        $row_2_tall = TRUE;
                    }
                    $row_1_images = get_sub_field('row_1_images');
                    foreach($row_1_images as $image){ ?>
                        <div class="content-block__image-gallery-row__image">
                          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                          <?php if($image['caption']){ ?>
                            <div class="content-block__image-gallery-row__image--caption">
                              <?php echo esc_html($image['caption']); ?>
                            </div>
                          <?php } ?>
                        </div>
                    <?php } // end for each row 1
                ?>
            </div><!--gallery-row-->

            <div class="content-block__image-gallery-row <?php if($row_2_tall){ echo 'content-block__image-gallery-row--tall-start'; }; ?>">
                <?php
                    $row_2_images = get_sub_field('row_2_images');
                    if($row_2_tall){ echo '<div></div>'; };
                    foreach($row_2_images as $image){ ?>
                        <div class="content-block__image-gallery-row__image">
                          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                          <?php if($image['caption']){ ?>
                            <div class="content-block__image-gallery-row__image--caption">
                              <?php echo esc_html($image['caption']); ?>
                            </div>
                          <?php } ?>
                        </div>
                    <?php } // end for each row 2
                ?>
            </div><!--gallery-row-->

            <div class="content-block__image-gallery-row <?php if($row_2_tall){ echo 'content-block__image-gallery-row--tall-end'; }; ?>">
                <?php
                    if($row_2_tall){
                        echo '<div></div>';
                        $row_3_images = get_sub_field('row_3_images_tall_row_2');
                    }else{
                        $row_3_images = get_sub_field('row_3_images_regular');
                    }
                    foreach($row_3_images as $image){ ?>
                        <div class="content-block__image-gallery-row__image">
                          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                          <?php if($image['caption']){ ?>
                            <div class="content-block__image-gallery-row__image--caption">
                              <?php echo esc_html($image['caption']); ?>
                            </div>
                          <?php } ?>
                        </div>
                    <?php } // end for each row 3
                ?>
            </div><!--gallery-row-->
            <div class="content-block__image-gallery-mobile">
                <?php
                    $mobile_images = get_sub_field('mobile_images');
                    foreach($mobile_images as $image){ ?>
                        <div class="content-block__image-gallery-row__image">
                          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                          <?php if($image['caption']){ ?>
                            <div class="content-block__image-gallery-row__image--caption">
                              <?php echo esc_html($image['caption']); ?>
                            </div>
                          <?php } ?>
                        </div>
                    <?php } // end for each row mobile
                ?>
            </div><!--mobile-->
        </div><!--content-wrapper-->
    </div><!--content-block-->
<?php }; // end if show_this_content_block ?>
