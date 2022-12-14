<?php if(get_sub_field('show_this_content_block')){ ?>
    <?php $player_id = (rand(10000,1000000)); ?>
    <div class="content-block content-block__two-images-and-video-and-text <?= get_sub_field('custom_css_classes') ?>" <?php if(get_sub_field('id_anchor')){echo 'id="'.get_sub_field('id_anchor').'"'; }; ?>>
        <div class="content-wrapper">
            <div class="content-block__two-images-and-video-and-text-top">
                <div class="content-block__two-images-and-video-and-text-top-video">
                    <a href="#play_video" data-player-linked-id="<?= $player_id ?>" title="Play Video (opens a modal)"></a>
                    <div>
                        <video width="1920" height="1080" loop muted autoplay playsinline poster="<?= get_sub_field('poster_image_for_video')['url'] ?>">
                            <source src="<?= get_sub_field('video_file_for_autoplay') ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <span>Play Video <img src="<?= get_template_directory_uri() ?>/images/icons/icon-play.svg" alt="play icon" /></span>
                    </div>
                </div><!--video-->
                <div class="content-block__two-images-and-video-and-text-top-image">
                    <img src="<?= get_sub_field('top_image_beside_video')['url'] ?>" alt="<?= get_sub_field('top_image_beside_video')['alt'] ?>" />
                </div><!--image-->
                <div class="content-block__two-images-and-video-and-text-top-image-mobile">
                    <img src="<?= get_sub_field('bottom_image_beside_text')['url'] ?>" alt="<?= get_sub_field('bottom_image_beside_text')['alt'] ?>" />
                </div><!--image-mobile-->
            </div><!--top-->
            <div class="content-block__two-images-and-video-and-text-bottom">
                <div class="content-block__two-images-and-video-and-text-bottom-image">
                    <img src="<?= get_sub_field('bottom_image_beside_text')['url'] ?>" alt="<?= get_sub_field('bottom_image_beside_text')['alt'] ?>" />
                </div><!--image-->
                <div class="content-block__two-images-and-video-and-text-bottom-text">
                    <div><?= get_sub_field('text_content') ?></div>
                </div><!--text-->
            </div><!--bottom-->
        </div><!--content-wrapper-->
    </div><!--content-block-->
    
    <div class="two-images-and-video-and-text__player" data-player-id="<?= $player_id ?>" tabindex="-1" role="dialog" aria-labelledby="video_description_<?= $player_id ?>" aria-modal="true" aria-hidden="true">
        <div>
            <span class="screen-reader-text" id="video_description_<?= $player_id ?>"><?= get_sub_field('poster_image_for_video')['alt'] ?></span>
            <a href="#" data-player-to-close="<?= $player_id ?>" aria-label="Close Video Player">&times;</a>
            <div class="video-aspect-ratio-wrapper">
                <iframe class="vimeo-modal" id="video_<?= $player_id ?>" width="1920" height="1080" src="<?= get_sub_field('video_url_for_full_video') ?>?title=0&byline=0&controls=<?php if(get_sub_field('enable_video_controls')){ echo '1';}else{echo '0';} ?>" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
            </div><!--aspect-ratio-wrapper-->
        </div>
    </div>
<?php }; // end if show_this_content_block ?>