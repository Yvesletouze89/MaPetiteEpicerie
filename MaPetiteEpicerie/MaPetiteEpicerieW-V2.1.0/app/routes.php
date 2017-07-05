<?php
	
$w_routes = array(
/* Route par defaut */

['GET', '/', 'Default#home', 'default_home'],


['GET', '/accueil', 'Default#accueil', 'default_accueil'],
['GET', '/contact', 'Default#contact', 'default_contact'],
['GET', '/mention', 'Default#mention', 'default_mention'],
['GET', '/produits', 'Default#produits', 'default_produits'],

// route pour les conditions générales de vente
['GET', '/conditions-generales-de-vente', 'Default#cgv', 'default_conditions-generales-de-vente'],

// route pour les mentions légales
['GET', '/mentions-legales', 'Default#mentionLegal', 'default_mentions-legales'],


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


/************************** Partie mot de passe oublié *****************/

// route pour la page de mot de passe oublié
['GET|POST', '/oublie', 'Users#oubliPassword', 'Users_oublie'],

// route pour que l'utilisateur change son mot de passe qui est perdu 
['GET|POST', '/recup-password/[:token]', 'Users#tokenExist', 'Users_recup-password'],

//redirige vers le formulaire changement mot de passe oublié
['GET|POST', '/password-msg', 'Users#recupPassword', 'Users_password-msg'],


/************************** Partie espace perso **********************/

// route pour que l'utilisateur s'authentifi avant de changer ses infos perso 
['GET|POST', '/auth-modification-perso', 'Users#connexionInfoPerso', 'Users_auth-modification-perso'],

// route modif info perso appel la fonction qui recupere les infos de user
// met les valeurs existant en post  
['GET|POST', '/modifinfo-personnel', 'Users#recupInfoPerso', 'Users_modifinfo-personnel'],

// route pour que l'utilisateur change ses infos perso 
['GET|POST', '/updateInfo', 'Users#updateInfo', 'Users_updateInfo'],


// route pour l'utilisateur change son mot de passe dans info perso
['GET|POST', '/new-password', 'Users#changePassword', 'Users_new-password'],


// route ajax
/*['GET|POST', '/ajax', 'Users#ajax', 'Users_ajax'],*/



// route pour la page d'administration
// ['GET|POST', '/admin_user', 'Admin#admin', 'admin_admin_user'],

['GET|POST', '/categorie_stock', 'Admin#selectproduit', 'admin_categorie_stock'],


//YVES

			
		//Routes utilisateurs
		['GET|POST', '/essai', 'Admin#essai', 'x'],
		//['GET|POST', '/boutique_categories', 'Users#boutique_categories', 'boutique_categories'],
		['GET|POST', '/boutique_cat/[:cat]', 'Users#boutique_cat', 'boutique_cat'],
		
		//Routes admin

		['GET', '/accueil_admin', 'Admin#admin', 'accueil_admin'], // Page Menu des admin
		['GET|POST', '/entree_stock', 'Admin#entree_stock', 'entree_stock'], // Affiche la page entrée en stock
		['GET', '/vue_produits', 'Admin#vue_produits', 'vue_produits'], // Liste des produits
		['GET|POST', '/select_stock', 'Admin#select_stock', 'select_stock'], // Sélectionner un produit à mettre en stock
		['GET|POST', '/insert_stock', 'Admin#insert_stock', 'insert_stock'], // Entrée des produits dans la table stock
		['GET|POST', '/verif_stock', 'Admin#verif_stock', 'verif_stock'], // Vérifie que le produit n'est pas déjà en stock
		['GET|POST', '/maj_stock', 'Admin#maj_stock', 'maj_stock'], // Mise à jour du stock
		['GET|POST', '/affiche_stock', 'Admin#affiche_stock', 'affiche_stock'], // Affiche les produits en stock selon sélection cat/marque
		['GET|POST', '/maj_produitStock/[:id]', 'Admin#maj_produitStock', 'maj_produitStock'], // Permet de sélectionner le produit à maj
		['GET|POST', '/enregistreMaj', 'Admin#enregistreMaj', 'enregistreMaj'], // Enregistre les maj produit		
		
		['GET|POST', '/update_stock', 'Admin#update_stock', 'update_stock'] // Enregistre les maj produit

	);