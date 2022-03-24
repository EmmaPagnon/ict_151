$(function (){
    $("#fonction_form").validate({
            rules: {

                nom_fnc: {
                    required: true,
                    minlength: 5

                },
                abr_fnc: {
                    required: true,
                    minlength: 2

                },
                desc_fnc: {
                    required: true,
                    minlength: 20

                }
            },
            messages: {
                nom_fnc: {
                    required: "Un nom de fonction est indispensable",
                    minlength: "Le nom de la fonction doit être composé de 5 caractères au minimum"
                },
                abr_fnc: {
                    required: "Une abréviation de fonction est indispensable",
                    minlength: "L'abréviation de la fonction doit être composé de 2 caractères"
                },
                desc_fnc: {
                    required: "Une description de fonction est indispensable",
                    minlength: "La description de la fonction doit être composé de 20 caractères au minimum"
                }
            },
            submitHandler: function(form){
                console.log("formulaire envoyé");


                $.post(

                    // passer des arguments avec "?_"
                    "./json/add_fonction.json.php?_="+Date.now(),
                    {
                        nom_fnc : $("#nom_fnc").val(),
                        abr_fnc : $("#abr_fnc").val(),
                        desc_fnc : $("#desc_fnc").val()

                    },
                    function result(data, status){
                        $("#alert .message").html(data.message.texte);
                        $("#alert").attr("class","alert");
                        $("#alert").addClass("alert-"+data.message.type);
                        $("#alert").css("display","block");
                    }
                )

            }
        }
    );
});