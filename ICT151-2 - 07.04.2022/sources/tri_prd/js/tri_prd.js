$(function(){

    $(".add_cat").change(function(){
        console.log('id_cat : '+ $(this).val());
        console.log('id_prd : '+ $(this).attr('id_prd')); // va chercher l'attribue id_prd du select dans tri_prd index


    $.post(
            "./json/add_cat_prd.json.php",
            {
                id_cat: $(this).val(),
                id_prd: $(this).attr('id_prd')

            },
            function(data,status){
                    //console.log(data.nom_cat);
                if($("#cat_prd_"+data.id_prd).html()== ""){

                    $("#cat_prd_"+data.id_prd).append(data.nom_cat);
                }else{
                    $("#cat_prd_"+data.id_prd).append("; "+data.nom_cat);

                }

            }
        )
    })

});