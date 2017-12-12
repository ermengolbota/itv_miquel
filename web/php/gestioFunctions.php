<?php
	function validateMatricula(&$string) {
		if (!empty($string) && is_string($string) && strlen($string)==7) {
			// si la matricula cumpleix els requeriments, la edita per evitar atacs XSS i retorn 0
			htmlspecialchars(stripcslashes(trim($string)));
			return 0;
		}
		// si la matricula no compleix d'alguna manera els requeriments no fa res i retorna 1
		return 1;
	}

	function createSQL($matricula) {
		// retorna la consulta SQL per la matricula
		return "SELECT matricula, dia, hora, nom, cognom, tlf, mail, id FROM Reserva WHERE matricula LIKE '$matricula';";
	}
	
	function getResult($conn, $sql) {
		// retorna el resultat de la consulta
		return $conn->query($sql);
	}
?>