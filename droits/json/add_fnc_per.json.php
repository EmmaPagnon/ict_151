<?php
header('Content-Type:application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

$user= new Personne($_POST['id_per']);

$fnc = new Fonction($_POST['id_fnc']);

if($user-> add_fnc($fnc->get_id_fnc())){

    $tab['reponse'] = true;
    $tab['message']['texte'] ="L'autorisation " .$fnc->get_nom_fnc(). " (".$fnc-> get_abr_fnc(). ") a bien été ajoutée à " .$user->get_prenom()." " .$user->get_nom();
    $tab['message']['type'] = "success";
}else{
    $tab['reponse'] = false;
    $tab['message']['texte'] ="Un problème est survenu" ;
    $tab['message']['type'] = "danger";

}
echo json_encode($tab);