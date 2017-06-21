<?php

namespace Controller;

use \W\Controller\Controller; // comme un include mais en objet

class DefaultController extends Controller
{

	// Mes routes de site

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
		// function show() peux prendre 2 paramettre 
		$this->show('default/contact',['title' => 'Page de contact', 'nom' => 'benoit']);
	}


	public function mentions_legale()
	{
		// function show() peux prendre 2 paramettre 
		$this->show('default/mentions_legale',['title' => 'Page de Mention légale']);
	}

	public function connexion()
	{
		// function show() peux prendre 2 paramettre 
		$this->show('default/connexion',['title' => 'Page de connexion']);
	}




}