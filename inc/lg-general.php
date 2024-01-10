<?php
if (!isset($content_width)) {
	$content_width = 1200;
}

add_action( 'after_setup_theme', 'lawgit_setup' );
function lawgit_setup() {
	// Language
	load_theme_textdomain( 'lawgit', TA_LAW_BASE_DIR . 'languages' );

	// Theme support
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );

	// Image sizes
	//Banner
	add_image_size( 'lawgit-banner', 1920, 480, true );
	//Posts		
	add_image_size( 'lawgit-post-1', 80, 80, true );
	add_image_size( 'lawgit-post-2', 350, 275, true );
	add_image_size( 'lawgit-post-3', 850, 500, true );
	//Practice
	add_image_size( 'lawgit-practice-1', 120, 120, true ); 
	add_image_size( 'lawgit-practice-2', 350, 275, true );			
	add_image_size( 'lawgit-practice-4', 825, 622, true ); 		
	//Attorneys			
	add_image_size( 'lawgit-attorney-1', 445, 472, true );
	add_image_size( 'lawgit-attorney-2', 255, 330, true );
	//Testimonial			
	add_image_size( 'lawgit-testimonial', 120, 120, true ); 

	// Register menus
	register_nav_menus(array(
		'primary' => esc_html__( 'Primary', 'lawgit' ),
		'footer'  => esc_html__( 'Footer', 'lawgit' ),
	));
}

add_editor_style();

add_filter( 'site_transient_update_plugins', 'remove_wp_update_notifications' );
function remove_wp_update_notifications( $value ){    
    if ( isset( $value ) && is_object( $value ) ){ 
		unset( $value->response[ 'revslider/revslider.php' ] ); 
		unset( $value->response[ 'js_composer/js_composer.php' ] ); 
    }
    return $value;
}

add_filter('next_post_link', 'posts_link_next_class');
function posts_link_next_class($format){
	$format = str_replace('href=', 'class="blog-next" href=', $format);
	return $format;
}

add_filter('previous_post_link', 'posts_link_prev_class');
function posts_link_prev_class($format) {
	$format = str_replace('href=', 'class="blog-prev" href=', $format);
	return $format;
}
