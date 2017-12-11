var TableHora = (function() {

	var pad = function (str, max) {
 		str = str.toString();
  		return str.length < max ? pad("0" + str, max) : str;
	}

	var getHora = function() {
		$('table').on('click','td',function(){
			var hora = $(this).html();
			console.log(hora);
		});
	}

	var creaTaula = function(){
		var str = "<table>";
		// comptador de tds que hi haurà a la taula
		var hora = 0;
		// hora que serà de 8 a 19
		var h = 8;
		// minuts que seràn o 00 o 30
		var m = pad(0,2);
		//la quantitat de hores escrites en la taula
		var hores = 24;

 		while(hora<hores){
	 		str += "<tr>";
	 		if(hora%2 != 0){
				m = 30;
				str += "<td>"+h+":"+m+"</td>";
				h++;
				hora++;
	 		} else {
				m = pad(0,2);
	 			str += "<td>"+h+":"+m+"</td>";
	 			hora++;
	 		}
	 		str += "</tr>";
	 	}
	 	str += "</table>";

	 	return str;
	};

	return {
		crea : creaTaula,
		hora : getHora
	};

}());