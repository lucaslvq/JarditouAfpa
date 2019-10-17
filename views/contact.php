<?php
session_start();
include "header.php";
include '../controler/verifFormulaireContact.php';
?>

<h1 id="titleContact"><span>B</span>esoin de <span>nous</span> contacter <span>?</span></h1>
<div class="divider1"></div>
<noscript>
<h1>Le <span>Java</span>Script à <span>était</span> désactivé <span>!</span></h1>
</noscript>

<!-- Form contact -->
<form action="" method="post">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <i  class="fas fa-user-circle iconContact"></i>
                        <label id="labbelContact" for="inputPrenom">Votre prénom :</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Prénoms" name="prenom">
                        <label class="erreur" id="erreurPrenom"></label>
                        <label class="erreur"><?php
                            if (!empty($TabErreurs["prenom"])) {
                                echo $TabErreurs["prenom"];
                            }
                            ?></label>
                    </div>
                    <div class="form-group col-md-6">
                        <i class="fas fa-user iconContact"></i>
                        <label id="labbelContact" for="inputNom">Votre nom :</label>
                        <input type="text" class="form-control" id="nom" placeholder="Noms" name="nom">
                        <label class="erreur" id="erreurNom"></label>
                        <label class="erreur"><?php
                            if (!empty($TabErreurs["nom"])) {
                                echo $TabErreurs["nom"];
                            }
                            ?></label>
                    </div>
                    <div class="form-group col-md-6 mt-4">
                        <i class="fas fa-calendar-alt iconContact"></i>
                        <label id="labbelContactdDate" for="inputDateDeNaissance">Votre date de naissance :</label>
                        <input class="form-control" type="date" name="date_de_naissance" id="date" placeholder="10/05/1998">
                        <label class="erreur" id="erreurDate"></label>
                        <label class="erreur"><?php
                            if (!empty($TabErreurs["date"])) {
                                echo $TabErreurs["date"];
                            }
                            ?></label>
                    </div>
                    <div class="form-group col-md-6 mt-4">
                        <i class="fas fa-venus-mars iconContact"></i>
                        <label id="labbelContact" for="inputSexe">Sexe :</label>
                        <input type="text" class="form-control" id="sexe" placeholder="Mettez votre sexe" name="sexe">
                        <label class="erreur" id="erreurSexe"></label>
                        <label class="erreur"><?php
                            if (!empty($TabErreurs["sexe"])) {
                                echo $TabErreurs["sexe"];
                            }
                            ?></label>
                    </div>
                    <div class="form-group col-md-6">
                        <i class="fas fa-city iconContact"></i>
                        <label id="labbelContact" for="inputCity">Ville :</label>
                        <input type="text" class="form-control" id="ville" placeholder="Amiens" name="ville">
                        <label class="erreur" id="erreurVille"></label>
                        <label class="erreur"><?php
                            if (!empty($TabErreurs["ville"])) {
                                echo $TabErreurs["ville"];
                            }
                            ?></label>
                    </div>
                    <div class="form-group col-md-6">
                        <i class="fas fa-map-marked-alt iconContact"></i>
                        <label id="labbelContact" for="inputAdresse">Adresse :</label>
                        <input type="text" class="form-control" id="adresse" placeholder="8 rue de paris" name="adresse">
                        <label class="erreur" id="erreurAdresse"></label>
                        <label class="erreur"><?php
                            if (!empty($TabErreurs["adresse"])) {
                                echo $TabErreurs["adresse"];
                            }
                            ?></label>
                    </div>
                    <div class="form-group col-md-4">
                        <i class="fas fa-search-location iconContact"></i>
                        <label id="labbelContact" for="inputZip">Code postal :</label>
                        <input type="text" class="form-control" id="codePostal" placeholder="80000" name="codePostal">
                        <label class="erreur" id="erreurCodePostal"></label>
                        <label class="erreur"><?php
                            if (!empty($TabErreurs["codePostal"])) {
                                echo $TabErreurs["codePostal"];
                            }
                            ?></label>
                    </div>
                    <div class="form-group col-md-8 ">
                        <i class="far fa-envelope iconContact"></i>
                        <label id="labbelContact" for="inputEmail">Email :</label>
                        <input type="text" class="form-control" id="email" placeholder="lucaslevequehd@gmail.com" name="email">
                        <label class="erreur" id="erreurEmail"></label>
                        <label class="erreur"><?php
                            if (!empty($TabErreurs["email"])) {
                                echo $TabErreurs["email"];
                            }
                            ?></label>
                    </div>
                </div>
            </div>
            <div class="divider3"></div>
            <div class="col-md-5">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label id="labbelContact" for="inputMetier">Sélectionner un métier</label>
                        <select class="custom-select" id="select">
                            <option selected value="1">Webmaster</option>
                            <option value="2">Devellopeur</option>
                            <option value="3">Administrateur</option>
                            <option value="3">Webdesigner</option>
                            <label class="erreur" id="erreurSelect"></label>
                        </select>
                    </div>
                    <div class="from-group col-md-6">
                        <textarea name="commentaire" rows="5" cols="39" placeholder="Mettez votre commentaire ici :"></textarea>
                    </div>
                    <div class="form-group">
                        <div id="condition" class="form-check">
                            <input class="form-check-input" type="checkbox" id="check">
                            <label class="form-check-label" for="Check">Accepté les conditions d'utilisations</label>
                            <label class="erreur" id="erreurCheck"></label>
                        </div>                        
                        <button type="submit" name="envoyer" id="envoyer" class="btn btn-outline-dark">Envoyer <i class="fas fa-paper-plane"></i></button>
                        <button type="reset" id="annuler" class="btn btn-outline-dark"><i class="fas fa-undo"></i> Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<h4 id="Copyright">Copyright, 2019</h4>
<div class="divider2"></div>

<div class="navbarFooter">
    <?php
    include "../views/footer.php";
    ?>
</div>