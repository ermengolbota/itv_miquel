var Calendar = (function() {

	var daysMonth = function(month, year){
		return new Date(year,month,0).getDate();
	};

	var get1stDay = function(month, year){
		return new Date(year,month-1,1).getDay();
	};

	var getNameMonth = function(month){
		var array = ["Gener", "Febrer", "Març", "Abril", "Maig", "Juny", "Juliol", "Agost", "Setembre", "Octubre", "Novembre", "Desembre"];
		return array[month-1];
	}

	var beforeButtonMonth = function(year,month,day){
		var beforeMonth = month-1;

		if(beforeMonth<1){
			beforeMonth = 12;
			y = year-1;
		}
		var nameMonth = getNameMonth(beforeMonth);
		var y = year;

		var str = '<button type="button" onClick="Calendar.changeMonth('+y+','+beforeMonth+','+day+')"> « '+nameMonth+'</button>';
		return str;

	}

	var afterButtonMonth = function(year,month,day){
		var afterMonth = month+1;

		if(afterMonth>12){
			afterMonth = 1;
			y = year+1;
		}

		var nameMonth = getNameMonth(afterMonth);
		var y = year;

		var str = '<button type="button" onClick="Calendar.changeMonth('+y+','+afterMonth+','+day+')">'+nameMonth+' » </button>';
		return str;
	}

	var changeMonth = function(year,month,day){

		var datos = {
			dia : 1,
			mes : month,
			any : year
		}

		$('#calendari').html(Calendar.imprimir(datos));
	}

	var createTable = function(year,month,day){
		
		// Contador que s'utilitza per pintar els dies
		var cont = 1;

		// Contador que s'utilitza per pintar els dies del mes següent
		var cont2 = 1;

		// Auxiliar que serveix per saber quan comencar a escriure
		var aux = false;

		// Crida a la funcio get1stday per obtenir el nombre del dia de la setmana del mes
		var day1 = get1stDay(month, year);

		// Crida a la funcio daysmonth per saber quants dies te el aquest mes
		var dm = daysMonth(month, year);

		// Demana els dies del mes anterior al seleccionat
		var befm = daysMonth(month-1, year);

		var days = 0;

		var str = '<h1>'+getNameMonth(month)+'</h1>';
		
		str += '<table><thead><tr><th>DILL</th><th>DIMA</th><th>DIME</th><th>DIJ</th><th>DIV</th><th>DIS</th><th>DIU</th></tr></thead>';
		for(i=0;i<6;i++){
			str += '<tr>';
			for(j=0;j<7;j++){
				if(i==0 && j==0){
					for(k=0;k<7;k++){
						if((day1==0 && k==6) || (day1==1 && k==0) || (day1==2 && k==1)
						|| (day1==3 && k==2) || (day1==4 && k==3) || (day1==5 && k==4)
						|| (day1==6 && k==5)){
							break;
						}
						days++;
					}
				}
				
				if((day1==0 && j==6) || (day1==1 && j==0) || (day1==2 && j==1)
					|| (day1==3 && j==2) || (day1==4 && j==3) || (day1==5 && j==4)
					|| (day1==6 && j==5)){
					aux = true;
				}

				if (aux && cont <= dm && day == cont){
					str += '<td>'+cont+'</td>';
					cont++;
				} else if(aux && cont <= dm){
					str += '<td>'+cont+'</td>';
					cont++;
				} else if (cont > dm) {
					str += '<td>'+cont2+'</td>';
					cont2++;
				} else {
					var bm = befm - days + 1;
					str += '<td>'+bm+'</td>';
					days--;
				}	
			}
			str += '</tr>';
		}
		str += '</table>';
		return str;
	}


	var imprimir = function(datos) {

		// Obte el dia d'avui
		var day = datos.dia || 1;
		
		// Obte el mes d'avui
		var month = datos.mes || 1;
		
		// Obte el mes d'avui
		var year = datos.any || 2017;

		var str = createTable(year,month,day);

		str += '<div style="width: 100%"><span style="float:left">'+beforeButtonMonth(year,month)+'</span> <span style="float:right">'+afterButtonMonth(year,month)+'</span></div>';

		return str;
	};

	return {
		imprimir : imprimir,
		changeMonth : changeMonth
	};
}());