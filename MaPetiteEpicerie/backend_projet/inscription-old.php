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

		// Test egalite variable 
		if($password == $password2 && $email == $email2)
		{
		$nom = htmlspecialchars(htmlentities(strip_tags($_POST['nom'])));

		$prenom = htmlspecialchars(htmlentities(strip_tags($_POST['prenom'])));

		$email = htmlspecialchars(htmlentities(strip_tags($_POST['email'])));

		// Je vais crypter le mot de passe.
		$password = sha1($password);



		// Rempli un champ null dans la DB si rien rempli dans les champs
		// voir faire fonction() plus tard 
		$adress = NULL;
		if (!empty($_POST['adress'])){ 

			$adress = $_POST['adress'];
		}

		$CP = NULL;
		if (!empty($_POST['cp'])){ 

			$CP = $_POST['cp'];
		}

		$ville = NULL;
		if (!empty($_POST['ville'])){ 

			$ville = $_POST['ville'];
		}

		$mobile = NULL;
		if (!empty($_POST['mobile'])){ // voir faire fonction

			$mobile = $_POST['mobile'];
		}

		$tel = NULL;
		if (!empty($_POST['tel'])){ // voir faire fonction

			$tel = $_POST['tel'];
		}

		$heure_pref = NULL;
		if (!empty($_POST['heure_pref'])){ // voir faire fonction

			$heure_pref = $_POST['heure_pref'];
		}

		// Ici je creer un tableau pour mon bindValue inutile mais (plus clair pour moi)
			$requete = array( 
				"nom" => $nom,
				"prenom" => $prenom,
				"email" => $email,
				"password" => $password,
				"adress" => $adress,
				"CP" => $CP,
				"ville" => $ville,
				"tel" => $tel,
				"mobile" => $mobile,
				"heure_pref" => $heure_pref

			);
			
			$query = $db->prepare("SELECT email FROM login WHERE email = ?");
			$query->bindValue(1, $requete['email'], PDO::PARAM_STR);
			$query->execute();
			
			$result = $query->fetch();


			if ($result == NULL )
			// si l'email est null (existe pas) dans la table login
			// Insert le nouvel utilisateur 	 
			{
		/*		$query = $db->prepare("INSERT INTO utilisateurs (nom, prenom, adresse1, cp, phone, mobile) VALUES(:nom, :prenom, :adresse1, :cp, :phone, :mobile)");*/
			$query = $db->prepare("INSERT INTO utilisateurs (nom, prenom, adresse1, CP, ville, tel, mobile, heure_pref) VALUES(:nom, :prenom, :adresse1, :CP, :ville, :tel, :mobile, :heure_pref)");	
				$query->bindValue(":nom",  $requete['nom'], PDO::PARAM_STR);
				$query->bindValue(":prenom",  $requete['prenom'], PDO::PARAM_STR);
				$query->bindValue(":adresse1",  $requete['adress'], PDO::PARAM_STR);
				$query->bindValue(":CP",  $requete['CP'], PDO::PARAM_INT);
				$query->bindValue(":ville",  $requete['ville'], PDO::PARAM_STR);
				$query->bindValue(":tel",  $requete['tel'], PDO::PARAM_STR);
				$query->bindValue(":mobile",  $requete['mobile'], PDO::PARAM_STR);
				$query->bindValue(":heure_pref",  $requete['heure_pref'], PDO::PARAM_STR);

				$query->execute();
//ok ici
				
				$lastid = $db->lastInsertId(); // recupere derniere insertion en base 

				$query = $db->prepare("INSERT INTO login (email, password, id_util) VALUES(:email, :password, :id_util)");
				$query->bindValue(":id_util",  $lastid, PDO::PARAM_INT);
				$query->bindValue(":email",  $requete['email'], PDO::PARAM_STR);
				$query->bindValue(":password",  $requete['password'], PDO::PARAM_STR);
				
				$query->execute();	

				
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
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

