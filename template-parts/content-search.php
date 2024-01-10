<?php
$search_page_column = Law_Git::$options['search_page_column'];
if ($search_page_column == '1-column') {
    $lawgit_col = 'col-md-12'; 
} elseif ($search_page_column == '2-columns') {
    $lawgit_col = 'col-md-6';
} else {
    $lawgit_col = 'col-md-4';
}
?>
<div class="<?php echo esc_attr( $lawgit_col );?> mb-4">
    <div class="blog-cont-holder">
        <div class="img_blog">
            <?php the_post_thumbnail('lawgit-size1', array( 'class' => 'img-fluid mx-auto d-block' ));?>
        </div>
        <div class="blog-box-detail p-4 text-center">
            <div class="mt-0">
                <p class="space-date"><?php the_time( 'M' );?> <?php the_time( 'Y' );?></p>
                <h5 class="font-weight-bold"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                <p><?php echo esc_html( LawGit_Helper::get_excerpt(150)); ?></p>
                <a class="read-more text-uppercase font-weight-bold" href="<?php the_permalink();?>"><?php esc_html_e( 'Read More', 'lawgit' );?></a>
            </div>
        </div>
    </div>
</div>