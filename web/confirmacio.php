
<html>
<head>
	<meta charset="utf-8" />
	<!-- normalize css start -->
	<link rel="stylesheet" href="lib/normalize.css">
	<link rel="stylesheet" href="lib/skeleton.css">
	<!-- normalize css end -->
	<link rel="stylesheet" href="css/myitvdesign.css">
</head>
 <?php include "header.php" ?>

<h2>Se ha confirmado su cita</h2>
<?php 
session_start();

/*Si la variable de sessió dia existeix, guarda el dia, mes i any 
	(serveix per mostrar la data correctament)*/
if($_SESSION['dia']){
            $date = $_SESSION['dia'];
            $day = substr($date,8,9);
            $month = substr($date,5,-3);
            $year = substr($date,0,4);
          }

    //Mostra les dades de la cita
	echo "Dia de la cita: ".$day."/".$month."/".$year;
	echo "</br>Hora de la cita: ".$_SESSION['hour'];
	echo "</br>Matricula del vehiculo: ".$_SESSION['matricula'];
	echo "</br>Nombre del propietario: ".$_SESSION['nom_propietari'];
	echo "</br>Apellido del propietario: ".$_SESSION['cognom_propietari'];
	echo "</br>Telefono de contacto: ".$_SESSION['telefon'];
	echo "</br>Correo de contacto: ".$_SESSION['email'];


	?>
<body>
	<br>
	<br>
	<input type="button" onclick="location.href='index.php';" value="Volver" />




</body>
<?php include "footer.php" ?>
</html>