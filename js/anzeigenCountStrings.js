console.log("ich");

var elementcount = getElementsByTagName("*");
var anzahlTDS = elementcount.getElementsByTagName("td").length;
var i = 1;
var maxStringLaenge2 = 5;

for (i; i <= anzahlTDS; i++) {
	
	var str2 = $('td#beschreibungTD' + i + ' .changehide').html();	
	var result2 = str2.slice(0, maxStringLaenge2);
	90
	if (str.length > maxStringLaenge2) {
	
		var sliced2 = str2.slice(0, maxStringLaenge2);
		var result2 = sliced2 + "...";
		
		$('#beschreibungTD' + i + ' .changehide').text(result2);
		
	} else {
		$('#beschreibungTD' + i + ' .changehide').text(result2);
	}	
	
}
