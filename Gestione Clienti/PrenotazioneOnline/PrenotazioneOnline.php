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
		#temp{
			width: 500px;
			border-style:solid;
			border-color:black;
			border-width:6px;
		}
</style>
</head>
<body>
<center>
<div id="container">
<?php
include("../../Funzioni.php");
	/*
	 *linea = data,idTav,identificativo; 
	 * 
	 * 
	 * 
	 */
	 
	 
	 function ricercaTavoloID($id) {
		
		$riga = leggiDaFile("../../csv/listaTavoli.csv");
		$conta=1;
		for($i=1;$i<count($riga);$i++) {
			
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
		$riga = leggiDaFile("../../csv/listaTavoli.csv");
		$perfetto = 0;
		for($i=1;$i<count($riga);$i++) {
			
			$vett=explode("|",$riga[$i]);
			$posti=(int)$vett[2];
			if($posti>=$nPosti){
				$perfetto=$posti;
				$id=(int)$vett[1];
				break;
			}
			
		}
		
		//controllo tavolo migliore
		$riga = leggiDaFile("../../csv/listaTavoli.csv");
		for($i=1;$i<count($riga);$i++) {
			
			$vett=explode("|",$riga[$i]);
			$posti=(int)$vett[2];
			if($posti>=$nPosti&&$posti<$perfetto){
				$perfetto=$posti;
				$id=(int)$vett[1];
			}
			
		}
		;

	
		return $id;

	}
	
	function selezioneTavolo1($nPosti, $tentativi) {
		$indice=0;
		$precedenti=explode(",",$tentativi);
		//controllo di un tavolo che contenga i posti desiderati
		$riga = leggiDaFile("../../csv/listaTavoli.csv");
		$conta=1;
		
		for($i=1;$i<count($riga);$i++) {
			
			$vett=explode("|",$riga[$i]);
			$err=true;
			
				
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
	
	
	
	function controlloID($data,$id){
		$dataT=strtotime($data);
		$dataG= date('Y-m-d', $dataT);
		$errore=true;
		
		$riga = leggiDaFile("../../csv/registro.csv");
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
	function controlloPiuPrenotazioni($data,$cliente){
		$dataT=strtotime($data);
		$dataG= date('Y-m-d', $dataT);
		$riga = leggiDaFile("../../csv/registro.csv");
		for($i=1;$i<count($riga);$i++) {
			
			$vett=explode("|",$riga[$i]);
			$tempo= $vett[2];
			if($tempo==$cliente){
				$dataQ=strtotime($vett[1]);
				$dataF= date('Y-m-d', $dataQ);
				if($dataF==$dataG){
						return false;
				}
			}
			
		}
		

		return true;
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$dataP=$_POST['data'];
		$ok=0;
		$posti=$_POST['numClienti'];
		$id=0;
		$id= selezioneTavolo($posti);
		
		$cliente = leggiDaFile("../temp.csv");
		
		$tentativi="$id";
		if(!size("../../csv/listaTavoli.csv")){
			$dataErr="Non ci sono tavoli!... attendere che il proprietario gli aggiunga!";
		}
		if(controlloPiuPrenotazioni($dataP,$cliente)){
		do{
			if(controlloID($dataP,$id)){
				 
				$nl = chr(13).chr(10); 
				scriviSuFile("../../csv/registro.csv", "$nl|$dataP|$id|$cliente[0]","a");
				
				echo "</br></br><h1>Prenotazione Effetuata!, Grazie e a presto</h1>";
				echo "<div id='temp'>";
				echo "</br><h2>Data: $dataP</br> numero Tavolo: $id</br> Cliente: $cliente[0]</h2></br>";
				echo "</div>";
				$ok=1;
				break;
			}else{
				$id= selezioneTavolo1($posti,$tentativi);
				echo $id;
				$tentativi.=",$id";
			}
			
		}while($id!=-1);
		}
		if($id==-1){
			$dataErr="Ci spiace, non abbiamo più tavoli per il vostro numero di persone!";
			include("Prenotazione_Online.php");
		}elseif($ok==0){
			$dataErr="Non può fare più prenotazioni per lo stesso giorno!";
			include("Prenotazione_Online.php");
		}
	}
	
?>
</div>
</center>
</body>
</html>