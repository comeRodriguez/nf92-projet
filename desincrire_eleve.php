<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Désincription d'un élève </h1>
	<h2> Confirmation </h2>
	<?php
	$eleve = $_POST["eleve"];
	$seance = $_POST["seance"];
	$dbhost = 'tuxa.sme.utc'; 
	$dbuser = 'nf92a055'; 
	$dbpass = 'AC1j6leU'; 
	$dbname = 'nf92a055'; 
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
	$query = "DELETE FROM inscriptions WHERE inscriptions.idseance2 = $seance AND inscriptions.ideleve = $eleve";
	$result = mysqli_query($connect, $query); 
	echo "L'élève a bien été supprimé de la séance";
	echo "<br>";
	echo "Voulez vous retourner à la page d'accueil ? <br>";
	echo "<br>";
	echo "<br>";
	echo "<a href='accueil.html' target='contenu'> Oui </a>";
	?>
</body>
</html>