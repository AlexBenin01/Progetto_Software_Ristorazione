<html>
	<head>
		<title>Autonoleggio Camposampiero</title>
		<style>
		html,body{margin:0;padding:0}
		body{background: #FC9D5D url(../../img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
	div#container{width:700px;margin: 0 auto}
		tr{line-height: 3em }
		span{font-size: 20px}
		</style>
	</head>
	<body bgcolor="lightyellow">	
	<center>
	<div id="container">
		<h1 style='text-aligne:center'>Menu</h1>
		<br>
		<form action="RimuoviPietanze.php" method="POST">
				
					
					<?php
						
							
							
							
							$conta = 1;
							include("../../Funzioni.php");
							if(size("../../csv/menu.csv")) {
								echo "<table border='1px' width='100%'>";
							
								$riga = leggiDaFile("../../csv/menu.csv");
								for($i=1;$i<count($riga);$i++){
								$vett = explode("|", $riga[$i]);
								echo "<tr>";
								echo "<td width='25%'>$vett[1]</td><td width='25%'>$vett[2]</td><td width='1%' ><input type='radio' name='pietanza' value='$conta' required></td>";
								echo "</tr>";
								$conta ++;
								
							}
							
							echo "</table>";
							echo "<BR>";
							echo "<input type='submit' name='invia' value='Rimuovi Pietanza'>";
							echo "<input type='reset' name='reset' value='Svuota campi'>";
						}else
							echo "<h1>Funzione non disponibile!</h1></br></br><h1>Pietanze non ancora aggiunte</h1>";
							
					?>
				
			
		</form>
		</div>
		</center>
	</body>
</html>