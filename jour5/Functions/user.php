<?php
    include "../Classes/Database.php";

    session_start();
    $pdo = new Database();

    $content = trim(file_get_contents("php://input"));

    $data = json_decode($content, true);
    
    $sql = "SELECT * FROM utilisateurs";

    $req = $pdo->bdd->prepare($sql);
    $req->execute();
    $res = $req->fetchall(PDO::FETCH_ASSOC);

    echo json_encode($res);
?>