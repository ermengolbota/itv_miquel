<?php

	/**
	 * @param  dia passat per parametre
	 * @return String amb el dia anterior
	 */
	function calcPrevDay($day) {
		$prevDay = date('Y-m-d', strtotime('-1 day', strtotime($day)));
		echo $prevDay;
	}

	/**
	 * @param  dia passat per parametre
	 * @return String amb el següent dia
	 */
	function calcNextDay($day) {
		$nextDay = date('Y-m-d', strtotime('+1 day', strtotime($day)));
		echo $nextDay;
	}
?>