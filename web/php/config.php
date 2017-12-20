<?php
	$db_hostname = 'localhost';
	$db_database = 'IAMotors';
	$db_username = 'root';
	$db_password = 'root';

	/**
	 * @return Connection Database
	 */
	function connect() {
		// posa les variables com a globals per a poder utilitzar-les
		global $db_hostname, $db_database, $db_username, $db_password;
		// retorna la connexio
		return new mysqli($db_hostname, $db_username, $db_password, $db_database);
	}

	/**
	 * @param  SQL Connection
	 * @return Close SQL connection
	 */
	function close(&$conn) {
		// tanca la connexió amb la BD
		$conn->close();
	}
?>