<?php

	/**
	 * 
	 * Mira si el dia esta ple
	 * @param  [type]
	 * @param  [type]
	 * @param  [type]
	 * @return SQL Query
	 */
 function isFull($day,$month,$year){
 	$date = $year."-".$month."-".$day;
 	return "SELECT hora FROM Reserva WHERE dia = '$date' ORDER BY hora ASC ";
 }

 /**
  * 
  * Valida si es li passen un numero o no
  * @param  date
  * @return 1 if is correct 0 false
  */
 function validateNum($data){
 	if(is_numeric($data)){
 		return 1;
 	} else {
 		return 0;
 	}
 }

/**
 * 
 * Valida si el dia la data es correcta
 * @param  $day
 * @param  month
 * @param  year
 * @return boolean
 */
 function validateDate($day,$month,$year){
 	$d = validateNum($day);
 	$m = validateNum($month);
 	$y = validateNum($year);
 	if($d && $m && $y){
 		return checkdate($month,$day,$year);
 	} else {
 		return false;
 	}
 }

 /**
  * 
  * Valida el dia
  * @param  day
  * @param  month
  * @param  year
  * @return boolean
  */
 function correctDay($day,$month,$year){
 	$ddate = $year."-".$month."-".$day;
 	$date = new DateTime($ddate);
 	$numDay = $date->format("N");
 	$dayT = date("d");
 	$monthT = date("m");
 	$yearT = date("Y");
 	if($numDay == 6 || $numDay == 7 || $dayT > $day && $monthT >= $month && $yearT >= $year){
 		return false;
 	} else {
 		return true;
 	}
 }

?>
