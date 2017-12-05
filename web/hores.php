<!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="css/myitvdesign.css">
 <link rel="stylesheet" href="lib/normalize.css">
 <link rel="stylesheet" href="lib/skeleton.css">
 <script src="lib/jquery.js"></script>
<meta charset="utf-8" />
</head>

<body>
	<?php 
	session_start();

	if($_SESSION['block'] == 1){
		header("Location: block.php");
	}else{
	$_SESSION['block'] = 1;

	require_once 'php/horesFunctions.php';
	require_once 'php/config.php';

	$conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname);
		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
		} 
	
	?>
	<?php include "header.php" ?>
	<?php 

	/*if($_SESSION['hora']){
		echo $_SESSION['hora'];
	}*/
	$day = $_GET['day'];
	$month = $_GET['month'];
	$year = $_GET['year'];
	echo "<h1>".$day."/".$month."/".$year."</h1>";

	?>
	<div class="row">
    		<div class="three columns"><p></p></div>
    		<div class="six columns">
    			<?php
    			createTable();
    			?>
    		</div>
    		<div class="three columns"></div>
  	</div>

	<?php include "footer.php" ?>
	<?php
		$conn->close();
	?>
</body>
</html>