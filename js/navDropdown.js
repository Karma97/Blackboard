
function Ix(id, remove) {
    $(id).addClass('fa-times');
	$(id).removeClass(remove);
}

function Iarrow(id, remove) {
    $(id).removeClass('fa-times');  
	$(id).addClass(remove);
}