
$(document).ready(function(){
  $("#searchA").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#alle_anzeigen div.card").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


$(document).ready(function(){
  $("#searchAD").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tbodyAD tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
	
$(document).ready(function(){
  $("#searchADOrt").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#selectOrt option").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
		
