<?php
	define('HOST', 'localhost'); 
	define('USER', 'root'); 
	define('PASS', ''); 
	define('DB', 'mapetiteepicerie'); 

	include_once('ConnexionBDD.php');

	session_start();
	
if(isset($_POST['descriptif']) && ($_POST['descriptif']!=NULL) 
	&& isset($_POST['poids_volume']) && ($_POST['poids_volume']!=NULL) 
	&& isset($_POST['unit']) && ($_POST['unit']!=NULL) 
	&& isset($_POST['marque']) && ($_POST['marque']!=NULL) 
	&& isset($_POST['prix']) && ($_POST['prix']!=NULL) 
	&& isset($_POST['photo1']) && ($_POST['photo1']!=NULL)
	&& isset($_POST['categorie']) && ($_POST['categorie']!=NULL)
	)
	{
		// --CONTROLE DE L'EXISTENCE DE LA CATEGORIE --
		
		// $query = $db->prepare('SELECT categorie FROM categories WHERE categorie = ? ');
		// $query->bindValue(1, $_POST['categorie'], PDO::PARAM_STR);
		// $query->execute();
		// $result = $query->fetch();

		// if($result == null)
		// {
		// 	$_SESSION['message'] = "Veuillez choisir une catégorie existante";
		// 	header('Location: FormAjoutProduits.php');
		// 	exit();
		// }
		// else


		$query = $db->prepare('INSERT INTO produits (descriptif,  poids_volume, unites, marque, prix, photo1, nouveau, categorie) VALUES (?, ?, ?, ?, ?, ?, ?, ?);');
		$query->bindValue(1, $_POST['descriptif'], PDO::PARAM_STR);
		$query->bindValue(2, $_POST['poids_volume'], PDO::PARAM_STR);
		$query->bindValue(3, $_POST['unit'], PDO::PARAM_STR);
		$query->bindValue(4, $_POST['marque'], PDO::PARAM_STR);
		$query->bindValue(5, $_POST['prix'], PDO::PARAM_STR);
		$query->bindValue(6, $_POST['photo1'], PDO::PARAM_STR);
		$query->bindValue(7, $_POST['nouveau'], PDO::PARAM_STR);
		$query->bindValue(8, $_POST['categorie'], PDO::PARAM_STR);
		$query->execute();

		$_SESSION['message'] = "Votre produit a bien été enregistré";
		header('Location: FormAjoutProduits.php');
		exit();
		}
	
else
	{
		$_SESSION['message'] = "Veuillez remplir tous les champs";	
		header('Location: FormAjoutProduits.php');
		exit();
	}

?>