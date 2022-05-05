<?php
session_start();
require "./config/config.inc.php";
require_once(WAY . "/includes/head.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

?>


<div class="row">
    <div class="header">
        <h3>Connexion</h3>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">Connexion au portail</div>


    <div class="panel-body">
        <form id="connexion_form"  method="post">
            <div class="form-group row">
                <label for="email_per" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input  type="email" class="form-control" id="email_per" name="email_per" placeholder="Votre adresse e-mail">
                </div>
            </div>
            <div class="form-group row">
                <label for="password_per" class="col-sm-2 col-form-label">Mot de passe</label>
                <div class="col-sm-10">
                    <input  type="password" class="form-control" id="password_per" name="password_per" placeholder="Votre mot de passe">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-offset-4 col-sm-2">
                    <button class="form-control" id="submit_conf"> Se connecter </button>
                </div>
                <div class="col-sm-2">
                    <input type="reset" class="form-control btn btn-warning" id="reset_conf" value="Annuler">
                </div>
                <div class="col-sm-2 ">
                    <a href="inscription.php" class="form-control btn btn-default" value="">S'inscrire</a>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer">
    </div>
    <script src="./js/login.js"></script>
</div>
</div>
</body>
</html>


