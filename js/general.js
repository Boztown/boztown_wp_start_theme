jQuery(document).ready(function( $ ) {

  // add "clickbox" class to a box that has a link inside of it to make
  // the whole thing clickable.
  $(document.body).on('click', '.clickbox', function() {
    window.location = $(this).find('a').attr('href');
  });

});