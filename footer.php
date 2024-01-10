        <!--Main Footer-->
        <footer class="footer">
            <div class="default-container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">

                        <!--Column-->
                        <div class="big-column col-lg-12">
                            <div class="row clearfix">
                                <?php $lawgit_footer_count = wp_get_sidebars_widgets(); ?>
                                <?php if ( !empty( $lawgit_footer_count['footer'] ) ): ?>
                                <!--Footer Column-->
                                    <?php dynamic_sidebar( 'footer' ); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--Footer Bottom-->
            <div class="footer-bottom">
                <div class="default-container">
                    <div class="row clearfix">
                        <div class="column col-md-6 col-sm-12 col-xs-12">
                            <div class="copyright"><?php echo wp_kses_post( Law_Git::$options['copyright_text'] );?></div>
                        </div>
                        <div class="column col-md-6 col-sm-12 col-xs-12">
                            <?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => '', 'menu_class' => 'footer-nav' ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--End Main Footer-->

    </div>
    <!--End pagewrapper-->
    <!--Scroll to top-->
    <?php if(class_exists( 'Redux' ) && Law_Git::$options['back_to_top'] == 1){ ?>
    <div class="scroll-top scroll-target" data-target="html"><i class="fa fa-angle-up"></i></div>
    <?php } ?>
    <?php wp_footer();?>

</body>

</html>