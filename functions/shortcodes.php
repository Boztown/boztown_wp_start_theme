<?php 

function hider_shortcode( $atts , $content = null ) {
  return '<div class="hider">' . do_shortcode($content) . '</div><div class="shower">Show More Books</div>';
}

add_shortcode( 'hider', 'hider_shortcode' );