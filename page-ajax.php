<script>
  
jQuery(document).ready(function( $ ) {

    var data = {
      action: 'my_special_ajax_call',
      geoquery: 'true',
      postal_code: postalCode
    }

    $.ajax({
      url:"/wp-admin/admin-ajax.php",
      type:'POST',
      data: data,
      success: function(results) {
        $('.mla-name').text(results);
      }
    });

});

</script>