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

					$this->show("default/accueil", ["message" => "<p class='alert-success clearMsg'>Vous êtes connecté !</p>", "prenom"=> $utilisateur['prenom'], "nom"=> $utilisateur['nom']]);
				}
				else
				{
					$this->show("users/connexion", ["message" => "<p class='alert-failed clearMsg'>le mot de passe est incorrect !</p>"]);
				}
				
			}else
			{
				$this->show("users/connexion", ["message" => "<p class='alert-failed clearMsg'>le pseudo est incorrect !</p>"]);
			}
		}else
		{
			$this->show('users/connexion', ["message" => ""]); // affiche la page connexion
		}

	}

	// Methode inscription
	public function inscription()
	{
			
		if((isset($_POST['civilite']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['email']) && isset($_POST['adresse1']) && isset($_POST['adresse2']) && isset($_POST['CP']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mobile'])) && ($_POST['password'] == $_POST['password2']) && ($_POST['email'] == $_POST['email2']))
		{

			$password = $_POST['password'];

			//chiffre le mdp lors de l'inscription
			$password = sha1($password);
			
			$user = new UsersModel();
				$array = [
				"civilite"=>$_POST['civilite'],
				"nom" => $_POST['nom'],
				"prenom" => $_POST['prenom'],
				"password" => $password,
				"email" => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
				"adresse1" => $_POST['adresse1'],
				"adresse2" => $_POST['adresse2'],
				"CP" => $_POST['CP'],
				"ville" => $_POST['ville'],
				"tel" => $_POST['tel'],
				"mobile" => $_POST['mobile']
				];

				if ($_POST){
					
				
				$user->addUser($array);
				$this->show('users/inscription', ["message" => "<p class='alert-success clearMsg'>Vous avez bien ete inscrit !</p>"]);
			}	
		}
		else
		{
			$this->show('users/inscription', ["message" => "<p class='alert-warning clearMsg'>Remplir les champs obligatoire !</p>"]);
		}

	}

	// Methode de deconnexion
	public function deconnexion()
	{
		$session = new AuthentificationModel();
		$session->logUserOut();
		unset($_SESSION);
		header('Location: accueil');
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
				$this->show("users/recup-password", ["message" => "<p class='alert alert-danger'>Probleme recup token</p>"]);

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
					
					<a href='http://192.168.1.50/MaPetiteEpicerieW-V2.1.1/public/recup-password/".$token."'>Renouveler le mdp</a>

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
			    	//echo "l'email existe pas !";
			    	$this->show("users/oublie", ["message"=>"<p class='alert alert-danger'>l'email n'existe pas !</p>"]);
			}
		}else{
			$this->show("users/oublie");
		}
	}

		// Methode de changement de mot de passe oublié
		public function recupPassword()
		{
			
			if (!empty($_POST['password']) && !empty($_POST['password2']) && isset($_POST['email']) && ($_POST['password'] == $_POST['password2']) && ($_POST['email'] != NULL))
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

						$this->show("default/accueil", ["message" => "<p class='clearMsg alert-success'>Votre nouveau mot de passe a bien été enregistré !</p>"]);

				    }
				}
			}else{
				    $this->show("users/recup-password", ["message" => "<p class='alert alert-warning'>Remplir les champs !</p>"] );
			}
		
		}

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

				$this->show("users/modifinfo-personnel", ["message" => "<p class='alert alert-success'>Bravo Vous avez atteint la page modification perso!</p>", "prenom"=> $utilisateur['prenom'], "nom"=> $utilisateur['nom'], "valid" => "true"]);
				
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

		
			$this->show('users/modifinfo-personnel', ["resultat"=>$result, "message" => "<p class='clearMsg alert-success'>Vous êtes sur la page de modification personnel !</p>", "valid" => true] );
				}
				else{$this->show("users/auth-modification-perso", ["message" => "<p class='clearMsg alert-failed'>Vérifier votre mot de passe !"]);}
			}else{
				$this->show('w_errors/404');
			}
	}

	public function updateInfo()
	{	
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

				$this->show('default/accueil', ["message" => "<p  class='clearMsg alert-success'>Vos informations ont bien été modifiés !</p>", "valid" => true]);
	}

	// Methode de changement de mot de passe utilisateur
	public function changePassword()
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
			    if ($utilisateur['ID_util'] != NULL && $_POST['password'] == $_POST['password2'] && $_POST['password'] != NULL) 
			    {
			    	// chiffre le mdp
					$password = sha1($password);

					// Met a jour le mot de passe et vide le champs token dans la DB
					$user->changeMyPassword(["password" => $password], $utilisateur['ID_util']);
					$this->show("default/accueil", ["message" => "<p class='alert-success clearMsg'>Votre mot de passe a bien été changé !</p>", "valid" => true]);
					
			    }
			    else
			    {
			    	$this->show("users/modifinfo-personnel",["message" => "<p class='alert alert-warning'>Les champs sont vides !</p>", "valid" => true]);
			   	}
			    
			}
		}else{
			    $this->show("users/modifinfo-personnel", ["message" => "<p class='alert alert-warning'>le mot de passe doit être identique !</p>", "valid" => false]);
		}
	}

//YVES
	public function boutique_categories() # Affiche toutes les catégories
	{
		$this->show('users/boutique_categories');
		
	}
	public function boutique_cat($cat)
	{
			
			$cat = urldecode($cat);
			
		$select = new UsersModel();
		$result = $select->catListBoutique($cat);
		$this->show('users/boutique_cat',["categorie"=>$result]);
		
	}


	// Methode de mot de passe oublié création du token dans la DB
	//et envoi par mail URL pour changer le mot de passe.
/*	public function oubliPassword()
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

						ini_set('SMTP', 'smtp.google.com ');
						ini_set('smtp_port', '465');
						ini_set('sendmail_from', 'christophe.chastagnier@gmail.com');

				       	$to = "christophe.chastagnier@gmail.com";
				        $subject = "Objet: Mot de passe oublié  - mapetiteepicerie.fr";
				        $message = "

				                    
				                    bonjour Nom, prenom
				                    cliquez sur le lien pour créer un nouveau mot de passe:
				                    
				                    <a href='http://192.168.1.50/MaPetiteEpicerieW/public/recup-password/".$token."'>Renouveler le mdp</a>

				                    Remarque :  pour des raisons de confidentialité Ma petite épicerie n’est pas habilité à vous communiquer ou à vous demander votre mot de passe.

				        ";


						$message .="\n Dernière mise à jour, contact V2.2.2 ::";
				        if (mail($to, $subject, $message)) {
				        //Puis on renvoie sur monsiteweb.org, if permet de tester si mail() à bien fonctioné (ceci ne garanti pas que le mail sera recu, mais c'est un début)
				     echo "mail envoyé";
				        }
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
			    	//echo "l'email existe pas !";
			    	$this->show("users/oublie", ["message"=>"<p class='alert alert-danger'>l'email n'existe pas !</p>"]);
			}
		}else{
			$this->show("users/oublie");
		}
	}
*/


}// End of controller
