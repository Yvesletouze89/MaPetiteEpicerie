<?php
	
	$w_routes = array(
		// route par default
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/contact', 'Default#contact', 'default_contact'],
		['GET', '/mention', 'Default#mention', 'default_mention'],
		['GET', '/produits', 'Default#produits', 'default_produits'],

		['GET|POST', '/ajout', 'Default#ajout', 'default_ajout'],
		['GET', '/produit_suppr/[:id]', 'Default#produit_suppr', 'default_produit_suppr'],

				// nom de page           //fonction controller    //nom de la route 

		// route par utilisateur

		['GET|POST', '/inscription', 'Users#inscription', 'Users_inscription'],
		['GET|POST', '/connexion', 'Users#connexion', 'Users_connexion'],
		['GET|POST', '/deconnexion', 'Users#deconnexion', 'Users_deconnexion'],


		['GET|POST', '/admin_user', 'Admin#admin', 'admin_admin_user'],

		['GET|POST', '/categorie_stock', 'Admin#selectproduit', 'admin_categorie_stock'],

	);