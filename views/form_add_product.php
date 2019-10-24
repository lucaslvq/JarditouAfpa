<?php
include "header.php";
require "../controler/ajoutProduit.php";
$db = connexionBase(); // Appel de la fonction de connexion

$requete_cat = $db->prepare("SELECT * FROM categories");
$requete_cat->execute();

$requete = $db->prepare("SELECT * FROM produits WHERE pro_id= :id");
$requete->bindParam(':id', $proID, PDO::PARAM_INT);
$requete->execute();

$row = $requete->fetch(PDO::FETCH_OBJ);
?>
<form action="#" method="post" name="Formulaire_ajout_pro" enctype="multipart/form-data">
    <h1 id="titleProductAdd">Ajout d'un produit</h1>
    <div class ="divider1"></div>
    <div id="buttonPageProduct">
        <button type="submit" class="btn btn-danger" name="envoyer">Ajouter <i class="fas fa-plus"></i></button>
        <button class="btn btn-danger"><a id="linkAdminButton" href="../views/EspaceAdmin.php">Retour <i class="fas fa-undo"></i></a></button>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="mt-1">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="libelleProductAdd" for="reference"><i class="fas fa-hashtag"></i> Référence :</label>
                        <input class="form-control" name="reference" type="text" id ="reference" value="<?php if (isset($_POST['reference'])) echo $_POST['reference']; ?>">                 
                        <span class='erreur' id="reference"></span>
                        <span class="erreur"><?php
                            if (!empty($TabErreurs["reference"])) {
                                echo $TabErreurs["reference"];
                            }
                            ?></span>         
                    </div>			
                    <div class="form-group col-md-6">
                        <label class="libelleProductAdd" for="categorie"><i class="fas fa-clipboard-list"></i> Catégorie :</label>
                        <select class="form-control" name="categorie" type="text" id="categorie">
                            <?php
                            while (($row2 = $requete_cat->fetch(PDO::FETCH_OBJ))) {
                                echo "<option value=" . $row2->cat_id . ">" . $row2->cat_nom . "</option>";
                            }
                            ?>
                        </select>    
                        <span class="erreur" id="erreurCategorie"></span>
                        <span class="erreur"><?php
                            if (!empty($TabErreurs["categorie"])) {
                                echo $TabErreurs["categorie"];
                            }
                            ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="libelleProductAdd" for="libelle"><i class="fas fa-id-card"></i> Libellé :</label>
                        <input class="form-control" name="libelle" type="text" id="libelle" value="<?php if (isset($_POST['libelle'])) echo $_POST['libelle']; ?>">
                        <span class="erreur"><?php
                            if (!empty($TabErreurs["libelle"])) {
                                echo $TabErreurs["libelle"];
                            }
                            ?></span>
                        <span class="erreur" id="erreurLibelle"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="libelleProductAdd"><i class="fas fa-tasks"></i> Description :</label>
                        <textarea class="form-control" name="description" type="text" id="description" value='<?php if (isset($_POST['description'])) echo $_POST['description']; ?>'></textarea> 
                        <span class = "erreur"><?php
                            if (!empty($TabErreurs["description"])) {
                                echo $TabErreurs["description"];
                            }
                            ?></span>
                        <span class="erreur" id ="erreurDesc"></span>		
                    </div>
                    <div class="form-group col-md-6">
                        <label class="libelleProductAdd" for="prix"><i class="fas fa-euro-sign"></i> Prix produit :</label>
                        <input class="form-control" name="prix" type="text" id="prix" value='<?php if (isset($_POST['prix'])) echo $_POST['prix']; ?>'>
                        <span class="erreur"><?php
                            if (!empty($TabErreurs["prix"])) {
                                echo $TabErreurs["prix"];
                            }
                            ?></span>
                        <span class="erreur" id="erreurPrix"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="libelleProductAdd" for="stock"><i class="fas fa-archive"></i> Stock :</label>
                        <input class="form-control" name="stock" type="text" id="stock" value='<?php if (isset($_POST['stock'])) echo $_POST['stock']; ?>'>
                        <span class="erreur"><?php
                            if (!empty($TabErreurs["stock"])) {
                                echo $TabErreurs["stock"];
                            }
                            ?></span>
                        <span class="erreur" id="erreurStock"></span>								  
                    </div>
                    <div class="form-group col-md-6">
                        <label class="libelleProductAdd" for="couleur"><i class="fas fa-palette"></i> Couleur :</label>
                        <input type="text" class="form-control" name="couleur" id="couleur" value='<?php if (isset($_POST['couleur'])) echo $_POST['couleur']; ?>'>
                        <span class="erreur" id="erreurCouleur"></span>
                        <span class="erreur"><?php
                            if (!empty($TabErreurs["couleur"])) {
                                echo $TabErreurs["couleur"];
                            }
                            ?></span>				      		
                    </div>
                    <div class="radio col-md-4 mt-4 ml-3">
                        <label class="libelleProductAdd" for="bloque"><i class="fas fa-unlock-alt"></i> Produit bloqué :</label>
                        <input type="radio" id="radioBTN" name="radioBTN" value="0"> Non
                        <input type="radio" id="radioBTN" name="radioBTN" value="1"> Oui  
                    </div>
                </div>
                <div class ="col-md-6">
                    <div class ="form-row">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="libelleProductAdd" for="exampleFormControlFile1">Télécharger une image :</label>
                                <input type="file" name='file' class="form-control-file" id="exampleFormControlFile1">
                                <span class="erreur" id="erreurFile"></span>
                                <span class = "erreur"><?php
                                    if (!empty($TabErreurs['file'])) {
                                        echo $TabErreurs['file'];
                                    }
                                    ?></span>	    
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include "footer.php";
?>