<html>
  <head>
    <?php
$nomeRistorante=" ";
			include("../Funzioni.php");
			
			if(size("../csv/ultimoGiorno.csv")){
			$riga = leggiDaFile("../csv/ultimoGiorno.csv");
			$vett = explode("|", $riga[0]);
			$nomeRistorante="$vett[0]";
			
			}
													
	?>
	<style>
		#float{
			padding-right: 40em;
		}
	</style>
    <title>Ristorante  <?php echo $nomeRistorante ?></title>
  </head>
  <body>
    <table border="1px" height="100%" width="100%">
      <tr height="15%" style="background-color:#f96706">
        <td colspan="2">
			<table >
				<tr>
				<td id="float">
					<form 
						method="get" action="../Main.php">
						<input type="submit" 
						style="
						border: solid thin #f96706;
						width: 59px;
						height: 48px; 
						background-repeat: no-repeat;
						background-image: url('../img/frecciaTornaIndietro1.png');">
					</form>
				</td>
				<td>
					<h1 style="text-align:center">
					MENU CAMERIERE
					</h1>
				</td>
				</tr>
			</table>
		</td>
      </tr>
      <tr height="70%">
        <td width="30%">
          <h2>
            Gestione Tavoli
          </h2>
          <ul>
            <li>
              <a target="contenitore" href="Tavoli/visualizzaTavoli.php">Visualizza Tavoli Liberi</a>
            </li>
          </ul>
          <h2>
            Gestione Ordinazioni
          </h2>
          <ul>
            <li>
              <a  target="contenitore" href="Menu/VisualizzaPietanze.php">Visualizza Menu</a>
            </li>
            <li>
              <a  target="contenitore" href="Ordinazioni/Inserisci_Ordinazione.php">Ordinazione</a>
            </li>
          </ul>
        </td>
        <td>
          <iframe name="contenitore" width="100%" height="100%">
          </iframe>
        </td>
      </tr>
      <tr height="15%" style="background-color:#f96706">
        <td colspan="2">
        </td>
      </tr>
    </table>
  </body>
</html>