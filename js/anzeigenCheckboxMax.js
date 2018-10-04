
$(function() {
    var $inputs = $('input.rubriken');
    $inputs.change(function() {
        if ($('input.rubriken:checked').length == 3) {
            $inputs.not(':checked').prop('disabled', true);
        } else {
            $inputs.prop('disabled', false);
        }
    });
});


var minCheckBoxes = 1;

$(document).ready(function(){
    $("form#anzeigenForm").submit(function(){
		if ($('input:checkbox').filter(':checked').length < minCheckBoxes){
			$("#checkboxError").text("Bitte mindestens eine Rubrik auswählen!");
		return false;
		}
    });
});
