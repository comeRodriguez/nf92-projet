<html>
<head>
	 <meta charset="utf-8" />
    <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1> Ajout d'une séance </h1>
    <h2> Récapitulatif </h2>

<?php
$nbpart = $_POST["nbpart"];
$datese = $_POST["dateseance"];
$dureese = $_POST["dureeseance"];
$heuredeb = $_POST["debutseance"];
$theme = $_POST ["menuchoixtheme"];
$date = date("Y-m-d"); 
date_default_timezone_set('Europe/Paris');

if ($datese < $date) {
			echo "Nous ne pouvons pas créer une séance dans le passé <br> Voulez vous revenir à la page précédente ?";
			echo "<form>";
		echo "<TABLE>";
		echo "<tr>";
		echo "<td>";
		echo "<a href='ajout_seance.php' target='contenu'> Oui </a>";
		echo "</td>";
		echo "<td>";
		echo "<a href='accueil.html' target='contenu'> Non </a>";
		echo "</td>";
		echo "</tr>";
		echo "</TABLE>";
		echo "</form>";
		}
$dbhost = 'tuxa.sme.utc'; 
$dbuser = 'nf92a055'; 
$dbpass = 'AC1j6leU'; 
$dbname = 'nf92a055';  
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
$result = mysqli_query($connect, "SELECT * FROM seances WHERE datese = '".$datese."' and theme = '".$theme."' and heuredébut ='".$heuredeb."'"); 
if (mysqli_num_rows($result)==0) 
{
    echo "Voici le récapitulatif de votre ajout. Vous pouvez modifier les informations ou bien valider";
    echo "<form action='ajouter_seance.php' method='POST'>";
    echo " Nombre de participants à cette séance <br>";
		echo " <input type='number' name='nbpart' value='$nbpart'>";
		echo "<br>";
		echo " Horaires de la séance : <br>";
		echo " Date de la séance <br> ";
		echo " <input type='date' name='dateseance' value='$datese' />  <br> ";
		echo " Durée de la séance  <br> "; 
		echo " <input type='text' name='dureeseance' placeholder='Ce champ est obligatoire' value='$dureese' /> min <br>  ";
		echo " Heure de début de la séance <br>  ";
        echo " <input type='time' name='debutseance' value='$heuredeb'/>  <br> ";
        echo " Choix du thème <br>";
        $result2 = mysqli_query($connect, "SELECT * FROM themes WHERE Supprime = 0"); 
         
        echo "<select name='menuchoixtheme'>"; 
        while ($row = mysqli_fetch_array($result2, MYSQLI_NUM)) 
        { 
            echo "<OPTION value='$row[0]'> $row[1] </OPTION>";
             
        } 
        echo "</select>";
        echo "<BR>";
        echo "<BR>";
        echo "<INPUT type='submit' value='Enregistrer séance'>"; 
        echo "</form>"; 
      
}

else
{
        
             echo "Il existe déjà une séance sur ce thème ce jour-ci à la même heure. <br> <br>";
             
             echo "<a href='ajout_seance.php' target='contenu'> Retourner à l'ajout d'une séance </a>";
             
           
          
}
mysqli_close($connect);
?>


</body>
</html>