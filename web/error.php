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
	<title>Error</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="twelve columns">
				<?php
					session_start(); 
					include "header.php"; ?>
				<span class="error">Alguna cosa ha fallat.</span>
				<p class="info">Aquesta pàgina es redireccionara automaticament a l'index en 5 segons</p>
				<?php
					session_destroy();
					header('Refresh: 5; URL=./');
					include "footer.php"; ?>
			</div>
		</div>
	</div>
</body>
</html>