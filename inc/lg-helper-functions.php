<?php
if ( !class_exists( 'LawGit_Helper' ) ) {
	
	class LawGit_Helper {

		public static function pagination() {

			if( is_singular() )
				return;

			global $wp_query;

			/** Stop execution if there's only 1 page */
			if( $wp_query->max_num_pages <= 1 )
				return;

			$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
			$max   = intval( $wp_query->max_num_pages );

			/**	Add current page to the array */
			if ( $paged >= 1 )
				$links[] = $paged;

			/**	Add the pages around the current page to the array */
			if ( $paged >= 3 ) {
				$links[] = $paged - 1;
				$links[] = $paged - 2;
			}

			if ( ( $paged + 2 ) <= $max ) {
				$links[] = $paged + 2;
				$links[] = $paged + 1;
			}

			echo '<ul class="cr-pagination-center">' . "\n";

			/**	Previous Post Link */
			if ( get_previous_posts_link() )
				printf( '<li>%s</li>' . "\n", get_previous_posts_link( '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' ) );

			/**	Link to first page, plus ellipses if necessary */
			if ( ! in_array( 1, $links ) ) {
				$class = 1 == $paged ? ' class="active"' : '';

				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

				if ( ! in_array( 2, $links ) )
					echo '<li>...</li>';
			}

			/**	Link to current page, plus 2 pages in either direction if necessary */
			sort( $links );
			foreach ( (array) $links as $link ) {
				$class = $paged == $link ? ' class="active"' : '';
				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
			}

			/**	Link to last page, plus ellipses if necessary */
			if ( ! in_array( $max, $links ) ) {
				if ( ! in_array( $max - 1, $links ) )
					echo '<li>...</li>' . "\n";

				$class = $paged == $max ? ' class="active"' : '';
				printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
			}

			/**	Next Post Link */
			if ( get_next_posts_link() )
				printf( '<li>%s</li>' . "\n", get_next_posts_link( '<i class="fa fa-angle-double-right" aria-hidden="true"></i>' ) );

			echo '</ul>' . "\n";
		}


		public static function comments_callback( $comment, $args, $depth ){
			$tag = ( 'div' === $args['style'] ) ? 'div' : 'div';
			?>
			<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent main-comments' : 'main-comments media', $comment ); ?>>
			<div class="comment-wrap" id="respond-<?php comment_ID(); ?>">
				<div class="comment-inner">
					<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'respond',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							) ) );
					?>
					<div class="com-img">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'], "", false, array( 'class'=>'media-object' ) ); ?>
					</div>
					<div class="comm-content">
						<h5><?php echo get_comment_author_link( $comment );?>
							<span><?php printf( __( '%1$s @ %2$s', 'lawgit' ), get_comment_date( '', $comment ), get_comment_time() );?></span>
						</h5>
						<?php if ( '0' == $comment->comment_approved ) : ?>
						<p><?php esc_html_e( 'Your comment is awaiting moderation.', 'lawgit' ); ?></p>
						<?php endif; ?>
						<?php comment_text(); ?>
					</div>
				</div>
			</div>
			<?php
		}

		public static function hex2rgb($hex) {
			$hex = str_replace("#", "", $hex);
			if(strlen($hex) == 3) {
				$r = hexdec(substr($hex,0,1).substr($hex,0,1));
				$g = hexdec(substr($hex,1,1).substr($hex,1,1));
				$b = hexdec(substr($hex,2,1).substr($hex,2,1));
			} else {
				$r = hexdec(substr($hex,0,2));
				$g = hexdec(substr($hex,2,2));
				$b = hexdec(substr($hex,4,2));
			}
			$rgb = "$r, $g, $b";
			return $rgb;
		}
		
		public static function get_practice(){
			$args = array(
				'posts_per_page'   => -1,
				'orderby'          => 'title',
				'order'            => 'ASC',
				'post_type'        => 'lawgit_practice',
			);
			$posts = get_posts( $args );
			foreach ( $posts as $post ) {
				$practice[$post->ID] = $post->post_title;
			}
			return $practice;
		}

		public static function get_lawyer(){
			$args = array(
				'posts_per_page'   => -1,
				'orderby'          => 'title',
				'order'            => 'ASC',
				'post_type'        => 'lawgit_attorney',
			);
			$posts = get_posts( $args );
			foreach ( $posts as $post ) {
				$attorney[$post->ID] = $post->post_title;
			}
			return $attorney;
		}
				
		public static function cont_form() {
			$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
			$contact_forms = array();
			if ( $cf7 ) {
				foreach ( $cf7 as $cform ) {
					$contact_forms[$cform->ID] = $cform->post_title;
				}
			} else {
				$contact_forms[0] = __('No contact forms found', 'lawgit');
			}
			return $contact_forms;
		}	
		
		public static function get_main_menu(){
			$nav_menus = wp_get_nav_menus(array('fields' => 'id=>name'));
			$nav_menus = array('default' => __('Default', 'lawgit')) + $nav_menus;
			return $nav_menus;
		}
		
		public static function filter_social( $args ){
			return ( $args['url'] != '' );
		}
		
		public static function get_excerpt($limit, $source = null){

			$excerpt = $source == 'content' ? get_the_content() : get_the_excerpt();
			$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
			$excerpt = strip_shortcodes($excerpt);
			$excerpt = strip_tags($excerpt);
			$excerpt = substr($excerpt, 0, $limit);
			$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
			$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
			return $excerpt;
		}
	}
}