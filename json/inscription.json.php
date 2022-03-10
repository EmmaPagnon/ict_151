<?php
session_start();
header("content-type: application/json");
//print_r($_POST);

require("./../config/config.inc.php");
require (WAY."/includes/autoload.inc.php");

$per = new Personne();

$tab=array();

//on check l'email s'il existe on fait pas l'insertion
if(!$per->check_email($_POST['email_per'])) {
    $per->add($_POST);
    $tab['reponse'] = true;
    $tab['message'] ['texte']= "Bienvenue, utilisez vos identifiants pour vous connecter";
    $tab['message'] ['type']= "success";

}else{
    $tab['reponse'] = false;
    $tab['message'] ['texte']= "Cet email est déjà utilisé !";
    $tab['message'] ['type']= "danger";

}

// va formater le fichier $_POST en json
echo json_encode($tab);

?>