<?php

    include "../Classes/User.php";
    $message = [];

    $content = trim(file_get_contents("php://input"));

    $data = json_decode($content, true);

    if (!(empty($data))){

        $invalidEmail = (empty($data["email"]));
        $invalidPassword = (empty($data["password"]));

        if ($invalidEmail) {
            $message["email"] = "Entrer email";
        }
        if ($invalidPassword) {
            $message["password"] = "Entrer mot de passe";
        }
        

        if (!$invalidEmail && !$invalidPassword) {

            $email = $data["email"];
            $password = $data["password"];

            $logUser = new User($email);

            $message["success"] = $logUser->connect($password);
        }
    }

    echo json_encode($message);
?>