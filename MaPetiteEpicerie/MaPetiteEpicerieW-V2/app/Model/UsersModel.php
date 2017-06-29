<?php

namespace Model;

use \PDO;
use \PDOException;

class UsersModel extends \W\Model\UsersModel
{
	// Fonction verif utilisateur db
	public function checkEmail($email)
	{
		return $this->emailExists($email);

	}

	public function getUser($email)
	{
		return $this->getUserByUsernameOrEmail($email);
	}


	// Fonction inscrire utilisateur db
	public function addUser($array)
	{		
		// On donne le nom de la cle primaire
		$this->setPrimaryKey('ID_util');

		// On donne le nom de la table
		$this->setTable('utilisateurs');

		// Insert les donnees dans la table utilisateur
		$this->insert($array); 

	}
	

	// Fonction qui genere un token pour un user qui oublie son mdp 
	public function insertToken($token, $id)
	{		
		// On donne le nom de la cle primaire
		$this->setPrimaryKey('ID_util');

		// On donne le nom de la table
		$this->setTable('utilisateurs');

		// Insert les donnees dans BD
		//$this->update(['utilisateurs'=>'ID_util']); 
		$this->update(['token' => $token], $id);
		// on lui redonne les 2 parametres attendu $token et $id
		// on fait un array associatf ['token' => $token] car il va ajouter dans la colonne token, le token generer dans le UsersController.. oubliPassword()
	}

	//Met a jour le mot de passe en base de donné et supprime le token 
	public function renewPassword($arrayPassToken, $id)
	{		
		// On donne le nom de la cle primaire
		$this->setPrimaryKey('ID_util');

		// On donne le nom de la table
		$this->setTable('utilisateurs');
		
		//Met a jour le mot de passe en base de donné et supprime le token 
		$this->update($arrayPassToken, $id);

	}

	//Recupere le token dans le champ token de table utilisateur
	public function getUserByToken($token)
	{		
		//Faire une requete sql en dure car search fait un LIKE 

		$app = getApp();

		try
		{
		//connexion à la base avec la classe PDO et le DSN
		$dbh = new PDO('mysql:host='.$app->getConfig('db_host').';dbname='.$app->getConfig('db_name'), $app->getConfig('db_user'), $app->getConfig('db_pass'), array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //on s'assure de communiquer en utf8
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
		));
		} catch (PDOException $e) { //attrappe les éventuelles erreurs de connexion
		echo 'Erreur de connexion : ' . $e->getMessage();
		}
		$query = $dbh->prepare('SELECT * FROM utilisateurs WHERE token = ?');
		$query->bindValue(1, $token, PDO::PARAM_STR);
		$query->execute();
		$result = $query->fetchAll();
		return $result; 

	}

	// SELECT * FROM utilisateurs WHERE ID_util = ? 
	public function selectId($id)
	{		
		// On donne le nom de la cle primaire
		$this->setPrimaryKey('ID_util');

		// On donne le nom de la table
		$this->setTable('utilisateurs');

		return $this->find($id);
	}


	// Fonction ajouter utilisateur db
	public function updateInfoUser($array, $id)
	{		
		// On donne le nom de la cle primaire
		$this->setPrimaryKey('ID_util');

		// On donne le nom de la table
		$this->setTable('utilisateurs');

		// Insert les donnees dans la table utilisateur
		$this->update($array, $id); 

	}

	public function changeMyPassword($password, $id)
	{		
		// On donne le nom de la cle primaire
		$this->setPrimaryKey('ID_util');

		// On donne le nom de la table
		$this->setTable('utilisateurs');
		
		//Met a jour le mot de passe en base de donné 
		$this->update($password, $id);

	}	

}
