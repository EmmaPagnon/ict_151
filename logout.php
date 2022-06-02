<?php
session_start();
require "./config/config.inc.php";
header('Location: '.ROOT.'/login.php');

session_destroy();

?>