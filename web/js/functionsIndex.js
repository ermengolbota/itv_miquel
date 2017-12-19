$(document).ready(function() {

//Evitar que l'usuari pugui tornar enrera, això evita que una vegada inserides les dades,
//L'usuari torni enrera i les posi de nou
/*initControls();
function initControls(){
window.location.hash="red";
window.location.hash="Red" //chrome
window.onhashchange=function(){window.location.hash="red";}
 }*/



//Focus just es carrega el document, dins matricula
	$("#matricula").focus();

//Iniciam la variable per detectar errors
var error=0;

//Focusout per sebre si la matricula esta be
//Si esta be no pinta res, sino pinta el fons vermell

	$('#matricula').on("focusout",function () {
		 var buit = document.getElementById("matricula").value;
		if (buit.length == 0) {

		}else{

//Patró per mirar si la matricula es correcte
var pattern = /^\d\d\d\d[BCDFGHJKLMNPRSTVWXYZ]{3}$/ ;

//Si no es correcte el patró, pinta el color de fons vermell i guarda una variable d'error = 1
if (!pattern.test($('#matricula').val().toUpperCase())) {

	error=1;

$('#matricula').css("background-color","#ff5050");

}

//Si esta bé posa la variable d'error a 0 i pinta el color de fons de blanc
else {
	error=0;
	$('#matricula').css("background-color","white");

}
}
});

//Evitar que l'usuari quan apreti INTRO, accepti la matricula posada
 $("#matricula").keypress(function(e) {
       if(e.which == 13) {
         var buit = document.getElementById("matricula").value;
		if (buit.length == 0) {

		}else{

//Patró per mirar si la matricula es correcte
var pattern = /^\d\d\d\d[BCDFGHJKLMNPRSTVWXYZ]{3}$/ ;

//Si no es correcte el patró, pinta el color de fons vermell i guarda una variable d'error = 1
if (!pattern.test($('#matricula').val())) {

	error=1;

$('#matricula').css("background-color","#ff5050");

}

//Si esta bé posa la variable d'error a 0 i pinta el color de fons de blanc
else {
	error=0;
	$('#matricula').css("background-color","white");
	 $('#frm').submit();

}
}
         
       }
    });

//Boto de submit
$("#submit").click(function(event){

	//Si la variable d'error esta a 1, mostra un alert
	if(error==1){
    event.preventDefault();
    alert("Corrige la matricula");
     }
 });

});