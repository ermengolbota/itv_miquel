<?php
	session_start();
	if ($_POST) {
		$_SESSION["dia"] = $_POST["dia"];
		$_SESSION["hora"] = $_POST["dia"];
		$_SESSION["nom"] = $_POST["dia"];
		$_SESSION["cognom"] = $_POST["dia"];
		$_SESSION["tlf"] = $_POST["dia"];
		$_SESSION["email"] = $_POST["email"];
		$_SESSION["id"] = $_POST["id"];
		header('Location: ../calendari.php');
	} else {
		header('Location: ../');
	}
?>