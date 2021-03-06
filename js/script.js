// set links

// bsp.: /Blackboard
var vorwahlLinks = "/Blackboard";

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
	

	
$("#labelimage").html("Bilder hochladen");
	
$(function () {
    $("#files").change(function () {
		var k = 1;
	
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#imagepreview_images");
			$("#imagepreview").removeClass("d-none");
			
            dvPreview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
			
			$("#labelimage").html("Bilder hochladen");
			
            $($(this)[0].files).each(function () { 	
			
				$("#labelimage").removeClass("text-danger");
			
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
					if (k > 10) {
						$("#labelimage").addClass("text-danger");
						$("#labelimage").html("Bitte max. 10 auswählen!");
						return false;
					} else {
                        var img = $("<img />");
                        img.attr("style", "height:100px;");
                        img.attr("src", e.target.result);
						img.attr("class", "w75 rounded ml-2 mr-2 mb-2 mt-2");
						img.attr("title", file[0].name);
                        dvPreview.append(img);	
						
						if (k == 1) {
							$("#labelimage").html(k + " Bild wurde ausgewählt!");
						} else if (k > 1) {
							$("#labelimage").html(k + " Bilder wurden ausgewählt!");
						} else {
							$("#labelimage").html("Bilder hochladen");
						}
						
					}
						
						k++;
						
                    }
					reader.readAsDataURL(file[0]);
					
				} else { 
				
					$("#labelimage").html("Bilder hochladen");
					dvPreview.html("");
					return false;
						
					}
               
            });
        } else {
		
        }	
    });
});  

// bilder vorschau bei newsadd
	
$("#labelimage").html("Bilder hochladen");
	
$(function () {
    $("#newsfiles").change(function () {
		var k = 1;
	
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#imagepreview_images");
			$("#imagepreview").removeClass("d-none");
            dvPreview.html("");
			
			$("#labelimage").html("Bilder hochladen");
			
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function () { 	
			
				$("#labelimage").removeClass("text-danger");
			
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
					if (k > 10) {
						$("#labelimage").addClass("text-danger");
						$("#labelimage").html("Bitte max. 10 auswählen!");
						return false;
					} else {
                        var img = $("<img />");
                        img.attr("style", "height:100px;");
                        img.attr("src", e.target.result);
						img.attr("class", "w75 rounded ml-2 mr-2 mb-2 mt-2");
						img.attr("title", file[0].name);
                        dvPreview.append(img);	
						
						if (k == 1) {
							$("#labelimage").html(k + " Bild wurde ausgewählt!");
						} else if (k > 1) {
							$("#labelimage").html(k + " Bilder wurden ausgewählt!");
						} else {
							$("#labelimage").html("Bilder hochladen");
						}
						
					}
						
						k++;
						
                    }
					reader.readAsDataURL(file[0]);
					
				} else { 
				
					$("#labelimage").html("Bilder hochladen");
					dvPreview.html("");
					return false;
						
					}
               
            });
        } else {
		
        }	
    });
});  

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

if ($(".rubrikcardindex")) {
$(".rubrikcardindex").click(function(){
        $(this).find('.einfahren').css({"right": "15px", "opacity": "1"});
		$(this).css({"border-size": "1px", "border-style": "solid", "border-color": "#dee2e6",})
});
}

// Rubriken in index.php change col on responsive sight

if ($(".colrubriken")) {
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
}

// change nav on scroll 

if ($('#scrollnav')) {
$(document).ready(function(){
  var scrollTop = 0;
  $(window).scroll(function(){
    scrollTop = $(window).scrollTop();
    
    if (scrollTop >= 28) {
      $('#scrollnav').addClass('scrolled');
	  $('.main').css({"padding-top": "0em"});
    }
	if (scrollTop < 28 || scrollTop == 0) {
      $('#scrollnav').removeClass('scrolled');
	  $('.main').css({"padding-top": "0em"});
    } 
    
  }); 
  
});
}

// When the user scrolls the page, execute scrollIndicator 
if (document.getElementById("scrollNavbarIndicator")) {
window.onscroll = function() {scrollIndicator()};

function scrollIndicator() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("scrollNavbarIndicator").style.width = scrolled + "%";
}
}


// move CSS 'active' class in the navigation

$(function () {
	
function setNavigation() {
    var path = window.location.pathname;
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);
	
	if (vorwahlLinks  == path) {
		
		$(".startseite").addClass("navactive");
		
	} else {
	
	$(".navigationsleiste .navitems").each(function() {
		var aElemente = $(this).attr("href");
		var ausgabe = aElemente.replace(/./, "");
								
		if ("" + vorwahlLinks + "" + ausgabe + "" == path) {
		
			$(this).addClass("navactive");
			
		} else {
		
			var ausgabe2 = ausgabe.replace(/./, "");
			
			if ("" + vorwahlLinks + "" + ausgabe2 + "" == path) {
			
				$(this).addClass("navactive");
				
			} 
		}	
	});
	};
};

    setNavigation();
	
});




// Star changer for the "Bewertung"

if ($("#bewertung")) {
	
	var anzahlSterne = 5;
	
	function bewertungSterne(zahl) {
		
		for (var i = 1; i <= zahl; i++) {
				
		var element = $("#bewertung" + i);
		element.css("color", "red");				
		
		if (zahl < anzahlSterne) {
			for (var e = zahl; e <= anzahlSterne; e++) {
			var element = $("#bewertung" + e);
				element.css("color", "black");
				
			var element = $("#bewertung" + zahl);
				element.css("color", "red");
			}
		}		
		
		}
		
		$("#bewertung").attr("value", zahl);
		
	};

}


// multiple items in carousel

$('#recipeCarousel').carousel({
	interval: 10000
})

$('.carousel .carousel-item3').each(function(){
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
    }
    else {
      $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
    }
});

// Login und Register Password hide and show 

function showHidePassword(element, ielement) {
	
	if ($(ielement).hasClass("fa-eye")) {		
		$(ielement).addClass("fa-eye-slash");
		$(ielement).removeClass("fa-eye");
	} else {
		$(ielement).addClass("fa-eye");
		$(ielement).removeClass("fa-eye-slash");
	}
	
	if ($(element).attr("type") == "password") {
	
		$(element).attr("type", "text");
		
	} else {
		
		$(element).attr("type", "password");
		
	}
	
}


// Scroll smooth to top

$(document).ready(function(){
  $("a.scrollbutton").on('click', function(event) {

    if (this.hash !== "") {
      event.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
      });	
    }	
  });
});












