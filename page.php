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
<?php if ( is_home() && ! is_front_page() ) : ?>
<?php get_template_part('template-parts/content', 'banner');?>
<?php elseif ( is_front_page()) : ?>
<?php get_template_part('template-parts/content', 'slider');?>
<?php elseif ( is_home()) : ?>
<?php get_template_part('template-parts/content', 'banner');?>
<?php else: ?>
<?php get_template_part('template-parts/content', 'banner');?>
<?php endif ?>
<section id="post-<?php the_ID(); ?>" <?php post_class('section-padding-default'); ?>>
    <div class="default-container">
        <div class="row clearfix">
            <div class="<?php echo esc_attr( $lawgit_layout_class );?> <?php echo esc_attr( $lawgit_sidebar_class );?>">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'page' ); ?>
                    <?php
                    if ( comments_open() || get_comments_number() ){
                        comments_template();
                    }
                    ?>
                <?php endwhile; ?>	
            </div>
            <?php 
                get_sidebar();
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>