<?php
/***************************************
* A voir aussi un exemple sur ...
* https://openclassrooms.com/courses/systeme-d-inscription-avec-validation-par-l-administrateur
*
***********************************/
define('HOST', 'localhost');
define('USER', 'root');  
define('PASS', '');
define('DB', 'mapetiteepicerie');

include_once('conectDB.php');

// si les champs $_POST sont pas vide !!

if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['email']) && !empty($_POST['email2']) && !empty($_POST['adress']) && !empty($_POST['cp']) && !empty($_POST['ville']) && !empty($_POST['tel']) && !empty($_POST['mobile']) && !empty($_POST['heure_pref']))
{


	// Je mets aussi certaines sécurités pour les champs password et email ici…

	$nom = htmlspecialchars(strip_tags($_POST['nom']));
	$prenom = htmlspecialchars(strip_tags($_POST['prenom']));
	
	$password = htmlspecialchars(strip_tags($_POST['password']));

	$password2 = htmlspecialchars(strip_tags($_POST['password2']));

	$email = htmlspecialchars(htmlentities(strip_tags($_POST['email'])));

	$email2 = htmlspecialchars(htmlentities(strip_tags($_POST['email2'])));

	$adress = htmlspecialchars(htmlentities(strip_tags($_POST['adress'])));
	$CP = htmlspecialchars(htmlentities(strip_tags($_POST['cp'])));
	$ville = htmlspecialchars(htmlentities(strip_tags($_POST['ville'])));
	$tel = htmlspecialchars(htmlentities(strip_tags($_POST['tel'])));
	$mobile = htmlspecialchars(htmlentities(strip_tags($_POST['mobile'])));
	$heure_pref = htmlspecialchars(htmlentities(strip_tags($_POST['heure_pref'])));

		// Test egalite variable 
		if($password == $password2 && $email == $email2)
		{
		$nom = htmlspecialchars(htmlentities(strip_tags($_POST['nom'])));

		$prenom = htmlspecialchars(htmlentities(strip_tags($_POST['prenom'])));

		$email = htmlspecialchars(htmlentities(strip_tags($_POST['email'])));

		// Je vais crypter le mot de passe.
		$password = sha1($password);


			$query = $db->prepare("SELECT email FROM login WHERE email = ?");
			$query->bindValue(1, $email, PDO::PARAM_STR);
			$query->execute();
			
			$result = $query->fetch();


			if ($result == NULL )
			// si l'email est null (existe pas) dans la table login
			// Insert le nouvel utilisateur 	 
			{
				//var_dump($_POST);
		/*		$query = $db->prepare("INSERT INTO utilisateurs (nom, prenom, adresse1, cp, phone, mobile) VALUES(:nom, :prenom, :adresse1, :cp, :phone, :mobile)");*/
			$query = $db->prepare("INSERT INTO utilisateurs (nom, prenom, adresse1, CP, ville, tel, mobile, heure_pref) VALUES(?,?,?,?,?,?,?,?)");	
				$query->bindValue(1,  $nom, PDO::PARAM_STR);
				$query->bindValue(2,  $prenom, PDO::PARAM_STR);
				$query->bindValue(3,  $adress, PDO::PARAM_STR);
				$query->bindValue(4,  $CP, PDO::PARAM_INT);
				$query->bindValue(5,  $ville, PDO::PARAM_STR);
				$query->bindValue(6,  $tel, PDO::PARAM_STR);
				$query->bindValue(7,  $mobile, PDO::PARAM_STR);
				$query->bindValue(8,  $heure_pref, PDO::PARAM_STR);

				$query->execute();
//ok ici
				
				$lastid = $db->lastInsertId(); // recupere derniere insertion en base 

				$query = $db->prepare("INSERT INTO login (id_util, email, password) VALUES(?,?,?)");
				$query->bindValue(1,  $lastid, PDO::PARAM_INT);
				$query->bindValue(2,  $email, PDO::PARAM_STR);
				$query->bindValue(3,  $password, PDO::PARAM_STR);
				
				$query->execute();	

				echo "Bienvenue".$nom.", ".$prenom."!!!!";

			}
			else {
				echo "L'email est déjà enregistré dans la DB !!";
			}	
		}
		else if($password != $password2)
		{
			echo "veuillez entrer 2 mdp identique !";
		}
		else if ($email != $email2)
		{
			echo "veuillez entrer 2 email identique !";
		}
	
 }
 else{
	echo "Remplisser tout les champs svp !";
}

