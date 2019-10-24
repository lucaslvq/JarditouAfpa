<?php
// Connexion à ma base de données.
include "../controler/connexion_bdn.php";
$db = connexionBase();

// Déclaration de m'a regex.
$passwordPattern = "/^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/";
// Déclaration d'un tableau d'erreur.
$error = [];


if (isset($_POST['submit'])){
    
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
            $passwordComfirm = htmlspecialchars($_POST['passwordComfirm']);
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
        
        // prépare la requete UPDATE

        $requeteForgetPasswordUpdate = $db->prepare("UPDATE utilisateur ( mot_de_passe,
                                                               date_last_co)
                                                     VALUES  ( :password,
                                                               now()");

        $requeteForgetPasswordUpdate->bindValue(':password', $password);
        $requeteForgetPasswordUpdate->execute();
        header("location:../views/index.php");
    }
}
?>