<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
require_once('modal/class.Base.php');
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    //wp_enqueue_style( 'google_font', 'https://fonts.googleapis.com/css?family=Quicksand:400,700|Raleway:400,700&display=swap');
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/slick-carousel/slick/slick.css');
    wp_enqueue_style( 'understrap-theme', get_stylesheet_directory_uri() . '/style.css?' . filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script('understap-theme', get_stylesheet_directory_uri() . '/js/template.js?' . filemtime(get_stylesheet_directory() . '/js/template.js'), array('jquery'));
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/slick-carousel/slick/slick.js');
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );
function dg_remove_page_templates( $templates ) {
    unset( $templates['page-templates/blank.php'] );
    unset( $templates['page-templates/right-sidebarpage.php'] );
    unset( $templates['page-templates/both-sidebarspage.php'] );
    unset( $templates['page-templates/empty.php'] );
    unset( $templates['page-templates/fullwidthpage.php'] );
    unset( $templates['page-templates/left-sidebarpage.php'] );
    unset( $templates['page-templates/right-sidebarpage.php'] );

    return $templates;

}
add_filter( 'theme_page_templates', 'dg_remove_page_templates' );
add_action('admin_init', 'my_general_section');

function my_general_section() {

    add_settings_section(

        'my_settings_section', // Section ID

        'Custom Website Settings', // Section Title

        'my_section_options_callback', // Callback

        'general' // What Page?  This makes the section show up on the General Settings Page

    );
    add_settings_field( // Option 1

        'phone', // Option ID

        'Phone Number', // Label

        'my_textbox_callback', // !important - This is where the args go!

        'general', // Page it will be displayed (General Settings)

        'my_settings_section', // Name of our section

        array( // The $args

            'phone' // Should match Option ID

        )

    );
    add_settings_field( // Option 1

        'mobile', // Option ID

        'Mobile Number', // Label

        'my_textbox_callback', // !important - This is where the args go!

        'general', // Page it will be displayed (General Settings)

        'my_settings_section', // Name of our section

        array( // The $args

            'mobile' // Should match Option ID

        )

    );
    add_settings_field( // Option 2

        'email', // Option ID

        'Email', // Label

        'my_textbox_callback', // !important - This is where the args go!

        'general', // Page it will be displayed

        'my_settings_section', // Name of our section (General Settings)

        array( // The $args

            'email' // Should match Option ID

        )

    );
    add_settings_field( // Option 2

        'address', // Option ID

        'Address', // Label

        'my_textbox_callback', // !important - This is where the args go!

        'general', // Page it will be displayed

        'my_settings_section', // Name of our section (General Settings)

        array( // The $args

            'address' // Should match Option ID

        )

    );
    add_settings_field( // Option 2

        'facebook', // Option ID

        'Facebook Link', // Label

        'my_textbox_callback', // !important - This is where the args go!

        'general', // Page it will be displayed

        'my_settings_section', // Name of our section (General Settings)

        array( // The $args

            'facebook' // Should match Option ID

        )

    );
    add_settings_field( // Option 2

        'instagram', // Option ID

        'Instagram Link', // Label

        'my_textbox_callback', // !important - This is where the args go!

        'general', // Page it will be displayed

        'my_settings_section', // Name of our section (General Settings)

        array( // The $args

            'instagram' // Should match Option ID

        )

    );
    add_settings_field( // Option 2

        'linkedin', // Option ID

        'LinkedIn Link', // Label

        'my_textbox_callback', // !important - This is where the args go!

        'general', // Page it will be displayed

        'my_settings_section', // Name of our section (General Settings)

        array( // The $args
            'linkedin' // Should match Option ID
        )
    );
    add_settings_field( // Option 2

        'blog', // Option ID

        'Blog page heading', // Label

        'my_textbox_callback', // !important - This is where the args go!

        'general', // Page it will be displayed

        'my_settings_section', // Name of our section (General Settings)

        array( // The $args
            'blog' // Should match Option ID
        )
    );
    register_setting('general','phone', 'esc_attr');
    register_setting('general','mobile', 'esc_attr');
    register_setting('general','email', 'esc_attr');
    register_setting('general','address', 'esc_attr');
    register_setting('general','facebook', 'esc_attr');
    register_setting('general','instagram', 'esc_attr');
    register_setting('general','linkedin', 'esc_attr');
    register_setting('general','blog', 'esc_attr');
}
function my_section_options_callback() { // Section Callback
    echo '';
}
function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}
function formatPhoneNumber($ph) {
    $ph = str_replace('(', '', $ph);
    $ph = str_replace(')', '', $ph);
    $ph = str_replace(' ', '', $ph);
    $ph = str_replace('+64', '0', $ph);
    return $ph;
}
function socialMediaMenu() {
    $html = '
    <ul class="social-media">';
    if(get_option('facebook')) {
        $html .= '<li><a href="' . get_option('facebook') . '" target="_blank" class="fa fa-facebook-square"></a>';
    }
    if(get_option('instagram')) {
        $html .= '<li><a href="' . get_option('instagram') . '" target="_blank" class="fa fa-instagram"></a>';
    }
    if(get_option('linkedin')) {
        $html .= '<li><a href="' . get_option('linkedin') . '" target="_blank" class="fa fa-linkedin-square"></a>';
    }
    $html .= '</ul>';
    return $html;
}
function template_widgets_init() {
    register_sidebar( array(

        'name'          => __( 'Footer Widget', 'understrap' ),

        'id'            => 'footerwidget',

        'description'   => 'Widget area in the footer',

        'before_widget'  => '<div class="footer-widget-wrapper">',

        'after_widget'   => '</div><!-- .footer-widget -->',

        'before_title'   => '<h3 class="widget-title">',

        'after_title'    => '</h3>',
    ) );
}
//add_action( 'widgets_init', 'template_widgets_init' );
add_action('init', 'dg_register_menus');
function dg_register_menus() {
    register_nav_menus(
        Array(
            'footer-menu' => __('Footer Menu'),
        )
    );
}
add_image_size( 'blog', 300, 300, true);