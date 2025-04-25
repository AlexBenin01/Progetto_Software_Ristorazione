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
</style>
</head>
<body >

<div id="container">
<form form action="TakeAway.php" method="POST">
	
		<?php
		$alfabet='b';
		$alfabeto='B';
				include("../../Funzioni.php");
				if(size("../../csv/menu.csv")) {
				echo "<h2>Ordinazione Disponibile</h2>";
				echo "<table width='100%' border='1px'>";
				echo "<tr>";
				echo "<th colspan='4'><h1>MENU</h1></th>";
				echo "</tr>";
				
				
					$riga = leggiDaFile("../../csv/menu.csv");
					for($i=1;$i<count($riga);$i++){
					$vett=explode("|",$riga[$i]);
					echo "<tr>";
					echo "<td  width='1%' ><input type='checkbox' name='$alfabet' ></td><td ><span>$vett[1]:</span></td><td><span> $vett[2]€</span></td><td width='3%'><input  style='width:40px;' type='number' name='$alfabeto' max='20' min='1' ></td>";
					echo "</tr>";
					$alfabet++;
					$alfabeto++;
				}
				
				echo "</table>";
				echo "</BR>";
				echo "<input type='radio' name='conferma' required> Conferma";
				echo "</br>";
				echo "<input type='submit' name='invia' value='Ordina'>&nbsp;&nbsp;";
				echo "<input type='reset' name='reset' value='Svuota campi'>";
				
			}else
				echo "<h1 class='errore'>Funzione non disponibile!</h1></br></br><h1 class='errore'>Non sono ancora state aggiunte Pietanze!</h1>";
			
		?>
	</form>
</div>



</body>
</html>