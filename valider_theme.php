<html>
<head>
	 <meta charset="utf-8" />
    <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1> Ajout d'un nouveau thème </h1>
    <h2> Récapitulatif </h2>
    <?php
   $nom = $_POST["nomtheme"];
   $des = $_POST["destheme"];

$dbhost = 'tuxa.sme.utc'; 
$dbuser = 'nf92a055'; 
$dbpass = 'AC1j6leU'; 
$dbname = 'nf92a055'; 
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
$nom = $_POST["nomtheme"];
$des = $_POST["destheme"];
$query = "SELECT * FROM themes WHERE Nom='".$nom."'";
$result  =  mysqli_query($connect,  $query); 
if (mysqli_num_rows($result)==0) 
{
    echo "Voici le récapitulatif de votre ajout. Vous pouvez modifier les informations ou bien valider";
    echo "<form action='ajouter_theme.php' method='POST'>";
    echo "Nom <br>";
    echo "<input type='text' name='nomtheme' value='$nom'> <br> <br>";
    echo "Prénom <br>";
    echo "<input type='textarea' name='destheme' value='$des'> <br> <br>";
    echo "<br> <br>";
    echo "<input type='submit' value='Valider'>";
    echo "</form>"; 
}

else
{
	while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
        { 
             echo "Il existe déjà un thème ayant ce nom. Il a cependant été supprimé. <br> Voulez vous le réactiver ?";
             echo "<form action='reactiver_theme.php' method='POST'>";
             echo "<input type='hidden' name='nomtheme' value='$nom'> <br> <br>";
             echo "<input type='submit' value='Oui'>";
             echo "<a href='ajout_theme.html' target='contenu'> Non </a>";
             echo "</form>";
           
        }  
        
        
}
if (!$result) { echo "<br>pas bon".mysqli_error($connect);} 
mysqli_close($connect);

    


        



?>
</body>
</html>