    <header>
        <a href="/"><img src="../Assets/Images/logo.png" alt="Logo"></a>
        <ul>
            <li><a href="library">Ma bibliothèque</a></li>
            <li><a href="add">Ajouter un jeu</a></li>
            <li><a href="scoreboard">Classement</a></li>
            <?php if (isset($_SESSION['id'])) : ?>
                <li><a href="profil">Profil</a></li>
            <?php else : ?>
                <li><a href="login">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </header>