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
 <form action="InserisciTavoli.php" method="POST">
			<h1>INSERISCI TAVOLO</h1>
			NUMERI POSTI &nbsp;&nbsp;
			<input type="number" name="numPost" max="50" min="2" required></br></br>
			<input type="submit" name="invia" value="Invia valori">&nbsp;&nbsp;
			<input type="reset" name="reset" value="Cancella valori">
		</form>
		</center>
</div>
</body>
</html>