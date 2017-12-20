<?php

/**
 * Si la ID cumpleix els requisits retorna 0, sino 1
 * @param  Validar matricula
 * @return integer
 */
	function validateID(&$string) {
		if (!empty($string) && is_string($string) && strlen($string)==17) {
			// si la id cumpleix els requeriments, la edita per evitar atacs XSS i retorn 0
			htmlspecialchars(stripcslashes(trim($string)));
			return 0;
		}
		// si la id no compleix d'alguna manera els requeriments no fa res i retorna 1
		return 1;
	}

	/**
	 * 
	 * Crea la Query SQL per esborrar la matricula
	 * @param  id matricula
	 * @return SQL Delete Query
	 */
	function createSQL($id) {
		// retorna la consulta SQL per la eliminar la cita
		return "DELETE FROM Reserva WHERE id LIKE '$id';";
	}
	/**
	 * Agafa el resultat de la Query SQL
	 * @param  SQL connection
	 * @param  SQL Query
	 * @return SQL Query result
	 */
	function getResult($conn, $sql) {
		// retorna el resultat de la consulta
		return $conn->query($sql);
	}
?>