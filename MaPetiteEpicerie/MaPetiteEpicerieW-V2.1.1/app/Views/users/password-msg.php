<?php $this->layout('layout', ['title' => 'connect']) ?>

<?php $this->start('main_content') ?>
<h2>Bravo votre mot de passe a bien ete changer</h2>

<?php if(isset($message)) echo $message; ?>
<a href="connexion">se connecter</a>
<a href="accueil">Accueil</a>

<?php $this->stop('main_content') ?>