<html>
<head>
	<meta charset="utf-8">
	 <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
	<h1> Inscription d'un élève à une séance </h1>
	<h2> Confirmation</h2>
<body>
	<?php
	
		$eleve = $_POST["menuchoixeleve"];
		$seance = $_POST["menuchoixseance"];

		
		$dbhost = 'tuxa.sme.utc'; 
		$dbuser = 'nf92a055'; 
		$dbpass = 'AC1j6leU'; 
		$dbname = 'nf92a055'; 
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
		$query1 = "SELECT * FROM inscriptions  WHERE ideleve = $eleve and idseance2 = $seance";
		$result1 = mysqli_query($connect,  $query1);
		$nb1 = mysqli_num_rows($result1);
		if ($nb1 == 0) {
			
		$query2 = "SELECT * FROM inscriptions INNER JOIN seances ON inscriptions.idseance2 = seances.idseance WHERE idseance2 = $seance";
		$result2 = mysqli_query($connect,  $query2);
		$nb = mysqli_num_rows($result2);
		while ($row = mysqli_fetch_array($result2, MYSQLI_NUM))
		{
			
			$part = $row[4];
		}	
		if ($nb >= "$part") {
			echo "Cette séance est déjà complète. Voulez vous revenir à la page précédente ? <br>";
			echo "<a href='inscription_eleve.php' target='contenu'> Oui </a>";
			echo "<a href='accueil.html' target='contenu'> Non </a>";
		}
		else { 
		$query = "INSERT INTO inscriptions VALUES ($seance, $eleve, NULL)"; 
		$result  =  mysqli_query($connect,  $query); 
		if (!$result) { echo "<br>pas bon".mysqli_error($connect);} 
		mysqli_close($connect);
		echo "L'élève a bien été inscrit à cette séance.";
		echo "<br>";
		echo "Voulez vous effectuer une autre inscritpion ? <br>";
		echo "<br>";
		echo "<br>";
		echo "<form>";
		echo "<TABLE>";
		echo "<tr>";
		echo "<td>";
		echo "<a href='inscription_eleve.php' target='contenu'> Oui </a>";
		echo "</td>";
		echo "<td>";
		echo "<a href='accueil.html' target='contenu'> Non </a>";
		echo "</td>";
		echo "</tr>";
		echo "</TABLE>";
		echo "</form>";
		}
		}
		else {
		echo "Cet élève est déja inscrit à la séance";
	}
	?>
</body>
</html>