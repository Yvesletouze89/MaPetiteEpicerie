<?php
namespace Model;

class UsersModel extends \W\Model\UsersModel
{
	
	public function checkPseudo($username)
	{
		# On demande à la BDD de vérifier que le pseudo existe et de nous le renvoyer (false ou true)
		return $this->usernameExists($username);
	}

	public function getUser($username)
	{
		# On demande à la BDD de 
		return $this->getUserByUsernameOrEmail($username);
	}


	public function inscriptionUser($insert)
	{
		$this->setPrimaryKey("userid");
		//$this->setTable("users");
		$this->insert($insert);
	}
	
}