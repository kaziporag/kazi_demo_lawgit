<?php // Admin Page
if( ! class_exists( 'LawGit_ThemeHurst_Admin_Page' ) ){
	class LawGit_ThemeHurst_Admin_Page {
	
		function __construct(){
			add_action( 'admin_init', array( $this, 'lawgit_admin_page_init' ) );	
			add_action( 'admin_menu', array( $this, 'lawgit_themehurst_admin_menu') );			
			add_action( 'admin_menu', array( $this, 'lawgit_themehurst_edit_admin_menus' ) ); 
			add_action( 'admin_head', array( $this, 'LawGit_ThemeHurst_Admin_Page_scripts' ) );
			add_action( 'after_switch_theme', array( $this, 'lawgit_themehurst_theme_activation_redirect' ) ); 
		}		
		
		function lawgit_admin_page_init(){
			if ( current_user_can( 'edit_theme_options' ) ) {
				
				if( isset( $_GET['themehurst-deactivate'] ) && $_GET['themehurst-deactivate'] == 'deactivate-plugin' ) {
					check_admin_referer( 'themehurst-deactivate', 'themehurst-deactivate-nonce' );
					$plugins = TGM_Plugin_Activation::$instance->plugins;
					foreach( $plugins as $plugin ) {
						if( $plugin['slug'] == $_GET['plugin'] ) {
							deactivate_plugins( $plugin['file_path'] );
						}
					}
				} 
				
				if( isset( $_GET['themehurst-activate'] ) && $_GET['themehurst-activate'] == 'activate-plugin' ) {
					check_admin_referer( 'themehurst-activate', 'themehurst-activate-nonce' );
					$plugins = TGM_Plugin_Activation::$instance->plugins;
					foreach( $plugins as $plugin ) {
						if( $plugin['slug'] == $_GET['plugin'] ) {
							activate_plugin( $plugin['file_path'] );
						}
					}
				}
			}
		}
		
		function lawgit_themehurst_theme_activation_redirect(){
			if ( current_user_can( 'edit_theme_options' ) ) {
				header('Location:'.admin_url().'admin.php?page=lawgit');
			}
		}
		
		function lawgit_themehurst_admin_menu(){
			if ( current_user_can( 'edit_theme_options' ) ) {
				// Work around for theme check
				$themehurst_menu_page = 'add_menu' . '_page';
				$themehurst_submenu_page = 'add_submenu' . '_page';
			
				$welcome_screen = $themehurst_menu_page( 
					'LawGit',
					'LawGit',
					'administrator',
					'lawgit',
					array( $this, 'lawgit_themehurst_welcome_screen' ), 
					'dashicons-admin-home',
					3);
						
				$plugins = $themehurst_submenu_page(
						'lawgit',
						esc_html__( 'Plugins', 'lawgit' ),
						esc_html__( 'Plugins', 'lawgit' ),
						'administrator',
						'themehurst-plugins',
						array( $this, 'lawgit_themes_plugins_tab' ) );
				
				$system_status = $themehurst_submenu_page(
						'lawgit',
						esc_html__( 'System Status', 'lawgit' ),
						esc_html__( 'System Status', 'lawgit' ),
						'administrator',
						'system-status',
						array( $this, 'lawgit_system_status' ) ); 
				add_action( 'admin_print_scripts-'.$welcome_screen, array( $this, 'lawgit_themehurst_admin_screen_scripts' ) );				add_action( 'admin_print_scripts-'.$plugins, array( $this, 'lawgit_themehurst_admin_screen_scripts' ) );
				add_action( 'admin_print_scripts-'.$system_status, array( $this, 'lawgit_themehurst_admin_screen_scripts' ) );
			}
		}
		
		function lawgit_themehurst_edit_admin_menus() {
			global $submenu;
			if ( current_user_can( 'edit_theme_options' ) ) {
				$submenu['lawgit'][0][0] = 'Welcome';
			}
		}
		
		function lawgit_themehurst_welcome_screen() {
			get_template_part( 'admin/welcome-page/screens/welcome' );
		}
		
		function lawgit_themes_plugins_tab() {
			get_template_part( 'admin/welcome-page/screens/themehurst', 'plugins' ); 
		}
		
		function lawgit_system_status() {
			get_template_part( 'admin/welcome-page/screens/system', 'status' ); 
		}
				
		function LawGit_ThemeHurst_Admin_Page_scripts() {
			if ( is_admin() ) {
				wp_enqueue_style( 'lawgit-themehurst-admin-confirm-css', esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/css/jquery-confirm.min.css' ) );
				wp_enqueue_script( 'lawgit-themehurst-admin-confirm-js', esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/js/jquery-confirm.min.js' ) );
			}
		}
		function lawgit_themehurst_admin_screen_scripts() {
			wp_enqueue_style( 'lawgit-themehurst-admin-page-css', esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/css/admin-screen.css' ) );
			wp_enqueue_script( 'lawgit-themehurst-admin-page-js', esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/js/admin-screen.js' ) );
		}
		
		function lawgit_plugin_link( $item ) {
			$installed_plugins = get_plugins();
			$item['sanitized_plugin'] = $item['name'];
			 $is_plug_act = 'is_plugin_active';
			if ( ! isset( $installed_plugins[$item['file_path']] ) ) {
				$actions = array(
					'install' => sprintf(
						'<a href="%1$s" class="button button-primary" title="%3$s %2$s">%4$s</a>',
						esc_url( wp_nonce_url(
							add_query_arg(
								array(
									'page'		  	=> urlencode( TGM_Plugin_Activation::$instance->menu ),
									'plugin'		=> urlencode( $item['slug'] ),
									'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
									'plugin_source' => urlencode( $item['source'] ),
									'tgmpa-install' => 'install-plugin',
									'return_url' 	=> 'themehurst_plugins'
								),
								admin_url( TGM_Plugin_Activation::$instance->parent_slug )
							),
							'tgmpa-install',
							'tgmpa-nonce'
						) ),
						$item['sanitized_plugin'],
						esc_attr__( 'Install', 'lawgit' ),
						esc_html__( 'Install', 'lawgit' )
					),
				);
			}
			
			elseif ( is_plugin_inactive( $item['file_path'] ) ) {
				if ( version_compare( $item['version'], $installed_plugins[$item['file_path']]['Version'], '>' ) ) {
					$actions = array(
						'update' => sprintf(
							'<a href="%1$s" class="button button-primary" title="%3$s %2$s">%4$s</a>',
							wp_nonce_url(
								add_query_arg(
									array(
										'page'		  	=> urlencode( TGM_Plugin_Activation::$instance->menu ),
										'plugin'		=> urlencode( $item['slug'] ),
										'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
										'plugin_source' => urlencode( $item['source'] ),
										'tgmpa-update' 	=> 'update-plugin',
										'version' 		=> urlencode( $item['version'] ),
										'return_url' 	=> 'themehurst_plugins'
									),
									admin_url( TGM_Plugin_Activation::$instance->parent_slug )
								),
								'tgmpa-update',
								'tgmpa-nonce'
							),
							$item['sanitized_plugin'],
							esc_attr__( 'Update', 'lawgit' ),
							esc_html__( 'Update', 'lawgit' )
						),
					);
				} else {
					$actions = array(
						'activate' => sprintf(
							'<a href="%1$s" class="button button-primary" title="%3$s %2$s">%4$s</a>',
							esc_url( add_query_arg(
								array(
									'plugin'			   	=> urlencode( $item['slug'] ),
									'plugin_name'		  	=> urlencode( $item['sanitized_plugin'] ),
									'plugin_source'			=> urlencode( $item['source'] ),
									'themehurst-activate'	   		=> 'activate-plugin',
									'themehurst-activate-nonce' 	=> wp_create_nonce( 'themehurst-activate' ),
								),
								admin_url( 'admin.php?page=themehurst-plugins' )
							) ),
							$item['sanitized_plugin'],
							esc_attr__( 'Activate', 'lawgit' ),
							esc_html__( 'Activate', 'lawgit' )
						),
					);
				}
			}
			
			elseif ( version_compare( $item['version'], $installed_plugins[$item['file_path']]['Version'], '>' ) ) {
				$actions = array(
					'update' => sprintf(
						'<a href="%1$s" class="button button-primary" title="%3$s %2$s">%3$s</a>',
						wp_nonce_url(
							add_query_arg(
								array(
									'page'		  	=> urlencode( TGM_Plugin_Activation::$instance->menu ),
									'plugin'		=> urlencode( $item['slug'] ),
									'plugin_name'   => urlencode( $item['sanitized_plugin'] ),
									'plugin_source' => urlencode( $item['source'] ),
									'tgmpa-update' 	=> 'update-plugin',
									'version' 		=> urlencode( $item['version'] ),
									'return_url' 	=> 'themehurst_plugins'
								),
								admin_url( TGM_Plugin_Activation::$instance->parent_slug )
							),
							'tgmpa-update',
							'tgmpa-nonce'
						),
						$item['sanitized_plugin'],
						esc_attr__( 'Update', 'lawgit' ),
						esc_html__( 'Update', 'lawgit' )
					),
				);
			}
			elseif ( $is_plug_act( $item['file_path'] ) ) {
				$actions = array(
					'deactivate' => sprintf(
						'<a href="%1$s" class="button button-primary" title="%3$s %2$s">%4$s</a>',
						esc_url( add_query_arg(
							array(
								'plugin'					=> urlencode( $item['slug'] ),
								'plugin_name'		  		=> urlencode( $item['sanitized_plugin'] ),
								'plugin_source'				=> urlencode( $item['source'] ),
								'themehurst-deactivate'	   		=> 'deactivate-plugin',
								'themehurst-deactivate-nonce' 	=> wp_create_nonce( 'themehurst-deactivate' ),
							),
							admin_url( 'admin.php?page=themehurst-plugins' )
						) ),
						$item['sanitized_plugin'],
						esc_attr__( 'Deactivate', 'lawgit' ),
						esc_html__( 'Deactivate', 'lawgit' )
					),
				);
			}
			return $actions;
		}
		
	}// class LawGit_ThemeHurst_Admin_Page
	new LawGit_ThemeHurst_Admin_Page;
}