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

  <div class="row">
    <div class="three columns" style="background: red;">ONE</div>
    <div class="three columns" style="background: blue;">TWO</div>
    <div class="three columns" style="background: green;">THREE</div>
  </div>

  <!-- 
  <div class="row">
    <div class="one column">One</div>
    <div class="eleven columns">Eleven</div>
  </div>

  <div class="row">
    <div class="two columns">Two</div>
    <div class="ten columns">Ten</div>
  </div>

  <div class="row">
    <div class="one-third column">1/3</div>
    <div class="two-thirds column">2/3</div>
  </div>

  <div class="row">
    <div class="one-half column">1/2</div>
    <div class="one-half column">1/2</div>
  </div>
  -->

</div>




<?php get_footer(); ?>