<?php
namespace Model;

// fichier qui interoge la base de donné

class produitsModel extends \W\Model\Model
{
	//On demande a la BDD de nous envoyer la liste des produits
	public function ProductList()
	{
		
		// On donne le nom de la cle primaire
		$this->setPrimaryKey('product_id');

		// On donne le nom de la table
		$this->setTable('produits');

		// Equivalent a query bindValue
		return $this->findAll();

	}

	public function produit_ajouter($array)
	{		
		// On donne le nom de la cle primaire
		$this->setPrimaryKey('product_id');

		// On donne le nom de la table
		$this->setTable('produits');

		// Insert les donnees dans BD
		$this->insert($array); 

	}


	public function produitSuppr($id)
	{		
		// On donne le nom de la cle primaire
		$this->setPrimaryKey('product_id'); //colonne id de la table

		// On donne le nom de la table 
		$this->setTable('produits');

		// supprime les infos de la table produits dans  la BD
		$this->delete($id); 

	}

	public function selectProduct($cat)
	{
		// On donne le nom de la cle primaire
		$this->setPrimaryKey('product_id');

		// On donne le nom de la table
		$this->setTable('produits');

		//search(['colonne table' => $cat]); search fait un WHERE 

		// Equivalent a WHERE SQL
		return $this->search(['product_cat' => $cat]);

	}

	


}