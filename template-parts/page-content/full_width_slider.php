<?php if(get_sub_field('show_this_content_block')){ ?>
    <div class="content-block content-block__full-width-slider <?= get_sub_field('custom_css_classes') ?>" <?php if(get_sub_field('id_anchor')){echo 'id="'.get_sub_field('id_anchor').'"'; }; ?>>
        <div class="content-wrapper">
            <div>
                <?php 
                    $slides = get_sub_field('slides');
                    foreach($slides as $image){
                        echo '<div><img src="'.$image['url'].'" alt="'.$image['alt'].'" /></div>';
                    } // end for each row 1
                ?>
            </div>
        </div><!--content-wrapper-->
    </div><!--content-block-->
<?php }; // end if show_this_content_block ?>