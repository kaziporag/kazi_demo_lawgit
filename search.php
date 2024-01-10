<?php
// Layout class
if ( Law_Git::$layout == 'full-width' ) {
    $lawgit_layout_class = 'col-lg-12';
    $lawgit_sidebar_class = '';
}
elseif ( Law_Git::$layout == 'left-sidebar' ){
    $lawgit_layout_class = 'col-lg-8';
    $lawgit_sidebar_class = 'order-md-2';
}else{
    $lawgit_layout_class = 'col-lg-8';
    $lawgit_sidebar_class = 'order-md-1';
}
?>
<?php get_header(); ?>
<?php get_template_part('template-parts/content', 'banner');?>
<section class="blog-section-nobg section-padding-default">
    <div class="default-container ex-padding-01">
        <div class="row clearfix">
            <div class="<?php echo esc_attr( $lawgit_layout_class );?> <?php echo esc_attr( $lawgit_sidebar_class );?>">
                <div class="row">
                <?php if ( have_posts() ) :?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/content', 'search' ); ?>
                    <?php endwhile; ?> 
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php LawGit_Helper::pagination();?>
                </div>
                <?php else:?>
                    <?php get_template_part( 'template-parts/content', 'none' );?>
                <?php endif;?>
            </div></div>
            <?php 
                get_sidebar();
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>