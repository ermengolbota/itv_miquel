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
<<<<<<< HEAD
    <div class="header"><?php include "header.php" ?></div>
	<form>
	<input type="button" value="Gestiona" onclick="window.location.href='gestio.php'"" />
</form>
=======
>>>>>>> 1e885e6b1dbafe1191252c4a8fe133ff521fa738
	<h1>Benvingut a IAMotors</h1>
<form action="php/index_comprova.php" method="POST">
        Matricula:<input name="matricula" type="text" id="matricula" size="36" required="Tienes que rellenar este campo"><br />
        <input type="submit" id="submit" value="Enviar">
    </form>
<?php
<<<<<<< HEAD
$matricula = $_POST['matricula'];
    if (isset($matricula))
    {
    		
    if ($matricula == "")
        echo "<p style='color: red'>Tienes que rellenar la matricula";
     }
?>
<div id="footer"><?php include "footer.php" ?></div>
=======



     ?>

>>>>>>> 1e885e6b1dbafe1191252c4a8fe133ff521fa738
</body>
</html>