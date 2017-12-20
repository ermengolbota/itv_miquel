<?php
 function isFull($day,$month,$year){
 	$date = $year."-".$month."-".$day;
 	return "SELECT hora FROM Reserva WHERE dia = '$date' ORDER BY hora ASC ";
 }

 function validateNum($data){
 	if(is_numeric($data)){
 		return 1;
 	} else {
 		return 0;
 	}
 }

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
