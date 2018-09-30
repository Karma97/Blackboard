
$(document).ready(function(){
  $("#searchR").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tbodyR tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
	