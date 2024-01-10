<?php
global $post;
$lawgit_attorney_education   	= get_post_meta( $post->ID, 'lawgit_attorney_education', true );
$lawgit_attorney_id    		    = get_post_meta( $post->ID, 'lawgit_attorney_id', true );
$lawgit_attorney_honadawa       = get_post_meta( $post->ID, 'lawgit_attorney_honadawa', true );
$lawgit_attorney_phone        	= get_post_meta( $post->ID, 'lawgit_attorney_phone', true );
$lawgit_attorney_fax            = get_post_meta( $post->ID, 'lawgit_attorney_fax', true );
$lawgit_attorney_email         	= get_post_meta( $post->ID, 'lawgit_attorney_email', true );
$lawgit_attorney_website       	= get_post_meta( $post->ID, 'lawgit_attorney_website', true );
$lawgit_attorney_address        = get_post_meta( $post->ID, 'lawgit_attorney_address', true );
$lawgit_attorney_contact        = get_post_meta( $post->ID, 'lawgit_attorney_contact', true );
$lawgit_attorney_social        	= get_post_meta( $post->ID, 'lawgit_attorney_social', true );
$lawgit_attorney_enable_social  = get_post_meta( $post->ID, 'lawgit_attorney_enable_social', true );
$lawgit_attorney_enable_education  = get_post_meta( $post->ID, 'lawgit_attorney_enable_education', true );
$lawgit_attorney_enable_practice  = get_post_meta( $post->ID, 'lawgit_attorney_enable_practice', true );
$lawgit_attorney_enable_honors  = get_post_meta( $post->ID, 'lawgit_attorney_enable_honors', true );
 
// Layout class
if ( Law_Git::$layout == 'full-width' ) {
    $lawgit_layout_class = 'col-lg-12';
    $lawgit_sidebar_class = '';
    $lawgit_cont_class = 'order-md-1';
}
elseif ( Law_Git::$layout == 'left-sidebar' ){
    $lawgit_layout_class = 'col-lg-8';
    $lawgit_cont_class = 'order-md-2';
    $lawgit_sidebar_class = 'order-md-1';
}else{
    $lawgit_layout_class = 'col-lg-8';
    $lawgit_cont_class = 'order-md-1';
    $lawgit_sidebar_class = 'order-md-2';
}
?>

<div class="<?php echo esc_attr( $lawgit_layout_class );?> <?php echo esc_attr( $lawgit_cont_class );?>">
    <div class="attorney-single-details">
        <div class="sec-o-title">
            <h2><?php esc_html_e( 'Biography of ', 'lawgit' );?><?php the_title();?></h2>
        </div>
        <div class="attorney-single-content">
        <?php the_content();?>
        </div>
        <?php if ( $lawgit_attorney_enable_education == 'on' ): ?>
        <div class="edu-list mt-4">
            <div class="sec-o-title">
                <h2><?php esc_html_e( 'Education', 'lawgit' );?></h2>
            </div>
            <?php foreach ( $lawgit_attorney_education as $lawgit_key => $lawgit_attorney_educations ): ?>
                <?php if ( !empty( $lawgit_attorney_educations ) ): ?>
                    <div class="education-details">
                        <div class="education-title">
                            <h4><?php echo esc_html( $lawgit_attorney_educations['attorney_education'] );?></h4>
                        </div>
                        <div class="pass-years mb-2"><?php echo esc_html( $lawgit_attorney_educations['attorney_pass_year'] );?></div>
                        <p><?php echo esc_html( $lawgit_attorney_educations['attorney_education_details'] );?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <?php if ( $lawgit_attorney_enable_practice == 'on' ): ?>
        <div class="prac-areas-list mt-4">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="sec-o-title">
                        <h2><?php esc_html_e( 'Practice Areas', 'lawgit' );?></h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul>
                        <?php foreach ( $lawgit_attorney_id as $lawgit_key => $lawgit_attorney_ids ): ?>
                            <?php if ( !empty( $lawgit_attorney_ids ) ): ?>
                                <li class="attorney-category">
                                    <a href="<?php the_permalink($lawgit_attorney_ids);?>"><?php echo esc_html( get_the_title($lawgit_attorney_ids) );?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ( $lawgit_attorney_enable_honors == 'on' ): ?>
        <div class="hon-awa-list mt-4">
            <div class="sec-o-title mb-5">
                <h3><?php esc_html_e( 'Honors and Awards', 'lawgit' );?></h3>
            </div>
            <?php foreach ( $lawgit_attorney_honadawa as $lawgit_key => $lawgit_attorney_honadawas ): ?>
                <?php if ( !empty( $lawgit_attorney_honadawas ) ): ?>
                    <div class="hon-awa-details mt-3">
                        <i class="fa fa-shield"></i>
                        <div class="hon-awa-det">
                            <div class="hon-awa-title">
                                <h4><?php echo esc_html( $lawgit_attorney_honadawas['attorney_honadawa_title'] );?></h4>
                            </div>
                            <p><?php echo esc_html( $lawgit_attorney_honadawas['attorney_honadawa_details'] );?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
         <?php endif; ?>
    </div>
