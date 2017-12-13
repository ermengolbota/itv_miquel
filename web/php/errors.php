<?php
	// Aquest fitxer conté els errors que es mostren en error.php
	$error_text = array(
		"Alguna cosa ha fallat, canvis no realitzats. Si us plau començi de nou el procès.",
		"otro error",
		);

	function getErrorText($error_code) {
		global $error_text;
		return $error_text[$error_code];
	}
?>