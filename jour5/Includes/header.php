<header>
    <nav>
        <div>
            <a href="index.php">Accueil</a>
        </div>
        <div>
            <?php if( empty($_SESSION) ) : ?>
                <a href="connection.php">Connexion</a>
                <a href="inscription.php">Inscription</a>
            <?php else : ?>
                <a href="logout.php">Déconnexion</a>
            <?php endif ?>
        </div>
    </nav>
</header>