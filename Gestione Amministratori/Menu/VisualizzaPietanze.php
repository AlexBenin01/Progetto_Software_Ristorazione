<html>
<head>
<style type="text/css">
	html,body{margin:0;padding:0}
		body{background: #FC9D5D url(../../img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
	div#container{width:700px;margin: 0 auto}
		tr{line-height: 3em }
		span{font-size: 20px}
</style>
</head>
<body >

<div id="container">
	
		<?php
			include("../../Funzioni.php");
			if(size("../../csv/menu.csv")) {
				echo"<table width='100%'>";
				echo"<tr>";
				echo"<th colspan='2'><h1>MENU</h1></th>";
				echo"</tr>";
				
				 
				
					$riga = leggiDaFile("../../csv/menu.csv");
					
					for($i=1;$i<count($riga);$i++){
					$vett=explode("|",$riga[$i]);
					echo "<tr>";
					echo "<td style='padding-left: 60px; '><span>$vett[1]:</span></td><td><span> $vett[2]€</span></td>";
					echo "</tr>";
				}
				echo "</table>";
			}else
				echo "<h1>Funzione non disponibile!</h1></br></br><h1>Non sono ancora state aggiunte Pietanze!</h1>";
	
	
		?>
	
</div>



</body>
</html>