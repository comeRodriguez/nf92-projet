<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Désincription d'un élève </h1>
	<h2> De quelle séance voulez vous le désincrire ? </h2>
	<?php
		$eleve = $_POST["eleve"];
		$date = date("Y-m-d"); 
		date_default_timezone_set('Europe/Paris');
		echo "<form action='desincrire_eleve.php' method='POST'>";
		
		$dbhost = 'tuxa.sme.utc'; 
		$dbuser = 'nf92a055'; 
		$dbpass = 'AC1j6leU'; 
		$dbname = 'nf92a055';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
		$query = "SELECT DISTINCT idseance2, heuredébut, datese, theme, Nom, ideleve FROM inscriptions INNER JOIN seances INNER JOIN themes ON inscriptions.idseance2 = seances.idseance AND seances.theme = themes.idtheme WHERE inscriptions.ideleve = $eleve AND datese >'".$date."'";
		$result = mysqli_query($connect, $query); 
         
		echo "<select name='seance'>";
		while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
		    { 
		      echo "<option value='$row[0]'> Séance du $row[2] à $row[1] sur le thème $row[4] </option>";
		    } 
		echo "</select> <br> <br>";
		echo "<input type='submit' value='Valider'>";
		echo "<input type='hidden' name='eleve' value='$eleve'>";
		echo "</form>";
		mysqli_close($connect);
		
	?>
</body>
</html>