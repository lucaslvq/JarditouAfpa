<?php
session_start();
include "../controler/connexion_bdn.php";
include "../views/header.php";
?>

<!-- Jumbotron -->
<div class="card card-image mt-5" style="background-image: url(https://cdn.pixabay.com/photo/2015/11/07/11/16/succulent-1030983_960_720.jpg);">
    <div class="text-white text-center rgba-stylish-strong py-5 px-4">
        <div class="py-5">
            <i id="iNewProduct" class="far fa-newspaper animated fadeInDownBig"></i> 
            <h1 id="titleNewProduct" class="animated slideInDown">Inscrivez vous à notre newsletter</h1>
            <form action="" method="post">
                <!-- Content -->
                <div class="md-form form-lg animated flipInX formProduct" >
                    <input id="inputNewsProduct" type="text" id="form1" class="form-control">
                    <label id="inputNewsProduct"for="form1"><i class="fas fa-envelope"></i> Entrer un email :</label>     
                </div>
                <button type="submit" class="btn btn-primary animated fadeInUp"><i class="fas fa-paper-plane"></i> Recevoir nos news</button>            
            </form>
        </div>
    </div>
</div>

<!-- Section: product -->
<section class="text-center my-5">
    <?php
    $db = connexionBase();
    $reponse = $db->query("SELECT pro_photo,pro_id,pro_cat_id,pro_ref,pro_libelle,pro_prix,pro_stock,pro_couleur,pro_d_ajout,pro_d_modif,pro_bloque FROM produits");
    ?>

    <div class="container">
        <div class="row">
            <?php
            while ($donnees = $reponse->fetch()) {
                ?>
                <!-- Grid column -->
                <div class="col-4 col-sm-4 col-sm-4 w-100 p-3">
                    <!-- Card -->
                    <div class="card card-cascade wider card-ecommerce">
                        <!-- Card image -->
                        <div class="view view-cascade overlay">                     
                            <?php echo "<img id='imgProduct' src='../assets/images/produit/" . $donnees["pro_id"] . "." . $donnees["pro_photo"] . "' alt='Image du produit'>" ?>
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>         
                        </div>
                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">                         
                            <h4 class="card-title">
                                <strong>
                                    <?= $donnees["pro_libelle"] ?> 
                                </strong>
                            </h4>
                            <!-- Description -->
                            <p class="card-text">Description du produit.</p>
                            <!-- Card footer -->
                            <div class="card-footer px-1">
                                <span class="float-left font-weight-bold">
                                    <?php echo "<strong>" . $donnees["pro_prix"] . "</strong>" ?> 
                                </span>
                                <span class="float-right">
                                    <button type="button" class="btn red darken-1">
                                        <?php echo "<a id='linkProduct' href=\"formulaire_detail.php?pro_id=" . $donnees["pro_id"] . "\">" ?>details
                                        <i id="iProduct" class="fas fa-eye grey-text ml-3"></i>
                                    </button>
                                    <?php if (isset($_SESSION['login'])) { ?>
                                        <button type="button" class="btn red darken-1">
                                            <a id="linkProduct" href="../views/formulaire_detail.php">Modifier</a>                                          
                                            <i id="iProduct" class="fas fa-pencil-alt"></i>
                                        <?php } ?>
                                    </button>  
                                </span>
                            </div>
                        </div>
                    </div>  
                </div>
                <?php
            }
            $reponse->closeCursor();
            ?>
        </div>            
    </div> 
</section>

<a id="iReturnProduct"href="../views/produit.php"><i class="fas fa-angle-up"></i></a>

<?php
include "../views/footer.php";
?>