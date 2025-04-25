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
		<?php
				include("../../Funzioni.php");
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$id=0;
				$nomeRist="";
				
				
					$riga = leggiDaFile("../../csv/ultimoGiorno.csv");
					$vett = explode("|", $riga[0]);
					$nomeRist=$vett[0];
					$id=$vett[1];
					$id1=($id+1);
					scriviSuFile("../../csv/ultimoGiorno.csv", "$nomeRist|$id1|", "w");
				
				
			
				$numPost=$_POST['numPost'];
				echo "<h1 style='text-aligne:center'>CREA TAVOLO</h1>";
					  		 //impedisco ad altri processi di utilizzare il file
						$nl = chr(13).chr(10); 
						scriviSuFile("../../csv/listaTavoli.csv", "$nl|$id|$numPost|", "a");
						
						echo "id tavolo = $id</br> numero Posti= $numPost$nl";
					}
					
		?>
		<div>
		<img src="../../img/tavolo.jpg"></br>
		<h2>TAVOLO AGGIUNTO CON SUCCESSO</H2>
		</div>
		</div>
	</body>
</html>