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
		$nomErr=$dataErr=$emailErr=$sessoErr=$password2Err=$passwordErr = "";
				$nom=$data=$email=$sesso=$password2=$password = "";
			$presenzaErrori = false;
		
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				
				//CONTROLLO NOME UTENTE
				if(empty($_POST['nome']) == true) {
					$nomErr = "Campo richiesto";
					$presenzaErrori = true;
					
				}
				elseif(preg_match("/^[A-Za-z ]*$/", $_POST['nome']) == false) {
						$nomErr = "Solo Lettere e spazi";
						$presenzaErrori = true;
						
				}
				else{
					if(size("../../csv/camerieri.csv")){
							$vett = leggiDaFile("../../csv/camerieri.csv");
							for($i=0;$i<count($vett);$i++){
								
							$sub = explode("|", $vett[$i]);  
   
								if($_POST['nome'] == $sub[0]) {
									$nomErr = "Cameriere già presente";
									$presenzaErrori = true;
									
								}
							}
					
					
					}
					if($presenzaErrori == false)
						$nom = $_POST['nome'];
				}
				
				
				//CONTROLLO DATA DI NASCITA
				if(empty($_POST['data']) == true) {
					$dataErr = "Seleziona la data di nascita";
					$presenzaErrori = true;
				}
				else
					$data = $_POST['data'];
				
				//CONTROLLO EMAIL
				$presenzaErrori1=false;
				if(empty($_POST['email']) == true) {
					$emailErr = "Campo richiesto";
					$presenzaErrori = true;
					$presenzaErrori1=true;
				}
				elseif(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
					$emailErr = "Formato email errato";
					$presenzaErrori = true;
					$presenzaErrori1=true;
				}
				else{
					if(size("../../csv/camerieri.csv")){
							$vett = leggiDaFile("../../csv/camerieri.csv");
							for($i=0;$i<count($vett);$i++){
								
							$sub = explode("|", $vett[$i]);  
   
								if($_POST['nome'] == $sub[2]) {
									$emailErr = "Email già presente";
									$presenzaErrori = true;
									$presenzaErrori1 = true;
								}
							}
					
				}
				if($presenzaErrori1 == false)
						$email = $_POST['email'];
				}	
				
				//CONTROLLO SESSO
				if($_POST['sesso'] == "errore") {
					$sessoErr = "Seleziona il sesso";
					$presenzaErrori = true;
				}
				else
					$sesso = $_POST['sesso'];
				
				//CONTROLLO PASSWORD
				if(empty($_POST['password']) == true) {
					$emailErr = "Password non inserita";
					$presenzaErrori = true;
				}
				elseif(preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{6,10}$/", $_POST['password']) == false) {
					$passwordErr = "Inserire una lettera Maiuscola, minuscola e un numero,</br> lunghezza minima 6 e massimo 10";
					$presenzaErrori = true;
					
				}
				else{
					if(empty($_POST['password2']) == true) {
					$password2Err = "Password non inserita";
					$presenzaErrori = true;
					}else{
							if($_POST['password']==$_POST['password2'])
							$password=$_POST['password'];
							else{
								$password2Err = "Password non uguale";
								$presenzaErrori = true;
							}
						}
				}
				
				
				//SE NON SONO STATI COMMESSI ERRORI, PROCEDO CON L'INSERIMENTO
				if($presenzaErrori == false) {
					
					
					echo "<h1 style='text-aligne:center'>CREA CAMERIERE</h1>";
						$nl=chr(13).chr(10);
							if(scriviSuFile("../../csv/camerieri.csv", "$nl|$nom|$data|$email|$sesso|$password|", "a")) 
						echo "<br><br><h2>REGISTRAZIONE AVVENUTA CON SUCCESSO</H2>";
					}
					
				}
				else
					include("Inserisci_Camerieri.php");  
						
			}
		?>
		</div>
	</body>
</html>