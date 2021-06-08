<html>
<head>
	<meta charset="utf-8">
	 <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
	
<body>
<h1> Validation d'une séance </h1>
<h2> Vous pouvez noter les élèves ayant participés à une séance </h2>

<?php

$seance = $_POST["seance"]; 

$dbhost = 'tuxa.sme.utc'; 
$dbuser = 'nf92a055'; 
$dbpass = 'AC1j6leU'; 
$dbname = 'nf92a055'; 
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql'); 
$query = "SELECT * FROM inscriptions INNER JOIN eleves ON inscriptions.ideleve = eleves.ideleve WHERE idseance2 = $seance"; 
$result  =  mysqli_query($connect,  $query);  

echo "Veuillez rentrer les notes"; 
echo "<form action='noter_eleve.php' method='POST'>"; 
echo "<TABLE>";
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
{ 
    echo "<tr>";
    echo"<td> $row[4] $row[5] </td>";
    echo"<td> <input type='number' name='eleve$row[1]' value='$row[2]'> </td>";
    echo "</tr>";
     
} 
echo "</TABLE>";
echo "<br> <br>"; 
echo "<input type='hidden' name='seance' value='$seance'>";
echo "<input type='submit' value='Valider'>"; 
echo "</form>"; 
?>
</body>
</html>