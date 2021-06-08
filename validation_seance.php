<html>
<head>
	<meta charset="utf-8">
	<LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1> Validation d'une séance</h1>
<h2> Vous pouvez ici rentrer les notes des élèves ayant participés à une séance de code </h2>

<?php
echo "<form action='valider_seance.php' method='POST'";
echo "Veuillez sélectionner la séance de code : <br> <br>";

$dbhost = 'tuxa.sme.utc'; 
$dbuser = 'nf92a055'; 
$dbpass = 'AC1j6leU'; 
$dbname = 'nf92a055'; 
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
$result = mysqli_query($connect, "SELECT DISTINCT idseance2, heuredébut, datese, theme, Nom FROM inscriptions INNER JOIN seances INNER JOIN themes ON inscriptions.idseance2 = seances.idseance AND seances.theme = themes.idtheme"); 
         
echo "<select name='seance'>"; 
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
    { 
      echo "<OPTION value='$row[0]'> Séance du $row[2] à $row[1] sur le thème $row[4] </OPTION>";
             
    } 
echo "</select> <br> <br>";
echo "<input type='submit' value='Valider'>";
mysqli_close($connect);
?>
</body>
</html>