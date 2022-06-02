<?php
header('Content-Type:application/json');
session_start();
require("./../../config/config.inc.php");
require(WAY . "/includes/autoload.inc.php");


$categorie = new Catégorie($_POST['id_cat']);

$produit = new Produit($_POST['id_prd']);

if($_POST['active']){
    if($categorie-> add_cat($produit->get_id_cat())){

        $tab['response'] = true;
    }else{
        $tab['response'] = false;

    }
}else {
    if ($categorie->del_cat($produit->get_id_cat())) {

        $tab['response'] = true;
    } else {
        $tab['response'] = false;

    }
}

if($tab['response'])
{
    $tab['message']['type'] = "success";

}
else{
    $tab['message']['texte'] = "Un problème est survenu";
    $tab['message']['type'] = "danger";

}

echo json_encode($tab);