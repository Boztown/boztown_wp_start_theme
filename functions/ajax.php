<?php

function implement_ajax() {

  if(isset($_POST['geoquery'])) {
    echo 'thing';

    // remember to die
    die();
  }

}

add_action('wp_ajax_my_special_ajax_call', 'implement_ajax');
add_action('wp_ajax_nopriv_my_special_ajax_call', 'implement_ajax');