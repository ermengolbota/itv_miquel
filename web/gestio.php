<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	?>
	<meta charset="utf-8" />
	<!-- normalize css start -->
	<link rel="stylesheet" href="lib/normalize.css">
	<link rel="stylesheet" href="lib/skeleton.css">
	<!-- normalize css end -->
	<link rel="stylesheet" href="css/myitvdesign.css">
	<script src="lib/jquery.js"></script>
	<script src="js/gestioFunctions.js"></script>
	<title>Gestio</title>
</head>
<body>

	<?php include "header.php"; ?>
	<h1>Gestio</h1>
	<?php $matricula = $_SESSION['matricula'];?>
	<input type="button" value="Inici" onclick="window.location.href='./'"" />
	<?php
		//if (isset($_POST['localitzar'])) {
		if ($_POST) {
			require_once 'php/config.php';
			require_once 'php/gestioFunctions.php';
			$dades[0] = $_POST["matricula"];
			$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
			//$conn = connect($db_hostname, $db_username, $db_password, $db_database);
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			}
			//$id = $_POST["id"];
			if (validateMatricula($dades[0]) == 0) {
				$sql = "SELECT matricula, dia, hora, mail, id FROM Reserva WHERE matricula LIKE '$dades[0]';";
				//echo "<p>query: ".$sql."</p>";
				//$sql = createSQL($id);
				$result = $conn->query($sql);
				//$result = getResult($conn, $sql);
				if ($result->num_rows > 0) {
					?>
					<table border=1>
						<tr>
							<th>Matrícula</th>
							<th>Dia</th>
							<th>Hora</th>
							<th>Email</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					<?php
   					 // output data of each row
    				while($row = $result->fetch_row()) {
    					echo "<tr>";
						for ($i = 0; $i < 5; $i++) {
							$dades[$i] = $row[$i];
       				 		if ($i < 4) {
       				 			echo "<td>" . $dades[$i] . "</td>";
       				 		}
						}
						?>
						<td>
							<form method="POST" action="calendari.php" />
								<input type="hidden" name="id" value="<?php echo $dades[4]; ?>" />
								<input type="hidden" name="matricula" value="<?php echo $dades[0]; ?>" />
								<input type="hidden" name="dia" value="<?php echo $dades[1]; ?>" />
								<input type="hidden" name="hora" value="<?php echo $dades[2]; ?>" />
								<input type="hidden" name="email" value="<?php echo $dades[3]; ?>" />
								<input type="submit" name="editEntry" value="Edita" />
							</form>
						</td>
						<td>
							<form method="POST" action="elimina.php" />
								<input type="hidden" name="id" value="<?php echo $dades[4]; ?>" />
								<input type="hidden" name="matricula" value="<?php echo $dades[0]; ?>" />
								<input type="hidden" name="dia" value="<?php echo $dades[1]; ?>" />
								<input type="hidden" name="hora" value="<?php echo $dades[2]; ?>" />
								<input type="hidden" name="email" value="<?php echo $dades[3]; ?>" />
								<input type="submit" name="deleteEntry" value="Elimina" />
							</form>
						</td>
						</tr>
						<?php
    				}
					?>
					</table>
					<?php
				} else {
   					 echo "0 results";
				}
				$conn->close();
			}
		} else{ //DEBUG FORM 
			?>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<p>
					<label for="matricula">DEBUG matricula</label>
				</p>
				<p>
					<input type="text" maxlength="7" name="matricula" id="matricula"/>
					<input type="submit" name="localitzar" id="localitzar" value="Localitzar"/>
				</p>
			</form>
			<?php
		}
	?>
	<?php include "footer.php"; ?>
</body>
</html>