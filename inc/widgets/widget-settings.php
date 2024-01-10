<?php
add_action( 'widgets_init', 'lawgit_widgets_init' );
function lawgit_widgets_init() {

	// Register Custom Widgets
	register_widget( 'Law_Git_Contact_Info_Widget' );
	register_widget( 'Law_Git_Category_Widget' );
	//register_widget( 'Law_Git_Recent_Post_Footer_Widget' );
	register_widget( 'Law_Git_Recent_Post_Sidebar_Widget' );

	// Register Widget Areas
	$footer_count = wp_get_sidebars_widgets();
	$footer_count = empty( $footer_count['footer'] ) ? 4 : count( $footer_count['footer'] );
	switch ( $footer_count ) {
		case '1':
		$footer_class = 'col-lg-12 col-sm-12 col-xs-12';
		break;
		case '2':
		$footer_class = 'col-lg-6 col-sm-6 col-md-6 col-xs-12';
		break;
		case '3':
		$footer_class = 'col-lg-4 col-sm-4 col-md-4 col-xs-12';
		break;		
		default:
		$footer_class = 'col-lg-3 col-sm-6 col-md-6 col-xs-12';
		break;
	}

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'lawgit' ),
		'id'            => 'sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="all-title"><h3><span>',
		'after_title'   => '</span></h3></div>',
		) );
	register_sidebar( array(
		'name'          => __( 'Footer', 'lawgit' ),
		'id'            => 'footer',
		'before_widget' => '<div class="footer-col '.$footer_class.'"><div class="footer-widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		) );
}