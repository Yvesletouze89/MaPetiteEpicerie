<?php

namespace Controller;

use \W\Controller\Controller; // comme un include mais en objet

use \W\Security\AuthentificationModel; // comme un include mais en objet

use Model\UsersModel; // comme un include mais en objet

class UsersController extends Controller
{
///////////////////// Inscription, connexion User /////////////////
	// Mes routes de utilisateur

	// Methode connexion
	public function connexion()
	{
		if (isset($_POST['email']) &&  isset($_POST['password']))
		{
			// instencier le model d'auth
			$session = new AuthentificationModel();
			
			// va interoger la base de donnee 
			$user = new UsersModel(); 
			if ($user->checkEmail($_POST['email'])) 
			{
				$utilisateur = $user->getUser($_POST['email']);

				if (sha1($_POST['password']) == $utilisateur['password'])
				{

					$session->logUserIn(['ID_util' => $utilisateur['ID_util'], 'droits_acces' => $utilisateur['droits_acces'], "email" => $utilisateur['email'],"prenom" => $utilisateur['prenom'], "nom" =>$utilisateur['nom'] ]);

					$this->show("users/connect", ["message" => "Vous etes connecté !", "prenom"=> $utilisateur['prenom'], "nom"=> $utilisateur['nom']]);
				}
				else
				{
					$this->show("users/connexion", ["message" => "le mot de passe est invalide"]);
				}
				
			}else
			{
				$this->show("users/connexion", ["message" => "le pseudo est invalide !"]);
			}
		}else
		{
			$this->show('users/connexion', ["message" => ""]); // affiche la page connexion
		}

	}

