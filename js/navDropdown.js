
function Ix(id, remove) {
    $(id).addClass('fa-caret-down');
	$(id).removeClass(remove);
}

function Iarrow(id, remove) {
    $(id).removeClass('fa-caret-down');  
	$(id).addClass(remove);
}