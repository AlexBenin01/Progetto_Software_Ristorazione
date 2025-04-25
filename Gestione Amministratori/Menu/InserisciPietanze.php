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
		<?php
			include("../../Funzioni.php");
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				$presenzaErrori=false;
				
				
				if(preg_match("/^[A-Za-z ]*$/", $_POST['nome']) == false) {
						$nomErr = "Solo Lettere";
						$presenzaErrori = true;
						 
				}else{
					if(size("../../csv/menu.csv")){
							$vett = leggiDaFile("../../csv/menu.csv");
							for($i=1;$i<count($vett);$i++){
								
							$sub = explode("|", $vett[$i]);  
   
								if($_POST['nome'] == $sub[1]) {
									$nomErr = "Pietanze già presente";
									$presenzaErrori = true;
									
								}
							}
					
					}
				}
				if($presenzaErrori == false)
						$nom = $_POST['nome'];
				$costo=$_POST['costo'];

					if($presenzaErrori == false) {
					
					echo "<h1 style='text-aligne:center'>INSERISCI PIETANZA</h1>";
					$nl=chr(13).chr(10);
						if(scriviSuFile("../../csv/menu.csv", "$nl|$nom|$costo|", "a")) 
						echo "<br><br><h2>PIETANZA AGGIUNTA CON SUCCESSO</H2>";
					}
					else
						include("Inserisci_Pietanze.php");
					}
				
					  
					
		?>
		</div>
	</body>
</html>