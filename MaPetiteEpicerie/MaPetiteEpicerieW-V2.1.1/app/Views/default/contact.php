<?php $this->layout('layout', ['title' => 'Nous contacter :']) ?>

<?php $this->start('main_content') ?>
<section class="row">
	
	
			<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1">
						
				<form id="formulaire" onsubmit="event.preventDefault();" method="POST" action="">
				<p class="paragraphe">Vous souhaitez obtenir un renseignement, une devis ou poser une question ? Ce formulaire est à votre disposition pour nous contacter. </p>
				<p class="paragraphe">Merci de compléter tous les champs avant de valider.  
				</p>
					<div class="row">
						<div class="col-md-6">

					<div class="radio formGroup" id="civilite">
						<label class="radio-inline" for="madame">
							 <p><input type="radio" name="inlineRadioOptions" value="madame"/> Madame</p>
						</label>
						
						<label class="radio-inline" for="monsieur">
							 <p><input type="radio" name="inlineRadioOptions" value="monsieur"/> Monsieur</p>
						</label>
					</div>			
							<div class="formGroup">
								<input id="nom" type="texte" class="form-control imputLg champContact" name="nom" placeholder="Nom*..." required="required" />
							</div>

							<div class="formGroup">
								<input type="texte" id="prenom" class="form-control imputLg champContact" name="prenom" placeholder="Prenom..." />
							</div>
							<div class="formGroup">
								<input id="tel" type="tel" class="form-control imputLg champContact" name="tel" placeholder="Tél..."/>
							</div>
							<div class="formGroup">
								<input id="email" type="email" class="form-control imputLg champContact" name="email" placeholder="Email*..." required="required"/>
							</div>													
																								
						</div>
						<!-- end col-md6 -->

						<div id="zoneText" class="col-md-6">
							<div id="listeOption"  class="formGroup">
								<select class="formGroup imputLg champSelect" id="sujet" name="sujet" required="required">
								  <option class="formGroup imputLg champSelect">-- Sélectionnez votre sujet*--</option>
								  <option class="formGroup imputLg champSelect" value="devis">Produits</option> 
								  <option class="formGroup imputLg champSelect" value="rendez-vous">Horaires</option>
								  <option class="formGroup imputLg champSelect" value="autre">Autre</option>
								</select>
							</div>
							<div class="formGroup">
								<textarea id="message" name="message" class="form-control input-lg champTextarea" rows="7" placeholder="Message*..." required="required"></textarea>
							</div>
						</div>
						<!-- end col-md6 -->
						<div class="formGroup">
							<button id="validPanier" class="btn btn-lg btn-contact btn-block" onclick="validContact();">Envoyer</button>
						</div>
						
					</div>
					<!-- end form row -->
					
				</form>
				<div id="validation" class="endForm"></div>
				<div id="response"></div>	
			</div>

			<div class="col-xs-10 col-xs-offset-0 col-md-5 col-md-offset-0 textCenter">
					<address>
						<h3><strong>Au Panier Digeois</strong><h3>
						<p>9 place Marie Noël <br>
						89240 DIGES
						</p>
					</address>

					<address>
						<p><strong>Tel :</strong>
						03.86.81.00.40</p>
						<p><strong>email :</strong>
						<a href="">diges@mapetiteepicerie.fr</a>
						</p>
					</address>

				<img class="imgEpicier" src="<?= $this->assetUrl('img/epicier.jpg') ?>" alt="Photo de l'épicier">
				
			</div>

</section>

<?php $this->stop('main_content') ?>
