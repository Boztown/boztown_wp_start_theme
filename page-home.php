<?php
/*
 * Template Name: Home
*/

get_header(); ?>

<h1>Home</h1>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

  <?php endwhile; ?> 
<?php endif; ?>

<?php get_footer(); ?>