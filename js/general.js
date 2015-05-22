jQuery(document).ready(function( $ ) {

  // add "clickbox" class to a box that has a link inside of it to make
  // the whole thing clickable.
  $(document.body).on('click', '.clickbox', function() {
    if ($(this).find('a').attr('target') == '_blank') {
      window.open($(this).find('a').attr('href'), '_blank');
    } else {
      window.location = $(this).find('a').attr('href');
    }
  });

  var iconElement = document.getElementById('icon');
  var options = {
      from: 'fa-bars',
      to: 'fa-arrow-right',
      animation: 'rubberBand'
  };

  iconate(iconElement, options);

});