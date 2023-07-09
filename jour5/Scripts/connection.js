$(document).ready(()=>{

    email = $("#email")
    password = $("#password")

    errorEmail = $("<span></span>")
    errorPassword = $("<span></span>")
    errorLogin = $("<span></span>")

    $("#button").click(()=>{

        let data = {email: email.val(),
                    password: password.val() }

        fetch("../Functions/connection.php", {
            method: 'POST',
            headers: {
                'Content-Type':'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(content => {
            if (content["success"]) {
                window.location.href = "../index.php"
            } else {
                if (content.email){
                    errorEmail.text(content.email)
                    errorEmail.insertAfter($("#email"))
                }

                if (content.password){
                    errorPassword.text(content.password)
                    errorPassword.insertAfter($("#password"))
                }

                if (!content.email && ! content.password) {
                    errorLogin.text("Identifiant ou mot de passe invalide")
                    errorLogin.insertBefore($("#email"))
                }
            }
        })
    })
})