<?php $this->layout('layout', ['title' => 'resultat token']) ?>

<?php $this->start('main_content') ?>
<!-- <h2>le token generer est : < $token ?></h2> -->
<h2>Un email de récuperation de mot de passe vous a été envoyé</h2>

<!-- <a href="admin_user">Page admin</a>-->

<a href="connexion">se connecter</a>

<?php $this->stop('main_content') ?>