<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript">
	
</script>

<style type="text/css">
.nom{
	color: blue;
}
.ville{
	color: green;
}

.cle{
	font-weight: bold;
	text-transform: uppercase;
}	


</style>
</head>
<body>
<div class="container">
<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'exerciceBDD');

include_once('conectDB.php');

if(isset($_POST['requete']) && $_POST['requete'] != NULL)
{

	$requete =  $_POST['requete'];

	$query = $db->query($requete);
	// $query = $db->prepare('SELECT * FROM utilisateur WHERE nom="'.$requete.'"');
	// $query->bindValue(1, $requete, PDO::PARAM_INT);
	// $query->execute();


	//$query = $db->query('SELECT * FROM utilisateur WHERE pays = "France"');

	echo "<table class='table table-striped'>";

	$result = $query->fetch();

	if ($result != NULL)
	{
			
		echo "<tr>";
		foreach ($result as $key => $value) {
			echo "<td class='cle'>".$key."</td>";
		}
		echo "</tr>";

		do  {
			echo "<tr>";
			foreach ($result as $key => $value) {
				echo "<td class='".$key."'>".$value."</td>";
			}
			echo "</tr>";
			
		}while($result = $query->fetch());

		echo "</table>";
		echo "<a href='formulaire.php'>Retour</a>";

		
	}
	else
	{
	echo "Ce nom n'existe pas";
	}
	
}

else
	{
		echo "<p>Veuillez remplir le champs</p>";
	}

	
/*
	
	 $query = $db->query('SELECT * FROM utilisateur WHERE pays = "France"');

	echo "<table>";

	$result = $query->fetch();

	echo "<tr>";
	foreach ($result as $key => $value) {
		echo "<td>".$key."</td>";
	}
	echo "</tr>";

	do  {
		echo "<tr>";

		echo "<td style='color: blue;'>".$result['id']."</td>";
		echo "<td style='color: black;'>".$result['nom']."</td>";
		echo "<td style='color: orange;'>".$result['prenom']."</td>";
		echo "<td style='color: purple;'>".$result['email']."</td>";
		echo "<td style='color: green;'>".$result['date_naissance']."</td>";
		echo "<td style='color: red;'>".$result['pays']."</td>";
		echo "<td style='color: silver;'>".$result['ville']."</td>";
		echo "<td style='color: darkgrey;'>".$result['code_postal']."</td>";

    	
		echo "</tr>";
	}while($result = $query->fetch());

	echo "</table>";
*/


?>
</div>
</body>
</html>