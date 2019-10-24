<?php
session_start();
include "../views/header.php";
include "../controler/connexion_bdn.php";
?>
<!-- Table -->
<h1 id="titleAdminPage" class="animated fadeInUp"> Espace administrateur</h1>
<div class ="divider1"></div>
<button id="linkAdminPage" class="btn btn-danger animated flipInX delay-1s"><a id="linkAdminButton" href="../views/form_add_product.php">Ajouter un produit <i class="fas fa-plus"></i></a></button>
<table class="table table-striped table-dark listProductAdmin">
    <thead>
        <tr>
            <th scope="col">Photo</th>
            <th scope="col">ID</th>
            <th scope="col">Référence</th>
            <th scope="col">Libellé</th>
            <th scope="col">Prix</th>
            <th scope="col">Stock</th>
            <th scope="col">Couleur</th>
            <th scope="col">Ajout</th>
            <th scope="col">Modif</th>
            <th scope="col">Bloqué</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $db = connexionBase();

        $reponse = $db->query("SELECT pro_photo,pro_id,pro_cat_id,pro_ref,pro_libelle,pro_prix,pro_stock,pro_couleur,pro_d_ajout,pro_d_modif,pro_bloque FROM produits");

        while ($donnees = $reponse->fetch()) {
            echo "<tr>";
            echo "<td><img src='../assets/images/produit/" . $donnees["pro_id"] . "." . $donnees["pro_photo"] . "' alt='Image du produit'></td>";
            echo "<td>" . $donnees["pro_id"] . "</td>";
            echo "<td>" . $donnees["pro_ref"] . "</td>";
            echo "<td><a id='linkLibelleProduct' href=\"../views/form_modif_product.php?pro_id=" . $donnees["pro_id"] . "\">" . $donnees["pro_libelle"] . "</a></td>";
            echo "<td>" . $donnees["pro_prix"] . "</td>";
            echo "<td>" . $donnees["pro_stock"] . "</td>";
            echo "<td>" . $donnees["pro_couleur"] . "</td>";
            echo "<td>" . $donnees["pro_d_ajout"] . "</td>";
            echo "<td>" . $donnees["pro_d_modif"] . "</td>";
            echo "<td>" . $donnees["pro_bloque"] . "</td>";
            echo "</tr>";
        }

        $reponse->closeCursor();
        ?>
    </tbody>
</table>
<a class="iReturnListProduct"href="../views/EspaceAdmin.php"><i class="fas fa-angle-up"></i></a>
<?php
include "../views/footer.php";
?>