<?php

require "../controler/connexion_bdn.php";
$db = connexionBase(); // Appel de la fonction de connexion

if (!empty($_POST)) {
    if ($_FILES['file']['name']) {
        // Définition des types de fichiers accepté.
        $extensions = array('image/gif', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/tiff');
        // Récupération du type de fichier et ont le stock.
        $imgTmp = $_FILES['file']['tmp_name'];
        $imgType = $_FILES['file']['type'];

        // Test ci le fichier es bon.
        if (in_array($imgType, $extensions)) {
            $extension = substr($imgType, 6);
            // Récupération de l'extension de l'image.
        } else {
            $TabErreurs['file'] = 'Vous devez ajouter une photo valide !';
        }
    } else {
        $TabErreurs['file'] = 'Veuillez joindre une photo !';
    }

    // Déclaraion des regex.
    $verifDesc = '/^[0-9a-zA-Zàâéèëêïîôùüç \-"()=,._%[\]`\';:!?*$€#&°<>+-\/]{1,300}$/';
    $verifLibelle = '/^[a-zA-Z0-9àâéèëêïîôùüç -]{1,60}$/';
    $verifRef = '/^[0-9a-zA-Zàâéèëêïîôùüç-]{1,60}$/';
    $verifPrice = '/^[0-9]{1,6}(.[0-9]{1,2})?$/';
    $verifColor = '/^[a-zZA-Z]{1,25}/';
    $verifStk = '/^[0-9]{1,6}$/';
    $verifDate = '/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/';
    $TabErreurs = [];

    // Controle de saisie sur la référence.
    if (empty($_POST["reference"]) || !preg_match($verifRef, $_POST["reference"])) {
        $TabErreurs["reference"] = "Veuillez indiquer une référence valide !";
    }
    // Controle de saisie sur la description.
    if (empty($_POST["description"]) || !preg_match($verifDesc, $_POST["description"])) {
        $TabErreurs["description"] = "Veuillez indiquer une description valide !";
    }
    // Controle de saisie sur la libelle.
    if (empty($_POST["libelle"]) || !preg_match($verifLibelle, $_POST["libelle"])) {
        $TabErreurs["libelle"] = "Veuillez indiquer un libellé valide !";
    }
    // Controle de saisie sur la prix.
    if (empty($_POST["prix"]) || !preg_match($verifPrice, $_POST["prix"])) {
        $TabErreurs["prix"] = "Veuillez indiquer un prix valide !";
    }
    // Controle de saisie sur la stock.
    if (empty($_POST["stock"]) || !preg_match($verifStk, $_POST["stock"])) {
        $TabErreurs["stock"] = "Veuillez indiquer un stock valide !";
    }
    // Controle de saisie sur la couleur.
    if (empty($_POST["couleur"]) || !preg_match($verifColor, $_POST["couleur"])) {
        $TabErreurs["couleur"] = "Veuillez indiquer une couleur valide !";
    }

    if (empty($TabErreurs)) { // Tableau d'erreurs vide : on redirige où on le souhaite
        $valide = TRUE;
        $dt = date('Y-m-d');
        $Reference = $_POST['reference'];
        $Categorie = $_POST['categorie'];
        $Libelle = $_POST['libelle'];
        $Description = $_POST['description']; // récupération des données du formulaire_ajout.php via $_POST
        $Prix = $_POST['prix'];
        $Stock = $_POST['stock'];
        $Couleur = $_POST['couleur'];

// prépare la requete INSERT
        $requeteAdd = $db->prepare("INSERT INTO produit(pro_ref,
       							pro_cat_id,
                                                        pro_libelle,
                                                        pro_description,
                                                        pro_prix,
                                                        pro_stock,
                                                        pro_couleur,
                                                        pro_d_ajout,
                                                        pro_photo)
                           			VALUES (:reference, 
                                                        :categorie, 
                                                        :libelle, 
                                                        :description, 
                                                        :prix, 
                                                        :stock, 
                                                        :couleur, 
                                                        :dateajout,
                                                        :extension)");

        $requeteAdd->bindValue(':reference', $Reference);
        $requeteAdd->bindValue(':categorie', $Categorie);
        $requeteAdd->bindValue(':libelle', $Libelle);
        $requeteAdd->bindValue(':description', $Description);
        $requeteAdd->bindValue(':prix', $Prix);
        $requeteAdd->bindValue(':stock', $Stock);
        $requeteAdd->bindValue(':couleur', $Couleur);
        $requeteAdd->bindValue(':dateajout', $dt);
        $requeteAdd->bindValue(':extension', $extension);

        if ($requeteAdd->execute()) {
            // Permet de définir l'ID maximal.
            $idImg = $db->query('SELECT MAX(pro_id) AS ID FROM produits ORDER BY pro_id');
            $idImg = $idImg->fetch(PDO::FETCH_BOTH);
            $idImg = $idImg[0];
            // Stockage du chemin de destination.
            $chemin = '../assets/images/produit/';
            // Renomage du fichier envoyer.
            $imgSave = $idImg . '.' . $extension;
            move_uploaded_file($imgTmp, $chemin . $imgSave);
        }
        header("Location:../views/produit.php");
    }
}
?>