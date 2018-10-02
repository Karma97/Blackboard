
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
