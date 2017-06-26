<?php $this->layout('layout', ['title' => 'page de connexion']) ?>

<?php $this->start('main_content') ?>
<h2>Bonjour ! <?= $prenom.", ".$nom ?></h2>

<a href="admin_user">Page admin</a>


<a href="deconnexion">se deconnecter</a>

<a href="new-password">changer son mot de passe</a>

<?php $this->stop('main_content') ?>