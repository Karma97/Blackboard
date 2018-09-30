	
function dateiauswahl(evt) {
    var dateien = evt.target.files;
	
       for (var i = 0, f; f = dateien[i]; i++) {

      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      reader.onload = (function(theFile) {
        return function(e) {
	  
          var vorschau1 = document.createElement('img');
		  vorschau1.className = 'vorschau hoverable rounded d-inline-block mb-5 ml-2 mr-2 mt-2';

		  vorschau1.src   = e.target.result;
		  vorschau1.title = theFile.name;
          document.getElementById('list').insertBefore(vorschau1, null);
        };
		})(f);

      reader.readAsDataURL(f);
    }
	
	var vorschau2 = document.createElement('label');
	vorschau2.className = 'custom-file-label';
	vorschau2.innerHTML = "Ihre Bilder:";
    document.getElementById('list').insertBefore(vorschau2, null);
	
  }

  document.getElementById('files').addEventListener('change', dateiauswahl, false);