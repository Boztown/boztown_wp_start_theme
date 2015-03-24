<?php
/*
 * Template Name: Search
*/
get_header(); ?>

<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
  $query_split = explode("=", $string);
  $search_query[$query_split[0]] = urldecode($query_split[1]);
}

$search = new WP_Query($search_query);
?>

<h2>
  Search: <?php echo get_search_query(); ?>
</h2>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

  <?php endwhile; ?> 
<?php endif; ?>

<?php get_footer(); ?>