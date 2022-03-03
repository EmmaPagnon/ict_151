<pre>
<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require("./config/config.inc.php");
require ("./class/Produit.class.php");
header('Content-Type: application/json');


$prod = new Produit();
echo $prod;

echo $prod->check_nom();
echo $prod->check_categorie();



//print_r($_POST);
echo json_encode($_POST);


?>
</pre>