<html>
<head>
</head>
<body>
<?php
	$numeroRigaPietanza = $_POST['pietanza'];
			
			include("../../Funzioni.php");
			rimuovi("../../csv/menu.csv",$numeroRigaPietanza, "../../");
			
			
			echo "<h2>Pietanza rimossa con successo!</h2>";

?>
</body>
</html>