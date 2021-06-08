<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Ajout d'une séance </h1>
	<h2> Confirmation </h2>
	<?php
		$nbpart = $_POST["nbpart"];
		$datese = $_POST["dateseance"];
		$dureese = $_POST["dureeseance"];
		$heuredeb = $_POST["debutseance"];
		$theme = $_POST ["menuchoixtheme"];
		$date = date("Y-m-d"); 
		date_default_timezone_set('Europe/Paris');

		if ($datese < $date) {
			echo "Nous ne pouvons pas créer une séance dans le passé <br> Voulez vous revenir à la page précédente ?";
			echo "<form>";
		echo "<TABLE>";
		echo "<tr>";
		echo "<td>";
		echo "<a href='ajout_seance.php' target='contenu'> Oui </a>";
		echo "</td>";
		echo "<td>";
		echo "<a href='accueil.html' target='contenu'> Non </a>";
		echo "</td>";
		echo "</tr>";
		echo "</TABLE>";
		echo "</form>";

		}
		$dbhost = 'tuxa.sme.utc'; 
		$dbuser = 'nf92a055'; 
		$dbpass = 'AC1j6leU'; 
		$dbname = 'nf92a055';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
		$query = "insert into seances values (NUll, '$nbpart', '$datese', '$dureese', '$heuredeb', '$theme')";  
		$result  =  mysqli_query($connect,  $query);  
		if (!$result) { echo "<br>pas bon".mysqli_error($connect);} 
		mysqli_close($connect);
		echo " La séance a bien été enregistrée. ";
		echo "<br>";
		echo "Voulez vous ajouter une autre séance ? <br>";
		echo "<br>";
		echo "<br>";
		echo "<form>";
		echo "<TABLE>";
		echo "<tr>";
		echo "<td>";
		echo "<a href='ajout_seance.php' target='contenu'> Oui </a>";
		echo "</td>";
		echo "<td>";
		echo "<a href='accueil.html' target='contenu'> Non </a>";
		echo "</td>";
		echo "</tr>";
		echo "</TABLE>";
		echo "</form>";
			
		

		 
		

	?>



</body>
</html>