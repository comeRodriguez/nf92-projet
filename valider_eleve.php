<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Ajout d'un élève </h1>
    <h2> Récapitulatif </h2>
<?php

$nom = $_POST['nom_eleve'];
$prenom = $_POST['prenom_eleve'];
$datenaiss = $_POST['datenaiss'];


$dbhost = 'tuxa.sme.utc'; 
$dbuser = 'nf92a055'; 
$dbpass = 'AC1j6leU'; 
$dbname = 'nf92a055'; 
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
$nom = $_POST['nom_eleve'];
$prenom = $_POST['prenom_eleve'];
$query = "SELECT * FROM eleves WHERE nom='".$nom."' and prenom='".$prenom."'";
$result  =  mysqli_query($connect,  $query); 
if ($result) {
	while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
        { 
         	echo "Il existe déjà un élève ayant ce nom et ce prénom. Voici ses informations : ";
            echo "$row[1] $row[2]  Né(e) le $row[3] et inscri(e) le $row[4] <br>";
             
        }  

}


        

if (!$result) { echo "<br>pas bon".mysqli_error($connect);} 
mysqli_close($connect);

echo "Voici le récapitulatif de votre ajout. Vous pouvez modifier les informations ou bien valider";
echo "<form action='ajouter_eleve.php' method='POST'>";
echo "Nom <br>";
echo "<input type='text' name='nom_eleve' value='$nom'> <br> <br>";
echo "Prénom <br>";
echo "<input type='text' name='prenom_eleve' value='$prenom'> <br> <br>";
echo "Date de naissance <br>";
echo "<input type='date' name='datenaiss' value='$datenaiss'";
echo "<br> <br>";
echo "<input type='submit' value='Valider'>";
echo "</form>";




?>
</body>
</html>