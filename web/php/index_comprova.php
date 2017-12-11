<?php
 session_start();
 require_once 'config.php';

// Create connection
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$matricula = $_POST['matricula'];
 
$_SESSION['matricula']= $matricula;


$q = "SELECT * FROM Reserva WHERE matricula = '".$matricula."';";
$result = $conn->query($q);

if ($result->num_rows > 0) {
   header("Location: ../gestio.php");

    
} else {
   header("Location: ../calendari.php");
    
    
}

$conn->close();

?>