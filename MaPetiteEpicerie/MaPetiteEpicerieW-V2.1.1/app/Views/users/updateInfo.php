 <?php $this->layout('layout', ['title' => 'comfirmation info perso modifier']) ?>

<?php $this->start('main_content') ?>


<?= $message ?>
<?= "password"=>['password']; ?>
<?= "id"=>['id']; ?>

<a href="accueil">Retour page d'accueil</a>
<!-- <a href="auth-modification-perso">Modifier mes infos ?</a> -->
<?php $this->stop('main_content') ?>