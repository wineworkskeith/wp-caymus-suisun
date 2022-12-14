<?php
// Theme functions and definitions

////////////////////////////////////////////////////////////////////
// This theme only works in WordPress 4.4 or later.
////////////////////////////////////////////////////////////////////
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'theme_setup' ) ) :
function theme_setup() {

    add_editor_style();

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main' 		        => __( 'Main Menu'),
        'main_suisun'       => __( 'Main Menu Suisun'),
        'footer'            => __( 'Footer Menu'),
        'footer_suisun'     => __( 'Footer Menu Suisun'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles.
    add_editor_style( 'style-editor.css' );

    // Add custom editor font sizes.
    add_theme_support(
        'editor-font-sizes',
        array(
            array(
                'name'      => __( 'Small', 'AC' ),
                'shortName' => __( 'S', 'AC' ),
                'size'      => 19.5,
                'slug'      => 'small',
            ),
            array(
                'name'      => __( 'Normal', 'AC' ),
                'shortName' => __( 'M', 'AC' ),
                'size'      => 22,
                'slug'      => 'normal',
            ),
            array(
                'name'      => __( 'Large', 'AC' ),
                'shortName' => __( 'L', 'AC' ),
                'size'      => 36.5,
                'slug'      => 'large',
            ),
            array(
                'name'      => __( 'Huge', 'AC' ),
                'shortName' => __( 'XL', 'AC' ),
                'size'      => 49.5,
                'slug'      => 'huge',
            ),
        )
    );

    // Add support for responsive embedded content.
    add_theme_support( 'responsive-embeds' );


	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.min.css' ) );
}
endif; // theme_setup
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'theme_content_width', 840 );
}
add_action( 'after_setup_theme', 'theme_content_width', 0 );



//////////////////////////////////////////////////////////////////////
// Handles JavaScript detection.
//
// Adds a `js` class to the root `<html>` element when JavaScript is detected.
//////////////////////////////////////////////////////////////////////
function theme_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'theme_javascript_detection', 0 );

