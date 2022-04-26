
<!-- VALIDATE FORM --> 
$("#detail_page_form").validate();

<!-- INPUT SLIDER --> 
  $("[data-slider]")
    .each(function () {
      var input = $(this);
      $("<span>")
        .addClass("output")
        .insertAfter($(this));
    })
    .bind("slider:ready slider:changed", function (event, data) {
      $(this)
        .nextAll(".output:first")
          .html(data.value.toFixed(3));
    });

<!-- CHECK AND RADIO INPUT STYLE -->    
$('input').iCheck({
   checkboxClass: 'icheckbox_flat-blue',
   radioClass: 'iradio_flat-blue'
 });

<!-- DATEPICKER -->        
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
   	$('#date_detail').datepicker({
    autoclose: true,
	todayHighlight: true
});
