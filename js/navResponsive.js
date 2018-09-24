
function myFunction() {
    var x = document.getElementById("navleiste");
    if (x.className === "navigation") {
        x.className += " responsive";
    } else {
        x.className = "navigation";
    }
}

var header = document.getElementById('header');
$(document).ready(function(){       
            var scroll_pos = 0;
            $(document).scroll(function() { 
                scroll_pos = $(this).scrollTop();
                if(scroll_pos > 10) {
					header.classList.add('header_after');
					header.classList.remove('header_before');
                } else {
					header.classList.add('header_before');
					header.classList.remove('header_after');
                }
            });
        });
