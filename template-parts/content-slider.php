<!-- Slider Section start -->
<?php $revslider = get_post_meta( get_the_ID(), 'lawgit_slider', true ); ?>
<section class="slider-area">
    <?php 
	// Revolution slider
		if (!empty($revslider)) {
			echo '<div class="theme_header_slider">';
			echo do_shortcode('[rev_slider '.esc_attr($revslider).']');
			echo '</div>';
		}
	?>
</section>
<!-- Slider Section end -->