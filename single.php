<?php
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

<!-- Banner Section -->
<?php get_template_part('template-parts/content', 'banner');?>
<!--End Banner Section -->

<!-- Projects Section-->
<section  id="post-<?php the_ID(); ?>" <?php post_class('blog-single-section section-padding-default'); ?>>
	<div class="default-container">
		<div class="row clerfix">
			<div class="<?php echo esc_attr( $lawgit_layout_class );?> <?php echo esc_attr( $lawgit_sidebar_class );?>">
    			<div class="blog-single-details">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content-single', get_post_format() );?>
						<?php
							if ( comments_open() || get_comments_number() ){
								comments_template();
							}
						?>
					<?php endwhile; ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<!-- End Projects Section-->

<?php get_footer(); ?>