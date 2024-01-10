<div class="blog-detail mt-30">
    <?php if ( has_post_thumbnail() ): ?>
        <div class="b-det-img">
            <?php the_post_thumbnail();?>
        </div>
    <?php endif; ?>
    <div class="det-content">
        <?php the_content();?>
        <?php wp_link_pages();?>
    </div>
</div>