<?php
require("./../config/config.inc.php");
require( WAY ."/includes/autoload.inc.php");
?>
<!doctype html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <title>151</title>
      
  
      <!--- css de bootatrap -->
      <link rel="stylesheet" href="./../plugins/bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="./../plugins/bootstrap/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      
      <!--- JQuery -->
      <script src="./../plugins/jquery//jquery-3.3.1.min.js"></script>
      
      <!--- Bootstrap -->
      <script src="./../plugins/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

      <!--- JQuery validate -->
      <script src="./../plugins/jqueryValidate/jquery.validate.min.js"></script>
	
   </head>
   <body>
       
       <?php
       $prd = new Produit();
       $tab_prd = $prd->get_all_with_cat();
       //print_r($tab_prd);
       
       $cat = new Categorie();
       $tab_cat = $cat->get_all();
       //print_r($tab_cat);
       ?>
       
        <div class="container">
            
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Produits</th>
                    <th>Catégories</th>
                    <th colspan="2">Ajouter catégorie</th>
                </tr>
                <?php
                foreach($tab_prd AS $prd){
                    echo"<tr>";
                    echo "<td>".$prd['nom_prd']."</td>";
                    echo "<td>".$prd['categories']."</td>";
                    
                    echo "<td>";
                    echo "<select class=\"add_cat\">"; // insérer id_prd ici
                    echo "<td>".$prd['id_prd']."</td>";
                    echo "<option value=\"0\">Veuillez choisir</option>";
                    foreach($tab_cat AS $cat){
                        echo "<option value=".$cat['id_cat'].">".$cat['nom_cat']."</option>";
                    }
                    echo "</select>";
                    echo "</td>";
    
                    echo"</tr>";
                }
                ?>
            </table>
        </div>
       <script src="./js/tri_prd.js"></script>
   </body>
</html>