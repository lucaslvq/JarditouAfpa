<?php
session_start();
include "../controler/controllerForgotPasswordComfirm.php";
include "../views/header.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
        <!-- Insertion CSS -->
        <link rel="stylesheet" href="../assets/css/style.css">
        <link href="https://fonts.goFogleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lexend+Giga&display=swap" rel="stylesheet">
        <title>Accueil</title>
        <!-- Insertion du PHP -->
    </head>
    <!-- NavBar -->
    <body>
        <div class="containers containerSignIn">
            <h1 class="animated bounceInDown">Mot de passe oublié ?</h1>
        </div>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">
                            <span style="font-size: 6rem;">
                                <span style="color: #c0392b;">
                                    <i class="far fa-user-circle "></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <h1 id="titleLogin">Nouveau mot de passe</h1>
                    <div id="dividerSignIn"></div>
                    <div class="d-flex justify-content-center form_container">
                        <form action="" method="post">
                            <div class="input-group mb-1">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control input_pass" value='<?= isset($_POST["password"]) ? $_POST["password"] : "" ?>' placeholder="Mot de passe :">
                                <?php if (isset($error["password"])) { ?>
                                    <i  class="fas fa-info iInfoMdp" data-toggle="tooltip" data-placement="right" title="Le mot de passe doit contenir : 10 caractères dont : 1 lettre en majuscule, 1 chiffre, et 1 caractère spéciaux."></i>
                                <?php } ?>
                                <span class="erreurFormSignUp"><?= !empty($error["password"]) ? $error["password"] : "" ?></span>
                            </div>
                            <div class="input-group mb-1">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="passwordComfirm" class="form-control input_pass" value='<?= isset($_POST["passwordComfirm"]) ? $_POST["passwordComfirm"] : "" ?>' placeholder="Confirmation :">
                                <span class="erreurFormSignUp"><?= !empty($error["passwordComfirm"]) ? $error["passwordComfirm"] : "" ?></span>
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" name="submit" class="btn login_btn animated fadeInUp delais-1s">Envoyer <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                    <p class="mt-2 text-center"><a style="color:#c0392b" href="../views/signIn.php">Votre mot de passe vous reviens ?</a></p>
                    <p class="mt-2 text-center">Vous souhaitez vous inscrire ? <a style="color:#c0392b" href="../views/signUp.php">Par ici s'il vous plait.</a></p>
                    <p class="mt-2 mb-3 text-center">&copy; 2017-2019</p>
                </div>
            </div>
        </div>

        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>
        <!--JavaScript CDN -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <!-- My JS -->
        <script type="text/javascript" src="../assets/js/script.js"></script>
    </body>

</html>