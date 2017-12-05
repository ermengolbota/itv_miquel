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
	<table id="<?php echo date('Y-m-d'); ?>" border=1>
		<tr>
			<th>Hora</th>
			<th>Carril</th>
			<th>Matricula</th>
			<th>Nom</th>
			<th>Cognom</th>
			<th>Tlf.</th>
			<th>Email</th>
		</tr>
	</table>
	<?php include "../footer.php"; ?>
	<script src="functions.js"></script>
</body>
</html>