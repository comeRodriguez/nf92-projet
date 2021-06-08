<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1> Consultation d'un élève </h1>
	<h2> Vous pouvez ici consulter les informations d'un élève </h2>

	<?php
		$dbhost = 'tuxa.sme.utc'; 
    $dbuser = 'nf92a055'; 
    $dbpass = 'AC1j6leU'; 
    $dbname = 'nf92a055'; 
   		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
   		$query = "SELECT * FROM eleves"; 
   		$result = mysqli_query($connect,  $query);
   		echo "Veuillez sélectionner un élève <br> <br>";
   		echo "<form action='consulter_eleve.php' method='POST'>";
   		echo "<select name='eleve'>";
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
        { 
            echo "<OPTION value='$row[0]'> $row[1] $row[2] </OPTION>";
             
        }
        echo "</select>";
        echo "<br> <br>";
        echo "<input type='submit' value='Valider'>"; 
        echo "</form>";
        mysqli_close($connect);
	?>
</body>
</html>