	// Methode inscription
	public function inscription()
	{
			
		if((isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['email']) && isset($_POST['adresse1']) && isset($_POST['adresse2']) && isset($_POST['CP']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mobile'])) && ($_POST['password'] == $_POST['password2']) && ($_POST['email'] == $_POST['email2']))
		{

			$password = $_POST['password'];

			//chiffre le mdp lors de l'inscription
			$password = sha1($password);
			
			$user = new UsersModel();
				$array = [
				"nom" => $_POST['nom'],
				"prenom" => $_POST['prenom'],
				"password" => $password,
				"email" => $_POST['email'],
				"adresse1" => $_POST['adresse1'],
				"adresse2" => $_POST['adresse2'],
				"CP" => $_POST['CP'],
				"ville" => $_POST['ville'],
				"tel" => $_POST['tel'],
				"mobile" => $_POST['mobile']
				];

				$user->addUser($array);
				$this->show('users/inscription', ["message" => "Vous avez bien ete inscrit !"]);	
		}
		else
		{
			$this->show('users/inscription', ["message" => "Champs email ou mot de passe non rempli !"]);
		}

	}

	// Methode de deconnexion
	public function deconnexion()
	{
		$session = new AuthentificationModel();
		$session->logUserOut();
		unset($_SESSION);
		header('Location: connexion');
	}

///////////////////// Recuperation et modification user /////////////////


		// Methode de verification du token pour l'utilisateur
		public function tokenExist($token)
		{
			
			if ($token)
			{	
				// charge le Usersmodel.php
				$user = new UsersModel();

				$utilisateur = $user->getUserByToken($token);

				if($utilisateur)
				{
					$this->show("users/recup-password", ["utilisateur" => $utilisateur ]);
				}
			}else{
				$this->show("users/recup-password", ["message" => "Probleme recup token"]);

			}
			
		}

	
	// Methode de mot de passe oublié création du token dans la DB
	//et envoi par mail URL pour changer le mot de passe.
	public function oubliPassword()
	{
		if (isset($_POST['email']) && $_POST['email'] != NULL)
		 //On est dans la page de formulaire
		{
			$email = $_POST['email'];

			// charge le Usersmodel.php
			$user = new UsersModel();
			
			// si email utilisateur exist
			if ($user->checkEmail($_POST['email'])) 
			{	
				// recupere tout les champs utilisateur et stock dans var $utilisateur
				$utilisateur = $user->getUser($_POST['email']);

				// si ID_util est pas null (exist) 
			    if ($utilisateur['ID_util'] != NULL)
			    {
			    	// Genere un token md5 aleatoire
					$token = md5(uniqid(rand(),true));
					
					// fonction insert le token dans la bd (deux parametre $token et $utilisateur)
					$user->insertToken($token, $utilisateur['ID_util']); 

					$texte = "Objet: Mot de passe oublié	
					bonjour Nom, prenom
					cliquez sur le lien pour créer un nouveau mot de passe:
					
					<a href='http://192.168.1.50/MaPetiteEpicerieW/public/recup-password/".$token."'>Renouveler le mdp</a>

					Remarque :  pour des raisons de confidentialité Ma petite épicerie n’est pas habilité à vous communiquer ou à vous demander votre mot de passe.
					";
					//fopen ici 
					
					// 1 : on ouvre le fichier
					$monfichier = fopen('mail.txt', 'w+');

					//2 on ecrit dans le fichier
					fputs($monfichier,$texte);

					//3 : quand on a fini de l'utiliser, on ferme le fichier
					fclose($monfichier);

				$this->show("users/result_oublie", ["token"=>$token]);	

			    }
			}
			else{
			    	echo "l'email existe pas !";
			}
		}else{
			$this->show("users/oublie");
		}
	}

		// Methode de changement de mot de passe oublié
		public function recupPassword()
		{
			if ((isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['email']) && ($_POST['password'] == $_POST['password2']) && ($_POST['email'] != NULL)))
			 //On est dans la page de formulaire
			{
				$email = $_POST['email'];
				$password = $_POST['password'];
				
				// charge le Usersmodel.php
				$user = new UsersModel();

				
				// si email exist
				if ($user->checkEmail($_POST['email'])) 
				{	
					// recupere tout sur le user et le stock dans var $utilisateur
					$utilisateur = $user->getUser($_POST['email']); 

					// si ID_util est pas null (exist) 
				    if ($utilisateur['ID_util'] != NULL) 
				    {
				    	// chiffre le mdp
						$password = sha1($password);

						// Met a jour le mot de passe et vide le champs token dans la DB
						$user->renewPassword(["password" => $password, "token"=> "" ], $utilisateur['ID_util']);

						$this->show("users/recup-password", ["message" => "Votre mot de passe a bien ete changé !"]);
				    }
				}
			}else{
				    $this->show("users/recup-password", ["message" => "Probleme !"] );
			}
		
		}


/*	// Methode de changement de mot de passe utilisateur
	public function changePassword()
	{
		if ((isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['email']) && ($_POST['password'] == $_POST['password2']) && ($_POST['email'] != NULL)))
		 //On est dans la page de formulaire
		{
			$email = $_POST['email'];
			$password = $_POST['password'];

			$user = new UsersModel();
			 // charge le Usersmodel.php
			
			// si email exist
			if ($user->checkEmail($_POST['email']))
			
			{	
				// recupere tout sur le user et ca le stock dans var $utilisateur
				$utilisateur = $user->getUser($_POST['email']); 
				

 				// si ID_util est pas null (exist) 
			    if ($utilisateur['ID_util'] != NULL)
			    
			    {
			    	// chiffre le mdp 
					$password = sha1($password); 
					
				 // fonction qui renouvelle le pwd de l'utilisateur	
					$user->renewPassword($password, $utilisateur['ID_util']);
					
					$this->show("users/new-password", ["message" => "Votre mot de passe a bien ete changé !"]);
			    }
			}
		}else{
			    $this->show("users/new-password", ["message" => "Probleme !"] );
		}

	}*/
	/**********************************************************************************/

	// Methode d'authentification pour modifier info perso
	public function connexionInfoPerso()
	{
		if (isset($_POST['email']) &&  isset($_POST['password']))
		{
			// instencier le model d'auth
			$session = new AuthentificationModel();
			
			// va interoger la base de donnee 
			$user = new UsersModel(); 

			 // si email utilisateur exist
			if ($user->checkEmail($_POST['email'])) 
			{
				// recupere tout les champs utilisateur et stock dans var $utilisateur
				$utilisateur = $user->getUser($_POST['email']);


				// si ID_util est pas null (exist) 
				if (sha1($_POST['password']) == $utilisateur['password'])
				{

				$this->show("users/modifinfo-personnel", ["message" => "Bravo Vous avez atteint la page modification perso!", "prenom"=> $utilisateur['prenom'], "nom"=> $utilisateur['nom']]);
				
				}
			}
		}
		else{$this->show("users/auth-modification-perso", ["message" => ""]);}

	}

	// Recupere les infos de l'utilisateur dans la base
	public function recupInfoPerso()
	{	
		// instencier le model d'auth
			$session = new AuthentificationModel();
			
			// va interoger la base de donnee 
			$user = new UsersModel(); 

			 // si email utilisateur exist
			if ($user->checkEmail($_POST['email'])) 
			{
				// recupere tout les champs utilisateur et stock dans var $utilisateur
				$utilisateur = $user->getUser($_POST['email']);


				// si ID_util est pas null (exist) 
				if (sha1($_POST['password']) == $utilisateur['password'])
				{
					$id = $_SESSION['user']['ID_util'];

					$utilisateur = new UsersModel();

					$result = $utilisateur->selectId($id);

				// met $result dans "resultat" value="<?= $resultat['nomTable']

		
			$this->show('users/modifinfo-personnel', ["resultat"=>$result, "message" => "Bravo Vous avez atteint la page modification perso!"] );
				}
				else{$this->show("users/auth-modification-perso", ["message" => "Vérifier votre mot de passe !"]);}
			}
	}

	public function updateInfo()
	{
	/*	if((isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['adresse1']) && isset($_POST['adresse2']) && isset($_POST['CP']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mobile'])))*/
	/*if ($_POST) 
		{*/

	
		 	$id = $_SESSION['user']['ID_util'];
			//$password = $_POST['password'];

			//chiffre le mdp lors de l'inscription
			//$password = sha1($password);
			
			$user = new UsersModel();

				$array = [
				"nom" => $_POST['nom'],
				"prenom" => $_POST['prenom'],
				//"password" => $password,
				"email" => $_POST['email'],
				"adresse1" => $_POST['adresse1'],
				"adresse2" => $_POST['adresse2'],
				"CP" => $_POST['CP'],
				"ville" => $_POST['ville'],
				"tel" => $_POST['tel'],
				"mobile" => $_POST['mobile']
				];

				$user->updateInfoUser($array, $id);

				/*$this->show('users/modifinfo-personnel', ["message" => "Vos infos ont bien ete modifiés!"]);*/

				$this->show('users/updateInfo', ["message" => "Vos infos ont bien ete modifiés!"]);

	}	


}// End of controller
