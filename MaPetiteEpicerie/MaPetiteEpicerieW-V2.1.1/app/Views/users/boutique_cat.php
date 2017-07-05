<?php $this->layout('layout', ['title' => 'Liste produits']) ?>

<?php $this->start('main_content') ?>

<?php //var_dump($categorie); ?>




<?php foreach($categorie as $key => $valeur)
{  
$id = $valeur["ID_prod"];
$descriptif = $valeur["descriptif"];
$poids_volume = $valeur["poids_volume"];
$unit = $valeur["unites"];
$marque = $valeur["marque"];
$prix = $valeur["prix"];
$photo = $valeur["photo"];
$stock = $valeur["stock"];
$nouveau = $valeur["nouveau"];
$promo = $valeur["promo"];
$prix_old = $valeur["prix_old"];
$datevalid = $valeur["datevalid"];


?>
<section class="row">		
<div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1 contour">												
		<div class="col-xs-6 infoProduit" name="id-prod">
			<img class="vignette" src="<?= $this->assetUrl($photo) ?>">

			<h4 class="libelle textLeft" ><?php  echo $descriptif; ?></h4>
			<p class="libelle textLeft"><?php  echo $marque." - ".$poids_volume."".$unit; ?></p>
			<p class="textLeft">Quantité en stock : <?php  echo $stock; ?></p>
		</div>

		<div class="col-xs-6 infoProduit">
			<p class="nouvo textRight" style=" 
				<?php if ($nouveau =='OUI'){ echo 'display: block';}
				else { echo 'display: none';}?>">Nouveau !
			</p>

			<p class="promo textRight" style="
				<?php if ($promo =='OUI'){ echo 'display: block';}
				else { echo 'display: none';}?>">Promo !
			</p>
			
			<p class="textRight">Date de validité :<?php  echo $datevalid; ?></p>
			<p class="prix"><?php  echo $prix." €"; ?></p>
											
			<p class="textRight">Ancien prix : <?php  echo $prix_old." €"; ?></p>
			
			
			<!-- <input type="number" name="" min="0"> -->
			
								                
	    </div>


		<div class="col-xs-12">
			<p class="ajout">Ajouter au panier</p>
		<!-- </div>
		<div class="col-xs-6"> -->

		<!-- ****************************************************bouton increment produit********************************************* -->

	         <div class="input-group infoProduit">
	            <span class="input-group-btn" >
	                <button type="button" id="moins" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field=""  >
	                    <span class="glyphicon glyphicon-minus antiSpan"></span>
	                </button>
	            </span>
	            <span>
	           		 <input type="text" id="quantity" name="quantity" class="form-control input-number" value="0" min="1" max="100" style="text-align: center;">
	            </span>
	            <span class="input-group-btn">
	                <button type="button" id="plus"  class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="" style="text-align: left">
	                <span class="glyphicon glyphicon-plus antiSpan"></span>
	                </button>
	            </span>
	        </div>
	         
		</div>	 
	  
	
<!-- fin du contour produit -->
</div>
</section>
<?php
	}
?>
<!-- clone code suppression class infoProduit-->
<!-- <div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0 contour">
	
		<div class="col-xs-6" name="id-prod"> 
			<img class="vignette" src="<= $this->assetUrl($photo) ?>">

			<h4 class="libelle textLeft" ><php  echo $descriptif; ?></h4>
			<p class="libelle textLeft"><php  echo $marque." - ".$poids_volume."".$unit; ?></p>
			<p class="textLeft">Quantité en stock : <php  echo $stock; ?></p>
		</div>

		<div class="col-xs-6 infoProduit">
			<p class="nouvo textRight" style=" 
				<php if ($nouveau =='OUI'){ echo 'display: block';}
				else { echo 'display: none';}?>">Nouveau !
			</p>

			<p class="promo textRight" style="
				<php if ($promo =='OUI'){ echo 'display: block';}
				else { echo 'display: none';}?>">Promo !
			</p>
			
			<p class="textRight">Date de validité :<php  echo $datevalid; ?></p>
			<p class="prix"><php  echo $prix." €"; ?></p>
											
			<p class="textRight">Ancien prix : <php  echo $prix_old." €"; ?></p>						                
	    </div>


		<div class="col-xs-12">
			<p class="ajout">Ajouter au panier</p>
	
	        <div class="input-group infoProduit">
	            <div class="input-group-btn" >
	                <button type="button" id="moins" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field=""  >
	                    <span class="glyphicon glyphicon-minus antiSpan"></span>
	                </button>
	            </div>
	            <div>
	           		 <input type="text" id="quantity" name="quantity" class="form-control input-number" value="0" min="1" max="100" style="text-align: center;">
	            </div>
	            <div class="input-group-btn">
	                <button type="button" id="plus"  class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="" style="text-align: left">
	                <span class="glyphicon glyphicon-plus antiSpan"></span>
	                </button>
	            </div>
	        </div>
		</div>	
	</div> -->






<?php $this->stop('main_content') ?>
