

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

function myFunction22(x) {
    if (x.matches) { 
       
		$(".collapse").removeClass("show");
		
    } else {

		$(".collapse").addClass("show");
		
    }
}

var x = window.matchMedia("(max-width: 700px)");
myFunction22(x);
x.addListener(myFunction22);