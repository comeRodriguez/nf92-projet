<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Suppression d'une séance </h1>
	<h2> Confirmation </h2>
	<?php
		$seance = $_POST["seance"];
		date_default_timezone_set('Europe/Paris');
		$date = date("Y-m-d");
		$dbhost = 'tuxa.sme.utc'; 
		$dbuser = 'nf92a055'; 
		$dbpass = 'AC1j6leU'; 
		$dbname = 'nf92a055'; 
        $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
        $result = mysqli_query($connect, "DELETE FROM seances WHERE seances.idseance = $seance");
 		$result2 = mysqli_query($connect, "DELETE FROM inscriptions WHERE inscriptions.idseance2 = $seance");
 		echo "La séance a bien été supprimée";
	?>