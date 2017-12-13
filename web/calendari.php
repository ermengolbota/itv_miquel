<!DOCTYPE html>
 <html>
<head>
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
 
  ?>
    <div class="container">
  		<div class="row">
    		<div class="twelve columns">
          <?php include "header.php"; ?>
          <div id="calendari"></div>
          <?php 
          if($_SESSION['dia']){
            $date = $_SESSION['dia'];
            $day = substr($date,8,9);
            $month = substr($date,5,-3);
            $year = substr($date,0,4);
          } else {
            $day = date("d");
            $month = date("m");
            $year = date("Y");
          }

          ?>
    			<script language="javascript">
            var dd = <?php echo $day; ?>;
            var mm = <?php echo $month; ?>;
            var yyyy = <?php echo $year; ?>;

            var datos = {
              dia : dd,
              mes : mm,
              any : yyyy
            };
            
            $('#calendari').html(Calendar.imprimir(datos));
            Calendar.getDataDay(datos);
          </script>
          <?php include "footer.php" ?>
    		</div>
  		</div>
  	</div>
</body>
</html>