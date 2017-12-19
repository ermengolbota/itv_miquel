<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/myitvdesign.css">
	<link rel="stylesheet" href="lib/normalize.css">
	<link rel="stylesheet" href="lib/skeleton.css">
	<script src="lib/jquery.js"></script>
	<script src="js/functionsHores.js"></script>
	<meta charset="utf-8" />
	<title>IAMotors</title>
</head>

<body>
	<?php 
	// Comprova que existeixen aquestes variables
	if (isset($_GET["day"]) && isset($_GET["month"]) && isset($_GET["year"])) {
		require_once 'php/horesFunctions.php';
		require_once 'php/config.php';
		require_once 'php/functions.php';
		// Comprova que les dades siguin números i sigui una data correcta
		if(validateDate($_GET["day"],$_GET["month"],$_GET["year"])){
			session_start();

			/*if($_SESSION['block'] == 1){
				header("Location: block.php");
			}else{
			$_SESSION['block'] = 1;*/
			$day = $_GET['day'];
			$month = $_GET['month'];
			$year = $_GET['year'];
	
			$_SESSION['dia'] = $year."-".$month."-".$day;
			$matricula = $_SESSION['matricula'];
		  	$_SESSION['val_matricula'] = 0;

			$conn = connect();
				if ($conn->connect_error) {
			    	$_SESSION['error'] = 1;
					header('Location: error.php');
				} 	
			//Funció que comprova si en la data seleccionada hi ha hores completes per que no hi pugui elegir
		  	$query = isFull($day,$month,$year);
		  	$result = getResult($conn,$query);
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
<div class="container">
	<div class="row">
    	<div class="twelve columns">
    		<?php include "header.php" ?>
    		<?php echo "<h1 class='titleIndex'>".$day."/".$month."/".$year."</h1>"; ?>
    		<div id="taulaHores" >
    		<script language="javascript">
    			// Es passa via json al js un array on et diu totes les cites del dia elegit i crea la taula
    			var jArray = <?php echo json_encode($array); ?>;
    			$('#taulaHores').html(TableHora.crea(jArray));
    			TableHora.hora();
    		</script>
    		<div class="positionBtn"><button class="torna">Torna</button></div>
    		<?php 
    		include "footer.php";
    			} else {
    				header('Location: ./');
    			}
    		} else {
    			header('Location: ./');
    		} ?>
    	</div>
  	</div>
</div>
</body>
</html>