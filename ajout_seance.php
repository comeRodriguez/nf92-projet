<html>
    <head>
        <meta charset="utf-8">
        <LINK rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1> Ajout d'une séance </h1>
	<h2> Veuillez rentrer les information nécessaires à la création d'une nouvelle séance </h2>
    <?php 
        echo "<form method='POST' ACTION='recapitulatif_seance.php'>";
		echo " Nombre de participants à cette séance <br>";
		echo " <input type='number' name='nbpart'>";
		echo "<br>";
		echo " Horaires de la séance : <br>";
		echo " Date de la séance <br> ";
		echo " <input type='date' name='dateseance' />  <br> ";
		echo " Durée de la séance  <br> "; 
		echo " <input type='text' name='dureeseance' placeholder='Ce champ est obligatoire' /> min <br>  ";
		echo " Heure de début de la séance <br>  ";
        echo " <input type='time' name='debutseance' />  <br> ";
        echo " Choix du thème <br>";
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
        echo "</select>";
        echo "<BR>";
        echo "<BR>";
        echo "<INPUT type='submit' value='Enregistrer séance'>"; 
        echo "</form>"; 
        mysqli_close($connect);
    ?>
</body>
</html>
