$(document).ready(function() {

	//Amaga el camp per editar la matricula
$('#edit_matricula').hide();

//si a l'ID new_matricula es fa un focus out
$('#new_matricula').on("focusout",function () {
		 var buit = document.getElementById("new_matricula").value;

		 //si està buit no fa res
		if (buit.length == 0) {

		//Si hi ha algun valor comprova el patró
		}else{

var pattern = /^\d\d\d\d[BCDFGHJKLMNPRSTVWXYZ]{3}$/ ;

//Si el patro no es correcte posa una variable d'error a 1 i pinta el fons vermell
if (!pattern.test($('#new_matricula').val())) {

	error=1;

$('#new_matricula').css("background-color","#ff5050");

}

//Si la matricula està bé posa la variable d'error a 0 i pinta el fons blanc
else {
	error=0;
	$('#new_matricula').css("background-color","white");

}
}
});

//Si clicka el boto per editar i hi ha un error, surt un alert
$("#edit_refresh").click(function(event){
	if(error==1){
    event.preventDefault();
    alert("Corrige la matricula");
     }
 });

//Quan clicka el boto per editar amaga l'ID old_matricula i mostra l'ID edit_matricula
$("#edit").click(function(){
$('#old_matricula').hide();
$('#edit_matricula').show(1000);

});

//Boto submit, si hi ha un error surt un alert
$("#submit").click(function(event){
	if(error==1){
    event.preventDefault();
    alert("HI HA ERRORS!");
}
});

});