<?php
	function calcPrevDay($day) {
		$prevDay = date('Y-m-d', strtotime('-1 day', strtotime($day)));
		echo $prevDay;
	}

	function calcNextDay($day) {
		$nextDay = date('Y-m-d', strtotime('+1 day', strtotime($day)));
		echo $nextDay;
	}
?>