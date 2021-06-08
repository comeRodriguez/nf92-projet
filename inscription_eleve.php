<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Inscription d'un élève à une séance </h1>
	<h2> Vous pouvez ici inscrire un élève à une séance </h2>
<?php 
        echo "<form method='POST' ACTION='inscrire_eleve.php'>";
		echo " Quel élève voulez vous inscrire ? <br>";
		
        $dbhost = 'tuxa.sme.utc'; 
        $dbuser = 'nf92a055'; 
        $dbpass = 'AC1j6leU'; 
        $dbname = 'nf92a055'; 
        $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
        $result = mysqli_query($connect, "SELECT * FROM eleves"); 
         
        echo "<select name='menuchoixeleve'>"; 
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
        { 
            echo "<OPTION value='$row[0]'> $row[1] $row[2] </OPTION>";
             
        } 
        echo "</select>";
        mysqli_close($connect);
        echo "<BR>";
        echo "<BR>";

		echo " A quelle séance voulez vous inscrire cet élève ? <br>";
        $dbhost = 'tuxa.sme.utc'; 
        $dbuser = 'nf92a055'; 
        $dbpass = 'AC1j6leU'; 
        $dbname = 'nf92a055'; 
        $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
        $result = mysqli_query($connect, "SELECT * FROM seances INNER JOIN themes ON seances.theme = themes.idtheme"); 
         
        echo "<select name='menuchoixseance'>"; 
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
        { 
            echo "<OPTION value='$row[0]'> Séance du $row[2] à $row[4] sur le thème $row[7] </OPTION>";
             
        } 
        echo "</select>";
        mysqli_close($connect);
        
		
        echo "<BR>";
        echo "<BR>";
        echo "<INPUT type='submit' value='Enregistrer inscription'>"; 
        echo "</form>"; 
        
    ?>

</body>
</html>