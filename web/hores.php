<!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="css/myitvdesign.css">
 <link rel="stylesheet" href="lib/normalize.css">
 <link rel="stylesheet" href="lib/skeleton.css">
 <script src="lib/jquery.js"></script>
 <script type="text/javascript" language="javascript" src="js/functionsHores.js"></script>
<meta charset="utf-8" />
</head>

<body>
	<?php 
	session_start();

	/*if($_SESSION['block'] == 1){
		header("Location: block.php");
	}else{
	$_SESSION['block'] = 1;*/

	require_once 'php/horesFunctions.php';
	require_once 'php/config.php';

	$conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname);
		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
		} 
	
	?>
	
	<?php 

	/*if($_SESSION['hora']){
		echo $_SESSION['hora'];
	}*/
	$day = $_GET['day'];
	$month = $_GET['month'];
	$year = $_GET['year'];
	$_SESSION['dia'] = $year."-".$month."-".$day;

	?>
	<div class="row">
    		<div class="two columns"><p></p></div>
    		<div class="eight columns">
    			<?php include "header.php" ?>
    			<?php echo "<h1>".$day."/".$month."/".$year."</h1>"; ?>
    			<div id="taulaHores"></div>
    			<script language="javascript">
    				$('#taulaHores').html(TableHora.crea());
    				TableHora.hora();
    			</script>
    			<?php include "footer.php" ?>
    		</div>
    		<div class="two columns"></div>
  	</div>

	
	<?php
		$conn->close();
	?>
</body>
</html>