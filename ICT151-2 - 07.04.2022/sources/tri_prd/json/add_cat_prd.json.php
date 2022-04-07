<?php
header('Content-Type:application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

//print_r($_POST);

$cat = new Categorie();
$tab_cat= array();
$tab_prd= array();

$tab_cat['id_cat'] = $_POST['id_cat'];
$tab_prd['id_prd'] =  $_POST['id_prd'];


if(!$cat->check_unique($_POST['id_prd'])){

    $id = $cat->add($tab_cat);
    $id = $cat->add($tab_prd);
    $cat->set_id_cat($id);
    $cat->init();
    $tab['response'] = true;

}else{
    $tab['response'] = false;

}
echo json_encode($tab);