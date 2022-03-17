<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="./js/autorisations.js"></script>

    <meta charset="UTF-8">
    <title>Autorisations</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="header">
            <h3>Autorisations</h3>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Ajouter une autorisation</div>


        <div class="panel-body">
            <form id="autorisation_form" action="add_autorisation.json.php" method="post">
                <!--nom de l'autorisation-->
                <div class="form-group row">
                    <label for="nom_auto" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="nom_auto" name="nom_auto" placeholder="Nom de l'autorisation">
                    </div>
                </div>
                <!--Code de l'autorisation-->
                <div class="form-group row">
                    <label for="code_auto" class="col-sm-2 col-form-label">Abreviation de la fonction</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="code_auto" name="code_auto" placeholder="XXX">
                    </div>
                </div>
                <!--Description de l'autorisation pour un administrateur-->
                <div class="form-group row">
                    <label for="description_auto_admin" class="col-sm-2 col-form-label">Description de l'autorisation pour un administrateur</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="description_auto_admin" name="description_auto_admin" placeholder="Description">
                    </div>
                </div>
                <!--Description de l'autorisation pour un utilisateur-->
                <div class="form-group row">
                    <label for="description_auto_usr" class="col-sm-2 col-form-label">Description de l'autorisation pour un utilisateur</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="description_auto_usr" name="description_auto_usr" placeholder="Description">
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

    </div>
</div>
</body>
</html>