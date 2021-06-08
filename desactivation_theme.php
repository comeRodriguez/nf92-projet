<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Désactivation d'un thème de code de la route </h1>
	<h2> Vous pouvez ici supprimer un thème de code de la route créé auparavant</h2>

<?php
echo "<form action='desactiver_theme.php' method='POST'>";
echo "Veuillez choisir quel thème vous voulez supprimer <br> <br>";
 
        $dbhost = 'tuxa.sme.utc'; 
        $dbuser = 'nf92a055'; 
        $dbpass = 'AC1j6leU'; 
        $dbname = 'nf92a055';
        $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
        $result = mysqli_query($connect, "SELECT * FROM themes WHERE Supprime = 0"); 
         
        echo "<select name='menuchoixtheme'>"; 
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
        { 
            echo "<OPTION value='$row[0]'> $row[1] </OPTION>";
             
        } 
        
        mysqli_close($connect);
echo "<br> <br>";
echo "<br> <input type='submit' value='Valider'>";
echo "</form>";

?>
</body>
</html>