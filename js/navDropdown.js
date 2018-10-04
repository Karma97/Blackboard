
function showDropdown() {
    $('.dropdownContent').toggleClass("showDropdown");

	$("#ichange").toggleClass("fas fa-chevron-circle-right");
	$("#ichange").toggleClass("fas fa-chevron-circle-down");
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
