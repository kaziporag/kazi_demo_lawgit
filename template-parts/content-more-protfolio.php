<!--Projects Section-->
<section class="more-portfolio-section section-padding-all bg-style-one">
	<div class="default-container">
		<div class="row clearfix">
			<div class="con-title-column col-lg-12 col-md-12 col-sm-12">
				<!--Sec Title-->
				<div class="sec-title">
					<h3><span><?php esc_html_e('Related Projects', 'lawgit'); ?></span></h3>
				</div>
			</div>
		</div>
		<div class="projects mt-4">
			<div class="filter-list row clearfix">
				<?php
					$post_terms = wp_get_object_terms($post->ID, 'lawgit_portfolio_tag', array('fields'=>'ids'));

					$args = array(
						'post_type' => 'lawgit_portfolio',
						'posts_per_page' => 3,
						'order'          => 'ASC',
						'post__not_in' => array($post->ID),
						'tax_query' => array(
							array(
								'taxonomy' => 'lawgit_portfolio_tag',
								'field' => 'id',
								'terms' => $post_terms,
							)
						)
					);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							$featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
				?>
				<!--Gallery Block Two-->
				<div class="gallery-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<figure class="image-box">
							<?php  the_post_thumbnail('lawgit-size'); ?>
							<!--Overlay Box-->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<a href="<?php the_permalink(); ?>" class="link"><span class="icon fa fa-link"></span></a>
										<a href="<?php echo esc_url($featured_img_url); ?>" data-fancybox="gallery-images-2" data-caption="" class="link"><span class="icon fa fa-search"></span></a>
									</div>
								</div>
							</div>
						</figure>
					</div>
				</div>
				<?php
					}
				} else { }
				wp_reset_postdata();
				?>
			</div>
		</div>
</section>
<!--End Projects Section-->
