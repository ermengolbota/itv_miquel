<?php
	// Aquest fitxer conté els errors que es mostren en error.php
	$error_text = array(
		0 => "Alguna cosa ha fallat, canvis no realitzats. Si us plau començi de nou el procès.",
		1 => "Error de connexió amb la base de dades.",
		3 => "La hora sel·leccionada ha estat ocupada per un altre usuari durant el procès. Si us plau començi de nou amb una altre hora.",
		);
	/**
	 * Mostra quin error s'ha produit i perque ha passat
	 * 
	 * @param  error code
	 * @return Error code text
	 */
	function getErrorText($error_code) {
		global $error_text;
		return $error_text[$error_code];
	}
?>