<?php $this->layout('layout', ['title' => 'Vous êtes connecté']) ?>

<?php $this->start('main_content') ?>
<h2>Bonjour ! <?= $_SESSION['user']['prenom'] ?></h2>
<?= "<h2>".$message."</h2>"; ?>
<a href="admin_user">Page admin</a>


<a href="deconnexion">se deconnecter</a>

<a href="auth-modification-perso">changer mes infos perso</a>

<?php $this->stop('main_content') ?>