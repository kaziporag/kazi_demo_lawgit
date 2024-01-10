<?php
// Layout class
if ( Law_Git::$layout == 'full-width' ) {
	$lawgit_layout_class = 'col-md-12 col-sm-12 col-xs-12';
}
else{
	$lawgit_layout_class = 'col-sm-8 col-md-8 col-xs-12';
}
?>
<?php get_header();?>
<?php get_template_part('template-parts/content', 'banner');?>

<!-- Error 404 Section -->
<section  <?php post_class('error-404-section section-padding-all');?>>
	<div class="default-container">
		<div class="row">
			<div class="<?php echo esc_attr( $lawgit_layout_class );?>">
				<?php get_template_part( 'template-parts/content', 'error' );?>
			</div>
			<?php
				get_sidebar();
			?>
		</div>
	</div>
</section>
<!--End Error 404 Section -->

<?php get_footer(); ?>