<?php
add_action( 'tgmpa_register', 'lawgit_register_required_plugins' );
function lawgit_register_required_plugins() {
	$plugins = array(
		// Bundled
		array(
			'name'         =>  esc_html__('LawGit Core', 'lawgit'),
			'slug'         => 'lawgit-core',
			'required'     =>  true,
			'image_url'    => esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/lawgit-core.png' ),
		),
		array(
			'name'         => esc_html__('WPBakery Visual Composer', 'lawgit'),
			'slug'         => 'js_composer',
			'required'     => true,
			'image_url'    => esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/visual-composer.png' ),
			'premium'	   => true,
		),
		array(
			'name'         => esc_html__('Revolution Slider', 'lawgit'),
			'slug'         => 'revslider',
			'required'     => true,
			'image_url'    => esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/revslider.png' ),
			'premium'	   => true,
		),
		// Repository
		array(
			'name'     	   => esc_html__('CMB2', 'lawgit'),
			'slug'         => 'cmb2',
			'required'     => true,
			'image_url'    => esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/cmb2.png' ),
		),
		array(
			'name'         => esc_html__('Redux Framework', 'lawgit'),
			'slug'         => 'redux-framework',
			'required'     => true,
			'image_url'    => esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/Redux-Framework-in-WordPress-Theme.png' ),
		),
		array(
			'name'         => esc_html__('Breadcrumb NavXT', 'lawgit'),
			'slug'         => 'breadcrumb-navxt',
			'required'     => true,
			'image_url'    => esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/Breadcrumb-NavXT.png' ),
		),
		array(
			'name'         => esc_html__('Contact Form 7', 'lawgit'),
			'slug'         => 'contact-form-7',
			'required'     => false,
			'image_url'    => esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/contact-form.png' ),
		),
	);

	$config = array(
		'id'           => 'lawgit',             // Unique ID for hashing notices for multiple instances of TGMPA.
		'menu'         => 'lawgit-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