//////////////////////////////////////////////////////////////////////
// Enqueues scripts and styles.
//////////////////////////////////////////////////////////////////////
function theme_scripts() {
	// Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'theme-fonts', array(), null );

	// Version CSS file in a theme
    wp_enqueue_style(
        'theme-styles',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        filemtime( get_stylesheet_directory() . '/style.css' )
    );

    // jQuery
    wp_deregister_script( 'jquery' );

    wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-2.2.4.min.js', array() );

    wp_enqueue_script(
        'jquery-slick',
        get_stylesheet_directory_uri() . '/js/slick.min.js',
        array(),
        filemtime( get_stylesheet_directory() . '/js/slick.min.js' )
    );

    wp_enqueue_script(
        'body-scroll-lock',
        get_stylesheet_directory_uri() . '/js/bodyScrollLock.min.js',
        array(),
        filemtime( get_stylesheet_directory() . '/js/bodyScrollLock.min.js' )
    );

    wp_enqueue_script(
        'micromodal',
        get_stylesheet_directory_uri() . '/js/micromodal.min.js',
        array(),
        filemtime( get_stylesheet_directory() . '/js/micromodal.min.js' )
    );

    wp_enqueue_script(
        'vimeo-player-api',
        '//player.vimeo.com/api/player.js',
        array(),
        ''
    );

    wp_enqueue_script(
        'greensock-main',
        '//cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js',
        array(),
        ''
    );

    wp_enqueue_script(
        'greensock-scroll-to',
        '//cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollToPlugin.min.js',
        array(),
        ''
    );

    wp_enqueue_script(
        'greensock-css-rule-plugin',
        '//cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/CSSRulePlugin.min.js',
        array(),
        ''
    );

    wp_enqueue_script(
        'greensock-scroll-trigger',
        '//cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js',
        array(),
        ''
    );

    wp_enqueue_script(
        'theme-scripts',
        get_stylesheet_directory_uri() . '/js/scripts.min.js',
        array(),
        filemtime( get_stylesheet_directory() . '/js/scripts.min.js' )
    );
    
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

if ( ! function_exists( 'theme_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own theme_post_thumbnail() function to override in a child theme.
 *

 */
  function theme_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
      return;
    }

    if ( is_singular() ) :
    ?>

    <div class="post-thumbnail">
      <?php the_post_thumbnail(); ?>
    </div><!-- .post-thumbnail -->

    <?php else : ?>

    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
      <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
    </a>

    <?php endif; // End is_singular()
  }
endif;


//////////////////////////////////////////////////////////////////////
// CONVERT WP MENU CLASS NAMES INTO BEM CLASS NAMES
//////////////////////////////////////////////////////////////////////
class walker_texas_ranger extends Walker_Nav_Menu {
    function __construct($css_class_prefix) {
        $this->css_class_prefix = $css_class_prefix;
        
        // Define menu item names appropriately
        $this->item_css_class_suffixes = array(
            'item'                      => '__item',  
            'parent_item'               => '__item--parent',
            'active_item'               => '__item--active',
            'parent_of_active_item'     => '__item--parent--active',
            'ancestor_of_active_item'   => '__item--ancestor--active',
            'sub_menu'                  => '__sub-menu',
            'sub_menu_item'             => '__sub-menu__item',
            'link'                      => '__link',
        );
    }
    // Check for children
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
                
        $id_field = $this->db_fields['id'];
        
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = !empty( $children_elements[$element->$id_field] );
        }
        
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    
    }
    
    function start_lvl(&$output, $depth = 1, $args=array()) {
        
        $real_depth = $depth + 1;
        
        $indent = str_repeat("\t", $real_depth);
        $prefix = $this->css_class_prefix;
        $suffix = $this->item_css_class_suffixes;
        $classes = array(
            $prefix . $suffix['sub_menu'],
            $prefix . $suffix['sub_menu']. '--' . $real_depth
        );
        $class_names = implode( ' ', $classes );
        // Add a ul wrapper to sub nav
        $output .= "\n" . $indent . '<ul class="'. $class_names .'">' ."\n";
    }
  
    // Add main/sub classes to li's and links
     
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        
        global $wp_query;
        
        $indent = ( $depth > 0 ? str_repeat( "    ", $depth ) : '' ); // code indent
        $prefix = $this->css_class_prefix;
        $suffix = $this->item_css_class_suffixes;
        // Item classes
        $item_classes =  array(
            'item_class'            => $depth == 0 ? $prefix . $suffix['item'] : '',
            'parent_class'          => $args->has_children ? $parent_class = $prefix . $suffix['parent_item'] : '',
            'active_page_class'     => in_array("current-menu-item",$item->classes) ? $prefix . $suffix['active_item'] : '',
            'active_parent_class'   => in_array("current-menu-parent",$item->classes) ? $prefix . $suffix['parent_of_active_item'] : '',
            'active_ancestor_class' => in_array("current-menu-ancestor",$item->classes) ? $prefix . $suffix['ancestor_of_active_item'] : '',
            'depth_class'           => $depth >=1 ? $prefix . $suffix['sub_menu_item'] . ' ' . $prefix . $suffix['sub_menu'] . '--' . $depth . '__item' : '',
            'item_id_class'         => $prefix . '__item--'. $item->object_id,
            'user_class'            => $item->classes[0] !== '' ? $prefix . '__item--'. $item->classes[0] : ''
        );
        // convert array to string excluding any empty values
        $class_string = implode("  ", array_filter($item_classes));
        // Add the classes to the wrapping <li>
        $output .= $indent . '<li class="' . $class_string . '">';
        // Link classes
        $link_classes = array(
            'item_link'             => $depth == 0 ? $prefix . $suffix['link'] : '',
            'depth_class'           => $depth >=1 ? $prefix . $suffix['sub_menu'] . $suffix['link'] . '  ' . $prefix . $suffix['sub_menu'] . '--' . $depth . $suffix['link'] : '',
        );
        $link_class_string = implode("  ", array_filter($link_classes));
        $link_class_output = 'class="' . $link_class_string . '"';
        // link attributes
        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
        // Creatre link markup
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . ' ' . $link_class_output . '>';
        $item_output .=     $args->link_before;
        $item_output .=     apply_filters('the_title', $item->title, $item->ID);
        $item_output .=     $args->link_after;
        $item_output .=     $args->after;
        $item_output .= '</a>';
        // Filter <li>
 
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
}
/**
 * bem_menu returns an instance of the walker_texas_ranger class with the following arguments
 * @param  string $location This must be the same as what is set in wp-admin/settings/menus for menu location.
 * @param  string $css_class_prefix This string will prefix all of the menu's classes, BEM syntax friendly
 * @param  arr/string $css_class_modifiers Provide either a string or array of values to apply extra classes to the <ul> but not the <li's>
 * @return [type]
 */
