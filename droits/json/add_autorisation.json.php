<?php
header('Content-Type:application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

//print_r($_POST);

$aut = new Autorisation();
$tab_user= array();
$tab_admin= array();

$tab_user['code_aut'] = 'USR_'. $_POST['code_aut'];
$tab_user['nom_aut'] =  $_POST['nom_aut']. " - Utilisateur";
$tab_user['desc_aut'] =  $_POST['description_aut_usr'];

$tab_admin['code_aut'] = 'ADM_'. $_POST['code_aut'];
$tab_admin['nom_aut'] =  $_POST['nom_aut']. " - Administrateur";
$tab_admin['desc_aut'] =  $_POST['description_aut_admin'];

if(!$aut->check_code($_POST['code_aut'])){

    $id = $aut->add($tab_user);

    $id=$aut->add($tab_admin);

    $aut->set_id_aut($id);
    $aut->init();
    $tab['response'] = true;
    $tab['message']['texte'] ="L'autorisation " .$aut->get_nom_aut()." (".$aut->get_code_aut().") à bien été ajoutée" ;
    $tab['message']['type'] = "success";
}else{
    $tab['response'] = false;
    $tab['message']['texte'] ="Un problème est survenu" ;
    $tab['message']['type'] = "danger";

}
echo json_encode($tab);