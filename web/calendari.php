<!DOCTYPE html>
<html>
<head>
  <!-- Part css -->
 <link rel="stylesheet" href="lib/normalize.css">
 <link rel="stylesheet" href="lib/skeleton.css">
 <link rel="stylesheet" href="css/myitvdesign.css">
 <script type="text/javascript" language="javascript" src="js/functionsCalendari.js"></script>
 <script src="lib/jquery.js"></script>
 <meta charset="utf-8" />
 <title>IAMotors</title>
</head>
<body>
  <?php
  session_start();
  
  /*if($_SESSION['block'] == 1){
    header("Location: block.php");
  }else{
  $_SESSION['block'] = 1;
  }*/
<<<<<<< HEAD
 $_SESSION["enrera"] == 0;
=======
  if(isset($_SESSION['matricula'])){
>>>>>>> 09c2c5ee88de0be80065033222e467c56a0e39dc
  ?>
    <div class="container">
  		<div class="row">
    		<div class="twelve columns">
          <?php include "header.php"; ?>
          <div id="calendari"></div>
          <?php 
            //Agafa el dia d'avui
            $day = date("d");
            $month = date("m");
            $year = date("Y");
          ?>
    			<script language="javascript">
            // Afegeix la data d'avui, crea una variable amb les tres dades i l'envía per jquery per crear el calendari
            var dd = <?php echo $day; ?>;
            var mm = <?php echo $month; ?>;
            var yyyy = <?php echo $year; ?>;

            var datos = {
              dia : dd,
              mes : mm,
              any : yyyy
            };
            
            $('#calendari').html(Calendar.imprimir(datos));
            //Crea els botons per canviar de mes
            Calendar.getDataDay(datos);
          </script>
          <?php include "footer.php" ?>
    		</div>
  		</div>
  	</div>
    <?php
    } else {
      header('Location: ./');
    }
    ?>
</body>
</html>