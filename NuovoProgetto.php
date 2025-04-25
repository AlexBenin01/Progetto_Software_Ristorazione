<html>
<head>
<title>Ristorante</title>
<link rel="stylesheet" type="text/css" href="css/index.css">
<style>
	
	#contenitore{
	font-size: 1.7em;
	font-family: TimesNewRomans;
	padding: 1em;
	text-align: center;
	position: absolute;
  left: 37%;
  top: 55%;
  background-color: white;
  
	}
	
	.errore {
	color: red;
	}
	
	
	
</style>
</head>
<body>
<?php
include("Funzioni.php");
$nomeRist=$nomeRistErr="";
unlink("csv/utenti.csv");
touch("csv/utenti.csv");
unlink("csv/amministratori.csv");
touch("csv/amministratori.csv");
unlink("csv/ultimoGiorno.csv");
touch("csv/ultimoGiorno.csv");
unlink("csv/menu.csv");
touch("csv/menu.csv");
unlink("csv/camerieri.csv");
touch("csv/camerieri.csv");
unlink("csv/listaTavoli.csv");
touch("csv/listaTavoli.csv");
unlink("csv/registro.csv");
touch("csv/registro.csv");
unlink("csv/scontrini.csv");
touch("csv/scontrini.csv");
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(empty($_POST['nomeRist'])) {
	$nomeRistErr = "Campo richiesto";
	}
	else{
		
		$nl = chr(13).chr(10);
		$nomeRist=$_POST['nomeRist'];
		$stringa="$nomeRist|100|$nl";
				scriviSuFile("csv/ultimoGiorno.csv", $stringa, 'w');
				
				header('Location: Crea_AccountManagerPrimo.php') ; 
			}
		
}
?>
<div id="contenitore">
<form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	NOME RISTORANTE &nbsp;&nbsp; <span class="errore"><?php echo $nomeRistErr; ?></span><br>
	<input type="text" value="<?php echo $nomeRist; ?>" name="nomeRist" placeholder="Inserisci Nome Ristorante"><br>
	<input type="submit" name="invia" value="Invia valori">&nbsp;&nbsp;
	<input type="reset" name="reset" value="Cancella valori">	
</form>
</div>
</body>
</html>