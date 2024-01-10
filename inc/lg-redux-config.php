<?php
if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = "lawgit";

$opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

$theme = wp_get_theme();
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'disable_tracking' => true,
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => __( 'LawGit Options', 'lawgit' ),
    'page_title'           => __( 'LawGit Options', 'lawgit' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    //'google_api_key'       => 'AIzaSyC2GwbfJvi-WnYpScCPBGIUyFZF97LI0xs',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-settings',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => 30,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'lawgit-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => true,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
);

Redux::setArgs( $opt_name, $args );

// Fields
Redux::setSection( $opt_name, array(
    'title'            => __( 'General', 'lawgit' ),
    'id'               => 'general_section',
    'heading'          => '',
    'icon'             => 'el el-network',
    'fields' => array(
        array(
            'id'       => 'primary_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Primary Color', 'lawgit' ),
            'default'  => '#1d40ca',
        ),
        array(
            'id'       => 'secondery_color',
            'type'     => 'color',
            'transparent' => false,
            'title'    => __( 'Secondery Color', 'lawgit' ),
            'default'  => '#111111',
        ),
        array(
            'id'       => 'back_to_top',
            'type'     => 'switch',
            'title'    => __( 'Back to Top Arrow', 'lawgit' ),
            'on'       => __( 'Enabled', 'lawgit' ),
            'off'      => __( 'Disabled', 'lawgit' ),
            'default'  => true,
        ),
        array(
            'id'       => 'sel_button',
            'type'     => 'select',
            'title'    => __( 'Default Button Style', 'lawgit' ),
            'options'  => array(
                'one'       => __( 'Small Rounded', 'lawgit' ),
                'two'       => __( 'Large Rounded', 'lawgit' ),
                'three'     => __( 'White BG Large Rounded', 'lawgit' ),
                'four'      => __( 'White Simple', 'lawgit' ),
                'seven'     => __( 'Small Round', 'lawgit' ),
                'eight'     => __( 'White BG Large Round', 'lawgit' ),
                'nine'      => __( 'Large Round', 'lawgit' ),
                'ten'       => __( 'Small Rounded Two', 'lawgit' ),
                'eleven'    => __( 'White BG Large Rounded Two', 'lawgit' ),
                'twelve'    => __( 'Extra Large Rounded', 'lawgit' ),
            ),
            'default' => 'prelo_yes',
        ),
		array(
            'id'       => 'prelo_type',
            'type'     => 'button_set',
            'title'    => __( 'Preloader Status', 'lawgit' ),
            'options'  => array(
                'prelo_yes'  => __( 'Preloader Yes', 'lawgit' ),
				'prelo_no'   => __( 'Preloader No', 'lawgit' ),
            ),
            'default' => 'prelo_yes',
        ),
        array(
            'id'       => 'prelo_yes',
            'type'     => 'media',
            'title'    => __( 'Preloader gif/svg', 'lawgit' ),
			'default'  => array(
							'url'=> TA_LAW_IMG_URL . 'preloader.svg'
						  ),
            'required' => array( 'prelo_type', 'equals', 'prelo_yes' )
        ),
    )
)
);

