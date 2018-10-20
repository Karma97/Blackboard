// disable image drag on firefox
if (document.getElementsByTagName('img')) {
window.onload = function (e) {
    var evt = e || window.event,
        imgs,                   
        i;                      
    if (evt.preventDefault) {
        imgs = document.getElementsByTagName('img');
        for (i = 0; i < imgs.length; i++) {
            imgs[i].onmousedown = disableDragging;
        }
    }
};
}
 
function disableDragging(e) {
    e.preventDefault();
}


// Collapse buttons in Adminarea
if ($(".collapse")) {
$(".iconCollapseAll").removeClass("collapsedIcon");

function collapseAll() {
	$(".collapse").collapse('show');
	$(".iconCollapseAll").removeClass("collapsedIcon");
}

function collapseNone() {
	$(".collapse").collapse('hide');
	$(".iconCollapseAll").addClass("collapsedIcon");
}

function collapseItem(item, icon) {
	if ( $(item).hasClass("show") ) {
		$(item).collapse('hide');
		$(icon).addClass("collapsedIcon");
	} else {
		$(item).collapse('show');
		$(icon).removeClass("collapsedIcon");
	}	
}

function myFunction22(x) {
    if (x.matches) { 
       
		$(".collapse").collapse("hide");
		$(".iconCollapseAll").addClass("collapsedIcon");
		
    } else {

		$(".collapse").collapse("show");
		$(".iconCollapseAll").removeClass("collapsedIcon");
		
    }
}

var x = window.matchMedia("(max-width: 700px)");
myFunction22(x);
x.addListener(myFunction22);
}

// Bearbeitungsmodis
if ($(".changeinputshow") && $(".changehide")) {
$(".changeinputshow").addClass("d-none");

function toggleBearbeitenModus() {
	$(".changeinputshow").toggleClass("d-none");
	$("#submitRubrikChanges").toggleClass("d-none");
	$(".changehide").toggleClass("d-none");
	
	var x = $("#activateRubrikChanges");
		if (x.text() === "Bearbeitungsmodus") {
			x.text("Beenden");
			x.toggleClass("btn-danger");
			x.toggleClass("btn-dark");
		} else {
			x.text("Bearbeitungsmodus");
			x.toggleClass("btn-danger");
			x.toggleClass("btn-dark");
		}
}

function toggleBearbeitenModusAZ() {
	$(".changeinputshow").toggleClass("d-none");
	$("#submitAnzeigenChanges").toggleClass("d-none");
	$(".changehide").toggleClass("d-none");
	$(".löschenChanges").toggleClass("d-none");
	
	var x = $("#activateAnzeigenChanges");
		if (x.text() === "Bearbeitungsmodus") {
			x.text("Beenden");
			x.toggleClass("btn-danger");
			x.toggleClass("btn-dark");
		} else {
			x.text("Bearbeitungsmodus");
			x.toggleClass("btn-danger");
			x.toggleClass("btn-dark");
		}
}
}

function toggleBearbeitenModusAZIL() {
	
	if ($(".changeinputshow2").hasClass("d-none")) {
		$(".changeinputshow2").removeClass("d-none");
		$(".changeTrigger").text("Schließen");
		$(".changeTrigger").removeClass("btn-light");
		$(".changeTrigger").addClass("btn-danger");
	} else {
		$(".changeinputshow2").addClass("d-none");
		$(".changeTrigger").text("Bearbeiten/Löschen");
		$(".changeTrigger").addClass("btn-light");
		$(".changeTrigger").removeClass("btn-danger");
	}
	
	if ($(".changehide").hasClass("d-none")) {
		$(".changehide").removeClass("d-none");
		$(".changehide").addClass("d-inline");
	} else {
		$(".changehide").addClass("d-none");
		$(".changehide").removeClass("d-inline");
	}
	
}


// Searchfunktionen

if ($("#search")) {
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#selectOrt *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
}

