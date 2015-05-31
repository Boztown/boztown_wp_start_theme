  <?php echo get_template_directory(); ?>
  <?php 
    if(file_exists(get_template_directory() . '/footer-photoswipe.php')) {
      include('footer-photoswipe.php'); 
    }
  ?>
  <?php 
    if(file_exists(get_template_directory() . '/footer-acf-maps.php')) {
      include('footer-acf-maps.php'); 
    }
  ?>
  <?php wp_footer(); ?>
</body>
</html>