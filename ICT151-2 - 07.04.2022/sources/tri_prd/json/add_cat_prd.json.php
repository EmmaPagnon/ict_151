<?php
header('Content-Type:application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

$prd= new Produit($_POST['id_prd']);

if($prd->add_cat($_POST['id_cat'])){

    $cat=new Categorie($_POST['id_cat']);
    $tab= array();
    $tab['nom_cat'] = $cat->get_nom();
    $tab['id_prd'] = $prd->get_id_prd();
    echo json_encode($tab);
}



