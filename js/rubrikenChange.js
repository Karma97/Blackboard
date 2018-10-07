
$(".changeinputshow").addClass("d-none");

function toggleBearbeitenModus() {
	$(".changeinputshow").toggleClass("d-none");
	$("#submitRubrikChanges").toggleClass("d-none");
	$(".changehide").toggleClass("d-none");
	
	var x = $("#activateRubrikChanges");
		if (x.text() === "Bearbeitungsmodus") {
			x.text("Beenden");
			x.toggleClass("btn-danger")
			x.toggleClass("btn-dark")
		} else {
			x.text("Bearbeitungsmodus");
			x.toggleClass("btn-danger")
			x.toggleClass("btn-dark")
		}
}