<?php
class Law_Git_Recent_Post_Sidebar_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'lawgit_recent_post_sidebar_widget', 
            __( 'LawGit: Recent Posts', 'lawgit' ), 
            array( 'description' => __( 'LawGit: Recent Posts Widget', 'lawgit' ) ) 
            );
	}
	 
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Posts', 'lawgit' ) : $instance['title'], $instance, $this->id_base );
		$posttype = ! empty( $instance['posttype'] ) ? $instance['posttype'] : 'post';
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ) {
			$number = 5;
		}
		$show_images = isset( $instance['show_images'] ) ? $instance['show_images'] : false;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_details = isset( $instance['show_details'] ) ? $instance['show_details'] : false;
		$post_types = get_post_types( array( 'public' => true ), 'objects' );
		if ( array_key_exists( $posttype, (array) $post_types ) ) {
			$r = new WP_Query( apply_filters( 'widget_posts_args', array(
				'post_type' => $posttype,
				'posts_per_page' => $number,
				'no_found_rows' => true,
				'post_status' => 'publish',
				'ignore_sticky_posts' => true,
			) ) );
			?>
            <?php if ( $r->have_posts() ) : ?>
                <?php echo wp_kses_post($args['before_widget']); ?>
					<?php
						if ( ! empty( $instance['title'] ) ) {
							echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
						}
					?>
					<div class="widget-recent-post">
						<?php while ( $r->have_posts() ) : $r->the_post(); ?>
						<div class="widget-items">
							<ul>
								<li>
								<?php if ( $show_images ) : ?>
									<div class="blog-rp-image">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('lawgit-post-1');?>
										</a>
									</div>
									<?php endif; ?>
									<div class="blog-rp-info">
										<p><a href="<?php the_permalink(); ?>"><?php get_the_title() ? wp_trim_words(the_title()) : the_ID(); ?></a></p>
										<?php if ( $show_details ) : ?>
											<p><?php echo esc_html( LawGit_Helper::get_excerpt(50)); ?></p>
										<?php endif; ?>
										<?php if ( $show_date ) : ?>
											<div class="post-date">
												<span><?php echo esc_html( get_the_date() ); ?></span>	
											</div>
										<?php endif; ?>
									</div>
								</li>
							</ul>
						</div>
						<?php endwhile; ?>
                    </div>
				<?php echo wp_kses_post($args['after_widget']); ?>
			<?php
			
			wp_reset_postdata();   
			
			endif;
		}
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = empty( $new_instance['title'] ) ? '' : sanitize_text_field( $new_instance['title'] );
		$instance['posttype'] = strip_tags( $new_instance['posttype'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_images'] = isset( $new_instance['show_images'] ) ? (bool) $new_instance['show_images'] : false;
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_details'] = isset( $new_instance['show_details'] ) ? (bool) $new_instance['show_details'] : false;
		return $instance;
	}
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$posttype = isset( $instance['posttype'] ) ? $instance['posttype']: 'post';
		$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_images = isset( $instance['show_images'] ) ? (bool) $instance['show_images'] : false;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_details = isset( $instance['show_details'] ) ? (bool) $instance['show_details'] : false;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php __( 'Title:', 'lawgit' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<?php
			$post_types = get_post_types( array( 'public' => true ), 'objects' );
			printf(
				'<p><label for="%1$s">%2$s</label>' .
				'<select class="widefat" id="%1$s" name="%3$s">',
				$this->get_field_id( 'posttype' ),
				__( 'Post Type:', 'lawgit' ),
				$this->get_field_name( 'posttype' )
			);
			foreach ( $post_types as $post_type => $value ) {
				if ( 'attachment' === $post_type ) {
					continue;
				}
				printf(
					'<option value="%s"%s>%s</option>',
					esc_attr( $post_type ),
					selected( $post_type, $posttype, false ),
					$value->label
				);
			}
			echo '</select></p>';
		?>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php __( 'Number of posts to show:', 'lawgit' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_images ); ?> id="<?php echo $this->get_field_id( 'show_images' ); ?>" name="<?php echo $this->get_field_name( 'show_images' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_images' ); ?>"><?php _e( 'Display post thumbnail?', 'lawgit' ); ?></label></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?', 'lawgit' ); ?></label></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_details ); ?> id="<?php echo $this->get_field_id( 'show_details' ); ?>" name="<?php echo $this->get_field_name( 'show_details' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_details' ); ?>"><?php _e( 'Display post short details?', 'lawgit' ); ?></label></p>
<?php
	}
}