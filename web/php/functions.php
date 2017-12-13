<?php
	// funcions comunes que s'empren en varies pags.
	
	function humanDate($date) {
		// converteix la data de format Y-m-d a d/m/Y
		$dia = substr($date, 8, 9) . "/";
		$dia .= substr($date, 5, -3) . "/";
		$dia .= substr($date, 0, 4);
		return $dia;
	}
?>