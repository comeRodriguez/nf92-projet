<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Désactivation d'un thème de code de la route </h1>
	<h2> Confirmation </h2>
<?php
$dbhost = 'tuxa.sme.utc'; 
$dbuser = 'nf92a055'; 
$dbpass = 'AC1j6leU'; 
$dbname = 'nf92a055'; 
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
$theme = $_POST['menuchoixtheme']; 
$query = "UPDATE themes SET Supprime=1 WHERE Nom='".$theme."'";  
$result  =  mysqli_query($connect,  $query);  
if (!$result) { echo "<br>pas bon".mysqli_error($connect);}
mysqli_close($connect);
echo "Le thème a bien été supprimé. <br> <br>";
echo "<a href='accueil.html' target='contenu'> Revenir à l'accueil </a>";

?>

</body>
</html>