<?php
	
$w_routes = array(
/* Route par defaut */

['GET', '/', 'Default#accueil', 'default_accueil'],
['GET', '/contact', 'Default#contact', 'default_contact'],
['GET', '/mention', 'Default#mention', 'default_mention'],
['GET', '/produits', 'Default#produits', 'default_produits'],

['GET|POST', '/ajout', 'Default#ajout', 'default_ajout'],

['GET', '/produit_suppr/[:id]', 'Default#produit_suppr', 'default_produit_suppr'],

		//-> nom de page        //-> fonction controller  //-> nom de la route 

/* Route pour les utilisateurs */

// route pour la page d'inscrition
['GET|POST', '/inscription', 'Users#inscription', 'Users_inscription'],

// route pour la page de connexion
['GET|POST', '/connexion', 'Users#connexion', 'Users_connexion'],

// route pour la page de deconnexion
['GET|POST', '/deconnexion', 'Users#deconnexion', 'Users_deconnexion'],

// route pour la page de mot de passe oublié
['GET|POST', '/oublie', 'Users#oubliPassword', 'Users_oublie'],

// route pour que l'utilisateur change son mot de passe qui est perdu 
['GET|POST', '/recup-password/[:token]', 'Users#tokenExist', 'Users_recup-password'],

//redirige vers le formulaire changement mot de passe oublié
['GET|POST', '/password-msg', 'Users#recupPassword', 'Users_password-msg'],

// route pour que l'utilisateur s'authentifi avant de changer ses infos perso 
['GET|POST', '/auth-modification-perso', 'Users#connexionInfoPerso', 'Users_auth-modification-perso'],

// route pour que l'utilisateur change ses infos perso 
['GET|POST', '/modifinfo-personnel', 'Users#recupInfoPerso', 'Users_modifinfo-personnel'],

// route pour que l'utilisateur change ses infos perso 
['GET|POST', '/updateInfo', 'Users#updateInfo', 'Users_updateInfo'],


/*// route pour l'utilisateur change son mot de passe dans info perso
['GET|POST', '/new-password', 'Users#changePassword', 'Users_new-password'],*/

// route pour la page d'administration
['GET|POST', '/admin_user', 'Admin#admin', 'admin_admin_user'],

['GET|POST', '/categorie_stock', 'Admin#selectproduit', 'admin_categorie_stock'],

	);