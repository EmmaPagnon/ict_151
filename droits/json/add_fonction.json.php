<?php
header('Content-Type:application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

//print_r($_POST);

$fnc = new Fonction();

if(!$fnc->check_abr($_POST['abr_fnc'])){

    $id = $fnc->add($_POST);
    $fnc->set_id_fnc($id);
    $fnc->init();
    $tab['response'] = true;
    $tab['message']['texte'] ="La fonction " .$fnc->get_nom_fnc()." (".$fnc->get_abr_fnc().") à bien été ajoutée" ;
    $tab['message']['type'] = "success";
}else{
    $tab['response'] = false;
    $tab['message']['texte'] ="Un problème est survenu" ;
    $tab['message']['type'] = "danger";

}
echo json_encode($tab);

?>