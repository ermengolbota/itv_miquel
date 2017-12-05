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
	<?php session_start(); ?>
	<?php include "header.php" ?>
	<h1>Hores</h1>
	<?php 

	if($_SESSION['hora']){
		echo $_SESSION['hora'];
	}
	echo $_GET['day']."<br>";
	echo $_GET['month']."<br>";
	echo $_GET['year']."<br>";
	echo $_SESSION['matricula']; 

	?>
	<?php include "footer.php" ?>
</body>
</html>