<?php
namespace Controller;

use \W\Controller\Controller;

use Model\produitsModel;

use Model\UsersModel;

class AdminController extends Controller
{

// CHRISTOPHE

	public function admin()
	{
		$produits = new ProduitsModel();
		//$this->allowTo('admin');
		if (isset($_SESSION['user']) && $_SESSION['user']['droits_acces'] == "admin")
		{
			$this->show('admin/accueil_admin', ["prenom" => $_SESSION["user"]['prenom'], "nom" => $_SESSION["user"]['nom']]);	
		}else{
			$this->show('w_errors/404');
			//$this->show('default/accueil');
		}
		
	}


	public function selectproduit()
	{
		if(isset($_POST['product_cat']) && isset($_POST['ajax']))
		{
			$produit = new produitsModel();
			$result = $produit->selectProduct($_POST['product_cat']);
			echo json_decode($result);
		}else
		{
			$this->show('admin/categorie_stock');
		}
	}

	// YVES

/*public function accueil_admin() # Affichage du menu des Admin
 		{
			$produits = new ProduitsModel();

			$this->show('admin/accueil_admin');

		}*/

	public function vue_produits() # Affichage liste de tous les produits
		{
			$produits = new ProduitsModel();

			$this->show('admin/vue_produits',["result"=>$produits->productList()]);

		}

	public function entree_stock() # Affichage liste des produits et menus déroulants des produits
		{
			$categories = new ProduitsModel();

			$marques = new ProduitsModel();
			
			$this->show('admin/entree_stock',["categories"=>$categories->categoriesList(), "marques"=>$marques->marquesList()]);
		}

	public function select_stock() # Affichage liste des produits selon sélection
		{
			if(isset($_POST['ajax']) && isset($_POST['product_cat']))
			{
				$select = new ProduitsModel();
				$insert = $select->selectStock(['categorie'=>$_POST['product_cat']]);
				echo json_encode($insert);
			}
			else if(isset($_POST['ajax']) && isset($_POST['product_marque']))
			{
				$select = new ProduitsModel();
				$insert = $select->selectStock(['marque'=>$_POST['product_marque']]);
				echo json_encode($insert);
			}
			else
			{
				$this->show('admin/entree_stock');
			}
		}

	public function verif_stock() # Vérifie que le produit n'est pas déjà en stock
		{
			$select = new ProduitsModel();
			$result = $select->verifStock(['produits_ID_prod'=>$_POST['id_prod'], 'utilisateurs_ID_util'=>'1']);
			echo json_encode($result);
		}

	public function insert_stock() # Entrée des produits dans la table stock
		{
			//if (isset($_SESSION['user']) && $_SESSION['user']['user_role']=="admin" && isset($_SESSION['user']['id_commercant'])) 
			// C'est ici que je crée le $_SESSION
			// $idcom = $_SESSION['user']['id_commercant'];
			$select = new ProduitsModel();
			$select->insertProd(['produits_ID_prod'=>$_POST['id_prod'], 'utilisateurs_ID_util'=>'1']);
			
		}

	public function maj_stock() # Affichage liste des produits et menus déroulants du stock
		{
			$categories = new ProduitsModel();

			$marques = new ProduitsModel();
			
			$this->show('admin/maj_stock',["categories"=>$categories->categoriesList(), "marques"=>$marques->marquesList()]);
		}

	public function affiche_stock() # Affichage liste des produits du stock selon sélection
		{
			if(isset($_POST['ajax']) && isset($_POST['product_cat2']))
			{
				$select = new ProduitsModel();
				$insert = $select->selectStock2($_POST['product_cat2']);
				echo json_encode($insert);
			}
			else if(isset($_POST['ajax']) && isset($_POST['product_marque2']))
			{
				$select = new ProduitsModel();
				$insert = $select->selectMarque2($_POST['product_marque2']);
				echo json_encode($insert);
			}
			else
			{
				$this->show('admin/entree_stock');
			}
		}

	public function maj_produitStock($id) # Affichage de la page de mise à jour d'un produit dans le stock
		{
			if($id){
			$produit = new ProduitsModel();
			$result = $produit->afficheMaj($id);
			$this->show('admin/maj_produitStock',["produit"=>$result]);
			}
			else
			{
				$this->show('admin/maj_Stock');
			}
		}

	public function enregistreMaj() # Update les maj des produits
		{
				//$['stock']=$_POST('#stock.val() '); #A vérifier
				$this->show('admin/enregistreMaj');
		}

	public function update_stock() # Update les maj d'un produit
		{
				
			$produit = new ProduitsModel();
			$result = $produit->updateStock([$_POST]);
			
			$this->show('admin/accueil_admin');
			
	 	}

	public function essai()
	{
		
		 $this->show('admin/essai',['resultat'=>$_POST,'produits_ID_prod'=>$_POST['produits_ID_prod']]);
		
	}	

}

