<?php

session_start();
include "../controler/connexion_bdn.php";
include "../views/header.php";
$db = connexionBase();
$requete = $db->prepare("SELECT * FROM produits WHERE pro_id= :id");
$requete->bindParam(':id', $proID, PDO::PARAM_INT);
$requete->execute();

$row = $requete->fetch(PDO::FETCH_OBJ);
?>

<section class="profil  py-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="slider">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div style="    border-radius: 0.25rem;" class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" style="height: 290px" src="http://i2.haber7.net//haber/haber7/photos/2017/42/yerli_elektrikli_otobus_sileo_gorucuye_cikti_1508579280_0003.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" style="height: 290px" src="https://plusfly.com/wp-content/uploads/2017/08/kamilkoc-otobus-bileti.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" style="height: 290px" src="https://www.biletbayi.com/Content/ContentItemDocument/images/manload/pamukkale-otobus.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="card-detail">
                    <div class="descDetail">
                        <h4 class="pb-3">Detail du produit</h4>
                        <ul class="yacht-info__list">
                            <li><i class="far fa-address-card"></i> Libellé :</li>
                            <li><i class="fas fa-barcode"></i> Référence : </li>                         
                            <li><i class="fas fa-box-open"></i> Stock : </li>
                            <li><i class="fas fa-fill-drip"></i> Couleur : </li>   
                        </ul>
                    </div>
                    <div class="descDetail margin-top--22">
                        <h4 class="pb-3">Description</h4>
                        <p>futur description</p>
                    </div>
                    <p>Prix : 999€</p>
                </div>
            </div>

        </div>
    </div>
</section>

<?php

include '../views/footer.php';
?>