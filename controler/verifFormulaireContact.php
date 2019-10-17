<?php

if (isset($_POST['envoyer'])) {
    // Récupération de mes données.
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $date = trim($_POST['date_de_naissance']);
    $tabDate = explode("/", $date);
    $sexe = trim($_POST['sexe']);
    $ville = trim($_POST['ville']);
    $adresse = trim($_POST['adresse']);
    $codePostal = trim($_POST['codePostal']);
    $email = trim($_POST['email']);
    $TabErreurs = [];

    // Controle de saisie.
    // Controle de saisie sur le nom.  
    if (empty($_POST["nom"]) || !preg_match("/^[a-zA-Zàâéèëêïîôùüç -]{1,60}$/", $_POST["nom"])) {
        $TabErreurs["nom"] = "Veuillez indiquer votre nom";
    }
    // Controle de saisie sur le prénom.
    if (empty($_POST["prenom"]) || !preg_match("/^[a-zA-Zàâéèëêïîôùüç -]{1,60}$/", $_POST["prenom"])) {
        $TabErreurs["prenom"] = "Veuillez indiquer votre prénom.";
    }
    // Controle de saisie sur la date.
    if (empty($_POST["date"]) || !checkdate($tabDate[1], $tabDate[0], $tabDate[2])) {
        $TabErreurs["date"] = "Veuillez indiquer votre date de naissance.";
    }
    // Controle de saisie sur le sexe.
    if (empty($_POST["sexe"]) || !preg_match("/^[femme-hommeFemmeHomme]{1,5}$/", $_POST["sexe"])) {
        $TabErreurs["sexe"] = "Veuillez indiquer votre sexe.";
    }
    // Controle de saisie sur la ville.
    if (empty($_POST["ville"]) || !preg_match("/^[a-zA-Zàâéèëêïîôùüç -]{1,60}$/", $_POST["ville"])) {
        $TabErreurs["ville"] = "Veuillez indiquer votre ville.";
    }
    // Controle de saisie sur l'adresse.
    if (empty($_POST["adresse"]) || !preg_match("/[0-9]{1,3}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)+/", $_POST["adresse"])) {
        $TabErreurs["adresse"] = "Veuillez indiquer votre adresse.";
    }
    // Controle de saisie sur le code postal.
    if (empty($_POST["codePostal"]) || !preg_match(("/^[0-9]{5}$/"), $_POST["codePostal"])) {
        $TabErreurs["codePostal"] = "Veuillez indiquer votre code postal.";
    }
    // Controle de saisie sur l'email.
    if (empty($_POST["email"]) || !preg_match("/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/", $_POST["email"])) {
        $TabErreurs["email"] = "Veuillez indiquer votre email.";
    }
    if (empty($TabErreurs)) { // Tableau d'erreurs vide : on redirige où on le souhaite
        $valide = TRUE;
    }
}
?> 