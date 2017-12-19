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
	};

	var beforeButtonMonth = function(year,month,day){
		var beforeMonth = month-1;
		var beforeYear = year;

		if(beforeMonth<1){
			beforeMonth = 12;
			beforeYear = year-1;
		}
		var nameMonth = getNameMonth(beforeMonth);

		// Dia d'avui
		var today = new Date();
		var todayM = today.getMonth()+1;
		var todayY = today.getFullYear();

		if (beforeMonth<=todayM && year <= todayY) {
			var str = '<button type="button" class="disabled"> « '+nameMonth+'</button>';
		} else {
			var str = '<button type="button" onClick="Calendar.changeMonth('+beforeYear+','+beforeMonth+','+day+')"> « '+nameMonth+'</button>';
		}
		return str;

	};

	var afterButtonMonth = function(year,month,day){
		var afterMonth = month+1;

		if(afterMonth>12){
			afterMonth = 1;
			year = year+1;
		}

		var nameMonth = getNameMonth(afterMonth);
		var y = year;

		var str = '<button type="button" onClick="Calendar.changeMonth('+y+','+afterMonth+','+day+')">'+nameMonth+' » </button>';
		return str;
	};

	var todayDay = function(){
		var d = new Date();
		return d;
	}

	var changeMonth = function(year,month,day){

		var d = todayDay();
		var m = d.getMonth()+1;
		var today = d.getDate();
		var y = d.getFullYear();
		var datos;

		if (month == m && y == year){
			datos = {
				dia : today,
				mes : month,
				any : year
			}
		} else {
			datos = {
				dia : 1,
				mes : month,
				any : year
			}
		}

		
		$('#calendari').html(Calendar.imprimir(datos));
		Calendar.getDataDay(datos);
	};

	var createTable = function(year,month,day){
		var tdy = todayDay();

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

		var str = '<h1 class="titleIndex">'+getNameMonth(month)+' '+year+'</h1>';
		
		str += '<table><thead><tr><th>DILL</th><th>DIMA</th><th>DIME</th><th>DIJO</th><th>DIVE</th><th>DISS</th><th>DIUM</th></tr></thead><tbody>';
		for(i=0;i<6;i++){
			str += '<tr>';
			for(j=0;j<7;j++){
				/* Afegeix els darrers dies del mes anterior */
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
				/* Avisa de que es alla on comenca el dia 1 del mes obtingut */
				if((day1==0 && j==6) || (day1==1 && j==0) || (day1==2 && j==1)
					|| (day1==3 && j==2) || (day1==4 && j==3) || (day1==5 && j==4)
					|| (day1==6 && j==5)){
					aux = true;
				}
				/* Pinta el dia d'avui
				if (aux && cont <= dm && tdy.getDate() == cont && tdy.getMonth()+1 == month && tdy.getFullYear() == year){
					str += '<td class="today nowMonth">'+cont+'</td>';
					cont++;
				}  */
				/* Si el dia que pinta es anterior al dia d'avui no el podra seleccionar*/
				if(aux && cont <= dm && cont<day){
					str += '<td class="disabled">'+cont+'</td>';
					cont++;getDataDay
				} 
				// Dies que l'usuari podra seleccionar
				else if(aux && cont <= dm && cont>=day){
					if(j==5||j==6){
						str += '<td class="disabled">'+cont+'</td>';
					} else {
						str += '<td class="nowMonth">'+cont+'</td>';
					}
					cont++;
				}
				/* Pinta els dies del mes seguent despres del obtingut */
				else if (cont > dm) {
					str += '<td class="disabled">'+cont2+'</td>';
					cont2++;
				} 
				/* Pinta els dies del mes anterior al principi */
				else {
					var bm = befm - days + 1;
					str += '<td class="disabled">'+bm+'</td>';
					days--;
				}	
			}
			str += '</tr>';
		}
		str += '</tbody></table>';
		return str;
	};


	var imprimir = function(datos) {

		// Obte el dia d'avui
		var day = datos.dia || 1;
		
		// Obte el mes d'avui
		var month = datos.mes || 1;
		
		// Obte l'any d'avui
		var year = datos.any || 2017;

		var str = createTable(year,month,day);

		str += '<div class="calButtons"><span class="left">'+beforeButtonMonth(year,month,day)+'</span> <span class="right">'+afterButtonMonth(year,month,day)+'</span></div><div class="clear"></div>';

		return str;
	};

	var getDataDay = function(datos){
		$('table').on('mouseover','.nowMonth',function(){
			$(this).css("background-color", "#FF9B21");
        });

        $('table').on('mouseout','.nowMonth', function(){
        	$(this).css("background-color", "white");
		});

		$('table').on('click','.nowMonth',function(){
			var day = $(this).html();
			var month = datos.mes || 1;
			var year = datos.any || 2017;
			url = "./hores.php?day=" + day + "&month=" + month + "&year=" + year;
			window.location.replace(url);
		});
	};

	return {
		imprimir : imprimir,
		changeMonth : changeMonth,
		getDataDay : getDataDay
	};
}());

$(document).ready(function(){
	$('table').on('hover','td',function(){
		$(this).css("background-color", "#FF9B21");
        }, function(){
        $(this).css("background-color", "white");
	});
});