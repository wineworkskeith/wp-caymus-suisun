<?php if(get_sub_field('show_this_content_block')){ ?>
    <div class="content-block content-block__blockquote <?php if(get_sub_field('image')){ echo 'content-block__blockquote-with-image'; }else{ echo 'content-block__blockquote-without-image';}; ?> <?php if(!empty(get_sub_field('image'))){ echo 'content-block__blockquote--with-image'; }?> <?= get_sub_field('custom_css_classes') ?>" <?php if(get_sub_field('id_anchor')){echo 'id="'.get_sub_field('id_anchor').'"'; }; ?>>
        <div class="content-wrapper">
            <?php if(get_sub_field('image')){ echo '<img src="'.get_sub_field('image')['url'].'" alt="'.get_sub_field('image')['alt'].'" />'; } ?>
            <blockquote <?php if(get_sub_field('position') == TRUE){ echo 'class="top"'; }else{ echo 'class="bottom"'; }; ?>>
                <?php if(get_sub_field('position') == TRUE){
                    echo '<cite class="top">'. get_sub_field('quote_attributed_to') .'</cite>';
                } ?>
                <?= get_sub_field('quote_text') ?>
                <?php if(get_sub_field('position') == FALSE){
                    echo '<cite>'. get_sub_field('quote_attributed_to') .'</cite>';
                } ?>
            </blockquote>
        </div><!--content-wrapper-->
    </div><!--content-block-->
<?php }; // end if show_this_content_block ?>