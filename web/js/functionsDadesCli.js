$(document).ready(function() {
$('#edit_matricula').hide();


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