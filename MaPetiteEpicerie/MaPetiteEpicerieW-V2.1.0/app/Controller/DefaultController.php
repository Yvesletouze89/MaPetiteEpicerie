<?php

namespace Controller;

use \W\Controller\Controller; // comme un include mais en objet

use Model\produitsModel;

class DefaultController extends Controller
{

	// Mes routes de site


	 /***
	  Page home page geolocalisation gmaps
	 ****/
	public function home()
	{
		$this->show('default/home');
	}


	/**
	 * Page d'accueil par défaut
	 */
	public function accueil()
	{
		$this->show('default/accueil');
	}

	/**
	 * Page de contact
	 */
	public function contact()
	{
		// function show() peux prendre 2 parametre 
		$this->show('default/contact',['title' => 'Page de contact', 'nom' => 'benoit']);
	}


	public function mention()
	{
		// function show() peux prendre 2 paramettre 
		$this->show('default/mention',['title' => 'Page de Mention légale']);
	}	

	public function produits()
	{
		// function show() peux prendre 2 paramettre 
		$produits = new produitsModel();
		$this->show('default/produits',['result' => $produits->ProductList()]);
	}

	public function ajout()
	{
		// function show() peux prendre 2 paramettre 
		if(isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_quantity']))
		{
			$produit = new produitsModel();
			$array = [
			"product_name" => $_POST['product_name'],
			"product_price" => $_POST['product_price'],
			"product_quantity" => $_POST['product_quantity']
			];

			$produit->produit_ajouter($array);
			$this->show('default/ajout', ["message" => "Votre produit a bien ete ajouté !"]);
		}
		else
		{
			$this->show('default/ajout', ["message" => ""]);
		}
	}		

	public function produit_suppr($id)
	{
		if($id){
			$produits = new produitsModel();
			$produits->produitSuppr($id);
			header('Location: /FrameworkW/public/produits');
			//$this->show('default/produit_suppr');
		}
	}	





}