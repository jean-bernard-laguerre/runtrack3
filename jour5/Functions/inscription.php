<?php
    include "../Classes/User.php";
    $message = [];

    function testPassword($pass){

        /* Conditions du mot de passe avec regex et message d'erreur  */
        $conditions = [ ["Doit contenir au moins une lettre majuscule.", '/[A-Z]/'],
                        ["Doit contenir au moins une lettre minuscule.", '/[a-z]/'],
                        ["Doit contenir au moins un chiffre.", '/\d/'],
                        ["Doit contenir au moins un caractère spécial.", "/[\'^£$%&*()}{@#~?><>,|=_+¬-]/"]];

        $errors = [];

        if(strlen($pass) < 8){
            array_push( $errors, "Doit avoir au moins 8 charactère" );
        }
        /* Boucle qui test chaque conditions pour le mot de passe et ajoute le message d'erreur a l'array si le test echoue */
        foreach( $conditions as $condition ){
            if( !preg_match( $condition[1], $pass )){
                array_push( $errors, $condition[0] );
            }
        }

        return $errors;
    }

    $content = trim(file_get_contents("php://input"));

    $data = json_decode($content, true);

    if (!(empty($data))){

        $email = $data["email"];
        $firstname = $data["nom"];
        $lastname = $data["prenom"];
        $password = $data["password"];

        $passtest = testPassword( $password );
        
        // Teste si les différent champs sont remplis
        $emptyField = (empty($email) || empty($firstname) || empty($lastname));        
        $invalidPassword = (empty($password) || count($passtest) > 0 );

        if (empty($email)) {
            $message["email"] = "Un email est requis pour l'inscription";
        }
        if (empty($firstname)) {
            $message["firstname"] = "Le prénom est requis pour l'inscription";
        }
        if (empty($lastname)) {
            $message["lastname"] = "Le nom est requis pour l'inscription";
        }

        if ($invalidPassword) {
            $message["password"] = $passtest;
        }
        
        if (!$emptyField && !$invalidPassword) {

            $newUser = new User($email);

            $message["success"] = $newUser->register($firstname, $lastname, $password);
        }
    }

    echo json_encode($message);
?>