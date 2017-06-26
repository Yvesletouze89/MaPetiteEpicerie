<?php

namespace Controller;

use \W\Controller\Controller; // comme un include mais en objet

use \W\Security\AuthentificationModel; // comme un include mais en objet

use Model\UsersModel; // comme un include mais en objet

class UsersController extends Controller
{

	// Mes routes de utilisateur

	// Methode connexion
	public function connexion()
	{
		if (isset($_POST['email']) &&  isset($_POST['password']))
		{
			// instencier le model d'auth
			$session = new AuthentificationModel();

			$user = new UsersModel(); // va interoger la base de donnee
			if ($user->checkEmail($_POST['email'])) 
			{
				$utilisateur = $user->getUser($_POST['email']);

				if (sha1($_POST['password']) == $utilisateur['password'])
				{

					$session->logUserIn(['ID_util' => $utilisateur['ID_util'], 'droits_acces' => $utilisateur['droits_acces'], "prenom" => $utilisateur['prenom'], "nom" =>$utilisateur['nom'] ]);

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

		// function show() peux prendre 2 paramettre 
		if((isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['email']) && isset($_POST['adresse1']) && isset($_POST['adresse2']) && isset($_POST['CP']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mobile'])) && ($_POST['password'] == $_POST['password2']) && ($_POST['email'] == $_POST['email2']))
		{

			$password = $_POST['password'];
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



		// Methode de verification du token pour l'utilisateur
		public function tokenExist($token)
		{
			
			if ($token)
			{
				$user = new UsersModel();
				$utilisateur = $user->getUserByToken($token);
				if($utilisateur)
				{
					$this->show("users/recup-password", ["utilisateur" => $utilisateur ]);
			
				}
//echo "<a href='http://192.168.1.50/MaPetiteEpicerieW/public/recup-password/".$token."'>Renouveler le mdp</a>";
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

			$user = new UsersModel(); // charge le Usersmodel.php
			

			if ($user->checkEmail($_POST['email'])) // si email exist
			{	
			
				$utilisateur = $user->getUser($_POST['email']); // recupere tout sur le user et ca le stock dans $utilisateur

			    if ($utilisateur['ID_util'] != NULL) // si ID_util n'est pas null
			    {
					$token = md5(uniqid(rand(),true)); // Genere un token md5 aleatoire
					
					$user->insertToken($token, $utilisateur['ID_util']); // fonction insert le token dans la bd (deux parametre $token et $utilisateur)
					$texte = "Objet: Mot de passe oublié ou perdu	
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

					// 3 : quand on a fini de l'utiliser, on ferme le fichier
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
		// Methode de changement de mot de passe utilisateur
		public function changePassword()
		{
			if ((isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['email']) && ($_POST['password'] == $_POST['password2']) && ($_POST['email'] != NULL)))
			 //On est dans la page de formulaire
			{
				$email = $_POST['email'];
				$password = $_POST['password'];

				$user = new UsersModel(); // charge le Usersmodel.php
				

				if ($user->checkEmail($_POST['email'])) // si email exist
				{	
				
					$utilisateur = $user->getUser($_POST['email']); // recupere tout sur le user et ca le stock dans $utilisateur

				    if ($utilisateur['ID_util'] != NULL) // si ID_util n'est pas null
				    {
						$password = sha1($password); // chiffre le mdp
						
						$user->renewPassword($password, $utilisateur['ID_util']); // fonction insert le token dans la bd (deux parametre $token et $utilisateur)
						$this->show("users/new-password", ["message" => "Votre mot de passe a bien ete changé !"]);
				    }
				}
			}else{
				    $this->show("users/new-password", ["message" => "Probleme !"] );
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

				$user = new UsersModel(); // charge le Usersmodel.php
				

				if ($user->checkEmail($_POST['email'])) // si email exist
				{	
				
					$utilisateur = $user->getUser($_POST['email']); // recupere tout sur le user et ca le stock dans $utilisateur

				    if ($utilisateur['ID_util'] != NULL) // si ID_util n'est pas null
				    {
						$password = sha1($password); // chiffre le mdp
						// Met a jour le mot de passe et supprime le champs token dans la bd
						$user->renewPassword(["password" => $password, "token"=> "" ], $utilisateur['ID_util']); // fonction insert le token dans la bd (deux parametre $token et $utilisateur)
						$this->show("users/recup-password", ["message" => "Votre mot de passe a bien ete changé !"]);
				    }
				}
			}else{
				    $this->show("users/recup-password", ["message" => "Probleme !"] );
			}
		
		}

}// End of controller
