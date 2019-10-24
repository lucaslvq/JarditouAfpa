<?php
    session_start();
    include "../controler/controllerSignUp.php";
    include "../views/header.php";
    ?>

<h1 id="titleSignUp" class=" animated bounceInDown">Bienvenue sur Jarditou</h1>
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card card_inscription">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <span style="font-size: 6rem;">
                        <span style="color: #c0392b;">
                            <i class="fas fa-user-plus"></i>
                        </span>
                    </span>
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form action="" method="post">
                    <h1 id="titleSignUpForm">Inscription</h1>
                    <p id="pSignUp" class="text-center">Pour accéder directement au site </br><a style="color:#c0392b" href="../views/index.php">par ici s'il vous plait.</a></p>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                        </div>
                        <input type="text" name="firstName" class="form-control" value='<?= isset($_POST["firstName"]) ? $_POST["firstName"] : "" ?>' placeholder="Nom :">
                        <span class="erreurFormSignUp"><?= !empty($error["firstName"]) ? $error["firstName"] : "" ?></span>
                    </div>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <input type="text" name="secondName" class="form-control test" value='<?= isset($_POST["secondName"]) ? $_POST["secondName"] : "" ?>' placeholder="Prénom :">
                        <span class="erreurFormSignUp"><?= !empty($error["secondName"]) ? $error["secondName"] : "" ?></span>
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-1x fa-user-circle"></i></span>
                        </div>
                        <label class="labelTest" for="login" ></label>
                        <input id="login" type="text" name="login" class="form-control input_user" value='<?= isset($_POST["login"]) ? $_POST["login"] : "" ?>' placeholder="Login :">
                        <?php if (isset($error["login"] )){ ?>
                        <i  class="fas fa-info iInfoMdp" data-toggle="tooltip" data-placement="right" title="Le login ne peut pas contenir de caractère spéciaux."></i>
                        <?php } ?>
                        <span class="erreurFormSignUp"><?= !empty($error["login"]) ? $error["login"] : "" ?></span>
                        <span class="erreurFormSignUp"><?= !empty($error["verifLogin"]) ? $error["verifLogin"] : "" ?></span>
                    </div>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                        <input type="text" name="email" class="form-control input_user" value='<?= isset($_POST["email"]) ? $_POST["email"] : "" ?>' placeholder="Email :">
                        <span class="erreurFormSignUp"><?= !empty($error["email"]) ? $error["email"] : "" ?></span>
                        <span class="erreurFormSignUp"><?= !empty($error["verifMail"]) ? $error["verifMail"] : "" ?></span>
                    </div>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control input_pass" value='<?= isset($_POST["password"]) ? $_POST["password"] : "" ?>' placeholder="Mot de passe :">
                        <?php if (isset($error["password"] )){ ?>
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
                        <button type="submit" name="submit" class="btn login_btn animated fadeInUp delais-1s">Inscription <i class="far fa-edit"></i></button>
                    </div>
                </form>
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    <a style="color:#c0392b" href="../views/signIn.php" class="ml-2 text-center">Avez vous un compte ?<br>Par ici pour ce connecté.</a>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
<!-- My JS -->
<script type="text/javascript" src="../assets/js/script.js"></script>
</body>
</html>