Redux::setSection( $opt_name, array(
    'title'            => __( 'Header', 'lawgit' ),
    'id'               => 'header_section',
    'heading'          => '',
    'icon'             => 'el el-caret-up',
    'fields' => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => __( 'Logo', 'lawgit' ),
            'default'  => array(
                'url'=> TA_LAW_IMG_URL . 'logo.png'
            ),
        ),
		array(
            'id'       => 'favicon',
            'type'     => 'media',
            'heading'          => '',
            'title'    => __( 'Favicon', 'lawgit' ),
            'default'  => array(
                'url'=> TA_LAW_IMG_URL . 'favicon.png'
            ),
        ),
        array(
            'id'       => 'menu_header_style',
            'type'     => 'image_select',
            'title'    => __( 'Header Style', 'lawgit' ),
            'default'  => 'st1',
            'options' => array(
                'st1' => array(
                    'title' => '<b>'. __( '', 'lawgit' ) . '</b>',
                    'img' => TA_LAW_IMG_URL . '1.jpg',
                ),
                'st2' => array(
                    'title' => '<b>'. __( '', 'lawgit' ) . '</b>',
                    'img' => TA_LAW_IMG_URL . '2.jpg',
                ),
            ),
        ),
        array(
            'id'       => 'section-topbar',
            'type'     => 'section',
            'title'    => __( 'Top Bar Section', 'lawgit' ),
            'indent'   => true,
            'subtitle' => __( 'If you want to hide any field simply keep it empty', 'lawgit' ),
        ),
        array(
            'id'       => 'top_bar',
            'type'     => 'button_set',
            'title'    => __( 'Top Bar Enable / Disable', 'lawgit' ),
            'options'  => array(
                'top_bar_on'  => __( 'Enabled', 'lawgit' ),
				'top_bar_off'   => __( 'Disabled', 'lawgit' ),
            ),
            'default'  => 'top_bar_off',
        ),
        array(
            'id'       => 'top_address',
            'type'     => 'text',
            'title'    => __( 'Address', 'lawgit' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'top_phone',
            'type'     => 'text',
            'title'    => __( 'Phone', 'lawgit' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'top_email',
            'type'     => 'text',
            'title'    => __( 'Email', 'lawgit' ),
            'validate' => 'email',
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_facebook',
            'type'     => 'text',
            'title'    => __( 'Facebook', 'lawgit' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_twitter',
            'type'     => 'text',
            'title'    => __( 'Twitter', 'lawgit' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_linkedin',
            'type'     => 'text',
            'title'    => __( 'Linkedin', 'lawgit' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_youtube',
            'type'     => 'text',
            'title'    => __( 'Youtube', 'lawgit' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_pinterest',
            'type'     => 'text',
            'title'    => __( 'Pinterest', 'lawgit' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
        array(
            'id'       => 'social_instagram',
            'type'     => 'text',
            'title'    => __( 'Instagram', 'lawgit' ),
            'required' => array( 'top_bar', 'equals', 'top_bar_on' ),
        ),
    )
)
);

Redux::setSection( $opt_name, array(
    'title'            => __( 'Main Menu', 'lawgit' ),
    'id'               => 'menu_section',
    'heading'          => '',
    'icon'             => 'el el-book',
    'fields' => array(
        array(
            'id'       => 'sticky_menu',
            'type'     => 'switch',
            'title'    => __( 'Sticky Menu', 'lawgit' ),
            'on' 	   => __( 'On', 'lawgit' ),
            'off'      => __( 'Off', 'lawgit' ),
            'default'  => true,
        ),
        array(
            'id'       => 'menu_typo',
            'type'     => 'typography',
            'title'    => __( 'Menu Font', 'lawgit' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '14px',
                'font-weight' => '400',
                'line-height' => '20px',
            ),
        ),
        array(
            'id'       => 'search_icon',
            'type'     => 'switch',
            'title'    => __( 'Search Icon', 'lawgit' ),
            'on'       => __( 'Enabled', 'lawgit' ),
            'off'      => __( 'Disabled', 'lawgit' ),
            'default'  => true,
        ),
        array(
            'id'       => 'ask_bar',
            'type'     => 'button_set',
            'title'    => __( 'Ask For Quote Enable / Disable', 'lawgit' ),
            'options'  => array(
                'ask_bar_on'  => __( 'Enabled', 'lawgit' ),
				'ask_bar_off'   => __( 'Disabled', 'lawgit' ),
            ),
            'default'  => 'ask_bar_off',
        ),
        array(
            'id'       => 'ask_page_link_text',
            'type'     => 'text',
            'title'    => __( 'Ask For Quote Button Text', 'lawgit' ),
            'required' => array( 'ask_bar', 'equals', 'ask_bar_on' ),
            'default'  => 'Ask For Quote',
        ),
        array(
            'id'       => 'ask_page_link',
            'type'     => 'text',
            'title'    => __( 'Ask For Quote Button URL', 'lawgit' ),
            'required' => array( 'ask_bar', 'equals', 'ask_bar_on' ),
            'default'  => 'http://example.com',
        ),
    )
)
);

Redux::setSection( $opt_name, array(
    'title'            => __( 'Footer', 'lawgit' ),
    'id'               => 'footer_section',
    'heading'          => '',
    'icon'             => 'el el-caret-down',
    'fields' => array(
        array(
            'id'       => 'copyright_text',
            'type'     => 'textarea',
            'title'    => __( 'Copyright Text', 'lawgit' ),
            'default'  => '&copy; Copyright LawGit 2020. All Right Reserved. Powered by <a href="' . TA_LAW_THEME_AUTHOR_URI . '">ThemeHurst</a>',
        ),
    )
    ) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Typography', 'lawgit' ),
    'id'               => 'typo_section',
    'icon'             => 'el el-text-width',
    'fields' => array(
        array(
            'id'       => 'typo_body',
            'type'     => 'typography',
            'title'    => __( 'Body', 'lawgit' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => true,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '16px',
                'line-height'   => '24px',
            ),
        ),
        array(
            'id'       => 'typo_h1',
            'type'     => 'typography',
            'title'    => __( 'Header h1', 'lawgit' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '40px',
                'line-height'   => '46px',
            ),
        ),
        array(
            'id'       => 'typo_h2',
            'type'     => 'typography',
            'title'    => __( 'Header h2', 'lawgit' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '24px',
                'line-height' => '30px',
            ),
        ),
        array(
            'id'       => 'typo_h3',
            'type'     => 'typography',
            'title'    => __( 'Header h3', 'lawgit' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '18px',
                'line-height' => '24px',
            ),
        ),
        array(
            'id'       => 'typo_h4',
            'type'     => 'typography',
            'title'    => __( 'Header h4', 'lawgit' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '16px',
                'line-height' => '22px',
            ),
        ),
        array(
            'id'       => 'typo_h5',
            'type'     => 'typography',
            'title'    => __( 'Header h5', 'lawgit' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '14px',
                'line-height' => '20px',
            ),
        ),
        array(
            'id'       => 'typo_h6',
            'type'     => 'typography',
            'title'    => __( 'Header h6', 'lawgit' ),
            'google'   => true,
            'subsets'   => false,
            'text-align'   => false,
            'font-style'   => false,
            'font-weight'   => false,
            'color'   => false,
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
                'font-size'   => '12px',
                'line-height' => '18px',
            ),
        ),
    )
) );

// Generate Common post type fields
function lawgit_redux_post_type_fields( $prefix ){
    return array(
        array(
            'id'       => $prefix. '_layout',
            'type'     => 'button_set',
            'title'    => __( 'Layout', 'lawgit' ),
            'options'  => array(
                'left-sidebar'  => __( 'Left Sidebar', 'lawgit' ),
                'full-width'    => __( 'Full Width', 'lawgit' ),
                'right-sidebar' => __( 'Right Sidebar', 'lawgit' ),
            ),
            'default' => 'right-sidebar'
        ),
        array(
            'id'       => $prefix. '_padding_top',
            'type'     => 'text',
            'title'    => __( 'Content Padding Top', 'lawgit' ),
            'validate'  => 'numeric',
            'default' => '80',
        ),
        array(
            'id'       => $prefix. '_padding_bottom',
            'type'     => 'text',
            'title'    => __( 'Content Padding Bottom', 'lawgit' ),
            'validate'  => 'numeric',
            'default' => '80'
        ),
        array(
            'id'       => $prefix. '_banner',
            'type'     => 'switch',
            'title'    => __( 'Banner', 'lawgit' ),
            'on'       => __( 'Enabled', 'lawgit' ),
            'off'      => __( 'Disabled', 'lawgit' ),
            'default'  => true,
        ),
        array(
            'id'       => $prefix. '_breadcrumb',
            'type'     => 'switch',
            'title'    => __( 'Breadcrumb', 'lawgit' ),
            'on'       => __( 'Enabled', 'lawgit' ),
            'off'      => __( 'Disabled', 'lawgit' ),
            'default'  => true,
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgtype',
            'type'     => 'button_set',
            'title'    => __( 'Banner Background Type', 'lawgit' ),
            'options'  => array(
                'bgcolor'  => __( 'Background Color', 'lawgit' ),
				'bgimg'    => __( 'Background Image', 'lawgit' ),
            ),
            'default' => 'bgcolor',
            'required' => array( $prefix. '_banner', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_bgimg',
            'type'     => 'media',
            'title'    => __( 'Banner Background Image', 'lawgit' ),
			'default'  => array(
							'url'=> TA_LAW_IMG_URL . 'banner.png'
						  ),
            'required' => array( $prefix. '_bgtype', 'equals', 'bgimg' )
        ),
        array(
            'id'       => $prefix. '_bgcolor',
            'type'     => 'color',
            'title'    => __('Banner Background Color', 'lawgit'),
            'validate' => 'color',
            'transparent' => false,
            'default' => '#606060',
            'required' => array( $prefix. '_bgtype', 'equals', 'bgcolor' )
        ),
		array(
            'id'       => $prefix. '_banner_padding_top_default',
            'type'     => 'text',
            'title'    => __( 'Banner Padding Top', 'lawgit' ),
            'validate'  => 'numeric',
            'default' => '80',
        ),
        array(
            'id'       => $prefix. '_banner_padding_bottom_default',
            'type'     => 'text',
            'title'    => __( 'Banner Padding Bottom', 'lawgit' ),
            'validate'  => 'numeric',
            'default' => '80'
        ),
        array(
            'id'       => $prefix. '_lfooter',
            'type'     => 'switch',
            'title'    => __( 'Footer', 'lawgit' ),
            'on'       => __( 'Enabled', 'lawgit' ),
            'off'      => __( 'Disabled', 'lawgit' ),
            'default'  => true,
        ),
        array(
            'id'       => $prefix. '_ftbgtype',
            'type'     => 'button_set',
            'title'    => __( 'Footer Background Type', 'lawgit' ),
            'options'  => array(
                'ftbgcolor'  => __( 'Background Color', 'lawgit' ),
				'ftbgimg'    => __( 'Background Image', 'lawgit' ),
            ),
            'default' => 'ftbgcolor',
            'required' => array( $prefix. '_lfooter', 'equals', true )
        ),
        array(
            'id'       => $prefix. '_ftbgimg',
            'type'     => 'media',
            'title'    => __( 'Footer Background Image', 'lawgit' ),
			'default'  => array(
							'url'=> TA_LAW_IMG_URL . 'footer-bg.png'
						  ),
            'required' => array( $prefix. '_ftbgtype', 'equals', 'ftbgimg' )
        ),
        array(
            'id'       => $prefix. '_ftbgcolor',
            'type'     => 'color',
            'title'    => __('Footer Background Color', 'lawgit'),
            'validate' => 'color',
            'transparent' => false,
            'default' => '#606060',
            'required' => array( $prefix. '_ftbgtype', 'equals', 'ftbgcolor' )
        ),
    );
}


Redux::setSection( $opt_name, array(
    'title'            => __( 'Layout Defaults', 'lawgit' ),
    'id'               => 'layout_defaults',
    'icon'             => 'el el-th',
    ) );

// Page
$lawgit_page_fields = lawgit_redux_post_type_fields( 'page' );
$lawgit_page_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
    'title'            => __( 'Page', 'lawgit' ),
    'id'               => 'pages_section',
    'subsection' => true,
    'fields' => $lawgit_page_fields
    ) );


//Post Archive
$lawgit_fields3 = array(
    array(
        'id'       => 'post_page_column',
        'type'     => 'button_set',
        'title'    => __( 'Column Per Page', 'lawgit' ),
        'options'  => array(
            '1-column'      => __( '1 Column', 'lawgit' ),
            '2-columns'     => __( '2 Columns', 'lawgit' ),
            '3-columns'     => __( '3 Columns', 'lawgit' ),
        ),
        'default' => '2-columns'
    )
);

$lawgit_post_archive_fields_col = lawgit_redux_post_type_fields( 'blog' );
$lawgit_post_archive_fields = array_merge( $lawgit_fields3, $lawgit_post_archive_fields_col );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Blog / Archive', 'lawgit' ),
    'id'               => 'blog_section',
    'subsection' => true,
    'fields' => $lawgit_post_archive_fields
    ) );


// Single Post
$lawgit_single_post_fields = lawgit_redux_post_type_fields( 'single_post' );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Post Single', 'lawgit' ),
    'id'               => 'single_post_section',
    'subsection' => true,
    'fields' => $lawgit_single_post_fields
    ) );

