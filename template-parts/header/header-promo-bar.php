<?php if(get_field('promo_bar_toggle', 'options')){ ?>
    <div class="header-promo-bar">
        <div class="content-wrapper">
            <a href="#" class="header-promo-bar__close">&times;</a>
            <?php echo get_field('promo_bar_content', 'options'); ?>
        </div><!--content-wrapper-->
    </div><!--.header-promo-bar-->
<?php } ?>