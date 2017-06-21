<?php
	
	$w_routes = array(

		//Routes par défaut

		['GET', '/', 'Default#home', 'default_home'],
		
		

		//Routes utilisateurs

		
		//Routes admin

		['GET|POST', '/entree_stock', 'Admin#entree_stock', 'entree_stock'],
		['GET|POST', '/vue_produits', 'Admin#vue_produits', 'vue_produits'],
		['GET|POST', '/select_stock', 'Admin#select_stock', 'select_stock'],
		['GET|POST', '/insert_stock', 'Admin#insert_stock', 'insert_stock'],
		['GET|POST', '/verif_stock', 'Admin#verif_stock', 'verif_stock'],
		

		



	);