<?php
add_filter( 'get_search_form', 'lawgit_search_form' );
function lawgit_search_form(){
	$output =  '
	<div class="widget widget-search"><form class="side-form" action="' . esc_url( home_url( '/' ) ) . '" method="get">
		<input class="form-control" type="text" placeholder="' . esc_attr__( 'Search here ...', 'lawgit' ) . '" value="' . get_search_query() . '" name="s">
		<button><i class="fa fa-paper-plane"></i></button>
	</form></div>';
	return $output;
}