<?php 

/*********************** Consignes globales ***********************************/
// Force ou désactive l'affichage des erreurs PHP et SQL
define("DISPLAY_ERROR", 1);

// Type d'erreur à afficher
error_reporting(E_ALL);
ini_set('display_errors', DISPLAY_ERROR);


/*********************** Chemin d'accès ***************************************/
//echo getcwd();
define("WAY","c:/xampp/htdocs/ICT_151/ICT151-4 - 02.06.2022/");
define("URL","http://localhost/ICT151-4 - 02.06.2022/");


/*********************** Base de données **************************************/
// Host
define("SQL_HOST","localhost");

// Nom de la base de données
define("BASE_NAME","magasin");

// Utilisateur de base de données
define("SQL_USER","root");

// Mot de passe
define("SQL_PASSWORD","");
?>