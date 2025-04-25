<html>
<head>
<style type="text/css">
	html,body{margin:0;padding:0}
		body{background: #FC9D5D url(../../../img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
	div#container{width:700px;margin: 0 auto}
		tr{line-height: 3em }
		span{font-size: 20px}
		#errore{
			color:red;
		}
</style>
</head>
<body >

<?php

function controlloID($id){
		$dataT=strtotime("now");
		$dataG= date('Y-m-d', $dataT);
		$errore=true;
		
		$riga = leggiDaFile("../../../csv/registro.csv");
		for($i=1;$i<count($riga);$i++) {
			
			$vett=explode("|",$riga[$i]);
			$dataQ=strtotime($vett[1]);
			$dataF= date('Y-m-d', $dataQ);
			if($dataF==$dataG){
				if($id==$vett[2]){
					$errore=false;
				}
			}
			
			
		}
		

		return $errore;
	}
	if($_SERVER["REQUEST_METHOD"] != "POST"){
		$err="";
	}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$cliente= $_POST['cliente'];
	if(controlloPrenotazioni($cliente))
		header("Location: Ordinazioni.php");
	else
		$err="Nessuna Prenotazione trovata!";
	
}
?>

<div id="container">
	<form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		</br></br>
		<h1>ORDINAZIONI CON PRENOTAZIONE</h1>
		</br>
		<span id="errore"><?php echo $err ?></span>
		</br>
		Nome Utente del Cliente <input type="text" name="cliente" placeholder="Nome Utente del Cliente" required>
		</br></br>
		<input type='submit' name='invia' value='Indirizza'>&nbsp;&nbsp;
		<input type='reset' name='reset' value='Svuota campi'>
		
		
	</form>
</div>



</body>
</html>