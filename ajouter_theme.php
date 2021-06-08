<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Ajout d'un nouveau thème </h1>
	<h2> Confirmation </h2> 
	<?php
	$nom = $_POST["nomtheme"];
	$des = $_POST["destheme"];

	if (empty(trim($_POST["nomtheme"]))) 
	{
		echo "Le nom du thème n'a pas été défini <br>";
	}
	else 
	{
		echo "Le thème : ".$nom." a été ajouté <br>";
	}
	if (empty(trim($_POST["destheme"]))) 
	{
		echo "Le thème n'a pas de descriptif <br>";
	}
	else 
	{
		echo "Voici le descriptif du thème: ".$des."<br>";
	}
	date_default_timezone_set('Europe/Paris'); 
	$date = date("Y-m-d"); 
	$dbhost = 'tuxa.sme.utc'; 
	$dbuser = 'nf92a055'; 
	$dbpass = 'AC1j6leU'; 
	$dbname = 'nf92a055'; 
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
	$nom = $_POST["nomtheme"];
	$des = $_POST["destheme"]; 
	$query = "insert into themes values (NUll, '$nom', FALSE, '$des')";  
	$result  =  mysqli_query($connect,  $query);  
	if (!$result) { echo "<br>pas bon".mysqli_error($connect);} 
	mysqli_close($connect);
	echo "Voulez vous ajouter un autre thème ? <br>";
		echo "<br>";
		echo "<br>";
		echo "<form>";
		echo "<TABLE>";
		echo "<tr>";
		echo "<td>";
		echo "<a href='ajout_theme.html' target='contenu'> Oui </a>";
		echo "</td>";
		echo "<td>";
		echo "<a href='accueil.html' target='contenu'> Non </a>";
		echo "</td>";
		echo "</tr>";
		echo "</TABLE>";
		echo "</form>";
	?>
</body>