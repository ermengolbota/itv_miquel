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
				<div class="pCentered">
						<p><strong>Matricula:</strong> <?php echo $_POST["matricula"]; ?></p>
						<p><strong>Dia:</strong> <?php echo $_POST["dia"]; ?></p>
						<p><strong>Hora:</strong> <?php echo $_POST["hora"]; ?></p>
						<p><strong>Nom:</strong> <?php echo $_POST["nom"]; ?></p>
						<p><strong>Cognom:</strong> <?php echo $_POST["cognom"]; ?></p>
						<p><strong>Tlf.:</strong> <?php echo $_POST["tlf"]; ?></p>
						<p><strong>Email:</strong> <?php echo $_POST["email"]; ?></p>
				</div>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" />
							<input type="hidden" name="id" value="<?php echo $_POST["id"]; ?>" />
							<input type="submit" name="confirm" value="Confirmar" />
						</form>
				<?php
					} elseif (isset($_POST["confirm"])) {
						session_start();
						require_once 'php/config.php';
						require_once 'php/eliminaFunctions.php';
						$conn = connect();
						if ($conn->connect_error) {
		    				$_SESSION['error'] = 1;
		    				header('Location: error.php');
						}
						$id = $_POST["id"];
						if (validateID($id) == 0) {
							$sql = createSQL($id);
							if (getResult($conn, $sql) === TRUE) {
								close($conn);
								$_SESSION["accio"] = "borrar";
								header('Location: confirmacio.php');
							} else {
								close($conn);
								$_SESSION['error'] = 0;
								header('Location: error.php');
							}
						} else {
							header('Location: ./');
						}
						close($conn);
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