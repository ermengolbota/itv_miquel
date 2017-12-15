<?php
	session_start();
	if ($_POST) {
		// si s'arriba a la pàg amb el comportament predeterminat, converteix les dades a la sessió i redirecciona al calendari
		$_SESSION["dia"] = $_POST["dia"];
		$_SESSION["hora"] = $_POST["hora"];
		$_SESSION["nom"] = $_POST["nom"];
		$_SESSION["cognom"] = $_POST["cognom"];
		$_SESSION["tlf"] = $_POST["tlf"];
		$_SESSION["email"] = $_POST["email"];
		$_SESSION["id"] = $_POST["id"];
		$_SESSION['accio'] = "editar";
		header('Location: ../calendari.php');
	} else {
		// si no s'arriba a la pàg amb el comportament predeterminat, redirecciona a l'index
		header('Location: ../');
	}
?>