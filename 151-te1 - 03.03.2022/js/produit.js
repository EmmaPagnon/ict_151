$(function(){
  
   $("#add_prd_form").validate(
      {
         rules: {
            nom_prd:{
               required: true,
               minlength: 5
            },
            description_prd:{
               required: true,
               minlength: 20
            },
            prix_prd: {
               required: true,
               number:true
            },
            url_fab:{
               required: true,
               url: true
            }
         },
         messages:{
            nom_prd: {
               required: "Le nom du produit est indispensable",
               minlength: "Le nom du produit doit être composé de 5 caractères au minimum"
            },
            description_prd: {
               required: "La description du produit est indispensable",
               minlength: "La description du produit doit être composé de 20 caractères au minimum"
            },
            prix_prd: {
               required: "Le prix du produit est indispensable",
               number: "Veuillez saisir un prix valide"
            },
            url_fab:{
               required: "Le site du fabricant du produit est indispensable",
               url:"L'URL doit être valide"
            }
         },
         submitHandler: function(form) {
            console.log("formulaire envoyé");
            
            if($('#stock_prd').is(':checked')) {
                var stock_prd = 1;
            }else{
                var stock_prd = 0;
            }
            
            $.post(
               "./json/add_produit.json.php?_="+Date.now(),
               {
                  nom_prd:$("#nom_prd").val(),
                  cat_prd:$("#cat_prd").val(),
                  description_prd:$("#description_prd").val(),
                  prix_prd:$("#prix_prd").val(),
                  url_prd:$("#url_prd").val(),
                  stock_prd:stock_prd
               }
            );
         }
      }
   );
});