<html>
 <head>
 <style>
 html,body{margin:0;padding:0}
		body{background: #FC9D5D url(../../img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
	div#container{width:700px;margin: 0 auto}
		tr{line-height: 3em }
		span{font-size: 20px}
 </style>
 </head>
 <body>
 <div id="container">
 <center>
 <form action="RimuoviTavoli.php" method="POST">
 <?php
			include("../../Funzioni.php");
			if(size("../../csv/listaTavoli.csv")){
			echo"<h1>RIMUOVI TAVOLO</h1>";
			echo"TAVOLO ID&nbsp;&nbsp;";
			echo"<input type='number' name='id' min='100' required></br></br>";
			echo"<input type='submit' name='invia' value='Invia valori'>&nbsp;&nbsp;";
			echo"<input type='reset' name='reset' value='Cancella valori'>";
		echo"</form>";
			}else
			echo "<h1>Funzione non disponibile!</h1></br></br><h1>Tavoli non ancora aggiunti</h1>";
?>
		</center>
	</div>
</body>
</html>