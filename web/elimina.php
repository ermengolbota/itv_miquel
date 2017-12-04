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
	<?php include "header.php"; ?>
	<?php
		if (isset($_POST["deleteEntry"])) {
			?>
			<h1>Vols eliminar la següent cita?</h1>
			<p>Matricula: <?php echo $_POST["matricula"]; ?></p>
			<p>Dia: <?php echo $_POST["dia"]; ?></p>
			<p>Hora: <?php echo $_POST["hora"]; ?></p>
			<p>Email: <?php echo $_POST["email"]; ?></p>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" />
				<input type="hidden" name="id" value="<?php echo $_POST["id"]; ?>" />
				<input type="submit" name="confirm" value="Confirmar" />
			</form>
			<?php
		} elseif (isset($_POST["confirm"])) {
			require_once 'php/config.php';
			$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			}
			$id = $_POST["id"];
			$sql = "DELETE FROM Reserva WHERE id LIKE '$id';";
			if ($conn->query($sql) === TRUE) {
				echo "Record deleted successfully";
			} else {
				echo "Error deleting record: " . $conn->error;
			}
		}
	?>
	<div id="footer"><?php include "footer.php"; ?></div>
</body>
</html>