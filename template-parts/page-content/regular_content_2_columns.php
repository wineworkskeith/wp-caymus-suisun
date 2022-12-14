<?php if(get_sub_field('show_this_content_block')){ ?>
    <div class="content-block content-block__regular-content-2-columns <?= get_sub_field('custom_css_classes') ?>" <?php if(get_sub_field('id_anchor')){echo 'id="'.get_sub_field('id_anchor').'"'; }; ?>>
        <div class="content-wrapper content-wrapper--width-<?= get_sub_field('column_width') ?>">
            <div class="col">
                <?= get_sub_field('column_content_1') ?>
            </div>
            <div class="col">
                <?= get_sub_field('column_content_2') ?>
            </div>
        </div><!--content-wrapper-->
    </div><!--content-block-->
<?php }; // end if show_this_content_block ?>