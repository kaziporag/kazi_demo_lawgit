<?php
$themehurst_theme = wp_get_theme();
if($themehurst_theme->parent_theme) {
    $template_dir =  basename( get_template_directory() );
    $themehurst_theme = wp_get_theme($template_dir);
}
$themehurst_theme_version = $themehurst_theme->get( 'Version' );
$themehurst_theme_name = $themehurst_theme->get('Name');
$themehurst_url = 'http://documentation.themehurst.net/lawgit/';
$themehurst_url = 'http://documentation.themehurst.net/lawgit/';

?>
<div class="wrap about-wrap welcome-wrap themehurst-wrap">
	<h1 class="hide" style="display:none;"></h1>
	<div class="themehurst-welcome-inner">
		<div class="welcome-wrap">
			<h1><?php echo esc_html__( "Welcome to", "lawgit" ) . ' ' . '<span>'. $themehurst_theme_name .'</span>'; ?></h1>
			<div class="theme-logo"><span class="theme-version"><?php echo esc_html( $themehurst_theme_version ); ?></span></div>
			
			<div class="about-text"><?php echo esc_html__( "Nice!", "lawgit" ) . ' ' . $themehurst_theme_name . ' ' . esc_html__( "is now installed and ready to use. Get ready to build your site with more powerful WordPress theme. We hope you enjoy using it.", "lawgit" ); ?></div>
		</div>
		<h2 class="themehurst-nav-tab-wrapper nav-tab-wrapper">
			<?php
			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', esc_html__( "Support", "lawgit" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=themehurst-plugins' ), esc_html__( "Plugins", "lawgit" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=system-status' ), esc_html__( "System Status", "lawgit" ) );
			?>
		</h2>
	</div>
	
	<div class="themehurst-support-wrapper clearfix">		
    	<div class="features-section three-col">
        	<div class="feature-item col">
				<h4><span class="dashicons dashicons-admin-generic"></span><?php echo esc_html__( "Submit A Ticket", "lawgit" ); ?></h4>
				<p><?php echo esc_html__( "We would happy to help you solve any issues. If you have any questions, ideas or suggestions, please feel free to contact us.", "lawgit" ); ?></p>
                <?php printf( '<a href="%s" class="button button-large button-primary btn-lg-button">%s</a>', 'https://www.themehurst.net/contact/', esc_html__( "Submit A Ticket", "lawgit" ) ); ?>
            </div>
            <div class="feature-item col">
				<h4><span class="dashicons dashicons-book-alt"></span><?php echo esc_html__( "Documentation", "lawgit" ); ?></h4>
				<p><?php echo esc_html__( "Our online documentation helps you to learn how to setup and customize your needs with LawGit. We will launch online documentation soon.", "lawgit" ); ?></p>
				 <?php printf( '<a href="%s" class="button button-large button-primary btn-lg-button">%s</a>', $themehurst_url , esc_html__( "Documentation", "lawgit" ) ); ?>
            </div>            
            
        </div>
    </div>
	
    <div class="themehurst-thanks">
        <hr />
    	<p class="description"><?php echo esc_html__( "Thank you for choosing", "lawgit" ) . ' ' . $themehurst_theme_name . '.'; ?></p>
    </div>
</div>