<?php
function lawgit_fonts_url(){
	$fonts_url = '';
	if ( 'off' !== _x( 'on', 'Google fonts - Open Sans and Roboto : on or off', 'lawgit' ) ) {
		$fonts_url = add_query_arg( 'family', urlencode( 'Open Sans:300,300i,400,400i,700,800|Roboto:100,100i,300,400,500,700,900&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
	}
	return $fonts_url;
}

add_action( 'wp_enqueue_scripts', 'lawgit_register_scripts', 12 );
function lawgit_register_scripts(){

}

add_action( 'wp_enqueue_scripts', 'lawgit_enqueue_scripts', 15 );
function lawgit_enqueue_scripts() {
	/*CSS*/
	wp_enqueue_style( 'bootstrap',            		TA_LAW_CSS_URL . 'bootstrap.min.css', array(), TA_LAW_THEME_VERSION );
	wp_enqueue_style( 'animate',         			TA_LAW_CSS_URL . 'animate.css', array(), TA_LAW_THEME_VERSION );
	wp_enqueue_style( 'flaticon',             		TA_LAW_CSS_URL . 'flaticon.css', array(), TA_LAW_THEME_VERSION );
	wp_enqueue_style( 'awesome',   					TA_LAW_CSS_URL . 'font-awesome.css', array(), TA_LAW_THEME_VERSION );
	wp_enqueue_style( 'fancybox',       			TA_LAW_CSS_URL . 'jquery.fancybox.min.css', array(), TA_LAW_THEME_VERSION );
	wp_enqueue_style( 'lawgit-owl', 				TA_LAW_CSS_URL . 'owl.css', array(), TA_LAW_THEME_VERSION );
	wp_enqueue_style( 'lawgit-responsive',  		TA_LAW_CSS_URL . 'responsive.css', array(), TA_LAW_THEME_VERSION );
	wp_enqueue_style( 'lawgit-mCustomScrollbar',  	TA_LAW_CSS_URL . 'jquery.mCustomScrollbar.min.css', array(), TA_LAW_THEME_VERSION );
	wp_enqueue_style( 'lawgit-jquery-ui',  			TA_LAW_CSS_URL . 'jquery-ui.css', array(), TA_LAW_THEME_VERSION );
	wp_enqueue_style( 'lawgit-slick',  				TA_LAW_CSS_URL . 'slick.css', array(), TA_LAW_THEME_VERSION );
	wp_enqueue_style( 'lawgit-basic',  				TA_LAW_CSS_URL . 'basic.css', array(), TA_LAW_THEME_VERSION );

	ob_start();
	include TA_LAW_INC_DIR . 'lg-variable-style.php';
	include TA_LAW_INC_DIR . 'lg-variable-style-vc.php';
	$variable_css  = ob_get_clean();
	$variable_css .= wp_kses_post( Law_Git::$options['custom_css'] ); // custom css
	wp_add_inline_style( 'lawgit-responsive', $variable_css );

	/*JS*/
	wp_enqueue_script( 'jquery',             	TA_LAW_JS_URL . 'jquery.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'popper-min',      		TA_LAW_JS_URL . 'popper.min.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'bootstrap-min',       	TA_LAW_JS_URL . 'bootstrap.min.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'isotope',       		TA_LAW_JS_URL . 'isotope.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'mCustomScrollbar',      TA_LAW_JS_URL . 'jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'jquery-fancybox',       TA_LAW_JS_URL . 'jquery.fancybox.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'appear',       			TA_LAW_JS_URL . 'appear.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'mixitup',     			TA_LAW_JS_URL . 'mixitup.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'owl',       			TA_LAW_JS_URL . 'owl.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'wow',       			TA_LAW_JS_URL . 'wow.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'slick',       			TA_LAW_JS_URL . 'slick.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'jquery-ui',          	TA_LAW_JS_URL . 'jquery-ui.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	wp_enqueue_script( 'script',       			TA_LAW_JS_URL . 'script.js', array( 'jquery' ), TA_LAW_THEME_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

// Admin Scripts
add_action( 'admin_enqueue_scripts', 'lawgit_admin_scripts', 12 );
function lawgit_admin_scripts(){
	global $pagenow, $typenow;

	wp_enqueue_style( 'font-awesome', TA_LAW_CSS_URL . 'font-awesome.min.css', array(), TA_LAW_THEME_VERSION );
	
	if( !in_array( $pagenow, array('post.php', 'post-new.php', 'edit.php') ) ) return;
	
	if( $typenow == 'wlshowcasesc' ){
		wp_enqueue_style( 'admin-logo-showcase', TA_LAW_CSS_URL . 'admin-logo-showcase.css', array(), TA_LAW_THEME_VERSION );
	}
}