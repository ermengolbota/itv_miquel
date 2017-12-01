<!DOCTYPE html>
<html>
<head>
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
	<h1>Gestio</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>
			<label for="id">Introdueix l'identificador</label>
		</p>
		<p>
			<input type="text" maxlength="17" name="id" id="id"/>
			<input type="submit" name="localitzar" id="localitzar" value="Localitzar"/>
		</p>
	</form>
	<?php
		if (isset($_POST['localitzar'])) {
			require_once 'php/config.php';
			require_once 'php/gestioFunctions.php';
			$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			}
			$id = $_POST["id"];
			if (validateID($id) == 0) {
				$sql = "SELECT matricula, dia, hora, mail FROM Reserva WHERE id LIKE '$id';";
				echo "<p>query: ".$sql."</p>";
				$result = $conn->query($sql);
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
						for ($i = 0; $i < 4; $i++) {
       				 		echo "<td>" . $row[$i]. "</td>";
						}
						?>
						<td><a href="">img editar</a></td>
						<td><a href="">img eliminar</a></td>
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
		}
	?>
</body>
</html>
