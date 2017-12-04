<?php
	$servername = "localhost";
$username = "root";
$password = "ausias";
$dbname = "IAMotors";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$matricula = $_POST['matricula'];

$q = "SELECT * FROM Reserva WHERE matricula = '".$matricula."';";
$result = $conn->query($q);

if ($result->num_rows > 0) {
   header("Location: ../gestio.php"); 
    
} else {
    header("Location: ../calendari.php");
}

$conn->close();
?>