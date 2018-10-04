
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