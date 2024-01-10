
<?php
    $lawgit_logo = empty( Law_Git::$options['logo']['url'] ) ? TA_LAW_IMG_URL . 'logo.png' : Law_Git::$options['logo']['url'];

    $lawgit_pagemenu = false;
    if ( ( is_single() || is_page() ) ) {
        $lawgit_menuid = get_post_meta( get_the_id(), 'lawgit_main_menu_default', true );
        if ( !empty( $lawgit_menuid ) || $lawgit_menuid != 'default' ) {
            $lawgit_pagemenu = $lawgit_menuid;
        }else{
				$lawgit_pagemenu = 'primary';
		}
    }
?>
<!--Header Top-->
<?php 
    if ( Law_Git::$top_bar == 1 || Law_Git::$top_bar == 'top_bar_on' ){
        get_template_part( 'template-parts/content-header', 'top' );
    }
?>

<!--Header-Upper-->
<div class="header-upper">
    <div class="default-container">
        <div class="clearfix">

            <div class="pull-left logo-box">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $lawgit_logo );?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ;?>"></a>
                </div>
            </div>

            <div class="nav-outer clearfix">
            <?php if ( Law_Git::$options['ask_bar'] == 1 || Law_Git::$options['ask_bar'] == 'ask_bar_on' ){ ?>
                <!--Button Box-->
                <div class="button-box-tow">
                    <a href="<?php echo esc_url(Law_Git::$options['ask_page_link']); ?>" class="o-btn btn-style-<?php if( !empty(Law_Git::$options['sel_button']) ) { echo esc_html( Law_Git::$options['sel_button'] ); } else {echo esc_html( 'one' ); } ?>"><?php echo esc_html(Law_Git::$options['ask_page_link_text']); ?></a>
                </div>
                <?php } ?>
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                    <?php
                        if ( $lawgit_pagemenu ) {
                            wp_nav_menu( array( 'menu' => $lawgit_pagemenu, 'theme_location' =>'primary', 'container' => '', 'menu_class' => 'navigation clearfix' ) );
                        }
                        else{
                            wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => 'navigation clearfix' ) );
                        }
                    ?>
                    </div>
                
                </nav>
                <?php if ( Law_Git::$options['search_icon'] == 1 || Law_Git::$options['search_icon'] == 'on' ){ ?>
                <!--Search Box Outer-->
                <div class="menu-search-box">
                    <div class="dropdown">
                        <button class="menu-sb-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></button>
                        <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                            <li class="panel-outer">
                                <div class="form-container">
                                    <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <div class="form-group">
                                            <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr( 'Search here ...', 'lawgit' ); ?>">
                                            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!--End Header Upper-->
