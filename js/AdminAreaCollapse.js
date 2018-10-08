

function collapseAll() {
	if ( $(".collapse").hasClass("show") ) {
		$(".collapse").collapse('hide');
		$(".iconCollapseAll").addClass("collapsedIcon");
	} else {
		$(".collapse").collapse('show');
		$(".iconCollapseAll").removeClass("collapsedIcon");
	}	
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