<?php 

	$matricula = "8756DSF";//$_POST['matricula'];
	$dia = "2017-11-11";//$_POST['dia'];
	$hora = "17:00:00";//$_POST['hora'];

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
$id = "748657874327834";
$email = $_POST['email'];
$sql = "INSERT INTO Reserva VALUES (".$id.", '".$matricula."','".$dia."','".$hora."',1,1,'turismo','".$email."')";

echo "<div id='retorna'>";
if ($conn->query($sql) === TRUE) {
    echo "S'ha enregistrat la teva cita";
    echo "<br><a href=../index.php>GO INDEX</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br><a href=\"javascript:history.go(-1)\">GO BACK</a>";

}
echo"</div>";
$conn->close();

	?>