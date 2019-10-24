<?php

include "../controler/connexion_bdn.php";
$db = connexionBase();
$error = [];
$send = [];

// Déclaration regex.
$mailPattern = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
// Vérification de l'email.

if (isset($_POST['submit'])) {

// Vérificaion de l'identifiant. 
    if (!empty($_POST['email'])) {
        if (preg_match($mailPattern, $_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
        } else {
            $error['email'] = 'Votre saisie es incorect.';
        }
    }

    $reponse = $db->query('SELECT email FROM utilisateur WHERE email = "' . $_POST['email'] . '" ');
    $verifMail = $reponse->fetch();
    if (!empty($_POST['email']) != ($verifMail['email'])) {
        $error['verifMail'] = "Cette adresse de mail n'existe pas.";
    } else {
        $send['sendMail'] = 'Mail envoyer, vérifier vos mails.';
    }
    if (count($error) === 0) {
        
        $_SESSION['email'] = $email;
        
// Envoi mail de changement de mot de passe.    

        $sendFor = $verifMail['email'];

// Préparation du mail contenant le lien d'activation.
        $for = $sendFor;
        $subject = "Changement de mot de passe";
        $header = "From: ServiceSecuritéJaridtou@gmail.com";

// Corp de l'email
        $body = 'Mot de passe oublié ?
 
Merci de cliquer sur ce lien pour le modifier : 
 
http://localhost/Jarditou/views/forgotPassewordComfirm.php

A bientot sur Jarditou.com !
---------------

Ceci est un mail automatique, merci de ne pas y répondre.';

// Envoye du mail graçe à la fonction mail() qui prend plusieurs paramètres.
        mail($for, $subject, $body, $header); // Envoi du mail
    }
}
?> 