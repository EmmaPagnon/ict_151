$(function (){
    $("#autorisation_form").validate({
            rules: {

                nom_auto: {
                    required: true,
                    minlength: 5

                },
                code_auto: {
                    required: true,
                    minlength: 3

                },
                description_auto_admin: {
                    required: true,
                    minlength: 20

                },
                description_auto_usr: {
                    required: true,
                    minlength: 20

                }
            },
            messages: {
                nom_auto: {
                    required: "Un nom d'autorisation est indispensable",
                    minlength: "Le nom d'autorisation doit être composé de 5 caractères au minimum"
                },
                code_auto: {
                    required: "Une abréviation d'autorisation est indispensable",
                    minlength: "L'abréviation d'autorisation doit être composé de 3 à 4 caractères"
                },
                description_auto_admin: {
                    required: "Une description d'autorisation est indispensable",
                    minlength: "La description d'autorisation administrateur doit être composé de 20 caractères au minimum"
                },
                description_auto_usr: {
                    required: "Une description d'autorisation est indispensable",
                    minlength: "La description d'autorisation utilisateur doit être composé de 20 caractères au minimum"
                }
            },
            submitHandler: function(form){
                console.log("formulaire envoyé");
            }
        }
    );
});