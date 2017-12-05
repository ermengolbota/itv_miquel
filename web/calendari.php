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
  <div class="header"><?php include "header.php"; ?></div>
	<div class="container" style="width:100%;">
  		<div class="row">
    		<div class="three columns"><p></p></div>
    		<div class="six columns">
          <div id="calendari"></div>
          <?php 
          if($_POST['dia']){
            $date = $_POST['dia'];
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
    		</div>
    		<div class="three columns"></div>
  		</div>
  	</div>
    <div id="footer"><?php include "footer.php" ?></div>
    <?php
      if($_POST){
        $id = $_POST['id'];
        $matricula = $_POST['matricula'];
        $dia = $_POST['dia'];
        $hora = $_POST['hora'];
        $email = $_POST['email'];
        echo $id.' '.$matricula.' '.$dia.' '.$hora.' '.$email;
      }
    ?>
</body>
</html>