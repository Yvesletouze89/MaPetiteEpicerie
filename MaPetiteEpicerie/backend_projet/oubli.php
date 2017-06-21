<?php
define('HOST', 'localhost');
define('USER', 'root');  
define('PASS', '');
define('DB', 'exerciceBDD');

include_once('conectDB.php');


if (isset($_POST['email']) && $_POST['email'] != NULL)
 //On est dans la page de formulaire
{
		$email = $_POST['email'];

	    $query=$db->prepare('SELECT id

	    FROM utilisateur WHERE email = ?');

	    $query->bindValue(1, $email, PDO::PARAM_STR);

	    $query->execute();

	    $data=$query->fetch();

	    if ($data != NULL)
	    {
			$token = md5(uniqid(rand(),true));
			$id = $data['id'];

		    $query=$db->prepare('INSERT INTO token (id, token) VALUES(?, ?)');

		    $query->bindValue(1, $id, PDO::PARAM_INT);
		    $query->bindValue(2, $token, PDO::PARAM_STR);

		    $query->execute();

		    echo "<a href='nouveau_mdp.php?id=".$id."&token=".$token."'>Renouveler le mdp</a>";

	    }
	    else
	    {
	    	echo "vous étes pas inscrit";
	    }

		
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>inscription</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body>
<div class="container">
	<header>
		<h2>Mot de passe oublié !</h2>
	</header>

	<form method="POST" action="#">
	<!--<form method="POST" action="#">-->
			<div class="form-group">
				<label>Email :
					<input  class="form-control" type="text" name="email" id="email" />
				</label>
			</div>

			<div class="form-group">
				<input  class="form-control" type="submit" name="valider" value="envoyer" />
			</div>
				
	</form>
</div>		
</body>
</html>