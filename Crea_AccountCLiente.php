 <html>
 <head>
 <?php
$nomeRistorante=" ";
			include("Funzioni.php");
			
			if(size("csv/ultimoGiorno.csv")){
			$riga = leggiDaFile("csv/ultimoGiorno.csv");
			$vett = explode("|", $riga[0]);
			$nomeRistorante="$vett[0]";
			
			}						
					?>
					<style>
			.errore {
				color: red;
			}
		html,body{margin:0;padding:0}
		body{background: #FC9D5D url(img/bodycontainer.jpg) repeat-y center;font:100.01% arial,sans-serif;text-align:center}
	div#container{width:700px;margin: 0 auto}
		tr{line-height: 3em }
		span{font-size: 20px}
 </style>
    <title>Ristorante  <?php echo $nomeRistorante ?></title>
 </head>
 <body>
 <div id="container">
 <?php
			if($_SERVER["REQUEST_METHOD"] != "POST") {
				$nomErr=$dataErr=$emailErr=$sessoErr=$password2Err=$passwordErr = "";
				$nom=$data=$email=$sesso=$password2=$password = "";
			}
			$tempo=strtotime("-18 year");
			$maxi=date("Y-m-d", $tempo);
			
		?>
 <form action="creaAccountCliente.php" method="POST">
 </br>
			NOME UTENTE &nbsp;&nbsp; <span class="errore"><?php echo $nomErr; ?></span><br>
			<input type="text" value="<?php echo $nom; ?>" name="nome" maxlength="18" placeholder="Inserisci Nome Utente"><br><br>
			DATA DI NASCITA &nbsp;&nbsp; <span class="errore"><?php echo $dataErr; ?></span><br>
			<input type="date" name="data" max="<?php echo $maxi ;?>" min="1960-01-01" value="<?php echo $data; ?>"><br><br>
			EMAIL &nbsp;&nbsp; <span class="errore"><?php echo $emailErr; ?></span><br>
			<input type="text" value="<?php echo $email; ?>" name="email" placeholder="Inserisci email"><br><br>
			SESSO &nbsp;&nbsp; <span class="errore"><?php echo $sessoErr; ?></span><br>
			<select name="sesso">
				<option value="errore">Seleziona il sesso</option>
				<option value="m">Maschio</option>
				<option value="f">Femmina</option>
			</select><br><br>
			PASSWORD &nbsp;&nbsp; <span class="errore"><?php echo $passwordErr; ?></span><br>
			<input type="password" value="<?php echo $password; ?>" name="password" maxlength="10" placeholder="Inserisci Password"><br><br>
			RINSERIRE LA PASSWORD &nbsp;&nbsp; <span class="errore"><?php echo $password2Err; ?></span><br>
			<input type="password" value="<?php echo $password2; ?>" name="password2" maxlength="10" placeholder="Rinserisci Password"><br><br>
			<input type="submit" name="invia" value="Invia valori">&nbsp;&nbsp;
			<input type="reset" name="reset" value="Cancella valori">
		</form>
	</div>
</body>
</html>