// Attorney Single
$lawgit_fields1 = array(
    array(
        'id'       => 'attorney_slug',
        'type'     => 'text',
        'title'    => __( 'Slug', 'lawgit' ),
        'default'  => 'attorney',
    )
);
$lawgit_fieldsa = lawgit_redux_post_type_fields( 'attorney' );
$lawgit_fieldsa[0]['default'] = 'full-width';
$lawgit_attorney_fields = array_merge( $lawgit_fields1, $lawgit_fieldsa );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Attorney Single', 'lawgit' ),
    'id'               => 'attorney_section',
    'subsection' => true,
    'fields' => $lawgit_attorney_fields
    ) );

// Practice Single
$lawgit_fieldsp = array(
    array(
        'id'       => 'practice_slug',
        'type'     => 'text',
        'title'    => __( 'Slug', 'lawgit' ),
        'default'  => 'practice',
    )
);
$lawgit_fieldsp = lawgit_redux_post_type_fields( 'practice' );
$lawgit_fieldsp[0]['default'] = 'full-width';
$lawgit_practice_fields = array_merge( $lawgit_fields1, $lawgit_fieldsp );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Practice Single', 'lawgit' ),
    'id'               => 'practice_section',
    'subsection' => true,
    'fields' => $lawgit_practice_fields
    ) );

