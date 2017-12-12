<?php 
session_start();
	$matricula = $_SESSION['matricula'];
	$dia = $_SESSION['dia'];
	$hora = $_SESSION['hour'];
	$nom= $_POST['nom_propietari'];
	$cognom= $_POST['cognom_propietari'];
	$telefon= $_POST['telefon'];
	$email = $_POST['email'];


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "IAMotors";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id = time().''.$matricula;

$sql = "INSERT INTO Reserva VALUES ('".$id."', '".$matricula."','".$dia."','".$hora."',1,1,'turismo','".$nom."','".$cognom."','".$telefon."','".$email."')";

echo "<div id='retorna'>";
if ($conn->query($sql) === TRUE) {
    echo "S'ha enregistrat la teva cita<br> Será redirigido al Inicio.";
    sleep(2);
	header('Location: ../index.php');
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br><a href=\"javascript:history.go(-1)\">GO BACK</a>";

}
echo"</div>";
$conn->close();

	?>