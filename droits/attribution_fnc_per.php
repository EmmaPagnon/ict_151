<?php

// attribuer la fonction tel et tel qu'elle se mette a jour dans la base de données
session_start();
require "./../config/config.inc.php";
require(WAY.'/includes/secure.inc.php');
require_once(WAY."/includes/head.inc.php");
//require_once(WAY . "/includes/autoload.inc.php");


?>

<div class="row">
    <div class="header">
        <h3></h3>
    </div>
</div>

<?php
$per= New Personne();
$per->get_all();//<-- seulement si on a réussi avec le secure
$tab_per = $per->get_all();
//print_r($tab_per);

$fnc = New Fonction();
$tab_fnc = $fnc->get_all();
//print_r($tab_fnc);

$tab_fnc_per = $fnc-> get_tab_per_all_fnc();
//print_r($tab_fnc_per);
?>

<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Attribution des fonctions aux utilisateurs
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Nom, Prénom</th>
                    <?php foreach ($tab_fnc as $fonction):?>
                    <th><?= $fonction['nom_fnc']?></th>
                    <?php endforeach;?>
                </tr>
                <?php

                foreach($tab_per as $user):
                ?>

                <tr>
                    <td><?=$user['nom_per']?><?=$user['prenom_per']?></td>
                    <?php foreach ($tab_fnc as $fonction):?>
                    <td>
                        <input type="checkbox" class="form-input fnc_per" id_per="<?= $user['id_per']?>" id_fnc="<?= $fonction['id_fnc']?>"
                        <?php // $tab_fnc_per représente les lignes
                        //$tab_fnc_per['id_per'] représente les valeurs soit 1 soit 2
                            if(isset($tab_fnc_per[$fonction['id_fnc']])){
                                if(in_array($user['id_per'], $tab_fnc_per[$fonction['id_fnc']])){
                                    echo "checked";
                                }
                            }
                        ?>
                        >
                    </td>
                    <?php endforeach; ?>
                </tr>
                <?php
                    endforeach;
                ?>
            </table>
        </div>
    </div>
</div>
<script src="./js/fonctions.js"></script>








