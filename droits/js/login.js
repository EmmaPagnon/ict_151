$(function (){

    $("#connexion_form").validate(
        {
            debug: true,
            rules: {
                email_per: {
                    required: true,
                    email: true
                },
                password: "required"
            },

            messages: {
                email_per: {
                    required: "Votre adresse e-mail est indispensable à la connexion",
                    email: "Votre adresse e-mail doit avoir le format suivant : name.@domain.com"
                },
                password: "Veuillez saisir votre mot de passe",
            },
            submitHandler: function(form){
                $.post(
                    "./json/login.json.php?_="+Date(),
                    {
                        email_per: $("#email_per").val(),
                        password_per: $("#password_per").val()
                    },
                    function(data, status){
                        console.log("test");
                        if(data.message){
                            console.log(data.message.texte);
                            message(data.message.texte, data.message.type);
                        }
                        if(data.response === true){
                            message("logué", "success");
                            window.location.assign("index.php");
                        }
                    },
                    'json'
                )
            }
        }


    )


})