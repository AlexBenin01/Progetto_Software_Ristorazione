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
	<?php
		
		$Err="";
			
			include("../../Funzioni.php");
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				if(size("../../csv/camerieri.csv")){
				//CONTROLLO se è vuota
				if(empty($_POST['scelta'])) {
					$Err="*Spunta una delle tre opzioni";
					include("Ricerca_Camerieri.php");
					
				}
				$scelta=$_POST['scelta'];
				$er=true;
				
				switch($scelta){
				
					case 1: 
						//CONTROLLO NOME UTENTE
						if(empty($_POST['nome']) == true) {
							$Err = "Campo richiesto";
							include("Ricerca_Camerieri.php");
							
						}
						elseif(preg_match("/^[A-Za-z ]*$/", $_POST['nome']) == false) {
								$Err = "Solo Lettere e spazi!";
								include("Ricerca_Camerieri.php");
								
						}
						else{
							echo "<table >";
								
							$i=2;
							$riga= ricercaNumeroRiga("../../csv/camerieri.csv", $i);
							$conta = 4;
							do{
								
								if($conta==4){
								$conta = 0;
								echo "<tr>";
								}
								$vett=explode("|",$riga);
								if($_POST['nome'] == $vett[1]){
									$er=false;
								echo "<td style='text-align: center;'>";
								if($vett[4] == 'm')
									echo "<img  src='../../img/ragazzo.jpg' ><br>";
								else
									echo "<img  src='../../img/ragazza.jpg' ><br>";
								echo "nome= $vett[1],</br>età= $vett[2]";
								echo"</td>";
								$conta+=1;
								}
								if($conta==4)
								echo "</tr>";
							
								$i++;
								$riga= ricercaNumeroRiga("../../csv/camerieri.csv", $i);
							}while($riga!= false);
							echo "</table>";

							if($er){
								$Err = "Cameriere non presente in elenco";
								include("Ricerca_Camerieri.php");
							}
						}
						break;
						
					case 2:
					
					//CONTROLLO DATA DI NASCITA
					if(empty($_POST['data']) == true) {
						$Err = "Seleziona la data di nascita";
						$presenzaErrori = true;
					}
					else{
						echo "<table>";
								
							$i=2;
							$riga= ricercaNumeroRiga("../../csv/camerieri.csv", $i);
							$conta = 4;
							do{
								
								if($conta==4){
								$conta = 0;
								echo "<tr>";
								}
								$vett=explode("|",$riga);
								$subData=explode("-",$vett[2]);
								if($_POST['data'] == $subData[0]){
									$er=false;
								echo "<td style='text-align: center;'>";
								if($vett[4] == 'm')
									echo "<img  src='../../img/ragazzo.jpg' ><br>";
								else
									echo "<img  src='../../img/ragazza.jpg' ><br>";
								echo "nome= $vett[1],</br>età= $vett[2]";
								echo"</td>";
								$conta+=1;
								}
								if($conta==4)
								echo "</tr>";
							
								$i++;
								$riga= ricercaNumeroRiga("../../csv/camerieri.csv", $i);
							}while($riga!= false);
							echo "</table>";

							if($er){
								$Err = "Cameriere non presente in elenco";
								include("Ricerca_Camerieri.php");
							}
						}
						break;
					
					
					case 3:
					$conta1=4;
					//CONTROLLO SESSO
					if($_POST['sesso'] == "errore") {
						$Err = "Seleziona il sesso";
						include("Ricerca_Camerieri.php");
					}
					else{
						echo "<table>";
								
							$i=2;
							$riga= ricercaNumeroRiga("../../csv/camerieri.csv", $i);
							$conta = 4;
							do{
								
								if($conta==4){
								$conta = 0;
								echo "<tr>";
								}
								$vett=explode("|",$riga);
								if($_POST['sesso'] == $vett[4]){
									$er=false;
								echo "<td style='text-align: center;'>";
								if($vett[4] == 'm')
									echo "<img  src='../../img/ragazzo.jpg' ><br>";
								else
									echo "<img  src='../../img/ragazza.jpg' ><br>";
								echo "nome= $vett[1],</br>età= $vett[2]";
								echo"</td>";
								$conta+=1;
								}
								if($conta==4)
								echo "</tr>";
							
								$i++;
								$riga= ricercaNumeroRiga("../../csv/camerieri.csv", $i);
							}while($riga!= false);
							echo "</table>";

							if($er){
								$Err = "Cameriere non presente in elenco";
								include("Ricerca_Camerieri.php");
							}
						}
						break;
					
					
					}
				}else{
					$Err="Non ci sono Cameriere da Cercare!";
					include("Ricerca_Camerieri.php");
				}
					
			}
		?>
		</center>
		</div>
	</body>
</html>