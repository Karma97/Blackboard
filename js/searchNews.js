
$(document).ready(function(){
	$("#searchN").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#alle_news div.card").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
