<!DOCTYPE html>

 <html class="">
 <head>
 <link rel="stylesheet" href="css/myitvdesign.css">
 <link rel="stylesheet" href="lib/normalize.css">
 <link rel="stylesheet" href="lib/skeleton.css">
 <script src="lib/jquery.js"></script>
 <script src="js/functionsIndex.js"></script>
<meta charset="utf-8" />
</head>
<body>
	<?php
session_start();
$matricula = $_POST['matricula'];
    if (isset($matricula))
    {
    		
    if ($matricula == "")
        echo "<p style='color: red'>Tienes que rellenar la matricula";
     }
?>
    <?php include "header.php" ?>
	<h1>Benvingut a IAMotors</h1>
<form action="php/index_comprova.php" method="POST">
        Matricula:<input name="matricula" type="text" id="matricula" size="36" required="Tienes que rellenar este campo"><br />
        <input type="submit" id="submit" value="Enviar">
    </form>

<div id="footer"><?php include "footer.php" ?></div>


</body>
</html>