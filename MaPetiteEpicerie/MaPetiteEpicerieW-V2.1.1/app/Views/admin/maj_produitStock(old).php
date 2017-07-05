<?php $this->layout('layout', ['title' => 'Mise à jour des produits du stock']) ?>

<?php $this->start('main_content') ?>

<form method="post" action="update">
	
				
		<input type="submit"  id="upda" class="btn btn-default" value="Valider Modifications"/>
		<button id="annulfm2" type="valid" class="btn btn-default" data-dismiss="modal">Annuler</button>
				

</form>


<?php $this->stop('main_content') ?>
