$(function(){
    $("#connexion_form").validate(
        {
            rules:{
                email_per: {
                    required: true,
                    email: true
                },
                password: "required"
            },
            messages:{
                email_per: {
                    required: "Votre email est indispensable",
                    email: "Votre email doit avoir le format suivant xx@xx.xx"
                },
                password: "Veuillez saisir votre mot de passe",
            },
            submitHandler: function(form){
                console.log("test");
                $.post(
                    "./json/login.json.php?_="+Date(),
                    {
                        email_per:$("#email_per").val(),
                        password_per:$("#password_per").val()
                    },
                    function(data,status){
                        if(data.message){
                            console.log(data.message.texte)
                            message(data.message.texte,data.message.type);
                        }
                        if(data.response){
                            //message("logué","success");
                            window.location.href= "index.php"
                            //window.location.assign("index.php");
                        }
                    },
                    'json'
                )
            }
        }
    );

});
