    <header>
        <a href="/"><img src="../Assets/Images/logo.png" alt="Logo"></a>
        <ul>
            <li><a href="/">Ma bibliothèque</a></li>
            <li><a href="/library">Ajouter un jeu</a></li>
            <li><a href="/scoreboard">Classement</a></li>
            <?php if (isset($_SESSION['id'])) : ?>
                <li><a href="/profil">Profil</a></li>
            <?php else : ?>
                <li><a href="/login">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </header>