<pre>
<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require("./config/config.inc.php");
require ("./class/Personne.class.php");
$per = new Personne(6);
echo $per;

/*
$per-> set_nom("Lerdorf");
$per-> set_prenom("rasmus");
$per-> set_email("rasmus.lerdorf@php.net");
$per-> set_password("Pa\$\$w0rd");
$per-> set_news_letter("1");

echo $per-> get_nom();

echo $per;

echo $hash = password_hash($per-> get_password(), PASSWORD_DEFAULT);


if(password_verify($per-> get_password(), $hash)){
    echo "\n Password OK";
}
*/

/*$tab = array();
$tab['nom_per'] = "Lerdorf";
$tab['prenom_per'] = "Rasmus";
$tab['email_per'] = "rasmus.lerdorf@.com";
$tab['news_letter_per'] = "1";
$tab['password'] = "";

if(!$per->check_email($tab['email_per'])){
    $per->add($tab);
}*/




?>
</pre>