function bem_menu($location = "primary", $css_class_prefix = 'main-menu', $css_class_modifiers = null){  
    
    // Check to see if any css modifiers were supplied
    if($css_class_modifiers){
        if(is_array($css_class_modifiers)){
            $modifiers = implode(" ", $css_class_modifiers);
        } elseif (is_string($css_class_modifiers)) {
            $modifiers = $css_class_modifiers;
        }
    } else {
        $modifiers = '';
    }
    $args = array(
        'theme_location'    => $location,
        'container'         => false,
        'items_wrap'        => '<ul class="' . $css_class_prefix . ' ' . $modifiers . '">%3$s</ul>',
        'walker'            => new walker_texas_ranger($css_class_prefix, true)
    );
    
    if (has_nav_menu($location)){
        return wp_nav_menu($args);
    }else{
        echo "<p>You need to first define a menu in WP-admin<p>";
    }
}

//////////////////////////////////////////////////////////////////////
// REMOVE EMOJIS
//////////////////////////////////////////////////////////////////////
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
* Filter function used to remove the tinymce emoji plugin.
* 
* @param array $plugins 
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}

//////////////////////////////////////////////////////////////////////
// CLEAN UP THE HEAD
//////////////////////////////////////////////////////////////////////
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

//////////////////////////////////////////////////////////////////////
// ALLOW SVGS
//////////////////////////////////////////////////////////////////////
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

//////////////////////////////////////////////////////////////////////
// ACF - OPTIONS PAGE - THEME SETTINGS
//////////////////////////////////////////////////////////////////////
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));

    acf_add_options_sub_page(array(
        'page_title'    => '404 Page Options',
        'menu_title'    => '404 Page Options',
        'parent_slug'   => 'theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Footer Options',
        'menu_title'    => 'Footer Options',
        'parent_slug'   => 'theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Header Options',
        'menu_title'    => 'Header Options',
        'parent_slug'   => 'theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'parent_slug'   => 'theme-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Site Credits',
        'menu_title'    => 'Site Credits',
        'parent_slug'   => 'theme-settings',
    ));
}

//////////////////////////////////////////////////////////////////////
// WP - CUSTOM BUTTON SHORTCODES
//////////////////////////////////////////////////////////////////////
function custom_button_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'url'                   => '',
        'title'                 => '',
        'target'                => '',
        'text'                  => '',
        'screen_reader_text'    => '',
        'center'                => '',
    ), $atts ) );
 
    $content = $text ? $text : $content;
 
    // Returns the button with a link
    if ( $url ) {

        if( $atts['target'] == 'blank' || $atts['target'] == '_blank'){
 
            $link_attr = array(
                'href'   => esc_url( $url ),
                'title'  => esc_attr( $title ),
                'target' => '_blank',
                'class'  => 'button button--inline-block'
            );

        }else{
            $link_attr = array(
                'href'   => esc_url( $url ),
                'title'  => esc_attr( $title ),
                'target' => '',
                'class'  => 'button button--inline-block'
            );
        }
 
        $link_attrs_str = '';
 
        foreach ( $link_attr as $key => $val ) {
 
            if ( $val ) {
 
                $link_attrs_str .= ' ' . $key . '="' . $val . '"';
 
            }
 
        }
 
        
        if($atts['center'] == true){
            return '<p style="text-align: center;"><a' . $link_attrs_str . ' aria-label="'.$atts['screen_reader_text'].'">' . do_shortcode( $content ) . '</a></p>';
        }else{
            return '<p><a' . $link_attrs_str . ' aria-label="'.$atts['screen_reader_text'].'">' . do_shortcode( $content ) . '</a></p>';

        }
    }
 
    // Return as span when no link defined
    else {
 
        if($atts['center'] == true){
            return '<p style="text-align: center;"><a href="#" aria-label="'.$atts['screen_reader_text'].'">' . do_shortcode( $content ) . '</a></p>';
        }else{
            return '<p><a href="#" aria-label="'.$atts['screen_reader_text'].'">' . do_shortcode( $content ) . '</a></p>';
        }
    }
 
}
add_shortcode( 'button', 'custom_button_shortcode' );

