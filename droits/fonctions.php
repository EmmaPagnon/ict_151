<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="./js/fonctions.js"></script>

    <meta charset="UTF-8">
    <title>Fonctions</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="header">
            <h3>Fonctions</h3>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Ajouter une fonction</div>


        <div class="panel-body">
            <form id="fonction_form" action="add_fonction.json.php" method="post">
                <!--nom-->
                <div class="form-group row">
                    <label for="nom_fct" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="nom_fct" name="nom_fct" placeholder="Nom de la fonction">
                    </div>
                </div>
                <!--Abréviation de la fonction-->
                <div class="form-group row">
                    <label for="abr_fct" class="col-sm-2 col-form-label">Abreviation de la fonction</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="abr_fct" name="abr_fct" placeholder="Abreviation">
                    </div>
                </div>
                <!--Description de la fonction-->
                <div class="form-group row">
                    <label for="description_fct" class="col-sm-2 col-form-label">Description de la fonction</label>
                    <div class="col-sm-10">
                        <input  type="text" class="form-control" id="description_fct" name="description_fct" placeholder="Description">
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