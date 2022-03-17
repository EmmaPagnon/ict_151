$(function (){
    $("#fonction_form").validate({
            rules: {

                nom_fct: {
                    required: true,
                    minlength: 5

                },
                abr_fct: {
                    required: true,
                    minlength: 2

                },
                description_fct: {
                    required: true,
                    minlength: 20

                }
            },
            messages: {
                nom_fct: {
                    required: "Un nom de fonction est indispensable",
                    minlength: "Le nom de la fonction doit être composé de 5 caractères au minimum"
                },
                abr_fct: {
                    required: "Une abréviation de fonction est indispensable",
                    minlength: "L'abréviation de la fonction doit être composé de 2 caractères"
                },
                description_fct: {
                    required: "Une description de fonction est indispensable",
                    minlength: "La description de la fonction doit être composé de 20 caractères au minimum"
                }
            },
            submitHandler: function(form){
                console.log("formulaire envoyé");
            }
        }
    );
});