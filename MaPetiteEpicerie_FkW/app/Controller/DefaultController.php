<?php

namespace Controller;

use \W\Controller\Controller;
use Model\ProduitsModel;

class DefaultController extends Controller
{

	public function home()
	{
		$this->show('default/home');
	}

	/**
	 * Page de contact
	 */
	public function contact()
	{
		$this->show('default/contact',['title' => 'Comment nous contacter', 'name' => 'Yves']);
	}

	
	public function produits()
	{
		$produits = new ProduitsModel();
		$this->show('default/produits',["result"=>$produits->productList()]);


	}

	public function ajout_produits()
	{
		if(isset($_POST['product_name']))
		{
			$produit = new ProduitsModel();

			$insert = ['product_name' => $_POST['product_name'], 'product_price' => $_POST['product_price'], 'product_quantity' =>  $_POST['product_quantity']];

			$produit->insertProduct($insert);

			//$this->show('default/productadded');
			// ou alors
			 $this->show('default/ajout_produits',["message"=>"Votre produit a bien été ajouté"]);
		}
		else
		{

			$this->show('default/ajout_produits',["message"=>""]);
			// ou alors
			// $this->show('default/ajout_produits',["message"=>"Vous devez enter au moins un produit"]);

		} 
	}

	public function delete_produits($id)
	{
		if($id){
			$produit = new ProduitsModel();
			$produit->deleteProduct($id);
			header('Location: /frameworkw/public/produits');
		}
	}

}