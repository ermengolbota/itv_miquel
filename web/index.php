<!DOCTYPE html>

 <html class="">
 <link rel="stylesheet" href="css/myitvdesign.css">
 <link rel="stylesheet" href="lib/normalize.css">
 <link rel="stylesheet" href="lib/skeleton.css">
 <script src="lib/jquery.js"></script>
<script>
$(document).ready(function() {
	$("#matricula").focus();
var error=0;
	$('#matricula').focusout(function () {
var pattern = /^[A-Z]{0,2}\d\d\d\d[A-Z]{2,3}$/ ;
if (!pattern.test($('#matricula').val())) {
error=1;
$('#matricula').css("background-color","#ff5050");
}else
{
	$('#matricula').css("background-color","white");

}
});

$("#submit").click(function(event){
	if(error==1){
    event.preventDefault();
    alert("Corrige la matricula");
     }
 });

});
</script>
<meta charset="utf-8" />

<body>
	<form>
	<input type="button" value="Gestiona" onclick="window.location.href='gestio.php'"" />
</form>
	<h1>Benvingut a IAMotors</h1>
<form action="index.php" method="POST">
        Matricula:<input name="matricula" type="text" id="matricula" size="36" required="Tienes que rellenar este campo"><br />
        <input type="submit" id="submit" value="Enviar">
    </form>
<?php
$matricula = $_POST['matricula'];
    if (isset($matricula))
    {
    		
    if ($matricula == "")
        echo "<p style='color: red'>Tienes que rellenar la matricula";
     }
?>
</body>
</html>