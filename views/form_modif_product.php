<!-- Inclusion du PHP -->
<?php
include "header.php";
require "../controler/connexion_bdn.php"; // Inclusion de notre biblioth�que de fonctions
$db = connexionBase(); // Appel de la fonction de connexion

$proID = $_GET["pro_id"];

$requete_cat = $db->prepare("SELECT * FROM categories");
$requete_cat->execute();

$requete = $db->prepare("SELECT * FROM produits WHERE pro_id= :id");
$requete->bindParam(':id', $proID, PDO::PARAM_INT);
$requete->execute();

$row = $requete->fetch(PDO::FETCH_OBJ);
?>

<!-- Debut Detail Article -->
<form action="../controler/modifSuppProduit.php" method="post" enctype="multipart/form-data">
    <h1>Deta<span>il</span> du pro<span>duit</span> :</h1>
    <div class ="divider1"></div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>ID :</label>
                        <input class="form-control" name="key" type="text" id="key" value="<?= $row->pro_id; ?>">
                    </div>
                    <div class="form-group col-md-6">
                         <label>Référence :</label>
                        <input class="form-control" name="reference" type="text" id="reference" value="<?= $row->pro_ref; ?>">
                        <span class = "erreur"><?php
                            if (!empty($TabErreurs["reference"])) {
                                echo $TabErreurs["reference"];
                            }
                            ?></span>
                        <span class="erreur" id ="erreurReference"></span>  
                    </div>
                    <div class="form-group col-md-6">
                        <label>Catégorie :</label>
                        <select class="form-control" name="categorie" type="text" id="categorie">
                            <?php
                            while ($row2 = $requete_cat->fetch(PDO::FETCH_OBJ)) {
                                echo "<option value=" . $row2->cat_id . ">" . $row2->cat_nom . "</option>";
                            }
                            ?>
                            <span class="erreur"><?php
                                if (!empty($TabErreurs["categorie"])) {
                                    echo $TabErreurs["categorie"];
                                }
                            ?></span>
                            <span class="erreur" id ="erreurCategorie"></span>
                        </select>  			
                    </div>
                    <div class="form-group col-md-6">
                        <label>Libellé :</label>
                        <input class="form-control" name="libelle" type="text" id="libelle" value="<?= $row->pro_libelle; ?>">
                        <span class = "erreur"><?php
                                if (!empty($TabErreurs["libelle"])) {
                                    echo $TabErreurs["libelle"];
                                }
                            ?></span>
                        <span class="erreur" id ="erreurLibelle"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Description :</label>
                        <textarea class="form-control" name="description" type="text" id="description"><?= $row->pro_description; ?></textarea> 
                        <span class = "erreur"><?php
                                if (!empty($TabErreurs["description"])) {
                                    echo $TabErreurs["description"];
                                }
                            ?></span>
                        <span class="erreur" id ="erreurDesc"></span>		
                    </div>
                    <div class="form-group col-md-6">
                        <label>Prix produit :</label>
                        <input class="form-control" name="prix" type="text" id="prix" value="<?= $row->pro_prix; ?>">
                        <span class = "erreur"><?php
                            if (!empty($TabErreurs["prix"])) {
                                echo $TabErreurs["prix"];
                            }
                            ?></span>
                        <span class="erreur" id ="erreurPrix"></span>					  
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stock :</label>
                        <input class="form-control" name="stock" type="text" id="stock" value="<?= $row->pro_stock; ?>">
                        <span class = "erreur"><?php
                            if (!empty($TabErreurs["stock"])) {
                                echo $TabErreurs["stock"];
                            }
                            ?></span>
                        <span class="erreur" id ="erreurStock"></span>								  
                    </div>
                    <div class="form-group col-md-6">
                        <label>Couleur :</label>
                        <input class="form-control" name="couleur" type="text" id="couleur" value="<?= $row->pro_couleur; ?>">
                        <span class = "erreur"><?php
                            if (!empty($TabErreurs["couleur"])) {
                                echo $TabErreurs["couleur"];
                            }
                            ?></span> 
                        <span class="erreur" id ="erreurCouleur"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Produit bloqué :</label>
                        <input type="radio" name="radioBTN" value="0"> Non		
                        <input type="radio" name="radioBTN" value="1"> Oui
                    </div>
                    <div class="form-group col-md-6">
                        <label>Date d'ajout :</label>
                        <input disabled="disabled" class="form-control" name="dajout" type="text" id="dajout" value="<?= $row->pro_d_ajout; ?>">
                        <span class = "erreur"><?php
                            if (!empty($TabErreurs["dajout"])) {
                                echo $TabErreurs["dajout"];
                            }
                            ?></span> 
                        <span class="erreur" id ="erreurDajout"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Date de modification :</label>
                        <input disabled="disabled" class="form-control" name="dmodif" type="text" id="dmodif" value="<?= $row->pro_d_modif; ?>"> 
                        <span class = "erreur"><?php
                            if (!empty($TabErreurs["dmodif"])) {
                                echo $TabErreurs["dmodif"];
                            }
                            ?></span>
                        <span class="erreur" id ="erreurDmodif"></span>
                    </div>     		  
                </div> 
            </div>
            <div id ="dividerDetail"></div>
            <img id="imgDetail" src="<?php echo "../assets/images/produit/" . $row->pro_id . "." . $row->pro_photo; ?>">
        </div>
        <button type="submit" name="modif" id="modif" class="btn btn-outline-primary" value="modif" onclick="return(confirm('Etes-vous sûr de vouloir modifier ce produit ?'));">Modifier</button>
        <button type="submit" name="delete" class="btn btn-outline-danger" value="delete" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce produit ?'));">Supprimer</button>
        <a href="produit.php" type="buttom" id="annuler" class="btn btn-outline-primary">Retour</a>
    </div>			
</form>

<?php 
include "footer.php" 
?>
