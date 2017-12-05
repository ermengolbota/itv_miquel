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

var pattern = /^[A-Z]{0,2}\d\d\d\d[A-Z]{2,3}$/ ;

if (!pattern.test($('#matricula').val())) {

	error=1;

$('#matricula').css("background-color","#ff5050");

}
else {
	error=0;
	$('#matricula').css("background-color","white");

}
}
});

//Boto de submit
$("#submit").click(function(event){
	if(error==1){
    event.preventDefault();
    alert("Corrige la matricula");
     }
 });

});