<?php 
require("./../../config/config.inc.php");
require( WAY ."/includes/autoload.inc.php");
header('Content-Type: application/json');


// Etape 2
$prd = new Produit($_POST['id_prd']);

$cat = new Categorie($_POST['id_cat']);


if($prd->add_cat($_POST['id_cat'])){
    $tab['reponse'] = true;
    $tab['id_prd'] = $prd->get_id_prd();
    $tab['id_cat'] = $cat->get_id_cat();
    $tab['new_cat'] = $cat->get_nom();
}else{
    $tab['reponse'] = false;
}

echo json_encode($tab);
?>