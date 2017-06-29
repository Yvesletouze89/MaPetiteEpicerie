<!DOCTYPE html>
	<html>
		<head>

			<title>Ma Petite Épicerie</title>

			<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=set_to_true_or_false"></script>
			<script type="text/javascript" src="js/script.js"></script>

			<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
			<link rel="stylesheet" href="css/styles.css" type="text/css">
			<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />

			<meta charset="utf-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<meta name="subject" content="Ma Petite Épicerie, le drive de votre épicerie de village !"/>
			<meta name="keywords" content="épicerie, épicier, alimentation, courses, alimentaire."/>
			<meta name="description" content="Faites vos courses en ligne et laissez votre épicier s'occuper du reste, vous n'aurez plus qu'à venir les chercher."/>
		
		</head>
		<!-- Menu navbar ici -->
		

	<body>

		<?php include('navbar.php'); ?>

		<div class="container-fluid">
			<!-- <div class="row rowContainer"> -->
				<?php include('home.php'); ?>

				<?php include('accueil.php'); ?>

				<?php include('contact.php'); ?>

				<?php include('categories.php'); ?>

				<?php include('panier.php'); ?>

				<?php include('produit.php'); ?>

		<!-- end container-fluid -->
		</div>

		

	<!-- test chevron -->
		<ul class="navbar-right">
			<li class="scrollpage">						    
				<div class="chevron_up"><a href="#top"><i class="fa fa-angle-double-up round" aria-hidden="true"></i></a></div>

			</li>
		</ul> 
	</body>

	<?php include('footer.php'); ?>
</html>