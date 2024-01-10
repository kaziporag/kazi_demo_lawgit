<?php
add_action( 'template_redirect', 'lawgit_template_vars' );
function lawgit_template_vars() {
	// Single Pages
	if ( is_single() || is_page() ) {
		$post_type = get_post_type();
		$post_id = get_the_id();
		switch ( $post_type ) {
			case 'page':
			$prefix = 'page';
			break;
			case 'post':
			$prefix = 'single_post';
			break;
			case 'lawgit_practice':
			$prefix = 'practice';
			break;
			case 'lawgit_attorney':
			$prefix = 'attorney';
			break;
			default:
			$prefix = 'single_post';
			break;
		}
		
		$layout          					= get_post_meta( $post_id, 'lawgit_layout_lay_default', true );
		$top_bar         					= get_post_meta( $post_id, 'lawgit_top_bar_default', true );
		$padding_top     					= get_post_meta( $post_id, 'lawgit_content_padding_top_default', true );
		$padding_bottom  					= get_post_meta( $post_id, 'lawgit_content_padding_bottom_default', true );
		$has_banner      					= get_post_meta( $post_id, 'lawgit_banner', true );
		$has_breadcrumb  					= get_post_meta( $post_id, 'lawgit_breadcrumb', true );
		$bgtype          					= get_post_meta( $post_id, 'lawgit_bgtype', true );
		$bgcolor         					= get_post_meta( $post_id, 'lawgit_bgcolor', true );
		$bgimg           					= get_post_meta( $post_id, 'lawgit_bgimg', true );
		$has_lfooter      					= get_post_meta( $post_id, 'lawgit_lfooter', true );
		$ftbgtype          					= get_post_meta( $post_id, 'lawgit_ftbgtype', true );
		$ftbgcolor         					= get_post_meta( $post_id, 'lawgit_ftbgcolor', true );
		$ftbgimg           					= get_post_meta( $post_id, 'lawgit_ftbgimg', true );
		$banner_padding_top_default        	= get_post_meta( $post_id, 'lawgit_banner_padding_top_default', true );
		$banner_padding_bottom_default      = get_post_meta( $post_id, 'lawgit_banner_padding_bottom_default', true );
		$revslider      					= get_post_meta( $post_id, 'lawgit_slider', true );
		
		if ( !empty( $bgimg ) ) {
			Law_Git::$bgimg =  $bgimg;
		}
		elseif ( !empty( Law_Git::$options[$prefix. '_bgimg']['id'] ) ) {
			$attch_url = wp_get_attachment_image_src( Law_Git::$options[$prefix. '_bgimg']['id'], 'lawgit-banner', true );
			Law_Git::$bgimg =  $attch_url[0];
		}
		else{
			Law_Git::$bgimg = TA_LAW_IMG_URL . 'banner.jpg';
		}

		if ( !empty( $ftbgimg ) ) {
			Law_Git::$ftbgimg =  $ftbgimg;
		}
		elseif ( !empty( Law_Git::$options[$prefix. '_ftbgimg']['id'] ) ) {
			$attch_url = wp_get_attachment_image_src( Law_Git::$options[$prefix. '_ftbgimg']['id'], 'lawgit-banner', true );
			Law_Git::$ftbgimg =  $attch_url[0];
		}
		else{
			Law_Git::$ftbgimg = TA_LAW_IMG_URL . 'banner.jpg';
		}
		
		Law_Git::$layout         = ( empty( $layout ) || $layout == 'default' ) ? Law_Git::$options[$prefix. '_layout']: $layout;

		Law_Git::$top_bar        = ( empty( $top_bar ) || $top_bar == 'default' ) ? Law_Git::$options['top_bar']: $top_bar;

		$padding_top             = ( empty( $padding_top ) || $padding_top == 'default' ) ? Law_Git::$options[$prefix. '_padding_top']: $padding_top;
		Law_Git::$padding_top    = (int) $padding_top;      

		$padding_bottom          = ( empty( $padding_bottom ) || $padding_bottom == 'default' ) ? Law_Git::$options[$prefix. '_padding_bottom']: $padding_bottom;
		Law_Git::$padding_bottom = (int) $padding_bottom; 
		
		Law_Git::$banner_padding_top_default = ( empty( $banner_padding_top_default ) || $banner_padding_top_default == 'default' ) ? Law_Git::$options[$prefix. '_banner_padding_top_default']: $banner_padding_top_default;
				
		Law_Git::$banner_padding_bottom_default = ( empty( $banner_padding_bottom_default ) || $banner_padding_bottom_default == 'default' ) ? Law_Git::$options[$prefix. '_banner_padding_bottom_default']: $banner_padding_bottom_default;
		
		Law_Git::$has_banner     = ( empty( $has_banner ) || $has_banner == 'default' ) ? Law_Git::$options[$prefix. '_banner']: $has_banner;

		Law_Git::$has_breadcrumb = ( empty( $has_breadcrumb ) || $has_breadcrumb == 'default' ) ? Law_Git::$options[$prefix. '_breadcrumb']: $has_breadcrumb;

		Law_Git::$bgtype         = ( empty( $bgtype ) || $bgtype == 'default' ) ? Law_Git::$options[$prefix. '_bgtype']: $bgtype;
		
		Law_Git::$bgcolor        = ( empty( $bgcolor ) || $bgcolor == 'default' ) ? Law_Git::$options[$prefix. '_bgcolor']: $bgcolor;

		Law_Git::$has_lfooter     = ( empty( $has_lfooter ) || $has_lfooter == 'default' ) ? Law_Git::$options[$prefix. '_lfooter']: $has_lfooter;

		Law_Git::$ftbgtype         = ( empty( $ftbgtype ) || $ftbgtype == 'default' ) ? Law_Git::$options[$prefix. '_ftbgtype']: $ftbgtype;
		
		Law_Git::$ftbgcolor        = ( empty( $ftbgcolor ) || $ftbgcolor == 'default' ) ? Law_Git::$options[$prefix. '_ftbgcolor']: $ftbgcolor;


	}
	// Blog and Archive
	elseif ( is_home() || is_archive() || is_search() || is_404() ) {
	if ( is_search() ) {
		$prefix = 'search';
	}
	elseif( is_404() ){
		$prefix = 'error';
	}
	else{
		$prefix = 'blog';
	}
	
	//redux
	Law_Git::$layout         					= Law_Git::$options[$prefix. '_layout'];
	Law_Git::$top_bar        					= Law_Git::$options['top_bar'];
	Law_Git::$padding_top    					= Law_Git::$options[$prefix. '_padding_top'];
	Law_Git::$padding_bottom 					= Law_Git::$options[$prefix. '_padding_bottom'];
	Law_Git::$banner_padding_top_default    	= Law_Git::$options[$prefix. '_banner_padding_top_default'];
	Law_Git::$banner_padding_bottom_default 	= Law_Git::$options[$prefix. '_banner_padding_bottom_default'];
	Law_Git::$has_banner     					= Law_Git::$options[$prefix. '_banner'];
	Law_Git::$has_breadcrumb 					= Law_Git::$options[$prefix. '_breadcrumb'];
	Law_Git::$bgtype         					= Law_Git::$options[$prefix. '_bgtype'];
	Law_Git::$bgcolor        					= Law_Git::$options[$prefix. '_bgcolor'];
	Law_Git::$bgimg        	 					= Law_Git::$options[$prefix. '_bgimg'];
	Law_Git::$has_lfooter     					= Law_Git::$options[$prefix. '_lfooter'];
	Law_Git::$ftbgtype         					= Law_Git::$options[$prefix. '_ftbgtype'];
	Law_Git::$ftbgcolor        					= Law_Git::$options[$prefix. '_ftbgcolor'];
	Law_Git::$ftbgimg        	 				= Law_Git::$options[$prefix. '_ftbgimg'];

	if ( !empty( $bgimg ) ) {
			Law_Git::$bgimg =  $bgimg;
	}
	elseif ( !empty( Law_Git::$options[$prefix. '_bgimg']['id'] ) ) {
		$attch_url = wp_get_attachment_image_src( Law_Git::$options[$prefix. '_bgimg']['id'], 'lawgit-banner', true );
		Law_Git::$bgimg =  $attch_url[0];
	}
	else{
		Law_Git::$bgimg = TA_LAW_IMG_URL . 'banner.jpg';
	}

	if ( !empty( $ftbgimg ) ) {
		Law_Git::$ftbgimg =  $ftbgimg;
	}
	elseif ( !empty( Law_Git::$options[$prefix. '_ftbgimg']['id'] ) ) {
		$attch_url = wp_get_attachment_image_src( Law_Git::$options[$prefix. '_ftbgimg']['id'], 'lawgit-banner', true );
		Law_Git::$ftbgimg =  $attch_url[0];
	}
	else{
		Law_Git::$ftbgimg = TA_LAW_IMG_URL . 'banner.jpg';
	}		
  }
}

// Add body class
add_filter( 'body_class' , 'lawgit_body_classes' );
function lawgit_body_classes( $classes ) {
	$classes[] = 'non-stick';
	$classes[] = ( Law_Git::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';

	if ( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
		$classes[] = 'product-list-view';
	}
	else {
		$classes[] = 'product-grid-view';
	}

	return $classes;
}