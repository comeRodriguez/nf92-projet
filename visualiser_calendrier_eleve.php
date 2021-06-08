<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Visualisation du calendrier d'un élève </h1>
	<h2> Voici le calendrier de l'élève </h2>
	<?php
	$eleve = $_POST["eleve"];
	$date = date("Y-m-d"); 
	date_default_timezone_set('Europe/Paris');
	$dbhost = 'tuxa.sme.utc'; 
	$dbuser = 'nf92a055'; 
	$dbpass = 'AC1j6leU'; 
	$dbname = 'nf92a055'; 
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
	$query = " SELECT * FROM  eleves INNER JOIN inscriptions INNER JOIN seances INNER JOIN themes ON eleves.ideleve = $eleve AND inscriptions.ideleve = $eleve AND inscriptions.idseance2 = seances.idseance and themes.idtheme = seances.theme"; 
	$result  =  mysqli_query($connect,  $query);  
		
	while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
		{ 
    		if ($row[10] < $date) {
    			echo "L'élève a déjà participé à la séance du $row[10] à $row[12] sur le thème $row[15]. Sa note à cette séance est : $row[7] <br>";
    		}
    		else {
    			echo "L'élève participera à la séance du $row[10] à $row[12] sur le thème $row[15].";
    		}
    	}
	 ?>

</body>