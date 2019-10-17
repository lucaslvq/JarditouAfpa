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
        <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lexend+Giga&display=swap" rel="stylesheet">
        <title>Accueil</title>
        <!-- Insertion du PHP -->
    </head>
    <!-- NavBar -->
    <body>
        <header>
            <!--Navbar -->
            <nav id="navBarColor" class="mb-1 navbar navbar-expand-lg navbar-dark info-color">
                <a class="navbar-brand" href="../views/index.php">
                    <i id="logo" class="fas fa-leaf"></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a id="navBarLink" class="nav-link" href="../views/index.php">
                                <i class="fas fa-bars"></i> Accueil </a>
                        </li>
                        <li class="nav-item active">
                            <a id="navBarLink" class="nav-link" href="../views/produit.php">
                                <i class="fas fa-th-list"></i> Liste produit
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="navBarLink" class="nav-link" href="../views/contact.php">
                                <i class="fas fa-share-square"></i> Contact </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navBarLink" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="navBarLink" class="fas fa-user"></i> <?= isset($_SESSION['login']) ? $_SESSION['login'] : 'Profil' ?></a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                                <a class="dropdown-item" href="../views/signIn.php"><i class="fas fa-laptop iProfilList"></i>Connexion</a>
                                <?php if (isset($_SESSION['login'])) { ?>
                                <a class="dropdown-item" href="../views/listeProduit.php"><i class="fas fax1 fa-list-alt"></i></i><span class="linkProfil">Liste produit</span></a>
                                <?php } ?>
                                <a class="dropdown-item" href="../views/signUp.php"><i class="fab fa-wpforms iProfilList"></i>Inscription</a>                             
                                <?php if (isset($_SESSION['login'])) { ?>
                                    <a class="dropdown-item" href="../controler/deconnexion.php"><i class="fas fa-2x fa-sign-out-alt"></i>Déconnexion</a>
                                <?php } ?>
                                    
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--/.Navbar -->
        </header>
        <!-- Fin NavBar -->