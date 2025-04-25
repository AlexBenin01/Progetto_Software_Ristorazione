<html>
<head>
<style type="text/css">
	html,body{margin:0;padding:0}
		body{background: #FC9D5D url(../../../img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
	div#container{width:700px;margin: 0 auto}
		tr{line-height: 3em }
		span{font-size: 20px}
</style>
</head>
<body >
<div id="container">

	<h1>Scontrino</h1>
	<?php
	include("../../../Funzioni.php");
		
				
				$nl = chr(13).chr(10); 
		$scontrino="";
		$conta='a';
				$menu = leggiDaFile("../../../csv/menu.csv");
				for($i=0;$i<count($menu);$i++)
				$conta++;
			
		$contatore='a';
		$totale=0;
		$a='a';
		$A='A';
		$temp=0;
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			while($a<$conta){
				if(!empty($_POST[$a])) {
					$riga1=0;
					for($aa='b';$aa<=$a;$aa++){
						$riga1++;
					}
						$sub1 = explode("|", $menu[$riga1]);
						$well=$_POST[$A];
						$piatto=$sub1[1];
						$scontrino.=($piatto."($well),");
						$well1=(int)$sub1[2];
						$temp=$well1*$well;
						$totale+=$temp;
						echo "<p>$piatto X $well</p>";
				}else{
					$contatore++;
				}
				
			$a++;
			$A++;
			}
		if($contatore==$conta)
			echo "<h2 style='color:red;'>Nessuna Pietanza selezionata, ordine non eseguito!</h2>";
		else{
			echo "<h1>Importo Totale: $totale €</h1>";
				
				scriviSuFile("../../../csv/scontrini.csv", "$scontrino|$totale|$nl", "a");
				
			}
		}
	?>





</div>
</body>
</html>