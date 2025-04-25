 <html>
 <head>
 <link rel="stylesheet" type="text/css" href="css/index.css">
 <?php
  include("Funzioni.php");
		$nomeRistorante=" ";
			
			
			if(size("csv/ultimoGiorno.csv")){
			$riga = leggiDaFile("csv/ultimoGiorno.csv");
			$vett = explode("|", $riga[0]);
			$nomeRistorante="$vett[0]";
			
			}						
					?>
					<style>
	
	#contenitore{
	font-size: 1.7em;
	font-family: TimesNewRomans;
	padding: 1em;
	text-align: center;
	position: absolute;
  left: 34.5%;
  top: 1%;
  background-color: white;
  
	}
	
	.errore {
	color: red;
	}
	
	
	
</style>
    <title>Ristorante  <?php echo $nomeRistorante ?></title>
 </head>
 <body>
 <?php
 
	$nomErr=$dataErr=$emailErr=$sessoErr=$password2Err=$passwordErr = "";
	$nom=$data=$email=$sesso=$password2=$password = "";
	$tempo=strtotime("-18 year");
	$maxi=date("Y-m-d", $tempo);
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$presenzaErrori = false;		
				//CONTROLLO NOME UTENTE
				if(empty($_POST['nome']) == true) {
					$nomErr = "Campo richiesto";
					$presenzaErrori = true;
					
				}
				elseif(preg_match("/^[A-Za-z ]*$/", $_POST['nome']) == false) {
						$nomErr = "Solo Lettere e spazi";
						$presenzaErrori = true;
						
				}
				
					if($presenzaErrori == false)
						$nom = $_POST['nome'];
				
				
				
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
				
					if($presenzaErrori1 == false)
						$email = $_POST['email'];
					
				
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
					$passwordErr = "Inserire una Maiuscola, minuscola e un numero,</br> lunghezza minima 6 e massimo 10";
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
					$nl = chr(13).chr(10);
					echo "<h1 style='text-aligne:center'>CREA AMMINISTRATORE</h1>";
					scriviSuFile("csv/amministratori.csv","$nom|$data|$email|$sesso|$password|", "w"); 
						echo "<br><br><h2>REGISTRAZIONE AVVENUTA CON SUCCESSO</H2>";
						header('Location: Main.php') ;
					}
					else
						echo"<br><br><h2>ERRORE DI SISTEMA</H2>";
				}
	
		?>
<div id="contenitore">
 <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			NOME AMMINISTRATORE &nbsp;&nbsp; <span class="errore"><?php echo $nomErr; ?></span><br>
			<input type="text" value="<?php echo $nom; ?>" name="nome" maxlength="18" placeholder="Inserisci Nome Amministratore"><br><br>
			DATA DI NASCITA &nbsp;&nbsp; <span class="errore"><?php echo $dataErr; ?></span><br>
			<input type="date" name="data" max="<?php echo $maxi ?>" min="1960-01-01" value="<?php echo $data; ?>"><br><br>
			EMAIL &nbsp;&nbsp; <span class="errore"><?php echo $emailErr; ?></span><br>
			<input type="text" value="<?php echo $email; ?>" name="email" placeholder="Inserisci email"><br><br>
			SESSO &nbsp;&nbsp; <span class="errore"><?php echo $sessoErr; ?></span><br>
			<select name="sesso">
				<option value="errore">Seleziona il sesso</option>
				<option value="m">Maschio</option>
				<option value="f">Femmina</option>
			</select><br><br>
			PASSWORD &nbsp;&nbsp; <span class="errore"><?php echo $passwordErr; ?></span><br>
			<input type="password" value="<?php echo $password; ?>" name="password" maxlength="10" placeholder="Inserisci Password"><br><br>
			RINSERIRE LA PASSWORD &nbsp;&nbsp; <span class="errore"><?php echo $password2Err; ?></span><br>
			<input type="password" value="<?php echo $password2; ?>" name="password2" maxlength="10" placeholder="Rinserisci Password"><br><br>
			<input type="submit" name="invia" value="Invia valori">&nbsp;&nbsp;
			<input type="reset" name="reset" value="Cancella valori">
		</form>
</div>
</body>
</html>