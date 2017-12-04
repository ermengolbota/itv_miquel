<!DOCTYPE html>

 <html>
 <link rel="stylesheet" href="lib/normalize.css">
 <link rel="stylesheet" href="lib/skeleton.css">
<!--<link rel="stylesheet" href="../css/myitvdesign.css">-->
 <script type="text/javascript" language="javascript" src="js/functionsCalendari.js"></script>
 <script src="lib/jquery.js"></script>
<head>
<meta charset="utf-8" />
<title>IAMotors</title>
</head>
<body>
	<div class="container" style="width:100%">
  		<div class="row">
    		<div class="three columns"><p></p></div>
    		<div class="six columns">
          <div id="calendari"></div>
          <?php 
          if($_POST['date']){ 
            $day = substr($_POST['date'],8,9);
            $month = substr($_POST['date'],5,6);
            $year = substr($_POST['date'],0,4);
          } else {
            $day = date("d");
            $month = date("m");
            $year = date("Y");
          }
          
           ?>
    			<script language="javascript">
            var dd =  <?php echo $day; ?> /*|| today.getDate()*/;
            console.log(dd);
            var mm = <?php echo $month; ?> /*|| today.getMonth()+1*/; 
            var yyyy = <?php echo $year; ?> /*|| today.getFullYear()*/;

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
</body>
</html>