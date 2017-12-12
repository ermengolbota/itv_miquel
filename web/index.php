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
<body>
	<?php
    session_start();
    $matricula = $_POST['matricula'];
    $_SESSION['block'] = 0;
        if (isset($matricula)){
            if ($matricula == "")
                echo "<p style='color: red'>Tienes que rellenar la matricula";
        }
?>
<div class="row">
    <div class="two columns"><p></p></div>
    <div class="eight columns">
        <?php include "header.php" ?>
    	<h1 class="titleIndex">Benvingut a IAMotors</h1>
        <form action="php/index_comprova.php" method="POST">
            <label class="form">Matricula: <input name="matricula" type="text" id="matricula" size="36" required="Tienes que rellenar este campo"></label>
            <input type="submit" id="submit" value="Enviar">
        </form>
        <?php include "footer.php" ?>
    </div>
    <div class="two columns"></div>

</div>

</body>
</html>