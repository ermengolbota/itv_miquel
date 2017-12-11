<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!-- normalize css start -->
	<link rel="stylesheet" href="../lib/normalize.css">
	<link rel="stylesheet" href="../lib/skeleton.css">
	<!-- normalize css end -->
	<link rel="stylesheet" href="../css/myitvdesign.css">
	<script src="../lib/jquery.js"></script>
	<title>Llistat de cites</title>
</head>
<body>
	<?php include "../header.php"; ?>
	<h1>Llista cites</h1>
	<?php
		$dia = date('Y-m-d');
		if ($_GET["dia"]) {
			$dia = $_GET["dia"];
		}
		echo $dia;
	?>
	<table id="<?php echo $dia; ?>" border=1>
	</table>
	<?php include "../footer.php"; ?>
	<?php
		require_once "../php/config.php";
		$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT hora, num_carril, matricula, nom, cognom, tlf, mail FROM Reserva WHERE dia = '$dia' ORDER BY hora, num_carril ASC;";
		$result = $conn->query($sql);
		$array[0][0] = "";
		if ($result-> num_rows > 0) {
			$i = 0;
			while ($row = $result->fetch_row()) {
				for ($j = 0; $j > 8; $j++) { 
					$array[$i][$j] = $row[$j];
				}
				$i++;
			}
		}
		$conn->close();
	?>
	<script src="functions.js"></script>
	<script type="text/javascript">
		Llista.init(<?php $array; ?>);
	</script>
</body>
</html>