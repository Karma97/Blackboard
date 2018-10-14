
$(".change_pwd_email_overlay").hide();
$("#change_pwd_html").hide();
$("#change_email_html").hide();
$("#account_löschung").hide();

function open_pwd_email_change(overlay, element) {
	$(overlay).fadeIn();
	$(element).fadeIn();
}

function close_pwd_email_change(overlay, element) {
	$(overlay).fadeOut();
	$(element).fadeOut();
}

$(document).ready(function() {
    $(".change_pwd_email_overlay").mouseup(function(e)
    {
        var subject = $("#change_pwd_html"); 

        if(e.target.id != subject.attr('id'))
        {
            subject.fadeOut();
			$(".change_pwd_email_overlay").fadeOut();
        }
    });
});

$(document).ready(function() {
    $(".change_pwd_email_overlay").mouseup(function(e)
    {
        var subject = $("#change_email_html"); 

        if(e.target.id != subject.attr('id'))
        {
            subject.fadeOut();
			$(".change_pwd_email_overlay").fadeOut();
        }
    });
});

$(document).ready(function() {
    $(".change_pwd_email_overlay").mouseup(function(e)
    {
        var subject = $("#account_löschung"); 

        if(e.target.id != subject.attr('id'))
        {
            subject.fadeOut();
			$(".change_pwd_email_overlay").fadeOut();
        }
    });
});