<div class="menu-overlay" id="modal-menu" aria-hidden="true">
    <div tabindex="-1">
        <div role="dialog" aria-modal="true" aria-labelledby="modal-menu-title">
            <div id="modal-1-content" class="modal__content">
                <button aria-label="Close menu modal" data-micromodal-close>&times;</button>
                <a href="/caymus-suisun/" class="menu-logo menu-logo--suisun" title="Caymus Suisun">
                    <?php get_template_part('template-parts/svgs/logo-suisun'); ?>
				</a><!--logo-->
                <span id="modal-menu-title" class="screen-reader-text">Main Navigation</span>
                <nav class="main-menu" role="dialog">
                    <?php echo wp_nav_menu(array('theme_location' => 'main_suisun')); ?>
                </nav>
            </div><!--modal__content-->
        </div><!--dialog-->
    </div>
</div>