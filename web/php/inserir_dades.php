<?php 
	require_once "config.php";
	require_once "functions.php";
	//Inici de la sessio
	session_start();

	//Creació de les variables que s'utilitzaran per fer l'INSERT a la BBDD
	$matricula = $_SESSION['matricula'];
	$dia = $_SESSION['dia'];
	$hora = $_SESSION['hora'];
	$id = $_SESSION["id"];
	

	//Creació de les variables de sessió que s'utilitzaran per la confirmació de la cita + validació
	if (validateNom($_POST['nom_propietari']) && validateCognom($_POST['cognom_propietari']) && validateTlf($_POST['telefon']) && validateMail($_POST['email'])) {
		$_SESSION['nom'] = $_POST['nom_propietari'];
		$_SESSION['cognom'] = $_POST['cognom_propietari'];
		$_SESSION['tlf'] = $_POST['telefon'];
		$_SESSION['email'] = $_POST['email'];
	} else {
		$_SESSION['error'] = 0;
		header('Location: ../error.php');
	}

	//Creació de variables a partir de la seva variable de SESSION
	$tlf = $_SESSION['tlf'];
	$nom = $_SESSION['nom'];
	$cognom = $_SESSION['cognom'];
	$email = $_SESSION['email'];

	if($matricula==""){
	$_SESSION["fix_matricula"] = 1;
	header('Location: ../dades_client.php');
}
	// Create connection
	$conn = connect();
	// Check connection
	if ($conn->connect_error) {
    	$_SESSION['error'] = 1;
    	header('Location: ../error.php');
	} 

	// en cas de editar guarda la sessió
	$id = $_SESSION['id'];
	// en cas de crear la crea
	if (strcmp($_SESSION['accio'], "crear") == 0) {
		$id = time().''.$matricula;
	}

	//busca els carrils per aquell dia i hora
	$sql = "SELECT num_carril FROM Reserva WHERE dia='$dia' AND hora='$hora';";
	$result = getResult($conn, $sql);

	// si hi ha carrils mira quins i crea l'insert/update
	if ($result->num_rows > 0) {
		$row=$result->fetch_row();
		if ($row[0] == 1 || $row[1] == 1) {
			if (strcmp($_SESSION['accio'], "editar") == 0) {
				$sql = "UPDATE Reserva SET matricula='$matricula', dia='$dia', hora='$hora', num_carril=2, id_centre=1,tipus_vehicle='turismo', nom='$nom', cognom='$cognom', tlf='$tlf', mail='$email' WHERE id='$id';";
			} elseif (strcmp($_SESSION['accio'], "crear") == 0) {
				$sql = "INSERT INTO Reserva VALUES ('$id', '$matricula','$dia','$hora',2,1,'turismo','$nom','$cognom','$tlf','$email');";
			}
		} elseif ($row[0] == 2 || $row[1] == 2) {
			if (strcmp($_SESSION['accio'], "editar") == 0) {
				$sql = "UPDATE Reserva SET matricula='$matricula', dia='$dia', hora='$hora', num_carril=1, id_centre=1,tipus_vehicle='turismo', nom='$nom', cognom='$cognom', tlf='$tlf', mail='$email' WHERE id='$id';";
			} elseif (strcmp($_SESSION['accio'], "crear") == 0) {
				$sql = "INSERT INTO Reserva VALUES ('$id', '$matricula','$dia','$hora',1,1,'turismo','$nom','$cognom','$tlf','$email');";
			}
		}
	} else {
		if (strcmp($_SESSION['accio'], "editar") == 0) {
			$sql = "UPDATE Reserva SET matricula='$matricula', dia='$dia', hora='$hora', num_carril=1, id_centre=1,tipus_vehicle='turismo', nom='$nom', cognom='$cognom', tlf='$tlf', mail='$email' WHERE id='$id';";
		} elseif (strcmp($_SESSION['accio'], "crear") == 0) {
			$sql = "INSERT INTO Reserva VALUES ('$id', '$matricula','$dia','$hora',1,1,'turismo','$nom','$cognom','$tlf','$email');";
		}
	}

	if (getResult($conn, $sql) === TRUE) {
		close($conn);
		header('Location: ../confirmacio.php');
	} else {
		close($conn);
		$_SESSION['error'] = 1;
		header('Location: ../error.php');
	}

	close($conn);
?>