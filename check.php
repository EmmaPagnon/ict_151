<pre>
<?php

require ("./class/Personne.class.php");
$per = new Personne();

$per-> set_nom("Lerdorf");
$per-> set_prenom("rasmus");
$per-> set_email("rasmus.lerdorf@php.net");
$per-> set_password("Pa\$\$w0rd");
$per-> set_news_letter("1");

echo $per-> get_nom();

echo $per;

?>
</pre>

