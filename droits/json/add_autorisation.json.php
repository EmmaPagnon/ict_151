<?php
header('Content-Type:application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

//print_r($_POST);

$aut = new Autorisation();

if(!$aut->check_code($_POST['code_aut'])){

    $id = $aut->add($_POST);
    $aut->set_id_aut($id);
    $aut->init();
    $tab['response'] = true;
    $tab['message']['texte'] ="La fonction " .$aut->get_nom_fnc()." (".$aut->get_code_aut().") à bien été ajoutée" ;
    $tab['message']['type'] = "success";
}else{
    $tab['response'] = false;
    $tab['message']['texte'] ="Un problème est survenu" ;
    $tab['message']['type'] = "danger";

}
echo json_encode($tab);