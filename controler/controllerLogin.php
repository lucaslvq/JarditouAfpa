<?php

require "../controler/connexion_bdn.php";
$db = connexionBase();

// Déclaration de mes regex.
//$loginPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,5}$/";
$loginPattern = "/[a-zA-Z]/";
$passwordPattern = "/^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/";
// Déclaration d'un tableau d'erreur.
$error = [];

if (isset($_POST['submit'])) {
    // Vérificaion de l'identifiant. 
    if (!empty($_POST['login'])) {
        if (preg_match($loginPattern, $_POST['login'])) {
            $login = htmlspecialchars($_POST['login']);
        } else {
            $error['login'] = 'Saisie incorrecte.';
        }
    } else {
        $error['login'] = 'Login absent.';
    }
    // Vérification du mot de passe.
    if (!empty($_POST['password'])) {
        if (preg_match($passwordPattern, $_POST['password'])) {
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        } else {
            $error['password'] = 'Mot de passe invalide.';
        }
    } else {
        $error['password'] = 'Mot de passe absent.';
    }

    if (count($error) === 0) {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header("location:../views/index.php");
    }


    $requeteLogin = $db->query("SELECT login, mot_de_passe FROM utilisateur");
}

if (isset($_POST['signout'])) {

    unset($_SESSION);
    header("location: ../views/index.php");
}
