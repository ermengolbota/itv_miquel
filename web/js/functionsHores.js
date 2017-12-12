var TableHora = (function() {

	var pad = function (str, max) {
 		str = str.toString();
  		return str.length < max ? pad("0" + str, max) : str;
	}

	var getHora = function() {
		$('table').on('click','td',function(){
			var hora = $(this).html();
			console.log(hora);
			url = "./dades_client.php?hour=" + hora;
			window.location.replace(url);
		});
	}
	
		


	

	var creaTaula = function(){

		var str = "<table>";
		// comptador de tds que hi haurà a la taula
		var hora = 0;
		// hora que serà de 08 a 19
		var h = pad(8,2)
		// minuts que seràn o 00 o 30
		var m = pad(0,2);
		//la quantitat de hores escrites en la taula
		var hores = 24;
		var i,j;
 		while(hora<hores){
 			for(i=0;i<4;i++){
	 		str += "<tr>";
	 		for(j=0;j<6;j++){
	 		if(hora%2 != 0){
				m = 30;
				str += "<td>"+h+":"+m+"</td>";
				h++;
				h = pad(h,2);
				hora++;
	 		} else {
				m = pad(0,2);
	 			str += "<td>"+h+":"+m+"</td>";
	 			hora++;
	 		}
	 	}
	 		str += "</tr>";
	 	}
	 }
	 	str += "</table>";
	 

	 	return str;
	};

	return {
		crea : creaTaula,
		hora : getHora
	};

}());

$(document).ready(function(){
    $("td").hover(function(){
        $(this).css("background-color", "#FF9B21");
        }, function(){
        $(this).css("background-color", "white");
    });
});