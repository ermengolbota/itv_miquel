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
					require_once "php/errors.php";
					session_start();
					// codi d'error predeterminat
					$error_code = 0;
					echo $_SESSION["error"];
					if ($_SESSION["error"]){
						// normalment es pasa un codi d'error
						$error_code = $_SESSION["error"];
					}
					include "header.php"; ?>
				<span class="error"><?php echo getErrorText($error_code); ?></span>
				<p class="info">Aquesta pàgina es redireccionara automaticament a l'inici en 5 segons</p>
				<?php
					// borra la sessió i es redirecciona automaticament
					session_destroy();
					header('Refresh: 5; URL=./');
					include "footer.php";
				?>
			</div>
		</div>
	</div>
</body>
</html>