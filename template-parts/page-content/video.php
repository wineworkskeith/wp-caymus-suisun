<?php if(get_sub_field('show_this_content_block')){ ?>
    <div class="content-block content-block__video <?= get_sub_field('custom_css_classes') ?>" <?php if(get_sub_field('id_anchor')){echo 'id="'.get_sub_field('id_anchor').'"'; }; ?>>
        <div class="content-wrapper">
            <div class="content-block__video-wrapper">
                <video width="1920" height="1080" <?php if(get_sub_field('enable_controls')){ echo ' controls'; }; if(get_sub_field('loop_video')){ echo ' loop'; }; if(get_sub_field('autoplay_video')){ echo ' autoplay'; }; if(get_sub_field('start_video_muted')){ echo ' muted'; }; ?> playsinline>
                    <source src="<?= get_sub_field('video_file') ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="content-block__video-wrapper-poster"><img src="<?= get_sub_field('poster_image')['url'] ?>" alt="<?= get_sub_field('poster_image')['alt'] ?>" /></div>
            </div><!--video-wrapper-->
        </div><!--content-wrapper-->
    </div><!--content-block-->
<?php }; // end if show_this_content_block ?>