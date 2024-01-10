<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php 
	$lawgit_favicon = empty( Law_Git::$options['favicon']['url'] ) ? TA_LAW_IMG_URL . 'icon.png' : Law_Git::$options['favicon']['url'];
	?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url( $lawgit_favicon );?>">

    <?php wp_head(); ?>
    <?php
        $lawgit_logo = empty( Law_Git::$options['logo']['url'] ) ? TA_LAW_IMG_URL . 'logo.png' : Law_Git::$options['logo']['url'];
        
        if ( Law_Git::$options['menu_header_style'] == 'st1' || Law_Git::$options['menu_header_style'] == 'st3' ){
            $header_style = 'style-one';
        }elseif( Law_Git::$options['menu_header_style'] == 'st2' || Law_Git::$options['menu_header_style'] == 'st4' ){
            $header_style = 'style-two';
        }else{
            $header_style = 'style-one';
        }
        
        $lawgit_pagemenu = false;
        if ( ( is_single() || is_page() ) ) {
            $lawgit_menuid = get_post_meta( get_the_id(), 'lawgit_main_menu_default', true );
            if ( !empty( $lawgit_menuid ) && $lawgit_menuid != 'default' ) {
                $lawgit_pagemenu = $lawgit_menuid;
            }else{
				$lawgit_pagemenu = 'primary';
			}
			
        }
    ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <div class="page-wrapper">
        <?php if( class_exists( 'Redux' ) && Law_Git::$options['prelo_type'] == 'prelo_yes' ) : ?>
        <!-- Preloader -->
        <div class="preloader"></div>
        <?php endif; ?>
        <!-- Main Header -->
        <header class="o-header <?php echo esc_html( $header_style ); ?>">
            <?php 
                get_template_part( 'template-parts/content-menu', 'one' );
            ?>
            <!-- Sticky Header -->
            <?php if( class_exists( 'Redux' ) && Law_Git::$options['sticky_menu'] == 1 ) : ?>
            <div class="sticky-header">
                <div class="default-container clearfix">
                    <!-- Logo -->
                    <div class="logo pull-left">
                        <a class="img-responsive" href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $lawgit_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
                    </div>

                    <!-- Right Col -->
                    <div class="right-col pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </button>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                                <?php
									if ( $lawgit_pagemenu ) {
										wp_nav_menu( array( 'menu' => $lawgit_pagemenu, 'theme_location' => 'primary', 'container' => '', 'menu_class' => 'navigation clearfix' ) );
									}
									else{
										wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => 'navigation clearfix' ) );
									}
								?>
                            </div>
                        </nav>
                        <!-- Main Menu End -->
                    </div>

                </div>
            </div>
            <?php endif; ?>
            <!-- End Sticky Header -->

        </header>
        <!-- End Main Header -->