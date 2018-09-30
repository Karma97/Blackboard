
$(document).ready(function(){
  $("#searchA").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#alle_anzeigen div.card").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
	