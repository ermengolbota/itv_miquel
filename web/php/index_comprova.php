<?php
	session_start();
	require_once 'config.php';
	require_once 'functions.php';

	// Create connection
	$conn = connect();
	// Check connection
	if ($conn->connect_error) {
		$_SESSION['error'] = 1;
		header('Location: ../error.php');
	} 

	//Es guarda la matricula passada per POST
	$matricula = strtoupper($_POST['matricula']);

	//Es guarda una variable de sessió de la matricula (servirà per passar la matricula entre els fitxers)
	$_SESSION['matricula']= $matricula;


	//Consulta que se li fa a la BBDD
	$q = "SELECT matricula FROM Reserva WHERE matricula = '$matricula' AND dia > CURDATE() OR matricula = '$matricula' AND dia = CURDATE() AND hora > CURTIME();";

	//Variable on es guarda la consulta
	$result = getResult($conn, $q);

	//Si la matricula existeix redirecciona a gestio.php, sino a calendari.php per crear la cita
	if ($result->num_rows > 0) {
		close($conn);
		header("Location: ../gestio.php");
	} else {
		close($conn);
		$_SESSION['accio'] = "crear";
		header("Location: ../calendari.php");
	}

	//Tanquem la connexio amb la BBDD
	close($conn);
?>