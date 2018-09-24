
function Ix(id, remove) {
    $(id).addClass('fa-caret-up');
	$(id).removeClass(remove);
}

function Iarrow(id, remove) {
    $(id).removeClass('fa-caret-up');  
	$(id).addClass(remove);
}