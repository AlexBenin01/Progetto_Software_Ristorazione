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
<?php
include("../../Funzioni.php");
$cliente = leggiDaFile("../temp.csv");
echo '<form form action="RimuoviPrenotazione.php" method="POST">';

		
			
			if(size("../../csv/registro.csv")) {
				echo"<table width='100%' border='1px'>";
				echo"<tr>";
				echo"<th colspan='4'><h1>RIMUOVI PRENOTAZIONE</h1></th>";
				echo"</tr>";
				$conta=1;
				
				$riga = leggiDaFile("../../csv/registro.csv");
				for($i=1;$i<count($riga);$i++){
					
					$vett=explode("|",$riga[$i]);
					if($cliente[0]==$vett[3]){
						
					echo "<tr>";
					echo "<td  width='1%' ><input type='radio' name='prenotazione' value='$conta' required></td><td >Data: $vett[1]</td><td >N°Tavolo: $vett[2]</td>";
					echo "</tr>";
					}
					
					$conta++;
					
				}
				
				echo"</table>";
				echo"</br>";
				echo"<input type='submit' name='invia' value='Disdici'>&nbsp;&nbsp;";
				echo"<input type='reset' name='reset' value='Svuota campi'>";
			}else
				echo"<h1 class='errore'>Funzione non disponibile!</h1></br></br><h1 class='errore'>Non hai prenotazini!</h1>";
			
		?>
	
	</form>
</div>



</body>
</html>