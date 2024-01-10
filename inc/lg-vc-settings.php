<?php
if ( ! defined( 'WPB_VC_VERSION' ) ) {
	return;
}

// Setup VC as part of a theme
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme();
}

// Add max width property for vc_row_inner
$args = array(
	'type' => 'dropdown',
	'heading' => __( "Content Maximum Width", 'lawgit' ),
	'param_name' => 'rtmaxwidth',
	"value" => array( 
		'Default' => '',
		'500 px'  => '500',
		'550 px'  => '550',
		'600 px'  => '600',
		'650 px'  => '650',
		'700 px'  => '700',
		'750 px'  => '750',
		'800 px'  => '800',
		'850 px'  => '850',
		'900 px'  => '900',
		'950 px'  => '950',
		'1000 px' => '1000',
		'1050 px' => '1050',
		'1100 px' => '1100',
		'1150 px' => '1150',
		'1200 px' => '1200',
		),
	);
vc_add_param( 'vc_row_inner', $args );

// Render class name based on max width property on vc_row_inner
add_filter('vc_shortcodes_css_class', 'lawgit_change_element_class_name', 10, 3 );
function lawgit_change_element_class_name( $class_string, $tag, $atts ) {
	if ( $tag == 'vc_row_inner' ) {
		if ( !empty( $atts['rtmaxwidth'] ) ) {
			$class_string .= ' vc-m-auto vc-mw-'. $atts['rtmaxwidth'];
		}
	}
	return $class_string;
}