<?php 
	require_once "config.php";
	//Inici de la sessio
	session_start();

	//Creació de les variables que s'utilitzaran per fer l'INSERT a la BBDD
	$matricula = $_SESSION['matricula'];
	$dia = $_SESSION['dia'];
	$hora = $_SESSION['hora'];

	//Creació de les variables de sessió que s'utilitzaran per la confirmació de la cita
	$_SESSION['nom'] = $_POST['nom_propietari'];
	$_SESSION['cognom'] = $_POST['cognom_propietari'];
	$_SESSION['tlf'] = $_POST['telefon'];
	$_SESSION['email'] = $_POST['email'];

	// Create connection
	$conn = connect();
	// Check connection
	if ($conn->connect_error) {
    	$_SESSION["error"] = 1;
    	header('Location: ../error.php');
	} 


//Creació de l'ID a partir de la funció time() i la matricula del vehicle
$id = time().''.$matricula;

//Consulta per sebre si hi ha cites en una certa hora a un cert dia
$sql =  "SELECT count(*) FROM Reserva WHERE dia='$dia' AND hora='$hora';";

//Variable on es guarda el resultat de la consulta
$result = $conn->query($sql);

//Variable per sebre les files;
$row=$result->fetch_row();

/*Si la variable row=0 (no hi ha cap cita en aquell dia i  hora) fa un insert amb el num_carril=1, si existeix alguna cita
ho fa amb el num_carril=2*/
if($row[0] == 0){

//Variable que conté la consulta per inserir les dades
$sql = "INSERT INTO Reserva VALUES ('".$id."', '".$matricula."','".$dia."','".$hora."',1,1,'turismo','".$nom."','".$cognom."','".$telefon."','".$email."')";

echo "<div id='retorna'>";
if ($conn->query($sql) === TRUE) {
	$_SESSION["accio"] = "crear";
	header('Location: ../confirmacio.php');
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br><a href=\"javascript:history.go(-1)\">GO BACK</a>";

}
echo"</div>";

//Si hi ha una cita en un mateix dia i hora:
}elseif ($result == 1){
	

//Variable que conté la consulta per inserir les dades
$sql = "INSERT INTO Reserva VALUES ('".$id."', '".$matricula."','".$dia."','".$hora."',2,1,'turismo','".$nom."','".$cognom."','".$telefon."','".$email."')";

echo "<div id='retorna'>";
if ($conn->query($sql) === TRUE) {
	$_SESSION["accio"] = "crear";
	header('Location: ../confirmacio.php');
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<br><a href=\"javascript:history.go(-1)\">GO BACK</a>";

}
echo"</div>";}

//Tanquem la connexió a la BBDD
$conn->close();

	?>