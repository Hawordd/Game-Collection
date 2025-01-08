    <header>
        <a href="/"><img src="../Assets/Images/logo.png" alt="Logo"></a>
        <ul>
            <li><a href="library">Ma bibliothèque</a></li>
            <li><a href="add">Ajouter un jeu</a></li>
            <li><a href="scoreboard">Classement</a></li>
            <?php if (isset($_SESSION['email'])) : ?>
                <li><a href="disconnect">Déconnexion</a></li>
            <?php else : ?>
                <li><a href="login">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </header>