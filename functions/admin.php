<?php

function remove_menus (){
  
  // remove "Posts" menu
  remove_menu_page( 'edit.php' );                   
}

add_action( 'admin_menu', 'remove_menus' );

function disable_dashboard_widgets() {  
  
  remove_meta_box('dashboard_primary', 'dashboard', 'side');  
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');  
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');    
}  
add_action('wp_dashboard_setup', 'disable_dashboard_widgets');