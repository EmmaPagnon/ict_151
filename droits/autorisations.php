<?php
session_start();
require ("./../config/config.inc.php");
require(WAY.'/includes/secure.inc.php');
require_once(WAY . "/includes/head.inc.php")

?>
    <div class="row">
        <div class="header">
            <h3>Autorisations</h3>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Ajouter une autorisation</div>


        <div class="panel-body">
            <form id="autorisation_form"  method="post">
                <!--nom de l'autorisation-->
                <div class="form-group row">
                    <label for="nom_auto" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="nom_aut" name="nom_aut" placeholder="Nom de l'autorisation">
                    </div>
                </div>
                <!--Code de l'autorisation-->
                <div class="form-group row">
                    <label for="code_auto" class="col-sm-2 col-form-label">Abreviation de la fonction</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="code_aut" name="code_aut" placeholder="XXX">
                    </div>
                </div>
                <!--Description de l'autorisation pour un administrateur-->
                <div class="form-group row">
                    <label for="description_auto_admin" class="col-sm-2 col-form-label">Description de l'autorisation pour un administrateur</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="description_aut_admin" name="description_aut_admin" placeholder="Description">
                    </div>
                </div>
                <!--Description de l'autorisation pour un utilisateur-->
                <div class="form-group row">
                    <label for="description_auto_usr" class="col-sm-2 col-form-label">Description de l'autorisation pour un utilisateur</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="description_aut_usr" name="description_aut_usr" placeholder="Description">
                    </div>
                </div>


                <!--boutons-->
                <div class="form-group row">
                    <div class="col-sm-8"></div>

                    <div class="col-sm-2">
                        <button class="btn btn-primary">Ajouter</button>
                    </div>
                    <div class="col-sm-2 ">
                        <button class="btn btn-warning">Annuler</button>
                    </div>
                </div>

            </form>
        </div>
        <div class="panel-footer">
        </div>
        <script src="js/autorisations.js"></script>
    </div>
</div>
</body>
</html>