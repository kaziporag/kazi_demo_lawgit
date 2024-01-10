<?php
$lawgit_primary_color   			= Law_Git::$options['primary_color'];
$lawgit_secondery_color 			= Law_Git::$options['secondery_color'];
?>
.price-active .font-weight-bold,
.price-active .plan-price,
.price-active .business-plan-price .text_custom {
    color: <?php echo esc_html( $lawgit_secondery_color ); ?>;
}
.price-active .btn-style-two{
	color: <?php echo esc_html( $lawgit_primary_color ); ?>;
}

.price-active .btn-style-two:hover {
    background: <?php echo esc_html( $lawgit_primary_color ); ?>;
    color: #ffffff;
}