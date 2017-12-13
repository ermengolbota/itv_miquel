<?php
 session_start();
 require_once 'config.php';

// Create connection
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Es guarda la matricula passada per POST
$matricula = $_POST['matricula'];
 
//Es guarda una variable de sessió de la matricula (servirà per passar la matricula entre els fitxers)
$_SESSION['matricula']= $matricula;


//Consulta que se li fa a la BBDD
$q = "SELECT * FROM Reserva WHERE matricula = '".$matricula."';";

//Variable on es guarda la consulta
$result = $conn->query($q);

//Si la matricula existeix redirecciona a gestio.php, sino a calendari.php per crear la cita
if ($result->num_rows > 0) {
   header("Location: ../gestio.php");

    
} else {
   header("Location: ../calendari.php");
    
    
}


//Tanquem la connexio amb la BBDD
$conn->close();

?>