<!DOCTYPE html>

 <html>
 <head>
 <link rel="stylesheet" href="lib/normalize.css">
 <link rel="stylesheet" href="lib/skeleton.css">
 <link rel="stylesheet" href="css/myitvdesign.css">
 <script src="lib/jquery.js"></script>
 <script src="js/functionsIndex.js"></script>
<meta charset="utf-8" />
</head>
<script type="text/javascript">
$(document).ready(function(){ 
initControls();
});

//Codi per no permetre tornar enrera (així s'evita dues insercions a la BBDD)
function initControls(){
window.location.hash="red";
window.location.hash="Red" //chrome
window.onhashchange=function(){window.location.hash="red";}
}
</script>
<body>
	<?php
	//Inici de la sessió
    session_start();
    //Es guarda la matricula en una variable
    $matricula = $_POST['matricula'];
    $_SESSION['block'] = 0;
?>
<div class="container">
<div class="row">
    <div class="twelve columns">
        <?php include "header.php" ?>
    	<h1 class="titleIndex">Benvingut a IAMotors</h1>

    	<!-- Formulari per inserir la matricula i mirar si existeix a la BBDD-->
        <form action="php/index_comprova.php" method="POST">
            <label class="form">Matricula: <input name="matricula" type="text" id="matricula" size="36" required="Tienes que rellenar este campo"></label>
            <input type="submit" id="submit" value="Enviar">
        </form>
        <?php include "footer.php" ?>
    </div>
</div>
</div>
</body>
</html>