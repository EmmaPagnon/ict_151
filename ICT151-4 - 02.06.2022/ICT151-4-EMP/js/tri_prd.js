$(function(){

    
    $(".add_cat").change(function(){

       // Etape 1
       console.log("id_prd = "+$(this).attr('id_prd'));
       console.log("id_cat = "+$(this).val());
       
        //Etape 2
        $.post(
            "./json/add_cat_prd.json.php",
            {
                id_cat: $(this).val(),
                id_prd: $(this).attr('id_prd')
            },
            
            //Etape 3
            function add_cat(data,status){
                $("#cat_prd_"+data.id_prd).append('<button id="cat_prd_'+data.id_cat+'_'+data.id_prd+'" class="btn btn-xs btn-warning del_cat" id_prd ="'+data.id_prd+'" id_cat ="'+data.id_cat+'" >X</button>'+data.new_cat+'<br>');
            }
        )
        });

	// Problème 1 et 3

    $(".del_cat").click(function(){
        id_cat= $(this).attr("id_cat")
        id_prd= $(this).attr("id_prd")

        if($(this).is(":checked")){

            active=1;

        }else{

            active=0;

        }

        active= $(this).is(":checked");

        $.post(
            "./json/del_cat_prd.json.php",
            {
                id_prd : id_prd,
                id_cat : id_cat,
                check:active

            }
        );
        console.log("id_prd " +id_prd);
        console.log("id_cat " +id_cat);

    });
    
});