<?php
 session_start();
 
 //numero de carrils
 $carrils = 2;

 function createTable(){
 	echo "<table><tr>";
 	/*
 	$hora = 0;
 	$h = 8;
 	$m = 0;
 	$hores = 24;
 	while($hora<$hores){
 		if(!$hora%2){

 		}
 		echo "<td>".$h.":".$m."</td>";
 		$hora++;
 	}
	*/
 	echo "</tr></table>";
 }

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
