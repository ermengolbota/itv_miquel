var Llista = (function(){
	var day = "YYYY-mm-dd";
	var openningHour = 8;
	var closeingHour = 20;
	var select = "";
	var model = {
		init : function(array) {
			/*var date = new Date();
			var d = date.getDay();
			var m = date.getMonth()+1;
			var y = date.getFullYear();
			day = y + "-" + m + "-" + d;*/
			select = array;
			//day = dia;
		},
		setDay : function(newDay){
			day = newDay;
		},
		getDay : function(){
			return day;
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
		setDay : function(newDay){
			model.setDay(newDay);
		},
		getDay : function(){
			return model.getDay();
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
			var array = controller.getSelect();
			console.log(array[0][0]);
			while(stopH != h){
				str += "<tr hora='" + h + ":" + minute + ":00' carril='" + carril + "'>";
				str += "<td>"+ h + ":" + minute + "</td>";
				str += "<td>" + carril + "</td>";
				for (var i = 0; i < array.length; i++) {
					var horaActual = h + ":" + minute + ":00";
					if (array[i][0] == horaActual && array[i][1] == carril) {
						for (var j = 3; i < array[i].length; i++) {
							str += "<td>" + array[i][j] + "</td>";
						}
					} else {
						str += "<td colspan='5'>placeholder text</td>";
					}
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
	//controller.init();
	return {
		init : controller.init
	};
})();