<?php
require_once(WAY . "/includes/autoload.inc.php");

if(isset($_SESSION['id'])) {
    $per = new Personne($_SESSION['id']);
    if (!$per->check_connect()) {
        session_destroy();
        header('Location: ' . ROOT . '/login.php');
        exit;
    }
}else{
    session_destroy();
    header('Location' . ROOT . '/login.php');
 }



// si la personne n'est pas connecté on fait un session destroy le header permet de rediriger sur une autre page

?>