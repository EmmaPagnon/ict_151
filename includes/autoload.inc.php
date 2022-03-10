<?php
function chargerClasse($class){
    require WAY."/class/".$class.".class.php";
}
// dès qu'on va faire un nouvel objet personne il va faire un autoload
spl_autoload_register("chargerClasse");