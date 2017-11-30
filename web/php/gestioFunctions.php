<?php
	function validateID(&$string){
		if (!empty($string) && is_string($string)) {
			htmlspecialchars(stripcslashes(trim($string)));
			return 0;
		}
		return 1;
	}
?>