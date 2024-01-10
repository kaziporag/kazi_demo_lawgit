<?php
class Law_Git {

	protected static $instance = null;
	public $slug = 'lawgit';
	public $prefix = 'lawgit_';

	// Sitewide static variables
	public static $options = null;
	public static $por_attorney_social_fields = null;

	// Template specific variables
	public static $layout = null;
	public static $top_bar = null;
	public static $padding_top = null;
	public static $padding_bottom = null;
	public static $has_banner = null;
	public static $has_breadcrumb = null;
	public static $bgtype = null;
	public static $bgimg = null;
	public static $bgcolor = null;
	public static $has_lfooter = null;
	public static $ftbgtype = null;
	public static $ftbgcolor = null;
	public static $ftbgimg = null;
	public static $opt_rgba = null;
	public static $banner_padding_top_default = null;
	public static $banner_padding_bottom_default = null;

	private function __construct() {
		$this->redux_init();
		add_action( 'after_setup_theme', array( $this, 'set_redux_option' ) );
		add_action( 'after_setup_theme', array( $this, 'set_redux_compability' ) );
		add_action( 'init', array( $this, 'rewrite_flush_check' ) );
	}

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function redux_init() {
		add_action( 'admin_menu', array( $this, 'remove_redux_menu' ), 12 );
		add_action( 'redux/options/lawgit/saved', array( $this, 'flush_redux_saved' ), 10, 2 );
		add_action( 'redux/options/lawgit/section/reset', array( $this, 'flush_redux_reset' ));
		add_action( 'redux/options/lawgit/reset', array( $this, 'flush_redux_reset' ) );
	}

	public function set_redux_option(){
		if ( ! class_exists( 'Redux' ) ) {
			include TA_LAW_INC_DIR . 'lg-redux-data.php';
			self::$options = json_decode( $lawgit_redux_data, true );
			return;
		}		
		global $lawgit;
		self::$options = $lawgit;
	}

	// Backward compability for newly added options
	public function set_redux_compability(){
		$new_options = array(
			'logo_width'        => 2,
			'class_time_format' => 12,
		);
		foreach ( $new_options as $key => $value ) {
			if ( !isset( Law_Git::$options[$key] ) ) {
				Law_Git::$options[$key] = $value;
			}	    	
		}
	}

	public function remove_redux_menu() {
		remove_submenu_page('tools.php','redux-about');
	}

	// Flush rewrites
	public function flush_redux_saved( $saved_options, $changed_options ){
		if ( empty( $changed_options ) ) {
			return;
		}
		$flush = false;
		$slugs = array( 'por_attorney_slug' );
		foreach ( $slugs as $slug ) {
			if ( array_key_exists( $slug, $changed_options ) ) {
				$flush = true;
			}
		}

		if ( $flush ) {
			update_option( 'lawgit_rewrite_flash', true );
		}
	}

	public function flush_redux_reset(){
		update_option( 'lawgit_rewrite_flash', true );
	}

	public function rewrite_flush_check() {
		if ( get_option('lawgit_rewrite_flash') == true ) {
			flush_rewrite_rules();
			update_option( 'lawgit_rewrite_flash', false );
		}
	}
}

Law_Git::instance();