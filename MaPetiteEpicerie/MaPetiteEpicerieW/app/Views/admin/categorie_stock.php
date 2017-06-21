<?php $this->layout('layout', ['title' => 'categorie']) ?>

<?php $this->start('main_content') ?>



	<h2>categorie stock!</h2>

  <div class="form-group">
    <label for="select_cat">categorie</label>
    <select id="select_cat" class="form-control">
   

<?php 
foreach ($result as $produits ) { ?>

<option><?= $produits['product_cat']?></option>

<!--<a class="glyphicon glyphicon-trash" href="produit_suppr/< $produits['product_id']?>"></a>-->


<?php } ?>
    </select>
  </div>

<!-- <php
	foreach ($categories as $cat) { ?>

	<option><php  echo $categories['cat']; ?></option>

-->


	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
<?php $this->stop('main_content') ?>