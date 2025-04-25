<html>
	<head>
	<style>
	html,body{margin:0;padding:0}
		body{background: #FC9D5D url(../../img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
	div#container{width:700px;margin: 0 auto}
		tr{line-height: 3em }
		span{font-size: 20px}
	</style>
	</head>
	<body>
		<div id="container">
		<h1 style="text-aligne:center">LICENZIA CAMERIERE</h1>
		
		<?php
			
			$numeroRigaCameriere = $_POST['cameriere'];
			
			include("../../Funzioni.php");
			rimuovi("../../csv/camerieri.csv",$numeroRigaCameriere, "../../" );
			
			
			echo "<h2>Licenziamento avvenuto con successo!</h2>";
			
		
		?>
		</div>
	</body>
</html>