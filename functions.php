<?php
$lawgit_theme_data = wp_get_theme();
define( 'TA_LAW_THEME_VERSION', ( WP_DEBUG ) ? time() : $lawgit_theme_data->get( 'Version' ) );
define( 'TA_LAW_THEME_AUTHOR_URI', $lawgit_theme_data->get( 'AuthorURI' ) );

// DIR
define( 'TA_LAW_BASE_DIR',   	get_template_directory(). '/' );
define( 'TA_LAW_INC_DIR',    	TA_LAW_BASE_DIR . 'inc/' );
define( 'TA_LAW_LIB_DIR',     	TA_LAW_BASE_DIR . 'lib/' );
define( 'TA_LAW_WID_DIR',    	TA_LAW_INC_DIR . 'widgets/' );
define( 'TA_LAW_PLUGINS_DIR', 	TA_LAW_INC_DIR . 'plugins/' );
define( 'TA_LAW_JS_DIR',      	TA_LAW_BASE_DIR . 'assets/js/' );
define( 'TA_LAW_ADMIN_DIR',     TA_LAW_BASE_DIR . 'admin/' );

// URL
define( 'TA_LAW_BASE_URL',   	get_template_directory_uri(). '/' );
define( 'TA_LAW_ASSETS_URL', 	TA_LAW_BASE_URL . 'assets/' );
define( 'TA_LAW_CSS_URL',     	TA_LAW_ASSETS_URL . 'css/' );
define( 'TA_LAW_JS_URL',      	TA_LAW_ASSETS_URL . 'js/' );
define( 'TA_LAW_IMG_URL',     	TA_LAW_ASSETS_URL . 'images/' );

// Includes
require_once TA_LAW_INC_DIR . 'lg-redux-config.php';
require_once TA_LAW_INC_DIR . 'lg-lawgit.php';
require_once TA_LAW_INC_DIR . 'lg-helper-functions.php';
require_once TA_LAW_INC_DIR . 'lg-general.php';
require_once TA_LAW_INC_DIR . 'lg-scripts.php';
require_once TA_LAW_INC_DIR . 'lg-template-vars.php';
require_once TA_LAW_INC_DIR . 'lg-vc-settings.php';
require_once TA_LAW_ADMIN_DIR . 'welcome-page/welcome.php';

// Widgets
require_once TA_LAW_WID_DIR . 'widget-settings.php';
require_once TA_LAW_WID_DIR . 'widget-fields.php';
require_once TA_LAW_WID_DIR . 'contact-widget.php';
require_once TA_LAW_WID_DIR . 'search-widget.php';
require_once TA_LAW_WID_DIR . 'category-widget.php'; 
require_once TA_LAW_WID_DIR . 'recent-posts-footer-widget.php'; 
require_once TA_LAW_WID_DIR . 'recent-posts-sidebar-widget.php';

// TGM Plugin Activation
if ( is_admin() ) {
	require_once TA_LAW_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once TA_LAW_INC_DIR . 'lg-tgm-config.php';
}