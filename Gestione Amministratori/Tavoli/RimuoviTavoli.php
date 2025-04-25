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
<?php

	include("../../Funzioni.php");
	echo "<h1>RIMOZIONE TAVOLO<h1>";
	$id=$_POST['id'];
	$conta= rimuoviID("../../csv/listaTavoli.csv", $id, "../../");
	if($conta==0)
		echo "</br><h2>Tavolo non trovato!<h2>";
	else
		echo "</br><h2>Tavolo $id Eliminato!<h2>";

?>
</div>
</body>
</html>