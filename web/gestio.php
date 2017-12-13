<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	if($_SESSION['block'] == 1){
		header("Location: block.php");
	} else{
		$_SESSION['block'] = 1;
	}
	?>
	<meta charset="utf-8" />
	<!-- normalize css start -->
	<link rel="stylesheet" href="lib/normalize.css">
	<link rel="stylesheet" href="lib/skeleton.css">
	<!-- normalize css end -->
	<link rel="stylesheet" href="css/myitvdesign.css">
	<script src="lib/jquery.js"></script>
	<script src="js/gestioFunctions.js"></script>
	<title>Gestió</title>
</head>
<body>
	<div class="container">
	<div class="row">
	    <div class="twelve columns">
			<?php include "header.php"; ?>
			<h1>Gestió</h1>
			<?php
				if ($_SESSION["matricula"]) {
					// si es pasa una matricula
					require_once 'php/config.php';
					require_once 'php/gestioFunctions.php';
					$dades[0] = $_SESSION["matricula"];
					$conn = connect();
					if ($conn->connect_error) {
						// en cas de fall a la connexio es pasa l'error a la pàg. error.php
		    			$_SESSION["error"] = 1;
		    			header('Location: error.php');
					}
					// valida la "matricula" per evitar atacs XSS
					if (validateMatricula($dades[0]) == 0) { 
						// crea la consulta SQL
						$sql = createSQL($dades[0]);
						// fa la consulta SQL a la BD
						$result = getResult($conn, $sql);
						// comprova si hi ha resultats
						if ($result->num_rows > 0) {
							?>
							<table>
								<thead>
									<tr>
										<th>Matrícula</th>
										<th>Dia</th>
										<th>Hora</th>
										<th>Nom</th>
										<th>Cognom</th>
										<th>Tlf.</th>
										<th>Email</th>
										<th>Editar</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>
							<?php
		   					// itera les files del resultat i les mostra en la taula
		    				while($row = $result->fetch_row()) {
		    					echo "<tr>";
								for ($i = 0; $i < 8; $i++) {
									$dades[$i] = $row[$i];
									// no mostra l'id
		       				 		if ($i < 7) {
		       				 			echo "<td>" . $dades[$i] . "</td>";
		       				 		}
								}
								?>
								<td>
									<!-- crea el formulari per editar la cita -->
									<form method="POST" action="php/gestioEdita.php" />
										<input type="hidden" name="id" value="<?php echo $dades[4]; ?>" />
										<input type="hidden" name="matricula" value="<?php echo $dades[0]; ?>" />
										<input type="hidden" name="dia" value="<?php echo $dades[1]; ?>" />
										<input type="hidden" name="hora" value="<?php echo $dades[2]; ?>" />
										<input type="hidden" name="nom" value="<?php echo $dades[3]; ?>" />
										<input type="hidden" name="cognom" value="<?php echo $dades[4]; ?>" />
										<input type="hidden" name="tlf" value="<?php echo $dades[5]; ?>" />
										<input type="hidden" name="email" value="<?php echo $dades[6]; ?>" />
										<input type="hidden" name="id" value="<?php echo $dades[7]; ?>" />
										<input type="submit" name="editEntry" value="Edita" id="gestioSubmit" />
									</form>
								</td>
								<td>
									<!-- crea el formulari per eliminar la cita -->
									<form method="POST" action="elimina.php" />
										<input type="hidden" name="id" value="<?php echo $dades[4]; ?>" />
										<input type="hidden" name="matricula" value="<?php echo $dades[0]; ?>" />
										<input type="hidden" name="dia" value="<?php echo $dades[1]; ?>" />
										<input type="hidden" name="hora" value="<?php echo $dades[2]; ?>" />
										<input type="hidden" name="nom" value="<?php echo $dades[3]; ?>" />
										<input type="hidden" name="cognom" value="<?php echo $dades[4]; ?>" />
										<input type="hidden" name="tlf" value="<?php echo $dades[5]; ?>" />
										<input type="hidden" name="email" value="<?php echo $dades[6]; ?>" />
										<input type="hidden" name="id" value="<?php echo $dades[7]; ?>" />
										<input type="submit" name="deleteEntry" value="Elimina" id="gestioSubmit" />
									</form>
								</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php
						} else {
							// en cas de no trobar resultats a la BD, comportament inòspit
		   					 close($conn);
		   					 header('Location: error.php');
						}
						close($conn);
					}
				} else{
					// si no es pasa una matricula, redirecciona al index
					header('Location: ./');
				}
			include "footer.php"; ?>
			</div>
		</div>
	</div>
</body>
</html>