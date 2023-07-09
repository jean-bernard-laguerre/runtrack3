$(document).ready(()=>{

    email = $("#email")
    password = $("#password")
    confirmPass = $("#confirm-pass")
    firstname = $("#firstname")
    lastname = $("#lastname")

    errorEmail = $("<span></span>")
    errorFirstname = $("<span></span>")
    errorLastname = $("<span></span>")
    errorPassword = $("<ul></ul>")
    errorRegister = $("<span></span>")


    confirmPass.on("input", ()=>{
        if (confirmPass.val() == password.val() && confirmPass.val().length >= 8) {
            confirmPass.addClass("correct")
        } else {
            confirmPass.removeClass("correct")
        }
    })

    $("#button").click(()=>{

        let data = {nom: lastname.val(),
                    prenom: firstname.val(),
                    email: email.val(),
                    password: password.val() }

        fetch("../Functions/inscription.php", {
            method: 'POST',
            headers: {
                'Content-Type':'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(content => {
            if (content.success){
                window.location.href = "../Pages/connection.php"
            }else {

                if (content.email){
                    errorEmail.text(content.email)
                    errorEmail.insertAfter($("#email"))
                }
                if (content.firstname){
                    errorFirstname.text(content.firstname)
                    errorFirstname.insertAfter($("#firstname"))
                }
                if (content.lastname){
                    errorLastname.text(content.lastname)
                    errorLastname.insertAfter($("#lastname"))
                }

                if (content.password){
                    errorPassword.text("")
                    for (let i = 0; i < content.password.length; i++) {
                        errorPassword.append("<li>"+ content.password[i] +"</li>")
                    }
                    errorPassword.insertAfter($("#password"))
                }

                if (!content.email && ! content.password) {
                    errorRegister.text("L'utilisateur existe déja")
                    errorRegister.insertBefore($("#email"))
                }
            }      
        })
    })
})