<?php

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $post_content = '';

  while ( have_rows('layout') ) {
    the_row();
    $post_content .= get_sub_field('content');
  }

  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "/path/to/default.png";
  }
  return $first_img;
}

function featured_or_first($post_id, $size = 'full') {

  if ( get_the_post_thumbnail($post_id) != '' ) {

   $post_thumbnail_id = get_post_thumbnail_id($post_id);
   echo wp_get_attachment_url( $post_thumbnail_id );

  } else {
   echo catch_that_image();
  }
}

function remove_thumbnail_dimensions($value, $post_id, $field) {
    //Loop through all <img> tags
    if (!is_admin()) {
      if (preg_match_all('/<img[^>]+>/ims', $value, $matches)) {
          foreach ($matches as $match) {
              // Replace all occurences of width/height
              $clean = preg_replace('/(width|height)=["\'\d%\s]+/ims', "", $match);
              // Replace with result within html
              $value = str_replace($match, $clean, $value);
              //error_log($match);
          }
      }
    }
    return $value;
}

add_filter('acf/load_value/type=wysiwyg', 'remove_thumbnail_dimensions', 10, 3);
