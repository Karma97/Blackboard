
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


function myFunction(x) {
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
myFunction(x);
x.addListener(myFunction);

