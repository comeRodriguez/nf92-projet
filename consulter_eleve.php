<html>
<head>
  <meta charset="utf-8">
  <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1> Consultation d'un élève </h1>
  <h2> Voici les informations de l'élève </h2>
  <?php

    $eleve = $_POST["eleve"];
		$dbhost = 'tuxa.sme.utc'; 
    $dbuser = 'nf92a055'; 
    $dbpass = 'AC1j6leU'; 
    $dbname = 'nf92a055'; 
   		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
   		$query = "SELECT * FROM eleves WHERE ideleve = $eleve";
   		$result = mysqli_query($connect,  $query);
   		while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
        { 
            echo "Nom : $row[1] <br>";
            echo "Prénom : $row[2] <br>";
            echo "Date de naissance : $row[3] <br>";
            echo "Date d'inscription : $row[4] <br>";
             
        }
        mysqli_close($connect);
  ?>
</body>
</html>