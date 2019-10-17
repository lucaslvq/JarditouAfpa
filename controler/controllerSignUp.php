<?php

include "../controler/connexion_bdn.php";
$db = connexionBase();

// Déclaration de mes regex.
$namePattern = "/^[a-zA-Z0-9àâéèëêïîôùüç -]{1,60}$/";
$mailPattern = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
$passwordPattern = "/^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/";
$loginPattern = "/^[a-zA-Z0-9._-]{1,60}$/";
// Déclaration d'un tableau d'erreur.
$error = [];

if (isset($_POST['submit'])) {

    // Vérificaion du nom. 
    if (!empty($_POST['firstName'])) {
        if (preg_match($namePattern, $_POST['firstName'])) {
            $firstName = htmlspecialchars($_POST['firstName']);
        } else {
            $error['firstName'] = 'Veuillez entrer un nom.';
        }
    } else {
        $error['firstName'] = 'Veuillez entrer un nom.';
    }
    // Vérificaion du prénom. 
    if (!empty($_POST['secondName'])) {
        if (preg_match($namePattern, $_POST['secondName'])) {
            $secondName = htmlspecialchars($_POST['secondName']);
        } else {
            $error['secondName'] = 'Veuillez entrer un prénom.';
        }
    } else {
        $error['secondName'] = 'Veuillez entrer un prénom.';
    }
    // Vérificaion login. 
    if (!empty($_POST['login'])) {
        if (preg_match($loginPattern, $_POST['login'])) {
            $login = htmlspecialchars($_POST['login']);
        } else {
            $error['login'] = 'Veuillez entrer un login.';
        }
    } else {
        $error['login'] = 'Veuillez entrer un login.';
    }
    // Vérificaion email. 
    if (!empty($_POST['email'])) {
        if (preg_match($mailPattern, $_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
        } else {
            $error['email'] = 'Veuillez entrer un email.';
        }
    } else {
        $error['email'] = 'Veuillez entrer un email.';
    }
    // Vérificaion mot de passe1. 
    if (!empty($_POST['password'])) {
        if (preg_match($passwordPattern, $_POST['password'])) {
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        } else {
            $error['password'] = 'Veuillez entrer un mot de passe.';
        }
    } else {
        $error['password'] = 'Veuillez entrer un mot de passe.';
    }
    // Vérificaion mot de passe2. 
    if (!empty($_POST['passwordComfirm'])) {
        if (preg_match($passwordPattern, $_POST['password'])) {
            $passwordComfirm = password_hash(htmlspecialchars($_POST['passwordComfirm']), PASSWORD_DEFAULT);
        } else {
            $error['passwordComfirm'] = 'Confirmer votre mdp.';
        }
    } else {
        $error['passwordComfirm'] = 'Confirmer votre mdp';
    }
    
   
    // Vérification des deux mot de passe.
    if ($_POST["password"] != $_POST["passwordComfirm"]) {
        
        $error['passwordComfirm'] = "Les 2 mots de passe sont différents.";
    }




    if (empty($error)) {
        $_SESSION['firstName'] = $firstName;
        $_SESSION['secondName'] = $secondName;
        $_SESSION['login'] = $login;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['passwordComfirm'] = $passwordComfirm;

        // prépare la requete INSERT

        $requeteAddSignUp = $db->prepare("INSERT INTO utilisateur ( nom,
                                                                    prenom,
                                                                    email,
                                                                    login,
                                                                    mot_de_passe,
                                                                    date_inscription,
                                                                    date_last_connexion)
                                                          VALUES  ( :firstName,
                                                                    :secondName,
                                                                    :email,
                                                                    :login,
                                                                    :password,
                                                                    now(),
                                                                    now())");


        $requeteAddSignUp->bindValue(':firstName', $firstName);
        $requeteAddSignUp->bindValue(':secondName', $secondName);
        $requeteAddSignUp->bindValue(':email', $email);
        $requeteAddSignUp->bindValue(':login', $login);
        $requeteAddSignUp->bindValue(':password', $password);
        $requeteAddSignUp->execute();
        header("location:../views/index.php");
    }
}
?>

