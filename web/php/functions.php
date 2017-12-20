<?php
	// funcions comunes que s'empren en varies pags.
	
	/**
	 * 
	 * Retorna la data en format dd/mm/aaaa
	 * @param  date
	 * @return Europe date view
	 */
	function humanDate($date) {
		// converteix la data de format Y-m-d a d/m/Y
		$dia = substr($date, 8, 9) . "/";
		$dia .= substr($date, 5, -3) . "/";
		$dia .= substr($date, 0, 4);
		return $dia;
	}

	/**
	 * 
	 * Agafa el resultat de la Query SQL
	 * @param  SQL connection
	 * @param  SQL Query
	 * @return Result SQL Query
	 */
	function getResult($conn, $sql) {
		// retorna el resultat de la consulta
		return $conn->query($sql);
	}

	/**
	 * Valida la hora pasada per parametre
	 * @param  date
	 * @return int
	 */
	function validateHour($hour){
		 
		$true = 0;
		$h = substr($hour, 0, 2);
		$min = substr($hour, 3, 2);
		for($i=8;$i<20;$i++){
			if($h == $i){
				if($min == 00 || $min == 30){
					$true = 1;
				}
			}
		}
		return $true;

	}	

	

	function validateNom(&$string) {
		if (!empty($string) && is_string($string) && strlen($string)<=20) {
			htmlspecialchars(stripcslashes(trim($string)));
			return true;
		}
		return false;
	}

	function validateCognom(&$string) {
		if (!empty($string) && is_string($string) && strlen($string)<=50) {
			htmlspecialchars(stripcslashes(trim($string)));
			return true;
		}
		return false;
	}

	function validateTlf(&$string) {
		if (!empty($string) && preg_match("/^[0-9]{9}$/", $string) && strlen($string)==9) {
			htmlspecialchars(stripcslashes(trim($string)));
			return true;
		}
		return false;
	}

	function validateMail(&$string) {
		if (!empty($string) && filter_var($string, FILTER_VALIDATE_EMAIL) && strlen($string)<=50) {
			htmlspecialchars(stripcslashes(trim($string)));
			return true;
		}
		return false;
	}

?>