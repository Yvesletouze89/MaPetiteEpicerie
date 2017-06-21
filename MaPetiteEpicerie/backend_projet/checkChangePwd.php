<?php
define('HOST', 'localhost');
define('USER', 'root');  
define('PASS', '');
define('DB', 'exerciceBDD');

include_once('conectDB.php');

				print_r($_POST['passe']);
				
				$passe = $_POST['passe'];
	
				if ($_POST['passe'] == $_POST['passe2'])
				{
					//UPDATE table SET nom_colonne = nouvellevaleur WHERE condition
					$query=$db->prepare('UPDATE utilisateur SET passe = ? WHERE id = ?');
					
					$query->bindValue(1, $passe, PDO::PARAM_STR);
					$query->bindValue(2, $id, PDO::PARAM_INT);
					$query->execute();
					$data = $query->fetch();

					echo "passe ok !";
			
				}
				else 
				{
					echo "Vérifier que vos mot de passe soit identique !";
				}
?>