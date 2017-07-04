<?php $this->layout('layout', ['title' => 'J\'ai oublié mon mot de passe !']) ?>

<?php $this->start('main_content') ?>
	

<!--********************************************
DEMANDE MDP OUBLIE
*********************************************-->


	<section  id="mdpOublie" action="oublie" class="row mdpOublie">
		<div class="col-xs-12">
			<div class="form-area"> 
		
				<form method="POST" role="form" id="formSubmit3">
		    		<div>
			    		<p class="obligations">
			    			Les Champs avec<span> * </span>sont obligatoires.
			    		</p>
		    		</div>
<!-- ***************INPUT POUR L'IDENTIFIANT (MAIL) *************** -->
					<div class="form-group col-xs-12">
		    			<p><span class="fa fa-user faContact" aria-hidden="true"></span>Mon mail<span> * </span></p>
						<input type="text" class="form-control" id="mailOubli" name="email" placeholder="email@email.fr"/>
						<div class="divAjout" id="mailOubliZero"></div>
					</div>
<!-- ***************BOUTON DE DEMANDE DE NOUVEAU MOT DE PASSE*************** -->
					<div class="form-group col-xs-12">
						<p><button type="submit" id="submit3" name="submit" class="btn btn-primary pull-right">M'envoyer par mail</button></p>
					</div>
				</form>
				<div id="formOk1"></div>
			</div>
		</div><!--col-xs-12 de mon formulaire de contact-->
	</section><!--fin row inscription-->

	<a href="accueil">Accueil</a>
<!-- 	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p> -->

<?php $this->stop('main_content') ?>