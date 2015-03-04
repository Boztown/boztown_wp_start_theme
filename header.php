<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php wp_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?>>

<header class="primary">
  <div class="container">
    <a href="<?php echo home_url(); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="logo" alt="<?php wp_title(); ?>">
    </a>
    <nav class="primary">
      <?php wp_nav_menu(); ?>
    </nav>
  </div>
</header>
