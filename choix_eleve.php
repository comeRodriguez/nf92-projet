<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Désincription d'un élève </h1>
	<h2> Veuillez choisir l'élève que vous voulez désincrire </h2>
	<?php
	echo "<form action='choix_seance.php' method='POST'>";
	$dbhost = 'tuxa.sme.utc'; 
	$dbuser = 'nf92a055'; 
	$dbpass = 'AC1j6leU'; 
	$dbname = 'nf92a055'; 
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
	$query = "SELECT * FROM  eleves"; 
	$result  =  mysqli_query($connect, $query);  
		echo "<select name='eleve'>";
	while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
		{ 
    		echo "<option value='$row[0]'> $row[1] $row[2] </option>";
    	}
    echo "<br> <br> <input type='submit' value='Valider'>";
    echo "</form>";
	?>
</body>
</html>