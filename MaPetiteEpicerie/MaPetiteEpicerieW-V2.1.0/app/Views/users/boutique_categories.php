<?php $this->layout('layout', ['title' => 'Accueil Admin']) ?>

<?php $this->start('main_content') ?>			
	<!--********************************************
	BARRE RECHERCHE	 / CONTENU DES CATEGORIES
	*********************************************-->
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
						<label>Choisir la catégorie</label>
						<select id="select_cat" name="select_cat" style=" color: red">
							<option id="option" style=" color: red">-- Catégories --</option>
							<?php foreach($categories as $cat)
							{ ?>
							<option id="option" style=" color: red">
							<?php echo $cat['categorie'];?>
							</option>	
							<?php
							} ?>
						</select>
					</div>
				</section><!--  Fin de ma section  "Titre de ma page + recherche" -->

			 <!-- Partie promotions et nouveautes -->
				<section class="row">
					<div id="promo" class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1">
						<a class="" href="#">
							<div class="box">
								<img src="<?= $this->assetUrl('img/promotions.jpg') ?>" alt="Photo des promotions"/>
								<p class="promotions">>> Profitez des promotions ! <<</p>
							</div>
						</a>
					</div>
					<div id="nouveau" class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0">
						<a href="#">
							<div class="box">
								<img src="<?= $this->assetUrl('img/nouveautes.jpg') ?>" alt="Photo des nouveautés"/>
								<p class="nouveautes">>> Découvrez les nouveautés <<</p>
							</div>
						</a>
					</div>		


				<!-- début liste catégories -->
					<div id="Plats du jour" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-1 categorie">
						<a href="#">
							<div class="box">
								<figure>
									<img src="<?= $this->assetUrl('img/plat-du-jour.jpg') ?>" alt="photo plat du jour">
									<figcaption>Plats du jour</figcaption>
								</figure>
							</div>
						</a>						
					</div>

					<div id="Boissons" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-0 categorie">
						<a href="#">
							<div class="box">	
								<figure>
									<img src="<?= $this->assetUrl('img/boissons.jpg') ?>" alt="photo boissons">
									<figcaption>Boissons</figcaption>
								</figure>							
							</div>
						</a>
					</div>

					<div id="Fruits et légumes"  class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-1 categorie">
						<a href="#">
							<div class="box">
								<figure>
									<img src="<?= $this->assetUrl('img/fruits-legumes.jpg') ?>" alt="photo fruits et legumes">
									<figcaption>Fruits et légumes</figcaption>
								</figure>
							</div>
						</a>						
					</div>

					<div id="Produits frais" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-0 categorie">
						<a href="#">
							<div class="box">
								<figure>
									<img src="<?= $this->assetUrl('img/surgele-frais.jpg') ?>" alt="photo surgeles">
									<figcaption>Produits frais / Surgelés</figcaption>
								</figure>
							</div>
						</a>	
					</div>

					<div id="Epicerie salée" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-1 categorie">
						<a href="#">
							<div class="box">
								<figure>
									<img src="<?= $this->assetUrl('img/epicerie-salee.jpg') ?>" alt="photo epicerie salee">
									<figcaption>Épicerie salée / Boulangerie</figcaption>
								</figure>
							</div>
						</a>				
					</div>

					<div id="Epicerie sucrée" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-0 categorie">
							<a href="#">
								<div class="box">
									<figure>
										<img src="<?= $this->assetUrl('img/epicerie-sucree.jpg') ?>" alt="photo epicerie sucree">
										<figcaption>Épicerie sucrée</figcaption>
									</figure>
								</div>
							</a>		
					</div>

					<div id="Hygiène" class="col-xs-10 col-xs-offset-1 col-md-5  col-md-offset-1 categorie">
							<a href="#">
								<div class="box">
									<figure>
										<img src="<?= $this->assetUrl('img/hygiene-bebe.jpg') ?>" alt="photo hygiene et bebe">
										<figcaption>Hygiène / Bébé</figcaption>
									</figure>
								</div>
							</a>				
					</div>

					<div id="Entretien" class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0  categorie">
							<a href="#">
								<div class="box">
									<figure>
										<img src="<?= $this->assetUrl('img/entretien-nettoyage.jpg') ?>" alt="photo entretien et nettoyage">
										<figcaption>Entretien / Nettoyage</figcaption>
									</figure>
								</div>
							</a>		
					</div>			

				</section> <!-- Fin de ma section "Partie promotions et nouveautes" -->

<?php $this->stop('main_content') ?>