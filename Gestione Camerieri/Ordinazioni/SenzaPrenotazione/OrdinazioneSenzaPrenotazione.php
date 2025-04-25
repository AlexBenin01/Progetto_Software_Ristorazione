<html>
<head>
<style type="text/css">
	html,body{margin:0;padding:0}
		body{background: #FC9D5D url(../../../img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
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
include("../../../Funzioni.php");
$data=$dataErr="";

$conta = 0;
if(size("../../../csv/listaTavoli.csv")) {
		
		$riga = leggiDaFile("../../../csv/listaTavoli.csv");
		
		for($i=1;$i<count($riga);$i++){
			
			$vett=explode("|",$riga[$i]);
			$posti=(int)$vett[2];
			if($conta<$posti)
				$conta=$posti;
			
			
			
			
		}
		
}else
	$dataErr="Attendere che il proprietario aggiunga i tavoli!";


	function ricercaTavoloID($id) {
		 
		$riga = leggiDaFile("../../../csv/listaTavoli.csv");
		$conta=1;
		for($i=1;$i<count($riga);$i++){
			
			$vett=explode("|",$riga[$i]);
			$indice=(int)$vett[1];
			if($indice==$id){
				return $conta;
			}
			$conta++;
			
		}
		
		return -1;
	}
	 
	 
	 
function selezioneTavolo($nPosti) {
		$id=-1;
		//controllo di un tavolo che contenga i posti desiderati
		$riga = leggiDaFile("../../../csv/listaTavoli.csv");
		$perfetto = 0;
		for($i=1;$i<count($riga);$i++){
			
			$vett=explode("|",$riga[$i]);
			$posti=(int)$vett[2];
			if($posti>=$nPosti){
				$perfetto=$posti;
				$id=(int)$vett[1];
				break;
			}
			
		}
		
		//controllo tavolo migliore
		$riga = leggiDaFile("../../../csv/listaTavoli.csv");
		for($i=1;$i<count($riga);$i++){
			
			$vett=explode("|",$riga[$i]);
			$posti=(int)$vett[2];
			if($posti>=$nPosti&&$posti<$perfetto){
				$perfetto=$posti;
				$id=(int)$vett[1];
			}
			
		}
		

	
		return $id;

	}
	
	function selezioneTavolo1($nPosti, $tentativi) {
		$indice=0;
		$precedenti=explode(",",$tentativi);
		//controllo di un tavolo che contenga i posti desiderati
		$riga = leggiDaFile("../../../csv/listaTavoli.csv");
		$conta=1;
		for($i=1;$i<count($riga);$i++){
			$err=true;
			
				$vett=explode("|",$riga[$i]);
			if($precedenti[$indice]!=$vett[1]){
				$i=$indice;
				do{
					if($precedenti[$i]==$vett[1])
						$err=false;
					
					$i++;
				}while(!empty($precedenti[$i]));
				if($err){
						$posti=$vett[2];
					if($posti>=$nPosti){
						$id=(int)$vett[1];
						return $id;
					}
				}
			}else{
				$indice++;
				if(empty($precedenti[$indice]))
				$indice--;
			}
			
			
			$conta++;
		}
		

		return -1;

	}
	
	
	
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
	
	
	function controlloPiuPrenotazioni($cliente){
		$dataT=strtotime("now");
		$dataG= date('Y-m-d', $dataT);
		$riga = leggiDaFile("../../../csv/registro.csv");
		for($i=1;$i<count($riga);$i++) {
			
			$vett=explode("|",$riga[$i]);
			$tempo= $vett[3];
			if($tempo==$cliente){
				$dataQ=strtotime($vett[0]);
				$dataF= date('Y-m-d', $dataQ);
				if($dataF==$dataG){
						return false;
				}
			}
			
		}
		

		return true;
	}
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$ok=0;
		$posti=$_POST['numClienti'];
		$id=0;
		$id= selezioneTavolo($posti);
		$cliente = $_POST["Cliente"];
		$tentativi="$id";
		$dataT=strtotime("now");
		$data= date('Y-m-d', $dataT);
		if(!size("../../../csv/listaTavoli.csv")){
			$dataErr="Non ci sono tavoli!... attendere che il proprietario gli aggiunga!";
		}
		if(controlloPiuPrenotazioni($cliente)){
			do{
				if(controlloID($id)){
					 
					$nl = chr(13).chr(10); 
					scriviSuFile("../../../csv/registro.csv", "$nl|$data|$id|$cliente|", "a");
					
					header("Location:Ordinazioni.php");
					$ok=1;
					break;
				}else{
					$id= selezioneTavolo1($posti,$tentativi);
					$tentativi.=",$id";
				}
				
			}while($id!=-1);
			$dataErr="Ci spiace, non abbiamo più tavoli per il vostro numero di persone!";
		}else
			$dataErr="Prenotazione con questo nome Trovata!";
	}
	
?>
<form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	<h1>ORDINAZIONE AL MOMENTO</h1>
	</br>
	<h2 class="errore"><?php echo $dataErr; ?></h2>
	<br>
	<h3>Nome Cliente&nbsp;&nbsp;</h3>
			<input type="text" name="Cliente" placeholder="Nome Cliente" required></br></br>
	<h3>N°PERSONE &nbsp;&nbsp;</h3>
			<input type="number" name="numClienti" max="<?php echo $conta?>" min="1" required></br></br>
	
	</br>
	<input type="submit" name="invia" value="Prenota">&nbsp;&nbsp;
	<input type="reset" name="reset" value="Svuota campi">
	</form>
</div>



</body>
</html>