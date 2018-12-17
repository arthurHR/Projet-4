<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Jean Forteroche - Billet Simple pour l'laska</title>

    <!-- Bootstrap core CSS -->
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="public/css/clean-blog.min.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">


  </head>


    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php">Jean Forteroche</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu<i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=listPost">Les chapitres</a>
                        </li>
                        <?php 
                        if (empty($_SESSION))
                        { ?>
                            <li class="nav-item"> 
                                <a class="nav-link" href="index.php?action=login">Connexion</a>
                            </li>
                        <?php
                        } else { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Amdin</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="index.php?action=addPost">Ajouter un chapitre</a>
                                    <a class="dropdown-item" href="index.php?action=moderateComments">Commentaires signalés</a>
                                    <a class="dropdown-item" href="index.php?action=deconnexion">Deconnexion</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
           <!-- Page Header -->
        <header class="masthead" style="background-image: url(<?= $image ?>)">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1><?= $title ?></h1>
                            <span class="subheading"><?= $subheading ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?= $content ?>


    <!-- Bootstrap core JavaScript -->
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    


    <!-- Custom scripts for this template -->
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=666vwfq4hwnaafstrl3nujbahvyrz7ahiq9pzrvcdai16ckm'></script>
    <script src="public/js/clean-blog.min.js"></script>
    <script src="public/js/tinymce.js"></script>
    <script src="public/js/event.js"></script>



    </body>
    
</html>