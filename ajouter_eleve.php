<html>
    <head>
    <meta charset="utf-8" />
    <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1> Ajout d'un élève </h1>
    <h2> Confirmation </h2>
<?php
$nom = $_POST['nom_eleve'];
$prenom = $_POST['prenom_eleve'];
$datenaiss = $_POST['datenaiss'];
$adresse = $_POST['adresse_eleve'];
$tel = $_POST['numero_telephone'];
$mail = $_POST['mail_eleve'];


if (empty(trim($nom)))
{
    echo("Le nom de l'élève est incorrect, veuillez réessayer");
}
else 
{
    echo ($_POST['sexe_eleve'].$nom);
}
if (empty(trim($prenom)))
{
    echo("<br> Le prénom de l'élève est incorrect, veuillez réessayer");
}
else 
{
    echo (" ".$prenom);
}
if (empty ($_POST['datenaiss']))
{
    echo ("<br> La date de naissance n'a pas été indiquée");
}
else
{
    echo (" né(e) le ".$datenaiss." est inscri(e)");
}



echo "<br>";
echo "Voulez vous ajouter un nouvel élève ? Si non, vous allez être redirigés vers l'accueil du site";

echo "<TABLE>";
echo "<tr>";
echo "<td>";
echo "<a href='ajout_eleve.html' target='contenu'> Oui </a>";
echo "</td>";
echo "<td>";
echo "<a href='accueil.html' target='contenu'> Non </a>";
echo "</td>";
echo "</tr>";
echo "</TABLE>";

date_default_timezone_set('Europe/Paris'); 
$date = date("Y-m-d"); 
$dbhost = 'tuxa.sme.utc'; 
$dbuser = 'nf92a055'; 
$dbpass = 'AC1j6leU'; 
$dbname = 'nf92a055'; 
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
$nom = $_POST['nom_eleve'];
$prenom = $_POST['prenom_eleve']; 
$query = "insert into eleves values (NUll, '$nom', '$prenom', '$datenaiss', '$date')";  
$result  =  mysqli_query($connect,  $query);  
if (!$result) { echo "<br>pas bon".mysqli_error($connect);} 
mysqli_close($connect);
 

?>




</body>
</html>