function custom_button_dark_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'url'                   => '',
        'title'                 => '',
        'target'                => '',
        'text'                  => '',
        'screen_reader_text'    => '',
        'center'                => '',
    ), $atts ) );
 
    $content = $text ? $text : $content;
 
    // Returns the button with a link
    if ( $url ) {

        if( $atts['target'] == 'blank' || $atts['target'] == '_blank'){
 
            $link_attr = array(
                'href'   => esc_url( $url ),
                'title'  => esc_attr( $title ),
                'target' => '_blank',
                'class'  => 'button button--dark button--inline-block'
            );

        }else{
            $link_attr = array(
                'href'   => esc_url( $url ),
                'title'  => esc_attr( $title ),
                'target' => '',
                'class'  => 'button button--dark button--inline-block'
            );
        }
 
        $link_attrs_str = '';
 
        foreach ( $link_attr as $key => $val ) {
 
            if ( $val ) {
 
                $link_attrs_str .= ' ' . $key . '="' . $val . '"';
 
            }
 
        }
 
        
        if($atts['center'] == true){
            return '<p style="text-align: center;"><a' . $link_attrs_str . ' aria-label="'.$atts['screen_reader_text'].'">' . do_shortcode( $content ) . '</a></p>';
        }else{
            return '<p><a' . $link_attrs_str . ' aria-label="'.$atts['screen_reader_text'].'">' . do_shortcode( $content ) . '</a></p>';

        }
    }
 
    // Return as span when no link defined
    else {
 
        if($atts['center'] == true){
            return '<p style="text-align: center;"><a href="#" aria-label="'.$atts['screen_reader_text'].'">' . do_shortcode( $content ) . '</a></p>';
        }else{
            return '<p><a href="#" aria-label="'.$atts['screen_reader_text'].'">' . do_shortcode( $content ) . '</a></p>';
        }
    }
 
}
add_shortcode( 'button_dark', 'custom_button_dark_shortcode' );

function custom_button_alt_shortcode( $atts, $content = null ) {
   
    // shortcode attributes
    extract( shortcode_atts( array(
        'url'    => '',
        'title'  => '',
        'target' => '',
        'text'   => '',
        'screen_reader_text'   => '',
    ), $atts ) );
 
    $content = $text ? $text : $content;
 
    // Returns the button with a link
    if ( $url ) {

        if( $atts['target'] == 'blank' || $atts['target'] == '_blank'){
 
            $link_attr = array(
                'href'   => esc_url( $url ),
                'title'  => esc_attr( $title ),
                'target' => '_blank',
                'class'  => 'button button--alt button--alt-inline'
            );

        }else{
            $link_attr = array(
                'href'   => esc_url( $url ),
                'title'  => esc_attr( $title ),
                'target' => '',
                'class'  => 'button button--alt button--alt-inline'
            );
        }
 
        $link_attrs_str = '';
 
        foreach ( $link_attr as $key => $val ) {
 
            if ( $val ) {
 
                $link_attrs_str .= ' ' . $key . '="' . $val . '"';
 
            }
 
        }
 
 
        return '<p><a' . $link_attrs_str . ' aria-label="'.$atts['screen_reader_text'].'">' . do_shortcode( $content ) . '</a></p>';
 
    }
 
    // Return as span when no link defined
    else {
 
        return '<p><a href="#" aria-label="'.$atts['screen_reader_text'].'">' . do_shortcode( $content ) . '</a></p>';
 
    }
 
}
add_shortcode( 'button_alt', 'custom_button_alt_shortcode' );


//////////////////////////////////////////////////////////////////////
// ACF - RESPONSIVE IMAGES / SRCSET
//////////////////////////////////////////////////////////////////////

