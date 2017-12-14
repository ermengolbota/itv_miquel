<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../lib/normalize.css">
	<link rel="stylesheet" href="../lib/skeleton.css">
	<link rel="stylesheet" href="../css/myitvdesign.css">
	<script src="../lib/jquery.js"></script>
	<title>Dashboard</title>
<head>
<body>
	<div class="container" id="admin">
		<div class="row">
			<div class="twelve columns">
				<?php include "header.php"; ?>
				<ul>
					<li><p class="greetAdmin">Benvingut/da Administrador</p></li>
					<li><a class="btnMenu" href="llista.php">Llista</a></li>
				</ul>
				<p></p>
				<?php include "footer.php"; ?>
			</div>
		</div>
	</div>
</body>
</html>