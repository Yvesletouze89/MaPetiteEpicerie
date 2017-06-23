<?php
namespace Model;
use \PDO;
use \PDOException;

class ProduitsModel extends \W\Model\Model
{
	
	public function productList() # Affichage de tous les produits de la table Produits
		{
			# On demande à la BDD de nous envoyer la liste des produits
			$this->setPrimaryKey("ID_prod");
			# On donne le nom de la clé primaire
			$this->setTable("produits");
			# On donne le nom de la table
			return $this->findAll();
			# Equivalent à query, bindvalue, etc... avec SELECT * FROM produits
		}

	public function categoriesList() # Liste des catégories dans le menu déroulant 
		{
			$this->setPrimaryKey("ID_cat");
			$this->setTable("categories");
			return $this->findAll();
		}

	public function marquesList() # Liste des marques dans le menu déroulant
		{
			$app = getApp();
			
			try {
			    //connexion à la base avec la classe PDO et le DSN
			    $dbh = new PDO('mysql:host='.$app->getConfig('db_host').';dbname='.$app->getConfig('db_name'), $app->getConfig('db_user'), $app->getConfig('db_pass'), array(
			        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //on s'assure de communiquer en utf8
			        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
			        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
			    ));
			} catch (PDOException $e) { //attrappe les éventuelles erreurs de connexion
			    echo 'Erreur de connexion : ' . $e->getMessage();
			}
			$query = $dbh->prepare('SELECT DISTINCT marque FROM produits ORDER BY marque ASC');
			$query->execute();
			$result = $query->fetchAll(); 
			return $result;
		}

	public function selectStock($tableau) # Affichage des produits pour une catégorie
		{
			$this->setPrimaryKey("ID_prod");
			$this->setTable("produits");
			return $this->search($tableau);
		}

	public function verifStock($verif) # Vérifie que le produit n'est pas en stock
		{
			$this->setPrimaryKey("ID_stock");
			$this->setTable("stock_produits");
			return $this->search($verif, 'AND');
		}

	public function insertProd($insert) # Entrée du produit dans le stock
		{	
			//$insert=['produits_ID_prod'=>$id, 'commercant_ID_util'=>$_SESSION['id']];
			$this->setPrimaryKey("ID_stock");
			$this->setTable("stock_produits");
			$this->insert($insert);
		}

	public function selectStock2($cat) # Affichage des produits du stock pour une catégorie
		{
			$app = getApp();
			
			try {
			    //connexion à la base avec la classe PDO et le DSN
			    $dbh = new PDO('mysql:host='.$app->getConfig('db_host').';dbname='.$app->getConfig('db_name'), $app->getConfig('db_user'), $app->getConfig('db_pass'), array(
			        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //on s'assure de communiquer en utf8
			        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
			        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
			    ));
			} catch (PDOException $e) { //attrappe les éventuelles erreurs de connexion
			    echo 'Erreur de connexion : ' . $e->getMessage();
			}
			$query = $dbh->prepare('SELECT * FROM `stock_produits` INNER JOIN produits ON stock_produits.produits_ID_prod = produits.ID_prod WHERE `categorie`="'.$cat.'"');
			$query->execute();
			$result = $query->fetchAll(); 
			return $result;

			}

	public function selectMarque2($mark) # Affichage des produits du stock pour une marque
		{
			$app = getApp();
			
			try {
			    //connexion à la base avec la classe PDO et le DSN
			    $dbh = new PDO('mysql:host='.$app->getConfig('db_host').';dbname='.$app->getConfig('db_name'), $app->getConfig('db_user'), $app->getConfig('db_pass'), array(
			        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //on s'assure de communiquer en utf8
			        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
			        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
			    ));
			} catch (PDOException $e) { //attrappe les éventuelles erreurs de connexion
			    echo 'Erreur de connexion : ' . $e->getMessage();
			}
			$query = $dbh->prepare('SELECT * FROM `stock_produits` INNER JOIN produits ON stock_produits.produits_ID_prod = produits.ID_prod WHERE `marque`="'.$mark.'"');
			$query->execute();
			$result = $query->fetchAll(); 
			return $result;

			}

	public function afficheMaj($id) # Affichage du produit du stock pour modification
		{
			$app = getApp();
			
			try {
			    //connexion à la base avec la classe PDO et le DSN
			    $dbh = new PDO('mysql:host='.$app->getConfig('db_host').';dbname='.$app->getConfig('db_name'), $app->getConfig('db_user'), $app->getConfig('db_pass'), array(
			        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //on s'assure de communiquer en utf8
			        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
			        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
			    ));
			} catch (PDOException $e) { //attrappe les éventuelles erreurs de connexion
			    echo 'Erreur de connexion : ' . $e->getMessage();
			}
			$query = $dbh->prepare('SELECT * FROM `stock_produits` INNER JOIN produits ON stock_produits.produits_ID_prod = produits.ID_prod WHERE `produits_ID_prod`="'.$id.'"');
			$query->execute();
			$result = $query->fetch(); 
			return $result;

			}







	public function insertProduct($insert)
		{
			$this->setPrimaryKey("product_id");
			$this->setTable("produits");
			$this->insert($insert);
			# Pas de return

		}

	public function deleteProduct($id)
		{
			$this->setPrimaryKey("product_id");
			$this->setTable("produits");
			$this->delete($id);
		}
}