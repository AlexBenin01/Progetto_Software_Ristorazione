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
	<body >
	<div id="container">
		<center>
		<h1 style="text-aligne:center">LICENZIA CAMERIERE</h1>
		<br>
		<form action="RimuoviCamerieri.php" method="POST">
				
					<?php
						include("../../Funzioni.php");
						if(size("../../csv/camerieri.csv")) {
							echo"<table border='1px' width='100%'>";
					echo"<th colspan='5'><h1>Lista Camerieri</h1></th>";
					$vett1= leggiDaFile("../../csv/camerieri.csv");							
							$conta = 1;
							
							for($i=1; $i<count($vett1); $i++){
								
								$vett = explode("|", $vett1[$i]);
								echo "<tr>";
								echo "<td width='25%'>$vett[1]</td><td width='25%'>$vett[2]</td><td width='25%'>$vett[4]</td><td width='1%'><input type='radio' name='cameriere' value='$conta' required></td>";
								echo "</tr>";
								$conta ++;
								
							}
							echo "</table>";
							echo"<BR>";
							echo "<input type='radio' name='conferma' required> Conferma";
							echo "</br>";
							echo"<input type='submit' name='invia' value='Licenzia'>&nbsp;&nbsp;";
							echo"<input type='reset' name='reset' value='Svuota campi'>";
						}else
							echo"<h1>Funzione non disponibile!</h1></br></br><h1>Non ci sono Camerieri da licenziare!</h1>";
							
					?>
				
			
		</form>
		</div>
		</center>
	</body>
</html>