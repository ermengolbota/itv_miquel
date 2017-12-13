
<html>
<head>
	<meta charset="utf-8" />
	<!-- normalize css start -->
	<link rel="stylesheet" href="lib/normalize.css">
	<link rel="stylesheet" href="lib/skeleton.css">
	<!-- normalize css end -->
	<link rel="stylesheet" href="css/myitvdesign.css">
	<title>Confirmació</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="twelve columns">
				<?php
					require_once "php/functions.php";
					include "header.php";
					session_start();
					if (strcmp($_SESSION["accio"], "crear") == 0) {
						$dia = humanDate($_SESSION["dia"]);
						$hora = $_SESSION["hora"];
				?>
						<h2>Cita creada</h2>
						<p><strong>Dia de la cita:</strong> <?php echo $dia; ?></p>
						<p><strong>Hora de la cita:</strong> <?php echo $hora; ?></p>
						<p><strong>Matricula del vehicle:</strong> <?php echo $_SESSION["matricula"]; ?></p>
						<p><strong>Nome del propietari:</strong> <?php echo $_SESSION["nom"]; ?></p>
						<p><strong>Cognoms del propietari:</strong> <?php echo $_SESSION["cognom"]; ?></p>
						<p><strong>Telèfon de contacte:</strong> <?php echo $_SESSION["tlf"]; ?></p>
						<p><strong>Correo de contacte:</strong> <?php echo $_SESSION["email"]; ?></p>
						<p></p>
						<p></p>
				<?php
					} elseif (strcmp($_SESSION["accio"], "borrar") == 0) {
						# code...
					} else {
						header('Location: ./');
					}
				?>
				<input type="button" onclick="location.href='./';" value="Volver" />
				<?php include "footer.php"; ?>
			</div>
		</div>
	</div>
</body>
</html>