<?php
/*
 * Theme functions and definitions.
 */

// Sets up theme defaults and registers various WordPress features that theme supports
function bluegray_setup() {
	// Set max content width for img, video, and more
	global $content_width;
	if ( ! isset( $content_width ) )
	$content_width = 760;

	// Register Menu
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'bluegray' ),
	) );

	// Add document title
	add_theme_support( 'title-tag' );

	// Add support for editor styles
	add_theme_support( 'editor-styles' );

	// Add editor styles
	add_editor_style( 'custom-editor-style.css' );

	// Custom header
	$header_args = array(
		'width' => 1920,
		'height' => 400,
		'default-image' => get_template_directory_uri() . '/images/boats.jpg',
		'header-text' => false,
		'uploads' => true,
	);
	add_theme_support( 'custom-header', $header_args );

	// Default header
	register_default_headers( array(
		'boats' => array(
			'url' => get_template_directory_uri() . '/images/boats.jpg',
			'thumbnail_url' => get_template_directory_uri() . '/images/boats.jpg',
			'description' => __( 'Default header', 'bluegray' ),
		),
	) );

	// Post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Resize thumbnails
	set_post_thumbnail_size( 350, 350 );

	// This feature adds RSS feed links to html head
	add_theme_support( 'automatic-feed-links' );

	// Switch default core markup for search form, comment form, comments and caption to output valid html5
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption' ) );

	// Background color and image
	$background_args = array(
		'default-color' => 'eeeeee',
	);
	add_theme_support( 'custom-background', $background_args );

	// Post formats
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'gallery', 'audio' ) );
}
add_action( 'after_setup_theme', 'bluegray_setup' );

// Set max content width for full width page and post
function bluegray_extra_content_width() {
	global $content_width;
	if ( is_page_template( 'page-full.php' ) || is_page_template( 'single-full.php' ) )
	$content_width = 1160;
}
add_action( 'template_redirect', 'bluegray_extra_content_width' );

// Enqueues scripts and styles for front-end
function bluegray_scripts() {
	wp_enqueue_style( 'bluegray-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bluegray-nav', get_template_directory_uri() . '/js/nav.js' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bluegray_scripts' );

// Widget areas
function bluegray_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar', 'bluegray' ),
		'id' => 'primary',
		'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Homepage Left', 'bluegray' ),
		'id' => 'homepage-left',
		'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Homepage Middle', 'bluegray' ),
		'id' => 'homepage-middle',
		'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Homepage Right', 'bluegray' ),
		'id' => 'homepage-right',
		'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Left', 'bluegray' ),
		'id' => 'footer-left',
		'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Middle', 'bluegray' ),
		'id' => 'footer-middle',
		'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Right', 'bluegray' ),
		'id' => 'footer-right',
		'description' => __( 'You can add one or multiple widgets here.', 'bluegray' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'bluegray_widgets_init' );

// Add class to post nav
function bluegray_post_next() {
	return 'class="nav-next"';
}
add_filter('next_posts_link_attributes', 'bluegray_post_next', 999);

function bluegray_post_prev() {
	return 'class="nav-prev"';
}
add_filter('previous_posts_link_attributes', 'bluegray_post_prev', 999);

// Add class to comment nav
function bluegray_comment_next() {
	return 'class="comment-next"';
}
add_filter('next_comments_link_attributes', 'bluegray_comment_next', 999);

function bluegray_comment_prev() {
	return 'class="comment-prev"';
}
add_filter('previous_comments_link_attributes', 'bluegray_comment_prev', 999);

// Custom excerpt lenght (default length is 55 words)
function bluegray_excerpt_length( $length ) {
	if ( get_theme_mod( 'bluegray_content_lenght' ) ) {
		$length = get_theme_mod( 'bluegray_content_lenght' );
	}
	return $length;
}
add_filter( 'excerpt_length', 'bluegray_excerpt_length', 999 );

