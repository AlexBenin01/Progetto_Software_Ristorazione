<html>
<head>
<style type="text/css">
	html,body{margin:0;padding:0}
		body{background: #FC9D5D url(../../img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
	div#container{width:700px;margin: 0 auto}
		tr{line-height: 3em }
		span{font-size: 20px}
		.errore{
			color:red;
		}
</style>
</head>
<body >

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$orienta=$_POST['orienta'];
	if($orienta=="con"){
		header("Location:ConPrenotazione/OrdinazioneConPrenotazione.php");
	}
	else
		header("Location:SenzaPrenotazione/OrdinazioneSenzaPrenotazione.php");
}
?>

<div id="container">
	<form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		</br></br>
		<h1>ORDINAZIONI</h1>
		</br></br>
		<input type="radio" name="orienta" value="con" required>Ordinazione con Prenotazione
		</br></br>
		<input type="radio" name="orienta" value="senza" required>Ordinazione senza Prenotazione
		</br></br>
		<input type='submit' name='invia' value='Indirizza'>&nbsp;&nbsp;
		<input type='reset' name='reset' value='Svuota campi'>
		
		
	</form>
</div>



</body>
</html>