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
			$conn = mysqli_connect($db_hostname, $db_usernamek, $db_password, $db_database);
			if (!$conn) {
				die("Unable to connect to MySQL: " . mysql_error());
			}
			$id = $_POST["id"];
			if (validateID($id) == 1) {
				echo "nope";
			}
		}
	?>
</body>
</html>
