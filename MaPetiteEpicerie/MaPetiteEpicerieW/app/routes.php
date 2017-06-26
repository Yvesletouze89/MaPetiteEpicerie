<?php
	
	$w_routes = array(
		// route par default
		['GET', '/', 'Default#accueil', 'default_accueil'],
		['GET', '/contact', 'Default#contact', 'default_contact'],
		['GET', '/mention', 'Default#mention', 'default_mention'],
		['GET', '/produits', 'Default#produits', 'default_produits'],

		['GET|POST', '/ajout', 'Default#ajout', 'default_ajout'],
		['GET', '/produit_suppr/[:id]', 'Default#produit_suppr', 'default_produit_suppr'],

				// nom de page           //fonction controller    //nom de la route 

// route par utilisateur

// route pour la page d'inscrition
['GET|POST', '/inscription', 'Users#inscription', 'Users_inscription'],

// route pour la page de connexion
['GET|POST', '/connexion', 'Users#connexion', 'Users_connexion'],

// route pour la page de deconnexion
['GET|POST', '/deconnexion', 'Users#deconnexion', 'Users_deconnexion'],

['GET|POST', '/oublie', 'Users#oubliPassword', 'Users_oublie'],

//Pour que l'utilisateur change son mot de passe
['GET|POST', '/new-password', 'Users#changePassword', 'Users_new-password'],

//Pour que l'utilisateur change son mot de passe qui est perdu 
['GET|POST', '/recup-password/[:token]', 'Users#tokenExist', 'Users_recup-password'],

['GET|POST', '/password-msg', 'Users#recupPassword', 'Users_password-msg'],

//['GET|POST', '/new-password', 'Users#changePassword', 'Users_new-password'],


// route pour la page d'administration
['GET|POST', '/admin_user', 'Admin#admin', 'admin_admin_user'],

['GET|POST', '/categorie_stock', 'Admin#selectproduit', 'admin_categorie_stock'],

	);