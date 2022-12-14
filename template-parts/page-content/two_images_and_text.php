<?php if(get_sub_field('show_this_content_block')){ ?>
    <div class="content-block content-block__two-images-and-text <?= get_sub_field('custom_css_classes') ?>" <?php if(get_sub_field('id_anchor')){echo 'id="'.get_sub_field('id_anchor').'"'; }; ?>>
        <div class="content-wrapper">
            <div class="col">
                <img src="<?= get_sub_field('tall_image')['url'] ?>" alt="<?= get_sub_field('tall_image')['alt'] ?>" />
            </div><!--col-->
            <div class="col">
                <div class="col__text">
                    <?= get_sub_field('text_content') ?>
                </div><!--col-text-->
                <img src="<?= get_sub_field('short_image')['url'] ?>" alt="<?= get_sub_field('short_image')['alt'] ?>" />
            </div><!--col-->
        </div><!--content-wrapper-->
    </div><!--content-block-->
<?php }; // end if show_this_content_block ?>