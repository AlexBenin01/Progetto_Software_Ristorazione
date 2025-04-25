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
<center>
	<?php
	include("../../Funzioni.php");
	function controlloID($id){
		$dataT=strtotime("now");
		$dataG= date('Y-m-d', $dataT);
		$errore=true;
		
		$riga = leggiDaFile("../../csv/registro.csv");
		for($i=0;$i<count($riga);$i++){
			
			$vett=explode("|",$riga[$i]);
			$dataQ=strtotime($vett[0]);
			$dataF= date('Y-m-d', $dataQ);
			if($dataF==$dataG){
				
				if($id==$vett[1]){
					$errore=false;
				}
			}
			
			
		}
		

		return $errore;
	}
	
	
	
	
	
	
	if(size("../../csv/listaTavoli.csv")) {
		echo"<table border='1px'>";
		echo"<tr>";
		echo"<th colspan='4'>";
		echo"<h1>Lista Tavoli</h1>";
		echo"</th>";
		echo"</tr>";
		
		$riga = leggiDaFile("../../csv/listaTavoli.csv");
		$conta = 4;
		$controllo=true;
		for($i=1;$i<count($riga);$i++){
			if($conta==4){
			$conta = 0;
			echo "<tr>";
			}
			$vett=explode("|",$riga[$i]);
			$id=(int)$vett[0];
			if(controlloID($id)){
			echo "<td>";
			echo "id= $vett[0],posti= $vett[1]";
			echo "<img src='../../img/tavolo.jpg'>";
			echo"</td>";
			$conta+=1;
			$controllo=false;
			}
			
			if($conta==4)
			echo "</tr>";
			
		}
		
		if($controllo){
			echo "<tr><td><h2>Nessun tavolo Disponibile per questa sera!</h2></td></tr>";
		}
		echo "</table>";
	}else
		echo "<h1>Funzione non disponibile!</h1></br></br><h1>Tavoli non ancora aggiunti</h1>";
	
	
	?>

</center>
</div>
</body>
</html>