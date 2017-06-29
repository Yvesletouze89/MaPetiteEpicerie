<section class="row">
	<div class="col-xs-12 page-header">
		<h1>Nous contacter : </h1>
	</div>
</section>

<section class="row">
	
	
			<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1">
				<p class="paragraphe">Vous souhaitez obtenir un renseignement, une devis ou poser une question ? Ce formulaire est à votre disposition pour nous contacter. </p>
				<p class="paragraphe">Merci de compléter tous les champs avant de valider.  
				</p>		
				<form id="formulaire" onsubmit="event.preventDefault();" method="POST" action="">
					<div class="row">
						<div class="col-md-6">
							<div id="listeOption"  class="formGroup">
								<select class="formGroup imputLg champSelect" id="civilite" name="civilite">
								  <option class="formGroup imputLg champSelect">-- Sélectionnez*--</option>
								  <option class="formGroup imputLg champSelect" value="madame">Madame</option> 
								  <option class="formGroup imputLg champSelect" value="monsieur">Monsieur</option>
								</select>
							</div>				
							<div class="formGroup">
								<input id="nom" class="form-control imputLg champContact" name="nom" placeholder="Nom*..." />
							</div>
							<div class="formGroup">
								<input id="prenom" class="form-control imputLg champContact" name="prenom" placeholder="Prenom..." />
							</div>
							<div class="formGroup">
								<input id="tel"  class="form-control imputLg champContact" name="tel" placeholder="Tél..."/>
							</div>
							<div class="formGroup">
								<input id="email"  class="form-control imputLg champContact" name="email" placeholder="Email*..."/>
							</div>													
																								
						</div>
						<!-- end col-md6 -->

						<div id="zoneText" class="col-md-6">
							<div id="listeOption"  class="formGroup">
								<select class="formGroup imputLg champSelect" id="sujet" name="sujet">
								  <option class="formGroup imputLg champSelect">-- Sélectionnez votre sujet*--</option>
								  <option class="formGroup imputLg champSelect" value="devis">Produits</option> 
								  <option class="formGroup imputLg champSelect" value="rendez-vous">Horaires</option>
								  <option class="formGroup imputLg champSelect" value="autre">Autre</option>
								</select>
							</div>
							<div class="formGroup">
								<textarea id="message" name="message" class="form-control input-lg champTextarea" rows="7" placeholder="Message*..."></textarea>
							</div>
						</div>
						<!-- end col-md6 -->
						<div class="formGroup">
							<button id="validPanier" class="btn btn-lg btn-primary btn-block" onclick="submitForm();">Envoyer</button>
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
						9 place Marie Noël <br>
						89240 DIGES
						</p>
					</address>

					<address>
						<p><strong>Tel :</strong>
						03.86.81.00.40</p>
						<p><strong>email :</strong>
						diges@mapetiteepicerie.fr
						</p>
					</address>

				<img class="imgEpicier" src="img/epicier.jpg" alt="Photo de l'épicier">
				
			</div>

</section>