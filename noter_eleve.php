<html>
<head>
	<meta charset="utf-8">
	 <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
	
<body>
<h1> Validation d'une séance </h1>
<h2> Confirmation </h2>

<?php

$seance = $_POST["seance"]; 

$dbhost = 'tuxa.sme.utc'; 
$dbuser = 'nf92a055'; 
$dbpass = 'AC1j6leU'; 
$dbname = 'nf92a055'; 
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
$query = "SELECT * FROM inscriptions INNER JOIN eleves ON inscriptions.ideleve = eleves.ideleve WHERE idseance2 = $seance"; 
$result  =  mysqli_query($connect,  $query);  

while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
{ 
    $note = $_POST["eleve$row[1]"];
    $query = "UPDATE inscriptions SET note = $note WHERE ideleve = $row[1] AND idseance2 = $seance";
    mysqli_query($connect, $query);
     
}
echo "Les notes ont bien été enregistrées <br> <br>"; 
echo "Voulez vous retourner à la page d'accueil ? <br>";
echo "<br>";
echo "<br>";
echo "<a href='accueil.html' target='contenu'> Oui </a>";
		
?>
</body>
</html>