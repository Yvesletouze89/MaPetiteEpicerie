<?php

ini_set('SMTP', 'smtp.google.com ');
ini_set('smtp_port', '465');
ini_set('sendmail_from', 'christophe.chastagnier@gmail.com');

       $to = "christophe.chastagnier@gmail.com";
        $subject = "Objet: Mot de passe oublié  - mapetiteepicerie.fr";
        $message = "

                    
                    bonjour Nom, prenom
                    cliquez sur le lien pour créer un nouveau mot de passe:
                    
                    <a href='http://192.168.1.50/MaPetiteEpicerieW/public/recup-password/".$token."'>Renouveler le mdp</a>

                    Remarque :  pour des raisons de confidentialité Ma petite épicerie n’est pas habilité à vous communiquer ou à vous demander votre mot de passe.

        ";

/*		if ($_POST['mail']!="") {
			$message .= "     > Son mail : ".htmlspecialchars($_POST['mail'])."\n";
		}
		$message .="     > Sujet : ".htmlspecialchars($_POST['sujet'])."\n     > Satut : ".htmlspecialchars($_POST['statut'])."\n     > Requète :\n\n   ".htmlspecialchars($_POST['commentaire'])."\n\n";*/
		$message .="\n Dernière mise à jour, contact V2.2.2 ::";
        if (mail($to, $subject, $message)) {
        //Puis on renvoie sur monsiteweb.org, if permet de tester si mail() à bien fonctioné (ceci ne garanti pas que le mail sera recu, mais c'est un début)
        header('Location: messageenvoye.php');
        //Puis on termine le script
        exit();
        }

        else {
        // Si il y a erreur on renvoie sur le site
        header('Location: erreurfonctionmail.php');
        exit();
        }