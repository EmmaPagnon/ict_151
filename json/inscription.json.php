<?php
session_start();
header("content-type: application/json");
//print_r($_POST);

require("./../config/config.inc.php");
require (WAY."/includes/autoload.inc.php");

$per = new Personne();

$tab=array();


if($per->check_email($_POST['email_per'])){
    $tab['response']=false;
    $tab['message']['texte']="Cet email est déjà utilisé !";
    $tab['message']['type']="danger";
}else{
    $id = $per->add($_POST);
    $per->set_id($id);
    if($per->init()){
        $tab['response'] = true;
        $tab['message']['texte'] = "Bienvenue, utilisez les identifiants créés pour vous connecter ! <br><a href=\"login.php\">Connexion</a>";
        $tab['message']['type'] = "success";

    }
}





// va formater le fichier $_POST en json
echo json_encode($tab);

?>