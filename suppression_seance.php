<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Suppression d'une séance </h1>
	<h2> Veuillez sélectionner la séance que vous voulez supprimer </h2>

	<?php 
		echo "<form action='supprimer_seance.php' method='POST'>";
		$dbhost = 'tuxa.sme.utc'; 
        $dbuser = 'nf92a055'; 
        $dbpass = 'AC1j6leU'; 
        $dbname = 'nf92a055'; 
        date_default_timezone_set('Europe/Paris');
		$date = date("Y-m-d");
        $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
        $result = mysqli_query($connect, "SELECT * FROM seances INNER JOIN themes ON seances.theme = themes.idtheme WHERE datese > '".$date."'"); 
         
        echo "<select name='seance'>"; 
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
        { 
            echo "<OPTION value='$row[0]'> Séance du $row[2] à $row[4] sur le thème $row[7] </OPTION>";
        }
        echo "</select>";
        echo "<br> <br>";
        echo "<input type='submit' value='Valider'>";
        echo "</form>";
	?>
</body>