</div>
<div class="col-md-4 <?php if( $lawgit_sidebar_class == '' ){echo esc_attr( 'default-none' );}else{ echo esc_attr( $lawgit_sidebar_class );} ?>">
    <div class="attorney-single-img">
        <?php the_post_thumbnail( 'lawgit-attorney-1' );?>
    </div>
    <div class="attorney-single-continfo mt-5">
        <div class="sec-o-title pb-2">
            <h3><?php esc_html_e( 'Contact Information', 'lawgit' );?></h3>
        </div>
        <div class="attorney-single-phone">
            <i class="fa fa-phone"></i>
            <div class="atto-cont-det">
                <?php if(!empty( $lawgit_attorney_phone )): ?><p><span><?php esc_html_e( 'Phone', 'lawgit' );?>: </span><a href="tal:<?php echo esc_html( $lawgit_attorney_phone );?>"><?php echo esc_html( $lawgit_attorney_phone );?></a></p><?php endif; ?>
                <?php if(!empty( $lawgit_attorney_fax )): ?><p><span><?php esc_html_e( 'Fax', 'lawgit' );?>: </span> <?php echo esc_attr( $lawgit_attorney_fax );?></p><?php endif; ?>
            </div>
        </div>
        <div class="attorney-single-email">
            <i class="fa fa-envelope"></i>
            <div class="atto-cont-det">
                <?php if(!empty( $lawgit_attorney_email )): ?><p><span><?php esc_html_e( 'Email', 'lawgit' );?>: </span><a href="mailto:<?php echo esc_html( $lawgit_attorney_email );?>"><?php echo esc_html( $lawgit_attorney_email );?></a></p><?php endif; ?>
                <?php if(!empty( $lawgit_attorney_website )): ?><p><span><?php esc_html_e( 'Website', 'lawgit' );?>: </span><a href="<?php echo esc_url( $lawgit_attorney_website );?>"><?php echo esc_html( $lawgit_attorney_website );?></a></p><?php endif; ?>
            </div>
        </div>
        <div class="attorney-single-address">
            <i class="fa fa-map-marker"></i>
            <div class="atto-cont-det">
                <?php if(!empty( $lawgit_attorney_address )): ?><p><span><?php esc_html_e( 'Address', 'lawgit' );?>: </span><?php echo esc_html( $lawgit_attorney_address );?></p><?php endif; ?>
            </div>
        </div>
    </div>
    <div class="attorney-single-contform mt-5">
        <div class="sec-o-title pb-2">
            <h3><?php esc_html_e( 'Contact Me', 'lawgit' );?></h3>
        </div>
        <div class="attorney-single-form">
            <?php echo do_shortcode( '[contact-form-7 id="'. esc_attr( $lawgit_attorney_contact ) .'" title="Contact form 1"]' ); ?>
        </div>
    </div>
    <?php if ( $lawgit_attorney_enable_social == 'on' ): ?>
    <div class="attorney-single-social mt-5">
        <div class="attorney-single-sociallink">
            <span class="title"><?php esc_html_e( 'Follow', 'lawgit' );?> :  </span>
            <?php foreach ( $lawgit_attorney_social as $lawgit_key => $lawgit_attorney_socials ): ?>
                <?php if ( !empty( $lawgit_attorney_socials ) ): ?>
                    <a href="<?php echo esc_url( $lawgit_attorney_socials['attorney_social_media_url'] );?>" class="portfolio-det-social">
                        <i class="<?php echo esc_attr( $lawgit_attorney_socials['attorney_social_media_icon'] );?>"></i>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</div>