/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute 
 */

function acf_responsive_image($image_id,$image_size,$max_width){

	// check the image ID is not blank
	if($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

		// generate the markup for the responsive image
		echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

	}
}

//////////////////////////////////////////////////////////////////////
// WP - ADD C7-CONTENT DIV SHORTCODE
//////////////////////////////////////////////////////////////////////
function c7_content_shortcode() {
    return '<div id="c7-content"></div>';
}
add_shortcode( 'c7_content', 'c7_content_shortcode' );



//////////////////////////////////////////////////////////////////////
// WP - ADD C7 RESERVATION DIV SHORTCODE
//////////////////////////////////////////////////////////////////////
function c7_reservation_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'slug' => '',
		),
		$atts
	);

	return '<div class="c7-reservation-availability" data-reservation-type-slug="'.$atts['slug'].'"></div>';

}
add_shortcode( 'c7_reservation', 'c7_reservation_shortcode' );


//////////////////////////////////////////////////////////////////////
// WP - ADD C7 COLLECTION DIV SHORTCODE
//////////////////////////////////////////////////////////////////////
function c7_collection_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'slug' => '',
		),
		$atts
	);

    return '<div class="c7-product-collection" data-collection-slug="'.$atts['slug'].'"></div>';

}
add_shortcode( 'c7_collection', 'c7_collection_shortcode' );


//////////////////////////////////////////////////////////////////////
// WP - ADD C7 COLLECTION DIV SHORTCODE
//////////////////////////////////////////////////////////////////////
function c7_form_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'form-code' => '',
		),
		$atts
	);

    return '<div class="c7-form-wrapper" data-form-code="'.$atts['form-code'].'"></div>';

}
add_shortcode( 'c7_form', 'c7_form_shortcode' );

function find_our_wine_shortcode(){

    return '<!-- MetaLocator.com Code START --><script language="javascript" src="//code.metalocator.com/index.php?option=com_locator&view=directory&layout=_javascript&framed=1&format=raw&tmpl=component&no_html=1&Itemid=14056"></script><!-- MetaLocator.com Code END: Do not modify this code block. See TOS for details. -->';

}
add_shortcode( 'find_our_wine', 'find_our_wine_shortcode');

//////////////////////////////////////////////////////////////////////
// ACF/WP - FRIENDLY BLOCK TITLES IN ACF
//////////////////////////////////////////////////////////////////////
add_filter('acf/fields/flexible_content/layout_title/name=content_blocks', 'my_acf_fields_flexible_content_layout_title', 10, 4);
function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {

    // load text sub field and append it to the regular content block title
    if( $text = get_sub_field('admin_title') ) {
        $title .= ' - <strong>' . esc_html($text) . '</strong>';
    }

    return $title;
}

//////////////////////////////////////////////////////////////////////
// WP - WYSIWYG CLASSES
//////////////////////////////////////////////////////////////////////
function add_style_select_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'add_style_select_buttons' );

//add custom styles to the WordPress editor
function my_custom_styles( $init_array ) {  

    $style_formats = array(  
        // These are the custom styles
        array(  
            'title' => 'h1',  
            'block' => 'span',  
            'classes' => 'h1',
            'wrapper' => true,
        ), 
        array(  
            'title' => 'h2',  
            'block' => 'span',  
            'classes' => 'h2',
            'wrapper' => true,
        ),
        array(  
            'title' => 'h3',  
            'block' => 'span',  
            'classes' => 'h3',
            'wrapper' => true,
        ), 
        array(  
            'title' => 'h4',  
            'block' => 'span',  
            'classes' => 'h4',
            'wrapper' => true,
        ), 
        array(  
            'title' => 'h5',  
            'block' => 'span',  
            'classes' => 'h5',
            'wrapper' => true,
        ), 
        array(  
            'title' => 'h6',  
            'block' => 'span',  
            'classes' => 'h6',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Text-Small',  
            'block' => 'span',  
            'classes' => 'text-small',
            'wrapper' => true,
        ),  
        array(  
            'title' => 'Text-Tiny',  
            'block' => 'span',  
            'classes' => 'text-tiny',
            'wrapper' => true,
        )
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
    
    return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_custom_styles' );