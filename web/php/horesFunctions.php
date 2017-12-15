<?php
 function isFull($day,$month,$year){
 	$date = $year."-".$month."-".$day;
 	return "SELECT hora FROM Reserva WHERE dia = '$date' ORDER BY hora ASC ";
 }

?>
