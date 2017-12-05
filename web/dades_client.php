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
	<script src="js/functionsDadesCli.js"></script>

<meta charset="utf-8" />
<title>Dades_client</title>
</head>


<body>
	<?php session_start(); 
	if($_SESSION['block'] < 1){
		header("Location: block.php");
	}else{
	$_SESSION['block'] = 1;
}
	?>

	<?php include "header.php" ?>

	<?php

	$matricula = $_POST['new_matricula'];

	?>
	<table>
		<tr>
			<div id="edit_matricula">
						<form action="dades_client.php" method="POST">
        <input name="new_matricula" type="text" id="new_matricula" value="Matricula" /><br />
        <input type="submit" id="edit_refresh" value="Edita">
    </form>
        </div>
			<td>
				<form action="php/inserir_dades.php" method="POST">
					
        <p id="old_matricula">
        <?php
        echo $matricula;
        ?>
        <input type="button" name="edit" id="edit" value="Edita">
        </p>
        <input name="nom_propietari" type="text" id="matricula" value="Nom Propietari" /><br />
         <input name="email" type="email" id="email" value="email" /><br />

        <input type="submit" id="submit" value="Enviar">
    </form>
			</td>
		</tr>
	</table>
	<div id="footer"><?php include "footer.php" ?></div>
</body>
</html>