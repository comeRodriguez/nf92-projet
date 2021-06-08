<html>
<head>
	 <meta charset="utf-8" />
    <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1> Ajout d'un nouveau thème </h1>
    <h2> Confirmation </h2>
    <?php
   
    $dbhost = 'tuxa.sme.utc'; 
    $dbuser = 'nf92a055'; 
    $dbpass = 'AC1j6leU'; 
    $dbname = 'nf92a055'; 
   $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
   $theme = $_POST['nomtheme']; 
   $query = "UPDATE themes SET Supprime=0 WHERE Nom='".$theme."'";  
   $result  =  mysqli_query($connect,  $query);  
   if (!$result) { echo "<br>pas bon".mysqli_error($connect);}
   mysqli_close($connect);
   echo "Le thème a bien été réactivé. <br> <br>";
   echo "<a href='accueil.html' target='contenu'> Revenir à l'accueil </a>";
           
?>
</body>
</html>