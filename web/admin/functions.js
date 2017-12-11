$(function(){
	var day = "YYYY-mm-dd";
	var openningHour = "08:00:00";
	var closeingHour = "20:00:00";
	var model = {
		init : function() {
			var date = new Date();
			var d = date.getDay();
			var m = date.getMonth()+1;
			var y = date.getFullYear();
			day = y + "-" + m + "-" + d;
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
		}
	};
	var controller = {
		init : function(){
			model.init();
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
		}
	};
	var view = {
		init : function(){
			view.renderTable();
		},
		renderTable : function(){
			var str = "";
			var h = controller.getOpenningHour();
			var stopH = controller.getCloseingHour();
			while(stopH != h){
				str += "<tr id='" + h + "'>";
				str += "<td>placeholder text</td>";
				str += "</tr>";
				if (h) {}
				h = ;
			}
			$("table").html(str);
		}
	};
	controller.init();
});