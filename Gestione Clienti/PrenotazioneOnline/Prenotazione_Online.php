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

<div id="container">
<?php
include("../../Funzioni.php");
if($_SERVER["REQUEST_METHOD"] != "POST") {
$data=$dataErr="";
}
$timestamp = strtotime("+1 day");
$timestamp1 = strtotime("+1 month");
$max=date('Y-m-d', $timestamp1);
$min=date('Y-m-d', $timestamp);
$conta = 0;
if(size("../../csv/listaTavoli.csv")) {
		
		$riga = leggiDaFile("../../csv/listaTavoli.csv");
		
		for($i=1;$i<count($riga);$i++) {
			
			$vett=explode("|",$riga[$i]);
			$posti=(int)$vett[2];
			if($conta<$posti)
				$conta=$posti;
			
			
			
			
		}
		
}else
	$dataErr="Attendere che il proprietario aggiunga i tavoli!";


?>
<form form action="PrenotazioneOnline.php" method="POST">
	<h1>PRENOTAZIONE ONLINE</h1>
	</br>
	<h2 class="errore"><?php echo $dataErr; ?></h2>
	<h3>DATA DI PRENOTAZIONE&nbsp;&nbsp;</h3>
			<input type="date" name="data" max="<?php echo $max; ?>" min="<?php echo $min?>" required><br><br>
	<h3>N°PERSONE &nbsp;&nbsp;</h3>
			<input type="number" name="numClienti" max="<?php echo $conta?>" min="1" required></br></br>
	
	</br>
	<input type="submit" name="invia" value="Prenota">&nbsp;&nbsp;
	<input type="reset" name="reset" value="Svuota campi">
	</form>
</div>



</body>
</html>