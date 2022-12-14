<?php if(get_sub_field('show_this_content_block')){ ?>
    <div class="content-block content-block__image-gallery-black-and-white <?= get_sub_field('custom_css_classes') ?>" <?php if(get_sub_field('id_anchor')){echo 'id="'.get_sub_field('id_anchor').'"'; }; ?>>
        <div class="content-wrapper">
            <div class="content-block__image-gallery-black-and-white-gallery">
                <?php 
                    if(have_rows('images')){
                        $x = 0;
                        while(have_rows('images')){
                            the_row();
                            $x++;
                            ?>
                            <div class="content-block__image-gallery-black-and-white-gallery-single" data-gallery-item-bw="<?= $x ?>">
                                <a href="#">&times;</a>
                                <span class="plus">&plus;</span>
                                <img src="<?= get_sub_field('image')['url'] ?>" alt="<?= get_sub_field('image')['alt'] ?>"/>
                                <span class="img-caption"><?= get_sub_field('image_caption') ?></span>
                                <div></div>
                            </div><!--single-->
                            <?php
                        } // end while images
                    } // end if  images
                ?>
            </div><!--gallery-->
            <div class="content-block__image-gallery-black-and-white-gallery-mobile">
                <?php 
                    if(have_rows('images')){
                        while(have_rows('images')){
                            the_row();
                            ?>
                            <div class="content-block__image-gallery-black-and-white-gallery-mobile-single">
                                <img src="<?= get_sub_field('image')['url'] ?>" alt="<?= get_sub_field('image')['alt'] ?>"/>
                                <span><?= get_sub_field('image_caption') ?></span>
                            </div><!--single-->
                            <?php
                        } // end while images
                    } // end if  images
                ?>
            </div><!--gallery-mobile-->
        </div><!--content-wrapper-->
    </div><!--content-block-->
<?php }; // end if show_this_content_block ?>