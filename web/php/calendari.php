<!DOCTYPE html>

 <html>
 <link rel="stylesheet" href="../lib/normalize.css">
 <link rel="stylesheet" href="../lib/skeleton.css">
<!--<link rel="stylesheet" href="../css/myitvdesign.css">-->
 <script type="text/javascript" language="javascript" src="../js/functions.js"></script>
 <script src="../lib/jquery.js"></script>
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
    			<script language="javascript">
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; 
            var yyyy = today.getFullYear();

            var datos = {
              dia : dd,
              mes : mm,
              any : yyyy
            };
            $('#calendari').html(Calendar.imprimir(datos));
          </script>
    		</div>
    		<div class="three columns"></div>
  		</div>
  	</div>
</body>
</html>