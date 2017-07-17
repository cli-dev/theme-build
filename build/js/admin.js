jQuery(function($) {
  var acfRow = $('.acf-field[data-name=row]>.acf-input>.acf-repeater>.acf-table>tbody>.acf-row');
  $(document).ready(function() {
    //$(acfRow).append('<div class="row-toggle"></div>');
  });

  $(acfRow).children('.row-toggle').click(function(event) {
    $(this).siblings('.acf-fields').slideToggle();
    console.log('Row should hide');
  });
});