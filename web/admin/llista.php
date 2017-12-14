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
	<?php
		require_once "functions.php";
		require_once "../php/functions.php";
		require_once "../php/config.php";
		$dia = date('Y-m-d');
		if ($_GET["dia"]) {
			$dia = $_GET["dia"];
		}
	?>
	<div class="container" id="admin">
		<div class="row">
			<div class="twelve columns">
				<?php include "header.php"; ?>
				<ul>
					<li><p class="greetAdmin">Benvingut/da Administrador</p></li>
					<li><a class="btnMenu" href="dashboard.php">Escriptori</a></li>
				</ul>

				<form class="btnLeftList" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type="hidden" name="dia" value="<?php calcPrevDay($dia); ?>" />
					<input type="submit" value="<-" />
				</form>

				<form class="btnRightList" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type="hidden" name="dia" value="<?php calcNextDay($dia); ?>" />
					<input type="submit" value="->" />
				</form>

				<h1><?php echo humanDate($dia); ?></h1>
				<table id="<?php echo $dia; ?>"></table>

				<?php include "footer.php"; ?>
			</div>
		</div>
	</div>
	<?php
		$conn = connect();
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT hora, num_carril, matricula, nom, cognom, tlf, mail FROM Reserva WHERE dia = '$dia' ORDER BY hora, num_carril ASC;";
		$result = getResult($conn, $sql);
		$array[0][0] = "";
		if ($result->num_rows > 0) {
			$i = 0;
			while ($row = $result->fetch_row()) {
				for ($j = 0; $j < 8; $j++) { 
					$array[$i][$j] = $row[$j];
				}
				$i++;
			}
		}
		close($conn);
	?>
	<script src="functions.js"></script>
	<script type="text/javascript">
		var jArray = <?php echo json_encode($array); ?>;
		Llista.init(jArray);
	</script>
</body>
</html>