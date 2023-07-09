<?php

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../Scripts/inscription.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <title>Module de connexion - Inscription</title>
</head>
<body>
    <?php include "../includes/header.php" ?>
    <main>
        <div class="form-container">
            <h2>Creation de compte</h2>
            <form action="" method="POST">
                <div class="info-container">
                    <input type="email" id="email" placeholder="Email" required>
                    <input type="text" id="lastname" placeholder="Nom" required>
                    <input type="text" id="firstname" placeholder="Prénom" required>
                </div>
                <div class="pass-container">
                    <input type="password" id="password" placeholder="Mot de passe" required>
                    <input type="password" id="confirm-pass" placeholder="Confirmer mot de passe" required>
                </div>
                <button type="button" id="button">Inscription</button>
            </form>
        </div>
    </main>
    <?php include "../includes/footer.php" ?>
</body>
</html>