<html>
<head>
<style type="text/css">
	html,body{margin:0;padding:0}
		body{background: #FC9D5D url(../../img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
	div#container{width:700px;margin: 0 auto}
		tr{line-height: 3em }
		span{font-size: 20px}
		.errore{
			color:red;
		}
		#temp{
			width: 500px;
			border-style:solid;
			border-color:black;
			border-width:6px;
		}
</style>
</head>
<body>
<center>
<div id="container">
<?php
include("../../Funzioni.php");
	/*
	 *linea = data,idTav,identificativo; 
	 * 
	 * 
	 * 
	 */
	 
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$numeroRigaPrenotazione = $_POST['prenotazione'];
			
			rimuovi("../../csv/registro.csv",$numeroRigaPrenotazione, "../../");
			
			
			echo "<h2>Prenotazione rimossa con successo!</h2>";
	}
	
?>
</div>
</center>
</body>
</html>