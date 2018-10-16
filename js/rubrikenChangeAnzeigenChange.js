
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

function toggleBearbeitenModusAZI() {
	
	if ($(".changeinputshow2").hasClass("d-none")) {
		$(".changeinputshow2").removeClass("d-none");
		$(".input2").addClass("d-inline");
		$(".changeTrigger").text("Bearbeitung beenden");
		$(".changeTrigger").addClass("text-danger");
	} else {
		$(".changeinputshow2").addClass("d-none");
		$(".changeTrigger").text("Meine Anzeigen bearbeiten");
		$(".changeTrigger").removeClass("text-danger");
	}
	
	if ($(".changehide").hasClass("d-none")) {
		$(".changehide").removeClass("d-none");
		$(".changehide").addClass("d-inline");
	} else {
		$(".changehide").addClass("d-none");
		$(".changehide").removeClass("d-inline");
	}
	
}















