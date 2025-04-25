<html>
 <head>
 <style>
 .errore{
	 color:red;
 }
 html,body{margin:0;padding:0}
		body{background: #FC9D5D url(../../img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
	div#container{width:700px;margin: 0 auto}
		tr{line-height: 3em }
		span{font-size: 20px}
 </style>
 </head>
 <body >
 <div id="container">
 <center>
  <?php
			if($_SERVER["REQUEST_METHOD"] != "POST") {
				$nomErr= "";
			}
		?>
 <form action="InserisciPietanze.php" method="POST">
			<h1>INSERISCI PIETANZA</h1>
			NOME PIETANZA &nbsp;&nbsp; <span class="errore"><?php echo $nomErr; ?></span>
			<input type="text"  name="nome" placeholder="Inserisci Nome Pietanza" maxlength="10"required><br><br>
			COSTO PIETANZA &nbsp;&nbsp;
			<input type="number" name="costo" max="250" min="1" required></br></br>
			<input type="submit" name="invia" value="Invia valori">&nbsp;&nbsp;
			<input type="reset" name="reset" value="Cancella valori">
		</form>
 </div>
		</center>
</body>
</html>