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

				if ($_POST['password'] == $utilisateur['password'])
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
			$user = new UsersModel();

			$array = [
			"nom" => $_POST['nom'],
			"prenom" => $_POST['prenom'],
			"password" => $_POST['password'],
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

	public function deconnexion()
	{
		$session = new AuthentificationModel();
		$session->logUserOut();
		unset($_SESSION);
		header('Location: connexion');
	}


}
