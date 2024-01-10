<?php 
global $post;
$lawgit_post_area_social = get_post_meta( $post->ID, 'lawgit_post_area_social', true );
$lawgit_post_enable_social = get_post_meta( $post->ID, 'lawgit_post_enable_social', true );

$postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
?>
<div class="blog-single-meta-img">
    <?php the_post_thumbnail( 'lawgit-post-3' );?>
    <div class="blog-single-title">
        <h2><?php the_title();?></h2>
    </div>
</div>
<div class="blog-single-content">
    <div class="date-meta">
        <span>
            <i class="fa fa-user"></i> <?php esc_html_e( 'By', 'lawgit' );?> : <?php the_author_posts_link();?>
        </span>
        <span>
            <i class="fa fa-calendar"></i> <?php the_time( 'F j, Y' );?>
        </span>
        <span>
            <i class="fa fa-commenting-o"></i> <?php echo esc_html( '(' .  get_comments_number() . ')' );?>
        </span>
        <span>
            <i class="fa fa-tags"></i> <?php echo wp_kses_post( get_the_term_list( $post->ID, 'category', '', ', ' ) ); ?>
        </span>
    </div>
    <?php the_content();?>
</div>
<div class="blog-tags">
    <div class="row">
        <div class="col-md-8 tags">
        <?php if ( has_tag() ): ?>
            <span class="title"><?php esc_html_e( 'Tags', 'lawgit' );?> :  </span>
            <?php echo wp_kses_post(get_the_term_list( $post->ID, 'post_tag')); ?>
        <?php endif; ?>
        </div>
        <?php if ( $lawgit_post_enable_social == 'on' ): ?>
        <div class="col-md-4 social">
            <span class="title"><?php esc_html_e( 'Share', 'lawgit' );?>: </span>
            <a class="blog-det-social" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" title="Tweet this"><i class="fa fa-twitter"></i></a>
            <a class="blog-det-social" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="fa fa-facebook-f"></i></a>
            <a class="blog-det-social" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $postUrl; ?>" title="Share on Pinterest"><i class="fa fa-pinterest"></i></a>
            <a class="blog-det-social" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $postUrl; ?>" title="Share on Linkedin"><i class="fa fa-linkedin"></i></a>
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="blog-nav clearfix">
    <?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>', FALSE); ?>
    <?php next_post_link('%link', '<i class="fa fa-angle-right"></i>', FALSE); ?>
</div>