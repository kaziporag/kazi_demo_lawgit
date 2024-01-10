<?php
/**
 * The sidebar containing the main widget area.
 *
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>
<?php 
if ( Law_Git::$layout == 'full-width' ) { 
    $lawgit_sidebar_class = 'default-none';
} elseif ( Law_Git::$layout == 'left-sidebar' ) { 
    $lawgit_sidebar_class = 'order-md-1';
} else {
    $lawgit_sidebar_class = 'order-md-2';
}
 ?>
<div class="col-md-4 <?php echo esc_attr( $lawgit_sidebar_class );?>">
	<?php
    if ( is_active_sidebar( 'sidebar' ) ) {
        dynamic_sidebar( 'sidebar' );
    }
    ?>
</div>