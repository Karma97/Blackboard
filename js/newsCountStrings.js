
var anzahlNews = 3;
var i = 1;
var maxStringLaenge = 186;

for (i; i <= anzahlNews; i++) {
	
	var str = $('#countStrings' + i).html();	
	var result = str.slice(0, maxStringLaenge);
	
	if (str.length > maxStringLaenge) {
	
		var sliced = str.slice(0, maxStringLaenge);
		var result = sliced + "...";
		
		$('#countStrings' + i).text(result);
		
	} else {
		$('#countStrings' + i).text(result);
	}	
	
}

