<?php

header("content-type: application/json");
//print_r($_POST);

// va formater le fichier $_POST en json
echo json_encode($_POST);

?>