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
 
	

	/*if($_SESSION['block'] < 1){
		header("Location: block.php");
	}else{
	$_SESSION['block'] = 1;
}*/
	?>

	<?php
	if($_SESSION['val_matricula']==0){
			$matricula = $_SESSION['matricula'];
		$_SESSION['val_matricula']++;
		$_SESSION['hour'] = $_GET['hour'];
	}else
	$_SESSION['matricula'] = $_POST['matricula'];

	?>
	<div class="row">
    <div class="two columns"><p></p></div>
    <div class="eight columns">
	    <?php include "header.php" ?>
		<h1>Dades del Propietari</h1>
		<table>
			<tr>
				<td class="noBorder">
				<div id="edit_matricula">
					<form action="dades_client.php" method="POST">
	        			<input name="matricula" type="text" id="new_matricula" placeholder="Matricula" />
	        			<br />
	       				<input type="submit" id="edit_refresh" value="Edita">
	    			</form>
	        	</div>
	        	</td>
	        </tr>
	        <tr>
				<td>
				<form action="php/inserir_dades.php" method="POST">
						
	        <p id="old_matricula">
	        <?php
	        
	        echo $_SESSION['matricula'];
	        ?>
	        <input type="button" name="edit" id="edit" value="Edita">
	        </p>
	        <input name="nom_propietari" type="text" id="nom_propietari" placeholder="Nom Propietari" /><br />
	        <input name="cognom_propietari" type="text" id="cognom_propietari" placeholder="Cognom Propietari" /><br />
	           <input name="telefon" type="text" id="telefon" placeholder="Telefon" /><br />
	         <input name="email" type="email" id="email" placeholder="email" /><br />
	        <input type="submit" id="submit" value="Enviar">
	    </form>
				</td>
			</tr>
		</table>
		<?php include "footer.php" ?>
	</div>
    <div class="two columns"></div>
</div>
</body>
</html>