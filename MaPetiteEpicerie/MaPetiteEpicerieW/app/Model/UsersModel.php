<?php

namespace Model;

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


	// Fonction ajouter utilisateur db
	public function addUser($array)
	{		
		// On donne le nom de la cle primaire
		$this->setPrimaryKey('ID_util');

		// On donne le nom de la table
		$this->setTable('utilisateurs');

		// Insert les donnees dans BD
		$this->insert($array); 

	}
}
