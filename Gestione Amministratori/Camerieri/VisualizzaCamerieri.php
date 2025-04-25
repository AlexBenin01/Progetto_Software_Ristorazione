</head>
<body>
<center>
<div id="container">


	<?php
	include("../../Funzioni.php");
	if(size("../../csv/camerieri.csv")) {
		echo "<table border='1px'>";
			echo"<tr>";
			echo"<th colspan='4'>";
			echo"<h1>Lista Camerieri</h1>";
			echo"</th>";
			echo"</tr>";
		$i=2;
		$riga= ricercaNumeroRiga("../../csv/camerieri.csv", $i);
		$conta = 4;
		do{
			
			if($conta==4){
			$conta = 0;
			echo "<tr>";
			}
			$vett=explode("|",$riga);
			echo "<td style='text-align: center;'>";
			if($vett[4] == 'm')
				echo "<img  src='../../img/ragazzo.jpg' ><br>";
			else
				echo "<img  src='../../img/ragazza.jpg' ><br>";
			echo "nome= $vett[1],</br>età= $vett[2]";
			echo"</td>";
			$conta+=1;
			
			if($conta==4)
			echo "</tr>";
		
			$i++;
			$riga= ricercaNumeroRiga("../../csv/camerieri.csv", $i);
		}while($riga!= false);
		echo "</table>";
		
	}else
		echo "<h1>Funzione non disponibile!</h1></br></br><h1>Non ci sono ancora Camerieri!</h1>";
	
	
	?>

</div>
</center>
</body>
</html>