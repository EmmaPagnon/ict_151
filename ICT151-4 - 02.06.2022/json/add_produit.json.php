<?php 
require("./../config/config.inc.php");
require( WAY ."/includes/autoload.inc.php");
header('Content-Type: application/json');

$prd = new Produit();

if(!$prd->check_unique($_POST['nom_prd'],$_POST['cat_prd'])){
    $tab['reponse'] = "false";
}else{
    $tab['id'] = $prd->add($_POST);
    $tab['reponse'] = "true";
}

//print_r($_POST);
echo json_encode($tab);
?>