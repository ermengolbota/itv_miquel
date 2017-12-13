<!DOCTYPE html>
<html class="">
<head>
	<meta charset="utf-8" />
	<!-- normalize css start -->
	<link rel="stylesheet" href="lib/normalize.css">
	<link rel="stylesheet" href="lib/skeleton.css">
	<!-- normalize css end -->
	<link rel="stylesheet" href="css/myitvdesign.css">
	<script src="lib/jquery.js"></script>
	<title>Confirmar eliminació</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="twelve columns">
				<?php
					include "header.php";
					if (isset($_POST["deleteEntry"])) {
				?>
						<h1>Vols eliminar la següent cita?</h1>
						<p>Matricula: <?php echo $_POST["matricula"]; ?></p>
						<p>Dia: <?php echo $_POST["dia"]; ?></p>
						<p>Hora: <?php echo $_POST["hora"]; ?></p>
						<p>Nom: <?php echo $_POST["nom"]; ?></p>
						<p>Cognom: <?php echo $_POST["cognom"]; ?></p>
						<p>Tlf.: <?php echo $_POST["tlf"]; ?></p>
						<p>Email: <?php echo $_POST["email"]; ?></p>
						<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" />
							<input type="hidden" name="id" value="<?php echo $_POST["id"]; ?>" />
							<input type="submit" name="confirm" value="Confirmar" />
						</form>
				<?php
					} elseif (isset($_POST["confirm"])) {
						require_once 'php/config.php';
						require_once 'php/eliminaFunctions.php';
						$conn = connect();
						if ($conn->connect_error) {
		    				die("Connection failed: " . $conn->connect_error);
						}
						$id = $_POST["id"];
						if (validateID($id) == 0) {
							$sql = createSQL($id);
							if (getResult($conn, $sql) === TRUE) {
								close($conn);
								echo "Record deleted successfully";
							} else {
								close($conn);
								echo "Error deleting record: " . $conn->error;
							}
						} else {
							header('Location: ./');
						}
					} else {
						header('Location: ./');
					}
					include "footer.php";
				?>
			</div>
		</div>
	</div>
</body>
</html>