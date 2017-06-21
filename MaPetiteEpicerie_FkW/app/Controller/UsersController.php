<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel;
use Model\UsersModel;

class UsersController extends Controller
{
	public function connexion()
	{
		if (isset($_POST['user_name']) && isset($_POST['user_password'])) 
		{
			$session = new AuthentificationModel(); //$session et $user sont des noms donnés par moi
			$user = new UsersModel();

			if ($user->checkPseudo($_POST['user_name'])) //checkPseudo est la fonction que je crée dans UsersModel
			{
				$utilisateur = $user->getUser($_POST['user_name']); //On récupère toutes les infos de l'utilisateur

				if ($_POST['user_password'] == $utilisateur['user_password']) {
					
					$session->logUserIn(["userid"=>$utilisateur['userid'],"user_role"=>$utilisateur['user_role']]); //plus toutes les autres infos nécessaires dans $_SESSION

					//$this->show('users/connecte');
					$this->show('users/connexion',["message"=>"Vous êtes bien connecté", "lien"=>"admin", "voir"=>"Se connecter"]);
					
				}
				else
				{
					$this->show('users/connexion',["message"=>"Le mot de passe est invalide"]);
				}
			}
			else
			{
				$this->show('users/connexion',["message"=>"Le pseudo n'existe pas"]);
			}
		}
		else
		{
			$this->show('users/connexion',["message"=>"", "lien"=>"", "voir"=>""]);
						
		}
		
	}

	public function inscription()
	{
		if(isset($_POST['user_name']) && isset($_POST['user_password']) && isset($_POST['user_email'])) 
		{
			$user = new UsersModel();

			$insert = ['user_name' => $_POST['user_name'], 'user_password' => $_POST['user_password'], 'user_email' =>  $_POST['user_email']];

			$user->inscriptionUser($insert);

			//$this->show('default/productadded');
			// ou alors
			 $this->show('users/inscription',["message"=>"Vous êtes bien enregistré"]);
		}
		else
		{

			$this->show('users/inscription',["message"=>"Raté"]);
			// ou alors
			// $this->show('default/ajout_produits',["message"=>"Vous devez enter au moins un produit"]);

		} 
	}

	public function deconnexion()
	{
		$session = new AuthentificationModel();
		$session->logUserOut();
		unset($_SESSION);
		header('Location:'.$_SERVER['HTTP_REFERER']); //Revient sur la dernière page visitée

	}
};	