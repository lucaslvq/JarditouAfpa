<?php

include "../controler/connexion_bdn.php";
$db = connexionBase();

// Déclaration de mes regex.
//$loginPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,5}$/";
$loginPattern = "/[a-zA-Z]/";
$passwordPattern = "/^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/";
// Déclaration d'un tableau d'erreur.
$error = [];

// Controle de saisie.
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
            $password = htmlspecialchars($_POST['password']);
        } else {
            $error['password'] = 'Mot de passe invalide.';
        }
    } else {
        $error['password'] = 'Mot de passe absent.';
    }

    if (count($error) === 0) {
        // Déclaration de mes sessions.
        $_SESSION['login'] = $login;

        
        // Vérification du role.
        $queryRole = $db->prepare('SELECT role, FROM utilisateur WHERE login = :login');
        $queryRole->bindValue(':login', $login);
        $queryRole->execute();
        $resultRole = $queryRole->fetch(PDO::FETCH_ASSOC);
        
        if ($resultRole['admin'] == $login ){
            $_SESSION['admin'] = $resultRole['admin'];
        }
      
        
        
        // Vérification pour effectué la connexion.
        $querySigin = $db->prepare('SELECT login, mot_de_passe FROM utilisateur WHERE login = :login');
        $querySigin->bindValue(':login', $login);
        $querySigin->execute();
        $resultSigin = $querySigin->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $resultSigin['mot_de_passe'])) {
            header("location:../views/index.php");
        } else {
            $error['passwordVerif'] = 'Le mot de passe existe pas.';
        }
    }
}
if (isset($_POST['signout'])) {

    unset($_SESSION);
    header("location: ../views/index.php");
}