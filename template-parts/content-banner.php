<?php
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$lawgit_title = woocommerce_page_title( false );
}
elseif ( is_404() ) {
	$lawgit_title = Law_Git::$options['error_title'];
}
elseif ( is_search() ) {
	$lawgit_title = __( 'Search Results for : ', 'lawgit' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$lawgit_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$lawgit_title = apply_filters( 'lawgit_blog_title', __( 'All Posts', 'lawgit' ) );
	}
}
elseif ( is_archive() ) {
	$lawgit_title = get_the_archive_title();
}
else{
	$lawgit_title = get_the_title();
}

if ( Law_Git::$options['menu_header_style'] == 'st1' || Law_Git::$options['menu_header_style'] == 'st3' ){
    $banner_heading = 'banner-title';
}elseif( Law_Git::$options['menu_header_style'] == 'st2' || Law_Git::$options['menu_header_style'] == 'st4' ){
    $banner_heading = 'banner-title-two';
}else{
    $banner_heading = 'banner-title';
}

?>
<!-- Banner Section -->
<?php if ( Law_Git::$has_banner == '1' || Law_Git::$has_banner == 'on' ): ?>
<section class="banner-section text-capitalize">
    <div class="<?php echo esc_html( $banner_heading ); ?>">
        <h2><?php echo wp_kses_post( $lawgit_title );?></h2>
    </div>
    <div class="banner-link">
        <?php if ( Law_Git::$has_breadcrumb == '1' || Law_Git::$has_breadcrumb == 'on' ): ?>
            <?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!--End Banner Section -->