<?php
session_start();
include "../views/header.php";
include "../controler/controllerLogin.php";
?>
<!-- Jumbotron -->
<div class="card card-image mt-5" style="background-image: url(https://cdn.pixabay.com/photo/2015/09/09/16/05/forest-931706_960_720.jpg);">
    <div class="text-white text-center rgba-stylish-strong py-5 px-4">
        <div class="py-5">
            <i id="iNewProduct" class="far fa-hand-paper"></i>
            <h1 id="titleNewProduct" class="animated bounceInDown">Bienvenu sur Jarditou!</h1>            
        </div>
    </div>
</div>

<!-- Form devis -->
<form action="" method="post">
    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Besoin d'un devis ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">

                        <i class="fas fa-user prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="form34">Votre nom :</label>
                        <input type="text" id="form34" class="form-control validate">
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="form29">Votre email :</label>
                        <input type="email" id="form29" class="form-control validate">
                    </div>
                    <div class="md-form mb-5">
                        <i class="fas fa-tag prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="form32">Sujet :</label>
                        <input type="text" id="form32" class="form-control validate">
                    </div>
                    <div class="md-form">
                        <i class="fas fa-edit"></i>
                        <label data-error="wrong" data-success="right" for="form8">Votre message :</label>
                        <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-unique">Envoyer<i class="fas fa-paper-plane-o "></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Cards menu -->
<div class="card-deck mt-5 mb-5 cardsShadows">
    <div class="card">
        <i id="iEntreprise" class="fas fa-warehouse"></i>
        <div class="card-body">
            <h2 class="h2Index">L'entreprise</h2>
            <div class="dividerCards"></div>
            <p class="pIndex">Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme.Créée il y 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.Implantés à Amiens, nous intervenons dans tout le département de la Somme: Albert, Doullens, Péronne, Corbie.</p>
        </div>
    </div>
    <div class="card cardsShadows">
        <i id="iQuality" class="fas fa-certificate"></i>
        <div class="card-body">
            <h2 class="h2Index">Qualité</h2>
            <div class="dividerCards"></div>
            <p class="pIndex">Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet.Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>
        </div>
    </div>
    <div class="card cardsShadows">
        <i id="iDevis" class="fas fa-receipt"></i>
        <div class="card-body">
            <h2 class="h2Index">Devis</h2>
            <div class="dividerCards"></div>
            <p class="pIndex">Vous avez bessoin d'un devis sur mesure, rapidement ? <a href="" data-toggle="modal" data-target="#modalContactForm">Obtenez le ici.</a></p>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>