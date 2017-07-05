<?php $this->layout('layout', ['title' => 'home']) ?>

<?php $this->start('main_content') ?>
<!-- 	<h2>Sélectionner une page</h2>
	<h1></h1>
	<a href="accueil_admin" class="btn btn-danger" role="button" style="width: 450px; background-color: green">Pages réservées aux administrateurs</a>
	<h1></h1>
	<a href="boutique_categories" class="btn btn-danger" role="button" style="width: 450px; background-color: green">Pages utilisateurs</a>
	<h1></h1>
	 -->



<section class="row">

<form>
	<fieldset>
		<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1">
			<div>
				<h2>Je recherche mon épicier :</h2>
					<h3><a href="">Me géolocaliser
							<!-- <span class="iconeSearch"> --><i class="fa fa-map-marker" aria-hidden="true"></i><!-- </span> -->
						</a>
					</h3>					
					<p>ou</p>
					<div class="input-group zoneSaisie">
						<input type="text" class="form-control search" id="ville" placeholder="Entrez une ville ou un code postal"/>
						<span class="input-group-btn search2">
							<button class="btn btn-default" id="chercher" type="button">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</span>
					</div>
			</div>
		</div>

		<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0 textCenter">
			
			<div id="infoposition"></div>

<!--<img src="<= $this->assetUrl('img/marker.png') ?>" alt="">-->
	        <div id="carte" style="height: 350px; width: 100%">

	    	</div>
		</div>
	
	</fieldset>

</form>

<!-- POP UP -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Au Panier Digeois</h4>
      </div>
      <div class="modal-body">
      <div class="row">
      	<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1 textCenter">
       			<img class="imgEpicierie" src="<?= $this->assetUrl('img/auPanierDigeois.jpg') ?>" alt="Photo de l'épicierie">
       			<address>
					<p>9 place Marie Noël <br>
					89240 DIGES
					</p>
				</address>

				
		</div>
			<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0 textCenter">
				<address>
					<p><strong>Tel :</strong>
					03.86.81.00.40</p>
					<p><strong>email :</strong>
					<a href="">diges@mapetiteepicerie.fr</a>
					</p>
				</address>

				<p><strong>Nos horaires :</strong></p>
				<p>Du lundi au vendredi, de 10h à 19h</p>
				<p>Le samedi, de 9h à 19h</p>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <!-- <button type="button" class="btn btn-primary"> -->
        <a class="btn btn-primary" href="accueil">Entrer dans ce drive</a>
        <!-- </button> -->
      </div>
    </div>
  </div>
</div>

</section>






<?php $this->stop('main_content') ?>