if ($("#searchN")) {
$(document).ready(function(){
	$("#searchN").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#alle_news div.card").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
}

if ($("#searchR")) {
$(document).ready(function(){
  $("#searchR").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tbodyR tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
}

if ($("#searchA")) {
$(document).ready(function(){
  $("#searchA").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#alle_anzeigen div.card").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
}

if ($("#searchAD")) {
$(document).ready(function(){
  $("#searchAD").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tbodyAD tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
}
	
if ($("#searchADOrt")) {
$(document).ready(function(){
  $("#searchADOrt").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#selectOrt option").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
}

// Change email and password on myacc


if ($(".change_pwd_email_overlay")) {
	
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
}

//  Startseite slider

(function(factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery', 'hammerjs'], factory);
    } else if (typeof exports === 'object') {
        factory(require('jquery'), require('hammerjs'));
    } else {
        factory(jQuery, Hammer);
    }
}(function($, Hammer) {
    function hammerify(el, options) {
        var $el = $(el);
        if(!$el.data("hammer")) {
            $el.data("hammer", new Hammer($el[0], options));
        }
    }

    $.fn.hammer = function(options) {
        return this.each(function() {
            hammerify(this, options);
        });
    };

    Hammer.Manager.prototype.emit = (function(originalEmit) {
        return function(type, data) {
            originalEmit.call(this, type, data);
            $(this.element).trigger({
                type: type,
                gesture: data
            });
        };
    })(Hammer.Manager.prototype.emit);
}));

if ($("#slide")) {
var resim = $("#slide");
resim.hammer().on("swipeleft", function() {
	resim.carousel("next");
});

resim.hammer().on("swiperight", function() {
	resim.carousel("prev");
});
}

// nav dropdown

if ($('.dropdownContent') && $("#ichange")) {
function showDropdown() {
    $('.dropdownContent').toggleClass("showDropdown");

	$("#ichange").toggleClass("fas fa-chevron-circle-right");
	$("#ichange").toggleClass("fas fa-chevron-circle-down");
}
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = $(".dropdownContent");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('showDropdown')) {
        openDropdown.classList.remove('showDropdown');
			$("#ichange").toggleClass("fas fa-chevron-circle-right");
			$("#ichange").toggleClass("fas fa-chevron-circle-down");
      }
    }
  }
}


// nav responsive

if (document.getElementById("navleiste")) {
function navResponsive() {
    var x = document.getElementById("navleiste");
    if (x.className === "navigationsleiste") {
        x.className += " responsive";
    } else {
        x.className = "navigationsleiste";
    }
}
}


// rubrikenbegrenzung bei der anzadd

if ($('input.rubriken')) {
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
}


var minCheckBoxes = 1;
var maxCheckBoxes = 3;

if ($("form#anzeigenForm")) {
$(document).ready(function(){
    $("form#anzeigenForm").submit(function() {
		if ($('input:checkbox').filter(':checked').length < minCheckBoxes) {
			$("#checkboxError").text("Bitte mindestens eine Rubrik auswählen!");
		return false;
		}
	if ($('input.rubriken').filter(':checked').length > maxCheckBoxes) {
		$("#checkboxError").text("Zu viele Rubriken ausgewählt!");
		$(this).checked = false;
		return false;
	}	
    });
	
});
}

// Anzeigen count strings
/*
var elementcount = getElementsByTagName("*");
var anzahlTDS = elementcount.getElementsByTagName("td").length;
var i = 1;
var maxStringLaenge2 = 5;

for (i; i <= anzahlTDS; i++) {
	
	var str2 = $('td#beschreibungTD' + i + ' .changehide').html();	
	var result2 = str2.slice(0, maxStringLaenge2);
	90
	if (str.length > maxStringLaenge2) {
	
		var sliced2 = str2.slice(0, maxStringLaenge2);
		var result2 = sliced2 + "...";
		
		$('#beschreibungTD' + i + ' .changehide').text(result2);
		
	} else {
		$('#beschreibungTD' + i + ' .changehide').text(result2);
	}	
	
}
*/


// bilder vorschau bei anzadd
	
if (document.getElementById('files') && document.getElementById('list')) {
function dateiauswahl(evt) {
    var dateien = evt.target.files;
	
       for (var i = 0, f; f = dateien[i]; i++) {

      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      reader.onload = (function(theFile) {
        return function(e) {
	  
          var vorschau1 = document.createElement('img');
		  vorschau1.className = 'vorschau hoverable rounded d-inline-block mb-2 ml-2 mr-2 mt-2';

		  vorschau1.src   = e.target.result;
		  vorschau1.title = theFile.name;
          document.getElementById('list').insertBefore(vorschau1, null);
        };
		})(f);

      reader.readAsDataURL(f);
    }
	
	var vorschau2 = document.createElement('label');
	vorschau2.className = 'custom-file-label';
	vorschau2.innerHTML = "Ihre Bilder:";
    document.getElementById('list').insertBefore(vorschau2, null);
	
  }

  
  document.getElementById('files').addEventListener('change', dateiauswahl, false);
  }
  
// Loading screen

 /*$(function() {
  setTimeout(function() {
    $(".komplett").fadeOut("smooth");
	$("body").fadeIn("smooth");
}, 500)
});*/

window.addEventListener("load", function() {
	var loadingScreen = $("#komplett");
	loadingScreen.fadeOut("slow");
	window.setTimeout(function() {
		$("body").fadeIn("smooth");
	}, 200);
});


// login and register

function showSwitchLogin(showItem, hideItem, selectItems, ItemWhereClassShouldBeSet ,classToMove) {
	$(showItem).show();	
	$(hideItem).hide();
	
	$(selectItems).removeClass("navbar_login_item_active");
	$(ItemWhereClassShouldBeSet).addClass("navbar_login_item_active");
}

function openLogin(element) {
	$(element).fadeIn();
	
	$("#login_item_add_class").addClass("navbar_login_item_active");
	$("#register_item_add_class").removeClass("navbar_login_item_active");
	
	$("#login_item").show();	
	$("#register_item").hide();
	
	$("body").css("overflow-y", "hidden");
}

function openRegister(element) {
	$(element).fadeIn();
	
	$("#register_item_add_class").addClass("navbar_login_item_active");
	$("#login_item_add_class").removeClass("navbar_login_item_active");
	
	$("#register_item").show();	
	$("#login_item").hide();
	
	$("body").css("overflow-y", "hidden");
}

function closeLogin(element) {
	$(element).fadeOut();
	$("body").css("overflow-y", "scroll");
}


var elm1 = $("#register_item_wrapper");
var elm2 = $("#login_item_wrapper");


function myFunction44(x) {
    if (x.matches) { 
       
		elm1.hammer().on("swipeleft swiperight", function() {
			showSwitchLogin('#login_item', '#register_item', '.navbar_login_item', '#login_item_add_class', 'navbar_login_item_active');
		});
		
		elm2.hammer().on("swipeleft swiperight", function() {
			showSwitchLogin('#register_item', '#login_item', '.navbar_login_item', '#register_item_add_class', 'navbar_login_item_active');
		});
		
    } else {

		elm1.hammer().on("swipeleft swiperight", function() {
			showSwitchLogin('#register_item', '#login_item', '.navbar_login_item', '#register_item_add_class', 'navbar_login_item_active');
		});
		
		elm2.hammer().on("swipeleft swiperight", function() {
			showSwitchLogin('#login_item', '#register_item', '.navbar_login_item', '#login_item_add_class', 'navbar_login_item_active');
		});
	
    }
}

var x = window.matchMedia("(max-width: 700px)");
myFunction44(x);
x.addListener(myFunction44);


// news count strings


var anzahlNews = 3;
var i = 1;
var maxStringLaenge = 186;

for (i; i <= anzahlNews; i++) {
if ($('#countStrings' + i))	{
	var str = $('#countStrings' + i).html();	
	if (str) {
	var result = str.slice(0, maxStringLaenge);

	
	if (str.length > maxStringLaenge) {
	
		var sliced = str.slice(0, maxStringLaenge);
		var result = sliced + "...";
		
		
		$('#countStrings' + i).text(result);
		
	} else {
		$('#countStrings' + i).text(result);
	}	
	}
}
}

// Arrows at the index.php

$(".rubrikcardindex").click(function(){
        $(this).find('.einfahren').css({"right": "15px", "opacity": "1"});
		console.log("geht");
})


// Rubriken in index.php change col on responsive sight

function responsiveRubrikenindex(o) {
    if (o.matches) { 
        $(".colrubriken").addClass("col-lg-4");
		$(".colrubriken").removeClass("col-lg-3");
    } else {
        $(".colrubriken").removeClass("col-lg-4");
		$(".colrubriken").addClass("col-lg-3");
    }
}


var o = window.matchMedia("(max-width: 1550px)");
responsiveRubrikenindex(o);
o.addListener(responsiveRubrikenindex);



