<?php
 session_start();
 
 //numero de carrils
 $carrils = 2;

 /*function createTable(){
 	echo "<table>";
 	$hora = 0;
 	$h = 8;
 	$m = 00;
 	$hores = 24;
 	while($hora<$hores){
 		echo "<tr>";
 		if($hora%2 != 0){
			$m = 30;
			echo "<td>".$h.":".$m."</td>";
			$h++;
			$hora++;
 		} else {
			$m = 00;
 			echo "<td>".$h.":".str_pad($m, 2, '0', STR_PAD_RIGHT)."</td>";
 			$hora++;
 		}
 		echo "</tr>";
 	}
	
 	echo "</table>";
 }*/

 function isFull($day,$month,$year,$hora){
 	$date = $year."-".$month."-".$day;
 	$query = "SELECT * FROM Reserva WHERE dia = '".$date."' AND hora = '".$hora."'";
 	echo $query;
 	$result = $conn->query($query);
 	if (!$result) die ("Database access failed: " . mysql_error());

 	if ($result->num_rows >= $carrils) {
 		return 1;
 	} else {
 		return 0;
 	}
 	
 }


?>
