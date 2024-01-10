<?php get_header(); ?>

<!-- Banner Section -->
<?php get_template_part('template-parts/content', 'banner');?>
<!--End Banner Section -->

<!-- Projects Section-->
<section  id="post-<?php the_ID(); ?>" <?php post_class('attorney-single-section section-padding-default'); ?>>
	<div class="default-container ex-padding-01">
		<div class="row clerfix">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content-single', 'attorney' );?>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<!-- End Projects Section-->

<?php get_footer(); ?>