// Theme Customizer
function bluegray_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'bluegray_logo_section', array(
		'title' => __( 'Logo', 'bluegray' ),
		'priority' => 30,
	) );
	$wp_customize->add_setting( 'bluegray_logo', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bluegray_logo', array(
		'label' => __( 'Logo', 'bluegray' ),
		'section' => 'bluegray_logo_section',
		'settings' => 'bluegray_logo',
	) ) );
	$wp_customize->add_setting( 'bluegray_logo_width', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_logo_width', array(
		'label' => __( 'Width', 'bluegray' ),
		'description' => __( 'Only numeric characters allowed.', 'bluegray' ),
		'section' => 'bluegray_logo_section',
		'settings' => 'bluegray_logo_width',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 20,
			'max' => 1200,
			'step' => 20,
		),
	) ) );
	$wp_customize->add_section( 'bluegray_mobile_section', array(
		'title' => __( 'Mobile', 'bluegray' ),
		'priority' => 31,
	) );
	$wp_customize->add_setting( 'bluegray_mobile_menu_label', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_mobile_menu_label', array(
		'label' => __( 'Menu label', 'bluegray' ),
		'section' => 'bluegray_mobile_section',
		'settings' => 'bluegray_mobile_menu_label',
		'input_attrs' => array(
			'placeholder' => __( 'Menu', 'bluegray' ).' &#43;',
		),
	) ) );
	$wp_customize->add_section( 'bluegray_blog_section', array(
		'title' => __( 'Blog', 'bluegray' ),
		'priority' => 32,
	) );
	$wp_customize->add_setting( 'bluegray_blog_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_blog_title', array(
		'label' => __( 'Page title', 'bluegray' ),
		'section' => 'bluegray_blog_section',
		'settings' => 'bluegray_blog_title',
	) ) );
	$wp_customize->add_setting( 'bluegray_blog_content', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_blog_content', array(
		'label' => __( 'Content', 'bluegray' ),
		'section' => 'bluegray_blog_section',
		'settings' => 'bluegray_blog_content',
		'type' => 'textarea',
	) ) );
	$wp_customize->add_setting( 'bluegray_content_type', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'yes',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_content_type', array(
		'label' => __( 'Summary', 'bluegray' ),
		'section' => 'bluegray_blog_section',
		'settings' => 'bluegray_content_type',
		'type' => 'radio',
		'choices' => array(
			'yes' => __('Yes', 'bluegray'),
			'no' => __('No', 'bluegray'),
		),
	) ) );
	$wp_customize->add_setting( 'bluegray_content_lenght', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_content_lenght', array(
		'label' => __( 'Summary lenght', 'bluegray' ),
		'description' => __( 'Only numeric characters allowed.', 'bluegray' ),
		'section' => 'bluegray_blog_section',
		'settings' => 'bluegray_content_lenght',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 10,
			'max' => 100,
			'step' => 1,
			'placeholder' => '55',
		),
	) ) );
	$wp_customize->add_setting( 'bluegray_read_more', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'yes',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_read_more', array(
		'label' => __( 'Read More button', 'bluegray' ),
		'section' => 'bluegray_blog_section',
		'settings' => 'bluegray_read_more',
		'type' => 'radio',
		'choices' => array(
			'yes' => __('Yes', 'bluegray'),
			'no' => __('No', 'bluegray'),
		),
	) ) );
	$wp_customize->add_setting( 'bluegray_read_more_label', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_read_more_label', array(
		'label' => __( 'Read More label', 'bluegray' ),
		'section' => 'bluegray_blog_section',
		'settings' => 'bluegray_read_more_label',
		'input_attrs' => array(
			'placeholder' => __( 'Read More', 'bluegray' ).' &raquo;',
		),
	) ) );
	$wp_customize->add_setting( 'bluegray_post_image', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'no',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_post_image', array(
		'label' => __( 'Featured image on single post page', 'bluegray' ),
		'section' => 'bluegray_blog_section',
		'settings' => 'bluegray_post_image',
		'type' => 'radio',
		'choices' => array(
			'yes' => __('Yes', 'bluegray'),
			'no' => __('No', 'bluegray'),
		),
	) ) );
	$wp_customize->add_section( 'bluegray_footer_section', array(
		'title' => __( 'Footer', 'bluegray' ),
		'priority' => 33,
	) );
	$wp_customize->add_setting( 'bluegray_footer_content', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_footer_content', array(
		'label' => __( 'Copyright', 'bluegray' ),
		'section' => 'bluegray_footer_section',
		'settings' => 'bluegray_footer_content',
		'type' => 'textarea',
		'input_attrs' => array(
			'placeholder' => __( 'Copyright', 'bluegray' ).' '.gmdate( 'Y' ).' '.get_bloginfo( 'name' ),
		),
	) ) );
	// Site Identity section
	$wp_customize->add_setting( 'bluegray_site_title', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'yes',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_site_title', array(
		'label' => __( 'Site Title', 'bluegray' ),
		'section' => 'title_tagline',
		'settings' => 'bluegray_site_title',
		'type' => 'radio',
		'choices' => array(
			'yes' => __('Yes', 'bluegray'),
			'no' => __('No', 'bluegray'),
		),
	) ) );
	$wp_customize->add_setting( 'bluegray_tagline', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'yes',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_tagline', array(
		'label' => __( 'Tagline', 'bluegray' ),
		'section' => 'title_tagline',
		'settings' => 'bluegray_tagline',
		'type' => 'radio',
		'choices' => array(
			'yes' => __('Yes', 'bluegray'),
			'no' => __('No', 'bluegray'),
		),
	) ) );
	// Header Image section
	$wp_customize->add_setting( 'bluegray_header_image', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'yes',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bluegray_header_image', array(
		'label' => __( 'Homepage only', 'bluegray' ),
		'section' => 'header_image',
		'settings' => 'bluegray_header_image',
		'type' => 'radio',
		'choices' => array(
			'yes' => __('Yes', 'bluegray'),
			'no' => __('No', 'bluegray'),
		),
	) ) );
}
add_action('customize_register', 'bluegray_theme_customizer');
