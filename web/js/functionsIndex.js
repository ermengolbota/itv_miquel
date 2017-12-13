$(document).ready(function() {

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
if (!pattern.test($('#matricula').val())) {

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

//Boto de submit
$("#submit").click(function(event){

	//Si la variable d'error esta a 1, mostra un alert
	if(error==1){
    event.preventDefault();
    alert("Corrige la matricula");
     }
 });

});