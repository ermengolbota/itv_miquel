var TableHora = (function() {
	var carrils = 2;

	var pad = function (str, max) {
 		str = str.toString();
  		return str.length < max ? pad("0" + str, max) : str;
	}

	var getHora = function() {
		$('table').on('click','.enabled',function(){
			var hora = $(this).html();
			console.log(hora);
			url = "./dades_client.php?hour=" + hora;
			window.location.replace(url);
		});
	}

	var isFull = function(array,h,m){
		var hora = h+":"+m+":"+pad(0,2);
		var cont = 0;

		for(i=0;i<array.length;i++){
			if(hora == array[i][0].toString()){
				cont ++;
			}
		}
		if(cont==carrils){
			return true;
		} else {
			return false;
		}
	}

	var creaTaula = function(array){

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
				var disable = isFull(array,h,m);
				console.log(disable);
				if(disable){
					str += "<td class='disabled'>"+h+":"+m+"</td>";
				} else {
					str += "<td class='enabled'>"+h+":"+m+"</td>";
				}
				h++;
				h = pad(h,2);
				hora++;
	 		} else {
				m = pad(0,2);
	 			var disable = isFull(array,h,m);
	 			console.log(disable);
				if(disable){
					str += "<td class='disabled'>"+h+":"+m+"</td>";
				} else {
					str += "<td class='enabled'>"+h+":"+m+"</td>";
				}
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
    $(".enabled").hover(function(){
        $(this).css("background-color", "#FF9B21");
        }, function(){
        $(this).css("background-color", "white");
    });
});