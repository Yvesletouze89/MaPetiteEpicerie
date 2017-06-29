<?php
namespace Controller;

use \W\Controller\Controller;

use Model\produitsModel;

use Model\UsersModel;

class AdminController extends Controller
{

	public function admin()
	{
		//$this->allowTo('admin');
		if (isset($_SESSION['user']) && $_SESSION['user']['droits_acces'] == "admin")
		{
			$this->show('admin/admin_user', ["prenom" => $_SESSION["user"]['prenom'], "nom" => $_SESSION["user"]['nom']]);	
		}else{
			$this->show('w_errors/403');
			//$this->show('default/accueil');
		}
		
	}

public function entre_stock()
{
	$categorie = new produitsModel();

	$this->show('admin/categorie_stock', ["categories" => $categories->ProductList()]);
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

}

