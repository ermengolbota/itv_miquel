
<html>
<head>
	<meta charset="utf-8" />
	<!-- normalize css start -->
	<link rel="stylesheet" href="lib/normalize.css">
	<link rel="stylesheet" href="lib/skeleton.css">
	<!-- normalize css end -->
	<link rel="stylesheet" href="css/myitvdesign.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="twelve columns">
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
				echo "<p class='dataCita'><strong>Dia de la cita:</strong> ".$day."/".$month."/".$year;
				echo "</br><strong>Hora de la cita:</strong> ".$_SESSION['hour'];
				echo "</br><strong>Matricula del vehiculo:</strong> ".$_SESSION['matricula'];
				echo "</br><strong>Nombre del propietario:</strong> ".$_SESSION['nom_propietari'];
				echo "</br><strong>Apellido del propietario:</strong> ".$_SESSION['cognom_propietari'];
				echo "</br><strong>Telefono de contacto:</strong> ".$_SESSION['telefon'];
				echo "</br><strong>Correo de contacto:</strong> ".$_SESSION['email']."</p>";

				?>
				<input type="button" onclick="location.href='index.php';" value="Volver" />
				<?php include "footer.php" ?>
			</div>
		</div>
	</div>
</body>
</html>