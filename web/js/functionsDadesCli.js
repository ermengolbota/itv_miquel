$(document).ready(function() {
$('#edit_matricula').hide();

$('#new_matricula').on("focusout",function () {
		 var buit = document.getElementById("new_matricula").value;
		if (buit.length == 0) {

		}else{

var pattern = /^[A-Z]{0,2}\d\d\d\d[A-Z]{2,3}$/ ;

if (!pattern.test($('#new_matricula').val())) {

	error=1;

$('#new_matricula').css("background-color","#ff5050");

}
else {
	error=0;
	$('#new_matricula').css("background-color","white");

}
}
});

$("#edit_refresh").click(function(event){
	if(error==1){
    event.preventDefault();
    alert("Corrige la matricula");
     }
 });

//Boto de submit
/*$("#submit").click(function(event){
	if(error==1){
    event.preventDefault();
    alert("Corrige la matricula");
     }
 });*/

$('#email').focusout(function () {
var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

if (!pattern.test($('#email').val())) {
	error=1;
$('#email').css("background-color","red");
}else
{
	$('#email').css("background-color","white");
	error=0;
}
});

$("#edit").click(function(){
$('#old_matricula').hide();
$('#edit_matricula').show(1000);

});

$("#submit").click(function(event){
	if(error==1){
    event.preventDefault();
    alert("HI HA ERRORS!");
}
});

});