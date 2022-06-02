<?php
header('Content-Type: application/json');
session_start();
require("./../config/config.inc.php");
require( WAY ."/includes/autoload.inc.php");

//print_r($_POST)

$per = new Personne();

//echo $per;

if($per->check_email($_POST['email_per'])){
    if($per->check_login($_POST['email_per'],$_POST['password_per'])){
        $tab['response']=true;
        //print_r($_SESSION);

    }else{
        $tab['message']['texte'] = "Combinaison invalide!";
        $tab['message']['type'] = "danger";
    }
}else{
    $tab['message']['texte'] = "Combinaison invalide!*";
    $tab['message']['type'] = "danger";
}


echo json_encode($tab);


?>