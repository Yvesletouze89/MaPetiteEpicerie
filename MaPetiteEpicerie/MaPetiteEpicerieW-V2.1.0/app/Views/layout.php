<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">

	<title><?= $this->e($title) ?></title>

<!-- Lien pour favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?= $this->assetUrl('img/favicon.ico') ?>">






<!--********************** JAVASCRIPT du site *****************************-->

<!-- Script pour JQuery 3.2.1 min -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous">		  	
</script>

<!-- Script pour JQuery UI 1.12.1 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script async defer src="https://maps.googleapis.com/maps/api/js?language=fr&region=FR&callback=initMap&key=AIzaSyCvSk5lgG5kySBh787E_Aat9OqMhiSgwOM"></script>

<!-- Lien Javascript pour la page mot de passe oublié ! -->
<script type="text/javascript" src="<?= $this->assetUrl('js/mdp-oublie.js') ?>"></script>

<!-- Lien Javascript pour la page connexion inscription -->
<script type="text/javascript" src="<?= $this->assetUrl('js/connex-inscrip.js') ?>"></script>

<!-- Lien Javascript pour la page modif info perso -->
<script type="text/javascript" src="<?= $this->assetUrl('js/modif-info-perso.js') ?>"></script>

<!-- Lien Javascript faire disparaitre message dans page -->
<script type="text/javascript" src="<?= $this->assetUrl('js/message.js') ?>"></script>


<!-- *********** Sandrine JS ************** -->

<!-- Lien Javascript pour la page contact -->
<script type="text/javascript" src="<?= $this->assetUrl('js/contact.js') ?>"></script>

<!-- Lien Javascript pour le panier -->
<script type="text/javascript" src="<?= $this->assetUrl('js/panier.js') ?>"></script>

<!-- Lien Javascript pour les boutons d'incrémentation -->
<script type="text/javascript" src="<?= $this->assetUrl('js/increment.js') ?>"></script>

<!-- Lien Javascript pour generer google maps géolocalisation -->
<script type="text/javascript" src="<?= $this->assetUrl('js/gmaps.js') ?>"></script>

<!-- Lien Javascript pour generer google maps géolocalisation -->
<script type="text/javascript" src="<?= $this->assetUrl('js/scrollTop.js') ?>"></script>


<!-- Lien Javascript pour YVES -->
<script type="text/javascript" src="<?= $this->assetUrl('js/fichierJS.js') ?>"></script>

<!-- Lien pour le  CSS avec @import bootstrap-->
<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">


</head>


<!--NAVBAR-->

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header" >
	      
	      <button type="button" class="navbar-toggle left collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	   		<div class="row">
	      <div class="col-md-8 col-md-offset-2">
	          <a class="navbar-brand" href="#">Ma Petite Epicerie</a>   
	      </div>

			<?php if (isset($_SESSION['user']['ID_util']))
			{

				echo "<p class='username clearMsg'>Hello ".$_SESSION['user']['prenom']." ".$_SESSION['user']['nom']." !</p>";
				?>

			<!-- <a href="admin_user">Page admin</a>
			<a href="auth-modification-perso">changer mes infos perso</a> -->

			<a href="auth-modification-perso"><i class="fa fa-file-text-o navbar-toggle accountButton" title="Espace personnel" aria-hidden="true"></i></a>

			<a href="deconnexion"><i class="fa fa-power-off navbar-toggle deconnectButton" title="deconnexion" aria-hidden="true"></i></a>
			<?php
			}else
				{
			?>

			<a href="connexion"><i class="fa fa-user-o navbar-toggle right userButton" title="connexion" aria-hidden="true"></i></a>


			<a href="inscription"><i class="fa fa-user-plus navbar-toggle InscriButton" title="inscription" aria-hidden="true"></i></a>
			<?php } ?>

	      	<a href="#"><i class="fa fa-shopping-basket navbar-toggle right basketButton" title="panier" aria-hidden="true"></i></a>
     		</div>
	   
			<!-- <i class="fa fa-share-alt navbar-toggle" aria-hidden="true"></i> -->
		</div>

    	<!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">    

	      <ul class="nav navbar-nav navbar-fixed-top">
		        <li><a href="/MaPetiteEpicerieW-V2.1.0/public/accueil">Accueil <span class="sr-only">(Accueil)</span></a></li>
		        <li class="dropdown">
		           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catégories <span class="caret"></span></a>
		            <ul class="dropdown-menu">
		              <li><a href="#"></a></li>
		              <li><a href="/MaPetiteEpicerieW-V2.1.0/public/boutique_cat/Plat du jour">Plat du jour</a></li>
		              <li><a href="/MaPetiteEpicerieW-V2.1.0/public/boutique_cat/Boissons">Boissons</a></li>
		              <li role="separator" class="divider"></li>
		              <li><a href="/MaPetiteEpicerieW-V2.1.0/public/boutique_cat/Fruits et légumes">Fruits et légumes</a></li>
		              <li><a href="/MaPetiteEpicerieW-V2.1.0/public/boutique_cat/Produits frais">Produit frais</a></li>
		              <li><a href="/MaPetiteEpicerieW-V2.1.0/public/boutique_cat/Epicerie salée">Epicerie Salée</a></li>
		              <li><a href="/MaPetiteEpicerieW-V2.1.0/public/boutique_cat/Epicerie sucrée">Epicerie Sucrée</a></li>
		              <li role="separator" class="divider"></li>
		              <li><a href="/MaPetiteEpicerieW-V2.1.0/public/boutique_cat/Hygiène">Hygiène / Bébé</a></li>
		              <li><a href="/MaPetiteEpicerieW-V2.1.0/public/boutique_cat/">Entretien / Nettoyage</a></li>
		              <li role="separator" class="divider"></li>
		              <li><a href="#">Mon panier</a></li>
		            </ul>
		          </li>
		        <li><a href="#">Nos services <span class="sr-only">(current)</span></a></li>
		        <li><a href="contact">Nous contacter</a></li>        
	      </ul>
	      
			<!--       <ul class="nav navbar-nav ">
		        
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Categories</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		          </ul>
		        </li>
		      </ul> -->
	    </div><!-- /.navbar-collapse -->

 </div><!-- /.container-fluid -->
</nav>


<br />
<br />
<br />
<br />
<!--End NAVBAR-->



<body>

<div class="cRetour">
	<i class="fa fa-angle-double-up round" aria-hidden="true"></i>
</div>

	<div class="container-fluid">

		<header>
			<section class="row">
				<div class="col-xs-12 page-header">
					<h1> <?= $this->e($title) ?></h1>
				</div>	
			</section>
		</header>

<!-- 
<section class="row">
	<div class="col-xs-12 page-header">
		<h1>Nous contacter : </h1>
	</div>
</section> -->



			<section>
				<?= $this->section('main_content') ?>
			</section>

		<!-- test chevron -->
<!-- 			<ul class="navbar-right">
				<li class="scrollpage">						    
					<div class="chevron_up"><a href="#top"><i class="fa fa-angle-double-up round" aria-hidden="true"></i></a></div>

				</li>
			</ul>  -->		
</div>			
		<footer class="footerFront">
			<p><a href="#">Plan du site</a> - <a href="mentions-legales">Mentions légales</a> - <a href="conditions-generales-de-vente">Conditions générales de ventes</a> - <a href="accueil_admin">Accès Administrateur</a></p>
			<!-- A habiller -->
		</footer>
	
</body>
</html>