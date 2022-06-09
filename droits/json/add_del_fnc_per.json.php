<?php
header('Content-Type:application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

$user= new Personne($_POST['id_per']);

$fnc = new Fonction($_POST['id_fnc']);

$reponse = false;

if($_POST['active']){
    if($user-> add_fnc($fnc->get_id_fnc())){
        $reponse = true;
        $message ="La fonction " .$fnc->get_nom_fnc(). " (".$fnc-> get_abr_fnc(). ") a bien été ajoutée à " .$user->get_prenom()." " .$user->get_nom();
    }
}else {
    if ($user->del_fnc($fnc->get_id_fnc())) {

        $reponse = true;
        $message = "La fonction " . $fnc->get_nom_fnc() . " (" . $fnc->get_abr_fnc() . ") a retiré été ajoutée à " . $user->get_prenom() . " " . $user->get_nom();
    } else {
        $reponse = false;

    }
}

if($reponse)
{
    //$tab['reponse']=true;
    $tab['message']['texte']=$message;
    $tab['message']['type']="alert-success";


}
else{
    //$tab['reponse']=false;
    $tab['message']['texte']="Un message est survenu";
    $tab['message']['type']="alert-danger";

}

sleep(2);
echo json_encode($tab);