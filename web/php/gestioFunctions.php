<?php
	//require 'config.php';
	/*function connect($db_hostname, $db_username, $db_password, $db_database){
		return new mysqli($db_hostname, $db_username, $db_password, $db_database);
	}
	function createSQL($id){
		$sql = "SELECT matricula, dia, hora, mail FROM Reserva WHERE id LIKE '$id';"
		echo "<p>query: ".$sql."</p>";
		return $sql;
	}
	function getResult($conn, $sql){
		return $conn->query($sql);
	}*/


	function validateMatricula(&$string) {
		if (!empty($string) && is_string($string) && strlen($string)==7) {
			htmlspecialchars(stripcslashes(trim($string)));
			return 0;
		}
		return 1;
	}
?>