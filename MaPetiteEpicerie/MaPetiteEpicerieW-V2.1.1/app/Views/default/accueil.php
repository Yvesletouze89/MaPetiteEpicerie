<?php $this->layout('layout', ['title' => 'Epicerie de Diges']) ?> 
<?php $this->start('main_content') ?>
<?php if(isset($message)) echo $message; ?>
	


<!--********************************************
		SLIDER
*********************************************-->
<!-- 			<div class="container-fluid"> -->

<slider class="row slider" id="top">	
	<div class="col-xs-12 slider2">
		<div class="decoration"></div>

			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Ronds d'indication de photos -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>

		  <!-- Les images pour le slider -->
			<div class="carousel-inner" role="listbox">
		    	<div class="item active">
		    		<img src="<?= $this->assetUrl('img/epicerie1.jpg') ?>" alt="Photo, un gain de temps dans une journée chargée"/>
		    		<div class="carousel-caption">
		    			<h2><span>Gain</span> De <span>Temps</span></h2>
		    			<h3>Vos courses dans votre coffre en quelques minutes !</h3>
		    		</div>
		    	</div>
			    <div class="item">
			    	<img src="<?= $this->assetUrl('img/epicerie2.jpg') ?>" alt="Photo, vos courses en ligne, la proximité en plus"/>
			    	<div class="carousel-caption">
			    		<h2>Une <span>Belle Idée </span>de la <span>Proximité</span></h2>
			    		<h3>Vos courses en ligne, la proximité en plus !</h3>
			    	</div>
			    </div>
			    <div class="item">
			    	<img src="<?= $this->assetUrl('img/epicerie3.jpg') ?>" alt="Photo, tous les produits de votre épicerie en un clic"/>
			    	<div class="carousel-caption">
			    	<h2>La <span>Même Offre</span> Que Dans <span>Votre Épicerie</span></h2>
			    		<h3>Tous les produits de votre épicerie en un clic !</h3>
			    	</div>
		    	</div>
		  	</div>

		  <!-- Flèches de contrôle -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Précédent</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Suivant</span>
			</a>
		</div>	
	</div> <!-- Fin de mon col 12 qui contient slider <div class="col-xs-12"> -->
</slider> <!-- Fin du slider <slider class="row"> -->

<!--********************************************
PRESENTATION EPICERIE
*********************************************-->

<section class="row header-epicier">	
	<div class="col-xs-12 col-md-push-8 col-md-4">
		<img src="<?= $this->assetUrl('img/epicier.jpg') ?>" alt="Photo de l'épicier"/>
	</div>
	<div class="col-xs-12 col-md-pull-4 col-md-8 temoignage">
		<h4><p>"À mon compte depuis 3 ans,</p><p> grâce au drive je vous propose la proximité d'une épicerie de village,</p><p> tout en vous faisant gagner du temps sur votre journée&nbsp;!"</p></h4>
		<p>Passez commande venez chercher vos courses au <span>9&nbsp;place&nbsp;Marie&nbsp;Noël&nbsp;à&nbsp;Diges&nbsp;(89240).</span></p>
		<p>selon votre créneau :</p> 
		<p><span>Du&nbsp;Lundi&nbsp;au&nbsp;Vendredi&nbsp;de&nbsp;10h&nbsp;à&nbsp;19h&nbsp;et&nbsp;le&nbsp;Samedi&nbsp;de&nbsp;9h&nbsp;à&nbsp;18h.</span></p>
	</div>
