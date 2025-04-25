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
					MENU AMMINISTRATORE
					</h1>
				</td>
				</tr>
			</table>
		</td>
      </tr>
      <tr height="70%" >
        <td width="30%">
          <h2>
            Gestione Tavoli
          </h2>
          <ul>
            <li>
              <a target="contenitore" href="Tavoli/visualizzaTavoli.php">Visualizza Tavoli</a>
            </li>
            <li>
              <a  target="contenitore" href="Tavoli/Inserisci_Tavoli.php">Acquista Tavoli</a>
            </li>
            <li>
              <a  target="contenitore" href="Tavoli/Rimuovi_Tavoli.php">Rimuovi Tavoli</a>
            </li>
          </ul>
          <h2>
            Gestione Camerieri
          </h2>
          <ul>
            <li>
              <a  target="contenitore" href="Camerieri/VisualizzaCamerieri.php">Visualizza Camerieri</a>
            </li>
            <li>
              <a  target="contenitore" href="Camerieri/Inserisci_Camerieri.php">Assumi Camerieri</a>
            </li>
            <li>
              <a  target="contenitore" href="Camerieri/Ricerca_Camerieri.php">Ricerca Camerieri</a>
            </li>
			<li>
              <a  target="contenitore" href="Camerieri/Rimuovi_Camerieri.php">Licenzia Camerieri</a>
            </li>
          </ul>
          <h2>
            Gestione Menu
          </h2>
          <ul>
            <li>
              <a  target="contenitore" href="Menu/visualizzaPietanze.php">Visualizza Menu</a>
            </li>
            <li>
              <a  target="contenitore" href="Menu/inserisci_Pietanze.php">Aggiungi Pietanza</a>
            </li>
            <li>
              <a  target="contenitore" href="Menu/rimuovi_Pietanze.php">Rimuovi Pietanza</a>
            </li>
          </ul>
        </td>
        <td>
          <iframe name="contenitore" width="100%" height="100%" style="background-color:#FC9D5D">
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