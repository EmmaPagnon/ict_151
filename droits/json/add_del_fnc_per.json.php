<?php
header('Content-Type:application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

$user= new Personne($_POST['id_per']);

$fnc = new Fonction($_POST['id_fnc']);

if($_POST['active']){
    if($user-> add_fnc($fnc->get_id_fnc())){

        $tab['response'] = true;
        $tab['message']['texte'] ="L'autorisation " .$fnc->get_nom_fnc(). " (".$fnc-> get_abr_fnc(). ") a bien été ajoutée à " .$user->get_prenom()." " .$user->get_nom();
    }else{
        $tab['response'] = false;

    }
}else {
    if ($user->del_fnc($fnc->get_id_fnc())) {

        $tab['response'] = true;
        $tab['message']['texte'] = "L'autorisation " . $fnc->get_nom_fnc() . " (" . $fnc->get_abr_fnc() . ") a retiré été ajoutée à " . $user->get_prenom() . " " . $user->get_nom();
    } else {
        $tab['response'] = false;

    }
}

if($tab['response'])
{
    $tab['message']['type'] = "success";

}
else{
    $tab['message']['texte'] = "Un problème est sruvenu";
    $tab['message']['type'] = "danger";

}

echo json_encode($tab);