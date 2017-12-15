var Llista = (function(){
	var openningHour = 8;
	var closeingHour = 20;
	var select = "";
	var model = {
		init : function(array) {
			select = array;
		},
		getOpenningHour : function(){
			return openningHour;
		},
		getCloseingHour : function(){
			return closeingHour;
		},
		getSelect : function(){
			return select;
		}
	};
	var controller = {
		init : function(array){
			model.init(array);
			view.init();
		},
		getOpenningHour : function(){
			return model.getOpenningHour();
		},
		getCloseingHour : function(){
			return model.getCloseingHour();
		},
		getSelect : function(){
			return model.getSelect();
		}
	};
	var view = {
		init : function(){
			view.renderTable();
		},
		renderTable : function(){
			var str = "<tr><th>Hora</th><th>Carril</th><th>Matricula</th><th>Nom</th><th>Cognom</th><th>Tlf.</th><th>Email</th></tr>";
			var h = controller.getOpenningHour();
			var stopH = controller.getCloseingHour();
			var aux = 0;
			var carril = 1;
			var minute = "00";
			var i = 0;
			var array = controller.getSelect();
			console.log(array);
			while(stopH != h){
				str += "<tr hora='" + h + ":" + minute + ":00' carril='" + carril + "'>";
				str += "<td>"+ h + ":" + minute + "</td>";
				str += "<td>" + carril + "</td>";
				var horaActual = h + ":" + minute + ":00";
				if (i < array.length && array[i][0] == horaActual && array[i][1] == carril) {
					for (var j = 2; j < 7; j++) {
						str += "<td class='full'>" + array[i][j] + "</td>";
					}
					i++;
				} else {
					str += "<td class='free' colspan='5'>Lliure</td>";
				}
				str += "</tr>";
				if (carril == 1) {
					carril = 2;
				} else {
					carril = 1;
				}
				if (aux == 1) {
					minute = "30";
				}
				aux++;
				if (aux == 4) {
					minute = "00";
					h++;
					aux = 0;
				}
			}
			$("table").html(str);
		}
	};
	return {
		init : controller.init
	};
})();