// Search
$lawgit_fields4 = array(
    array(
        'id'       => 'search_page_column',
        'type'     => 'button_set',
        'title'    => __( 'Column Per Page', 'lawgit' ),
        'options'  => array(
            '1-column'      => __( '1 Column', 'lawgit' ),
            '2-columns'     => __( '2 Columns', 'lawgit' ),
            '3-columns'     => __( '3 Columns', 'lawgit' ),
        ),
        'default' => '2-columns'
    )
);

$lawgit_search_fields_col = lawgit_redux_post_type_fields( 'search' );
$lawgit_search_fields = array_merge( $lawgit_fields4, $lawgit_search_fields_col );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Search Layout', 'lawgit' ),
    'id'               => 'search_section',
    'heading'          => '',
    'subsection' => true,
    'fields' => $lawgit_search_fields
)
);

// Error 404 Layout
$lawgit_search_fields = lawgit_redux_post_type_fields( 'error' );
$lawgit_search_fields[0]['default'] = 'full-width';
Redux::setSection( $opt_name, array(
    'title'   => __( 'Error 404 Layout', 'lawgit' ),
    'id'      => 'error_section',
    'heading' => '',
    'subsection' => true,
    'fields'  => $lawgit_search_fields
)
);
// Error
$lawgit_fields2 = array(
    array(
        'id'       => 'error_title',
        'type'     => 'text',
        'title'    => __( 'Page Title', 'lawgit' ),
        'default'  => __( 'Error 404', 'lawgit' ),
    ),
    array(
        'id'       => 'error_text1',
        'type'     => 'text',
        'title'    => __( 'Body Text 1', 'lawgit' ),
        'default'  => __( '404', 'lawgit' ),
    ),
    array(
        'id'       => 'error_text2',
        'type'     => 'text',
        'title'    => __( 'Body Text 2', 'lawgit' ),
        'default'  => __( 'Page not Found', 'lawgit' ),
    ),
    array(
        'id'       => 'error_text3',
        'type'     => 'text',
        'title'    => __( 'Body Text 3', 'lawgit' ),
        'default'  => __( 'The page you are looking is not available or has been removed. Try going to Home Page by using the button below.', 'lawgit' ),
    ),
    array(
        'id'       => 'error_buttontext',
        'type'     => 'text',
        'title'    => __( 'Button Text', 'lawgit' ),
        'default'  => __( 'Go to Home Page', 'lawgit' ),
    )
);
Redux::setSection( $opt_name, array(
    'title'   => __( 'Error Page Settings', 'lawgit' ),
    'id'      => 'error_srttings_section',
    'heading' => '',
    'icon'    => 'el el-error-alt',
    'fields'  => $lawgit_fields2
)
);
Redux::setSection( $opt_name, array(
    'title'   => __( 'Advanced', 'lawgit' ),
    'id'      => 'advanced_section',
    'heading' => '',
    'icon'    => 'el el-css',
    'fields'  => array(
        array(
            'id'       => 'custom_css',
            'type'     => 'ace_editor',
            'title'    => __( 'Custom CSS', 'lawgit' ),
            'subtitle' => __( 'Paste your CSS code here.', 'lawgit' ),
            'mode'     => 'css',
            'theme'    => 'chrome',
            'default'  => "body{\n   margin: 0 auto;\n}",
            'options'    => array('minLines' => 30)
        ),
    )
)
);

// -> END Fields


// If Redux is running as a plugin, this will remove the demo notice and links
add_action( 'redux/loaded', 'lawgit_remove_demo' );
/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if ( ! function_exists( 'lawgit_remove_demo' ) ) {
    function lawgit_remove_demo() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
                ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}