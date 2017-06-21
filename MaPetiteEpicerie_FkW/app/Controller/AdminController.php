<?php

namespace Controller;

use \W\Controller\Controller;
use Model\ProduitsModel;


class AdminController extends Controller
{
 
	public function vue_produits() # Affichage liste de tous les produits
		{
			$produits = new ProduitsModel();

			$this->show('admin/vue_produits',["result"=>$produits->productList()]);

		}


	public function entree_stock() # Affichage liste des produits et menus déroulants
		{
			$categories = new ProduitsModel();

			$marques = new ProduitsModel();
			
			//$produits = new ProduitsModel();

			$this->show('admin/entree_stock',["categories"=>$categories->categoriesList(), "marques"=>$marques->marquesList()]);
		}

	public function select_stock() # Affichage liste des produits selon sélection
		{
			if(isset($_POST['ajax']) && isset($_POST['product_cat']))
			{
				$select = new ProduitsModel();
				$insert = $select->selectStock($_POST['product_cat']);
				echo json_encode($insert);
			}
			else if(isset($_POST['ajax']) && isset($_POST['product_marque']))
			{
				$select = new ProduitsModel();
				$insert = $select->selectMarque($_POST['product_marque']);
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
			$result = $select->verifStock(['produits_ID_prod'=>$_POST['id_prod'], 'commercant_ID_util'=>'1']);
			echo json_encode($result);
		}

	public function insert_stock() # Entrée des produits dans la table stock
		{
			//if (isset($_SESSION['user']) && $_SESSION['user']['user_role']=="admin" && isset($_SESSION['user']['id_commercant'])) 
			// C'est ici que je crée le $_SESSION
			// $idcom = $_SESSION['user']['id_commercant'];
			$select = new ProduitsModel();
			$select->insertProd(['produits_ID_prod'=>$_POST['id_prod'], 'commercant_ID_util'=>'1']);
			
		}
	

	
}