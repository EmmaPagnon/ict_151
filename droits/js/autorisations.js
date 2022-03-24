$(function (){
    $("#autorisation_form").validate({
            rules: {

                nom_aut: {
                    required: true,
                    minlength: 5

                },
                code_aut: {
                    required: true,
                    minlength: 3

                },
                description_aut_admin: {
                    required: true,
                    minlength: 20

                },
                description_aut_usr: {
                    required: true,
                    minlength: 20

                }
            },
            messages: {
                nom_aut: {
                    required: "Un nom d'autorisation est indispensable",
                    minlength: "Le nom d'autorisation doit être composé de 5 caractères au minimum"
                },
                code_aut: {
                    required: "Une abréviation d'autorisation est indispensable",
                    minlength: "L'abréviation d'autorisation doit être composé de 3 à 4 caractères"
                },
                description_aut_admin: {
                    required: "Une description d'autorisation est indispensable",
                    minlength: "La description d'autorisation administrateur doit être composé de 20 caractères au minimum"
                },
                description_aut_usr: {
                    required: "Une description d'autorisation est indispensable",
                    minlength: "La description d'autorisation utilisateur doit être composé de 20 caractères au minimum"
                }
            },
            submitHandler: function(form){
                console.log("formulaire envoyé");


                $.post(

                    // passer des arguments avec "?_"
                    "./json/add_fonction.json.php?_="+Date.now(),
                    {
                        nom_aut : $("#nom_aut").val(),
                        code_aut : $("#code_aut").val(),
                        description_aut_admin : $("#description_auto_admin").val(),
                        description_aut_usr : $("#description_auto_usr").val()

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