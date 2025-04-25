<?php
	$utenteLog=$utenteLogErr="";
	$passwordLog=$passwordLogErr="";
	$presenzaErrori = false;
	include("Funzioni.php");
	
	if(empty($_POST['utente'])) {
					$utenteLogErr = "Campo richiesto";
					$presenzaErrori = true;
				}
				elseif(!preg_match("/^[A-Za-z ]*$/", $_POST['utente'])) {
					$utenteLogErr = "Consentiti solo lettere";
					$presenzaErrori = true;
				}
				else
					$utenteLog = $_POST['utente'];
				
	if(empty($_POST['password'])) {
					$passwordLogErr = "Campo richiesto";
					$presenzaErrori = true;
				}
				else
					$passwordLog = $_POST['password'];
	
	if(!$presenzaErrori){
		
		$riga = leggiDaFile("csv/amministratori.csv"); 
		
			for($i=0;$i<count($riga);$i++) {
												
				$sub = explode("|", $riga[$i]);  
				if($utenteLog == $sub[0]) {
					if($passwordLog == $sub[4]){

						header('Location: Gestione Amministratori/GestioneAmministratori.php'); 
					}
				}
			}
			
				
					
					$riga1 = leggiDaFile("csv/utenti.csv"); 
						
						for($i=1;$i<count($riga1);$i++) {   
													
							$sub1 = explode("|", $riga1[$i]); 
							
							if($utenteLog == $sub1[1]) {
								
								if($passwordLog == $sub1[5]){

										scriviSuFile("Gestione Clienti/temp.csv",$utenteLog, "w");
										
									header('Location: Gestione Clienti/GestioneUtenti.php'); 
								}
								
								
							}
						}
				
		$riga2 = leggiDaFile("csv/camerieri.csv"); 
		
						for($i=1;$i<count($riga2);$i++){
				$sub2 = explode("|", $riga2[$i]);  
				if($utenteLog == $sub2[1]) {
					if($passwordLog == $sub2[5]){

						header('Location: Gestione Camerieri/GestioneCamerieri.php'); 
					}
				}
			}
			
				$utenteLogErr="Utente non trovato";
				$passwordLogErr="Password Sbagliata";
				include("Main.php");
	}else{
		include("Main.php");
	}
	
	
?>