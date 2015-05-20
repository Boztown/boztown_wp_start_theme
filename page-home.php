<?php
/*
 * Template Name: Home
*/

get_header(); ?>

<div class="container">
  
  <h1>Home</h1>

  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <?php the_content(); ?>

    <?php endwhile; ?> 
  <?php endif; ?>

</div>

<?php get_footer(); ?>