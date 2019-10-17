 <?php
require "../controler/connexion_bdn.php"; // Inclusion de la fonction
$db = connexionBase(); // Appel de la fonction
    
    // Récupération de mes données.
    $ID = $_POST['key'];
    $Ref = $_POST['reference'];
    $Cat = $_POST['categorie'];
    $Lib = $_POST['libelle'];
    $Desc = $_POST['description'];
    $Prx = $_POST['prix'];
    $Stk = $_POST['stock'];
    $Color = $_POST['couleur'];

// Condition qui permet de modifier le produit.
if (isset($_POST['modif'])){
    $requete_update = $db->prepare("UPDATE produits SET pro_ref = :reference, 
                                                        pro_cat_id = :categorie, 
                                                        pro_libelle = :libelle, 
                                                        pro_description = :description,
                                                        pro_prix = :prix,
                                                        pro_stock = :stock,
                                                        pro_couleur = :couleur                                           
                                                     WHERE pro_id = :key");
    
    $requete_update->bindValue(':key', $ID);
    $requete_update->bindValue(':reference', $Ref);
    $requete_update->bindValue(':categorie', $Cat);
    $requete_update->bindValue(':libelle', $Lib);
    $requete_update->bindValue(':description', $Desc);
    $requete_update->bindValue(':prix', $Prx);
    $requete_update->bindValue(':stock', $Stk);
    $requete_update->bindValue(':couleur', $Color);
    $requete_update->execute();
    
    header("location:../views/produit.php");
    }
// Condition qui permet de supprimer le produit.
elseif(isset($_POST['delete'])){

    $requete_delete = $db->prepare("DELETE FROM produits WHERE  pro_id= :key");
    $requete_delete->bindParam(':key', $ID, PDO::PARAM_INT);
    $requete_delete->execute(); 

    header("Location:../views/produit.php"); // Redirection vers la page produit.
}
?>