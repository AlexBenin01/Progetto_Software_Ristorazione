<html>
  <head>
   <?php
   if($_SERVER["REQUEST_METHOD"] != "POST") {
include("Funzioni.php");
}
		$nomeRistorante=" ";
			
			
			if(size("csv/ultimoGiorno.csv")){
			$riga = leggiDaFile("csv/ultimoGiorno.csv");
			$vett = explode("|", $riga[0]);
			$nomeRistorante="$vett[0]";
			
			}
   			
	?>
					<style>
					tr-td{
			border-color: black;
			border: 1px;
		}
					html,body{margin:0;padding:0}
		#contenitore{ border-bottom-color: black; background: #FC9D5D url(img/bodycontainer.jpg) repeat-y center ;font:100.01% arial,sans-serif;text-align:center}
	di#container{width:700px;}
			.errore {
				color: red;
			}
		tr-td{
			border-color: black;
			border: 1px;
		}	
		div.inset {border-style: groove;
		border-radius: 20px;
		margin-left:  17px;
		width: 350px;
		height: 100px;
		text-align: center;
		}
		</style>
    <title>Ristorante  <?php echo $nomeRistorante ?></title>
  </head>
  <body style="background-color:#fc9d5d">
 <?php
			if($_SERVER["REQUEST_METHOD"] != "POST") {
				$utenteLogErr=$passwordLogErr= "";
				$utenteLog=$passwordLog= "";
			}
		?>
    <table border="1px" height="100%" width="100%">
	<tr height="5%" style="text-align:center;background-color:#f96706">
        <td colspan="2">
        </td>
      </tr>
      <tr height="15%"  >
        <td style="background-color:white">
		<div class="inset"> 
		</br>
          <span style="text-align:center; font-size: 2em"><strong>Login </strong></span></br>
		  <span style="text-align:center; font-size: 1em" ><strong>Clienti & Camerieri & Manager</strong></span>
		  <div>
        </td>
		<td id="contenitore">
		<div id="container">
		<form action="Direziona.php" method="POST">
		NOME UTENTE &nbsp;&nbsp; <span class="errore"><?php echo $utenteLogErr; ?></span><input type="text" value="<?php echo $utenteLog; ?>" name="utente" maxlength="18" placeholder="Inserisci Nome utente"></br>
		PASSWORD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<span class="errore"><?php echo $passwordLogErr; ?></span><input type="password" maxlength="18"value="<?php echo $passwordLog; ?>" name="password" placeholder="Inserisci Password"></br></br>
		<input type="submit" name="invia" value="Invia valori">&nbsp;&nbsp;
		<input type="reset" name="reset" value="Cancella valori">
		</form>
		</div>
		</td>
      </tr>
      <tr height="55%" >
        <td width="30%" style="background-color:white">
		<div class="inset">
		</br>
          <h2 style="text-align:center">
            Creazione Account Cliente
          </h2>
		  </div>
        </td>
        <td style="border-color: rgba(0,0,255,0);">
        <iframe src="Crea_AccountCliente.php" width="100%" height="100%">
		
		</iframe>
        </td>
      </tr>
      <tr height="5%" style="text-align:center;background-color:#f96706">
        <td colspan="2">
        </td>
      </tr>
    </table>
  </body>
</html>