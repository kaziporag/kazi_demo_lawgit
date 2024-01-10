<div class="error-404">
    <h1><?php echo esc_html( Law_Git::$options['error_text1'] );?></h1>
    <h5><?php echo esc_html( Law_Git::$options['error_text2'] );?></h5>
    <p><?php echo esc_html( Law_Git::$options['error_text3'] );?></p>
    <a class="corpo-r-btn btn-style-<?php if( !empty(Law_Git::$options['sel_button']) ) { echo esc_attr( Law_Git::$options['sel_button'] ); } else {echo esc_attr( 'one' ); } ?>" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( Law_Git::$options['error_buttontext'] );?></a>
</div>