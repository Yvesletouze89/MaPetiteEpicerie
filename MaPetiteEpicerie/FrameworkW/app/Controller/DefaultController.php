<?php

namespace Controller;

use \W\Controller\Controller; // comme un include mais en objet

class DefaultController extends Controller
{

	// Mes routes de site

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}

	/**
	 * Page de contact
	 */
	public function contact()
	{
		// function show() peux prendre 2 paramettre 
		$this->show('default/contact',['title' => 'Page de contact', 'nom' => 'benoit']);
	}


	public function mention()
	{
		// function show() peux prendre 2 paramettre 
		$this->show('default/mention',['title' => 'Page de Mention légale']);
	}	

}