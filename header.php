<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo bloginfo( 'name' ); ?><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="primary">
  <div class="container">
    <span id="hamburger">
      <i id="hamburger-icon" class="fa fa-bars fa-lg"></i>
    </span>
    <a href="<?php echo home_url(); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="logo" alt="<?php wp_title(); ?>">
    </a>
    <nav id="primary-nav" class="primary">
      <?php wp_nav_menu(); ?>
    </nav>
  </div>
</header>
