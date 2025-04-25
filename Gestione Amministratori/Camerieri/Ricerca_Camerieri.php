<html>
<head>
<style>
html,body{margin:0;padding:0}
		body{background: #FC9D5D url(../../img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
	div#container{width:700px;margin: 0 auto}
		tr{line-height: 3em }
		span{font-size: 20px}
	span{
		font-size: 1.5em;
	}
	.errore{
		color: red;
		font-size: 16px;
	}
</style>
</head>
<body>
<center>
<div id="container">
<?php
	if($_SERVER["REQUEST_METHOD"] != "POST") {
		$Err=$nomErr=$sessoErr=$dataErr="";
	}
?>

<h1>Ricerca</h1>
<p class="errore">Solo la ricerca spuntata sarà effettuata</p></br>
<span class="errore"><?php echo $Err ?></span>

<form action="RicercaCamerieri.php" method="POST">
<table>
	<tr>
		<td><span>Nome</span><input type='radio' name='scelta' value='1' required><input type="text"  maxlength="18" name="nome" placeholder="Inserisci Nome Cameriere"><br><br></td>
	</tr>
	<tr>
		<td><span>Anno<span class="errore"></span><input type='radio' name='scelta' value='2' required><input type="number" name="data" max="2002" min="1940" ></br></br></td>
	</tr>
	<tr>
	<td><span>Sesso<span class="errore"></span><input type='radio' name='scelta' value='3' required>
			<select name="sesso">
				<option value="errore">Seleziona il sesso</option>
				<option value="m">Maschio</option>
				<option value="f">Femmina</option>
			</select><br><br>
	</td>
	</tr>
</table>
	
	<input type="submit" name="invia" value="Ricerca">&nbsp;&nbsp;
	<input type="reset" name="reset" value="Svuota campi">
	</form>
</div>
</center>
</body>
</html>