</section> <!-- Fin du header <header class="row"> -->

	<section class="row"><!--  Titre de ma page + recherche -->
					<div class="col-xs-12">
						<div class="page-header">
			 	 			<h1>Votre drive épicier<small> vous propose : </small></h1>
						</div>
					</div>

					<div class="col-xs-6 col-xs-offset-3 search">
						<p>Je recherche un produit précis :</p>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Produit, marque, catégorie..."/>
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">Rechercher</button>
							</span>
						</div>
						
					</div>
				</section><!--  Fin de ma section  "Titre de ma page + recherche" -->

			 <!-- Partie promotions et nouveautes -->
				<section class="row">
					<div id="promo" class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1">
						<a class="" href="#">
							<div class="box">
								<img class="img-responsive" src="<?= $this->assetUrl('img/promotions.jpg') ?>" alt="Photo des promotions" />
								<p class="promotions">>> Profitez des promotions ! <<</p>
							</div>
						</a>
					</div>
					<div id="nouveau" class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0">
						<a href="#">
							<div class="box">
								<img  class="img-responsive" src="<?= $this->assetUrl('img/nouveautes.jpg') ?>" alt="Photo des nouveautés"/>
								<p class="nouveautes">>> Découvrez les nouveautés <<</p>
							</div>
						</a>
					</div>		


				<!-- début liste catégories -->
					<div id="Plats du jour" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-1 categorie">
						<a href="#">
							<div class="box">
								<figure>
									<img  class="img-responsive" src="<?= $this->assetUrl('img/plat-du-jour.jpg') ?>" alt="photo plat du jour">
									<figcaption>Plats du jour</figcaption>
								</figure>
							</div>
						</a>						
					</div>

					<div id="Boissons" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-0 categorie">
						<a href="#">
							<div class="box">	
								<figure>
									<img  class="img-responsive" src="<?= $this->assetUrl('img/boissons.jpg') ?>" alt="photo boissons">
									<figcaption>Boissons</figcaption>
								</figure>							
							</div>
						</a>
					</div>

					<div id="Fruits et légumes"  class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-1 categorie">
						<a href="#">
							<div class="box">
								<figure>
									<img  class="img-responsive" src="<?= $this->assetUrl('img/fruits-legumes.jpg') ?>" alt="photo fruits et legumes">
									<figcaption>Fruits et légumes</figcaption>
								</figure>
							</div>
						</a>						
					</div>

					<div id="Produits frais" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-0 categorie">
						<a href="#">
							<div class="box">
								<figure>
									<img  class="img-responsive" src="<?= $this->assetUrl('img/surgele-frais.jpg') ?>" alt="photo surgeles">
									<figcaption>Produits frais / Surgelés</figcaption>
								</figure>
							</div>
						</a>	
					</div>

					<div id="Epicerie salée" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-1 categorie">
						<a href="#">
							<div class="box">
								<figure>
									<img  class="img-responsive" src="<?= $this->assetUrl('img/epicerie-salee.jpg') ?>" alt="photo epicerie salee">
									<figcaption>Épicerie salée / Boulangerie</figcaption>
								</figure>
							</div>
						</a>				
					</div>

					<div id="Epicerie sucrée" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-0 categorie">
							<a href="#">
								<div class="box">
									<figure>
										<img  class="img-responsive" src="<?= $this->assetUrl('img/epicerie-sucree.jpg') ?>" alt="photo epicerie sucree">
										<figcaption>Épicerie sucrée</figcaption>
									</figure>
								</div>
							</a>		
					</div>

					<div id="Hygiène" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-1 categorie">
							<a href="#">
								<div class="box">
									<figure>
										<img  class="img-responsive" src="<?= $this->assetUrl('img/hygiene-bebe.jpg') ?>" alt="photo hygiene et bebe">
										<figcaption>Hygiène / Bébé</figcaption>
									</figure>
								</div>
							</a>				
					</div>

					<div id="Entretien" class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0  categorie">
							<a href="#">
								<div class="box">
									<figure>
										<img  class="img-responsive" src="<?= $this->assetUrl('img/entretien-nettoyage.jpg') ?>" alt="photo entretien et nettoyage">
										<figcaption>Entretien / Nettoyage</figcaption>
									</figure>
								</div>
							</a>		
					</div>			

				</section> <!-- Fin de ma section "Partie promotions et nouveautes" -->
	




<?php $this->stop('main_content') ?>
