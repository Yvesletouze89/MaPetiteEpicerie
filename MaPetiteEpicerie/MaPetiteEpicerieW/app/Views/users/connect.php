<?php $this->layout('layout', ['title' => 'connect']) ?>

<?php $this->start('main_content') ?>
<h2>Vous êtes connecté ! <?= $nom.", ".$prenom ?></h2>

<a href="admin_user">Page admin</a>


<a href="deconnexion">se deconnecter</a>

<?php $this->stop('main_content') ?>