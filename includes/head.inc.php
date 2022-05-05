<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <link rel="stylesheet" href="<?= ROOT ?>/css/global.css">


    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <!--à mettre après Jquery le js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <title>formulaire</title>
</head>
<body>
<div class="container">

    <?php
    if(isset($_SESSION['id'])){
        $per= new Personne($_SESSION['id']);
        if($per->check_connect()){





    ?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= ROOT ?>">ICT-151</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Droits d'accès<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= ROOT ?>/droits/attribution_fnc_per.php">Attribution fonctions</a></li>
                            <li><a href="<?= ROOT ?>/droits/attribution_aut_fnc.php">Attribution autorisations</a></li>
                            <li><a href="<?= ROOT ?>/droits/fonctions.php">Fonctions</a></li>
                            <li><a href="<?= ROOT ?>/droits/autorisations.php">Autorisations</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= ROOT ?>/logout.php">Déconnection</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
        }
    }
    ?>
    <!--création dans mon header une boite pour les message d'alerte-->
    <div class="alert" id="alert" role=alert"">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <b class="bold"></b><span class="message"></span>
    </div>
