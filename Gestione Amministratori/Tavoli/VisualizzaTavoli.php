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
<center>
<div id="container">
	<?php
	include("../../Funzioni.php");
	if(size("../../csv/listaTavoli.csv")) {
		echo"<table border='1px'>";
		echo"<tr>";
		echo"<th colspan='4'>";
		echo"<h1>Lista Tavoli</h1>";
		echo"</th>";
		echo"</tr>";
		
		$riga = leggiDaFile("../../csv/listaTavoli.csv");
		$conta = 4;
		
		
		for($i=1;$i<count($riga);$i++) {
			
			if($conta==4){
			$conta = 0;
			echo "<tr>";
			}
			$vett=explode("|",$riga[$i]);
			echo "<td style='text-align: center;'>";
			
			echo "<img src='../../img/tavolo.jpg'>";
			echo "<br>id= $vett[1],posti= $vett[2]";
			echo"</td>";
			
			$conta+=1;
			
			if($conta==4)
			echo "</tr>";
			
		}
		
		echo "</table>";
	}else
		echo "<h1>Funzione non disponibile!</h1></br></br><h1>Tavoli non ancora aggiunti</h1>";
	
	
	?>
</div>
</center>
</body>
</html>