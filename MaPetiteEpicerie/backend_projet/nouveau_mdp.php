<?php
define('HOST', 'localhost');
define('USER', 'root');  
define('PASS', '');
define('DB', 'exerciceBDD');

include_once('conectDB.php');


if (empty($_POST) && isset($_GET['id']) && $_GET['id'] != NULL && isset($_GET['token']) && $_GET['token'] != NULL)
{
	$id = $_GET['id'];
	$token = $_GET['token'];

	$query=$db->prepare('SELECT * FROM token WHERE id = ? AND token = ?');
    $query->bindValue(1, $id, PDO::PARAM_INT);
    $query->bindValue(2, $token, PDO::PARAM_STR);
	$query->execute();
    $data = $query->fetch();

	if ($id == $data['id'] && $token == $data['token'])
	{
			// Si $id == $data et $token = $data -> affiche le formulaire
		?>
		<form method="post" action="#">

			<div class="form-group">
				<label>nouveau mdp :
					<input class="form-control" type="text" name="passe" id="passe" />
				</label>
			</div>

			<div class="form-group">
				<label>verif mdp :
					<input class="form-control" type="text" name="passe2" id="passe2" />
				</label>
			</div>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="submit" value="Envoyer">
		</form>	
		
		<?php 
	}
}
else
{
	$passe = $_POST['passe'];
	$id = $_POST['id'];
		
	if ($_POST['passe'] == $_POST['passe2'])
	{
		//on chiffre le mot de passe en base
		$passe = sha1($passe);

		//UPDATE table SET nom_colonne = nouvellevaleur WHERE condition
		$query=$db->prepare('UPDATE utilisateur SET passe = ? WHERE id = ?');
		
		$query->bindValue(1, $passe, PDO::PARAM_STR);
		$query->bindValue(2, $id, PDO::PARAM_INT);
		$query->execute();

		echo "passe ok !";
		$query=$db->prepare('DELETE FROM token WHERE id = ?');
		
		$query->bindValue(1, $id, PDO::PARAM_INT);
		$query->execute();
		echo "Token supprimé";

	}
	else 
	{
		echo "Vérifier que vos mot de passe soit identique !";
	}
};
?>