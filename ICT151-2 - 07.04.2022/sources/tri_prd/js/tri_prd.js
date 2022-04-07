$(function(){

    $("#add_cat_form").validate(
        {
            rules: {
                id_cat:{
                    required: true,
                },
                id_prd:{
                    required: true,
                }
            },
            messages:{
                nom_prd: {
                    required: ""
                },
                description_prd: {
                    required: ""
                }
            },
            submitHandler: function(form) {
                console.log("formulaire envoyé");

                if($('#add_act').html) {
                    var add_cat = 1;
                }else{
                    var add_cat = 0;
                }

                $.post(
                    "./json/add_cat_prd.json.php?_="+Date.now(),
                    {
                        id_cat:$("#id_cat").val(),
                        id_prd:$("#id_prd").val(),
                        add_cat:add_cat
                    }
                );
            }
        }
    );
});