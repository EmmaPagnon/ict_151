<!doctype html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>151</title>
      
  
      <!--- css de bootatrap -->
      <link rel="stylesheet" href="./plugins/bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="./plugins/bootstrap/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      
      <!--- JQuery -->
      <script src="./plugins/jquery//jquery-3.3.1.min.js"></script>
      
      <!--- Bootstrap -->
      <script src="./plugins/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

      <!--- JQuery validate -->
      <script src="./plugins/jqueryValidate/jquery.validate.min.js"></script>
	
   </head>
   <body>
       
               
        <script>
          
        </script>
       
      <div class="container">
       
        
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a class="navbar-brand" href="">Test 151 3 - Jquery/JSon</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
               
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
          
          <div class="panel panel-primary">
             <div class="panel-heading">
                Ajout d'un produit
             </div>
          
         
             <div class="panel-body">
                <form id="add_prd_form" action="check.php" method="post">
                   <!-- Nom -->
                   <div class="form-group row">
                      <label for="nom_prd" class="col-sm-2 col-form-label">Nom</label>
                      <div class="col-sm-10">
                         <input type="text" class="form-control" id="nom_prd" name="nom_prd" placeholder="Nom du produit">
                      </div>
                   </div>
                   
                   <!-- Catégorie -->
                   <div class="form-group row">
                     <label for="cat_prd" class="col-sm-2 col-form-label">Catégorie</label>
                     <div class="col-sm-10">
                        <select class="form-control" id="cat_prd" name="cat_prd" >
                             <option valu="1">Catégorie 1</option>
                             <option valu="2">Catégorie 2</option>
                             <option valu="3">Catégorie 3</option>
                        </select>
                     </div>
                  </div>
                  
                  <!-- Url -->
                  <div class="form-group row">
                     <label for="description_prd" class="col-sm-2 col-form-label">Description</label>
                     <div class="col-sm-10">
                         <textarea class="form-control" name="description_prd" id="description_prd"></textarea>
                     </div>
                  </div>
                  
                  <!-- Prix -->
                  <div class="form-group row">
                     <label for="prix_prd" class="col-sm-2 col-form-label">Prix</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="prix_prd"  name="prix_prd" placeholder="Prix">
                     </div>
                  </div>
                  
                  <!-- Site web -->
                  <div class="form-group row">
                     <label for="url_fab" class="col-sm-2 col-form-label">Site web du fabricant</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="url_fab"  name="url_fab" placeholder="Site web du fabricant">
                     </div>
                  </div>
                  
                  
                  <!-- En stock -->
                  <div class="form-group row">
                     <div class="col-sm-offset-2 checkbox">
                        <label class="col-sm-10 col-form-label">
                           <input type="checkbox" value="1" checked id="stock_prd"  name="stock_prd" >En stock
                        </label>
                     </div>
                  </div>
                  
                  <!-- Bouton submit et reset -->
                  <div class="form-group row">
                     <div class="col-sm-offset-8 col-sm-2">
                        <input type="submit" class="form-control btn btn-primary submit" id="submit_conf" value="Ajouter">
                     </div>
                     <div class="col-sm-2">
                        <input type="reset" class="form-control btn btn-warning" id="reset_conf" value="Annuler">
                     </div>
                  </div>
               </form>
            </div>
             
            <div class="panel-footer">
         
            </div>
          </div>
       </div>
       <script src="./js/produit.js"></script>
   </body>
</html>