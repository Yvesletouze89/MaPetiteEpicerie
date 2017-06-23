<?php
	
	$w_routes = array(

		//Routes par défaut

		['GET', '/', 'Default#home', 'default_home'], // Page d'ouverture

		
		//Routes utilisateurs

		
		//Routes admin

		['GET', '/accueil_admin', 'Admin#accueil_admin', 'accueil_admin'], // Page Menu des admin
		['GET|POST', '/entree_stock', 'Admin#entree_stock', 'entree_stock'], // Affiche la page entrée en stock
		['GET', '/vue_produits', 'Admin#vue_produits', 'vue_produits'], // Liste des produits
		['GET|POST', '/select_stock', 'Admin#select_stock', 'select_stock'], // Sélectionner un produit à mettre en stock
		['GET|POST', '/insert_stock', 'Admin#insert_stock', 'insert_stock'], // Entrée des produits dans la table stock
		['GET|POST', '/verif_stock', 'Admin#verif_stock', 'verif_stock'], // Vérifie que le produit n'est pas déjà en stock
		['GET|POST', '/maj_stock', 'Admin#maj_stock', 'maj_stock'], // Mise à jour du stock
		['GET|POST', '/affiche_stock', 'Admin#affiche_stock', 'affiche_stock'], // Affiche les produits en stock selon sélection cat/marque
		['GET|POST', '/maj_produitStock/[:id]', 'Admin#maj_produitStock', 'maj_produitStock'], // Permet de sélectionner le produit à maj
		['GET|POST', '/enregistreMaj', 'Admin#enregistreMaj', 'enregistreMaj'], // Enregistre les maj produit		

		



	);