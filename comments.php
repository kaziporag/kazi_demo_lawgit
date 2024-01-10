<?php
if ( post_password_required() ) {
    return;
}
?>
<div class="comment-section">
    <?php if ( have_comments() ): ?>
    <?php
        $lawgit_comment_count = get_comments_number();
        $lawgit_comments_text = number_format_i18n( $lawgit_comment_count ) . ' ';
        if ( $lawgit_comment_count > 1 ) {
            $lawgit_comments_text .= __( 'Comments', 'lawgit' );
        }
        else{
            $lawgit_comments_text .= __( 'Comment', 'lawgit' );
        }
    ?>
    <div class="all-title">
        <h3 class="sec-title com-title">
            <span><?php echo esc_html( $lawgit_comments_text );?></span>
        </h3>
    </div>
    <?php $lawgit_avatar = get_option( 'show_avatars' ); ?>
    <?php echo empty( $lawgit_avatar ) ? ' avatar-disabled' : '';?>
    <?php
        wp_list_comments(
            array(
                'style'             => 'div',
                'callback'          => 'LawGit_Helper::comments_callback',
                'reply_text'        => '<i class="fa fa-mail-reply-all"> </i>'. __( 'Reply', 'lawgit' ),
                'avatar_size'       => 130,
                'format'            => 'html5',
                ) 
        );
    ?>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :?>
        <nav class="pagination-area comment-navigation">
            <ul>
                <li><?php previous_comments_link( esc_html__( 'Older Comments', 'lawgit' ) ); ?></li>
                <li><?php next_comments_link( esc_html__( 'Newer Comments', 'lawgit' ) ); ?></li>
            </ul>
        </nav>
    <?php endif;?>
    <?php endif; ?>
    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'lawgit' ); ?></p>
    <?php endif;?>
</div>
<div class="blog-comment-form">
    <?php
    $lawgit_commenter = wp_get_current_commenter();
    $lawgit_req = get_option( 'require_name_email' );
    $lawgit_aria_req = ( $lawgit_req ? " required" : '' );

    $lawgit_fields =  array(
        'author' =>
        '<div class="form-group"><input type="text" id="author" name="author" value="' . esc_attr( $lawgit_commenter['comment_author'] ) . '" placeholder="'.esc_attr__( 'Name', 'lawgit' ).( $lawgit_req ? ' *' : '' ).'" class="form-control"' . $lawgit_aria_req . '></div>',

        'email' =>
        '<div class="form-group"><input id="email" name="email" type="email" value="' . esc_attr(  $lawgit_commenter['comment_author_email'] ) . '" class="form-control" placeholder="'.esc_attr__( 'Email', 'lawgit' ).( $lawgit_req ? ' *' : '' ).'"' . $lawgit_aria_req . '></div>',
        );

	if( !empty(Law_Git::$options['sel_button']) ){ $btn_id = Law_Git::$options['sel_button']; }else{ $btn_id = 'one'; }

    $lawgit_args = array(
        'class_submit'      => 'btn btn_custom corpo-r-btn btn-style-'. esc_attr( $btn_id ) .'',
        'submit_field'         => '<div class="form-group">%1$s %2$s</div>',
        'fields' => apply_filters( 'comment_form_default_fields', $lawgit_fields ),
        'comment_field' =>  '<div class="form-group"><textarea id="comment" name="comment" required placeholder="'.esc_attr__( 'Comment *', 'lawgit' ).'" class="form-control" rows="10" cols="40"></textarea></div>',
        );

        ?>
    <?php comment_form( $lawgit_args );?>
</div>