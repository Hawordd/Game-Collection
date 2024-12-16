<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/styles.css">
    <title>Game Collection - Bibliothèque</title>
</head>
<body>
    <header>
        <a href=""><img src="../Assets/Images/logo.png" alt="Logo"></a>
        <ul>
            <li><a href="">Ma bibliothèque</a></li>
            <li><a href="">Ajouter un jeu</a></li>
            <li><a href="">Classement</a></li>
            <li><a href="">Profil</a></li>
        </ul>
    </header>
    <main>
        <div id="search-game">
            <h1>Ajouter un jeu à sa bibliothèque</h1>
            <form method="post">
                <input type="text" name="search" id="search" placeholder="Rechercher un jeu" required>
                <button type="submit">Rechercher</button>
            </form>
        </div>
        <div id="my-games">
            <h1>Mes jeux</h1>
            <div id="games-list">
                <article class="game">
                    <img src="../Assets/Images/zelda.png" alt="jeu">
                    <div>
                        <div>
                            <h2>Nom du jeu</h2>
                            <h3>10h</h3>
                        </div>
                        <p>Platforme1 Platformee2 Platform3 Platform4</p>
                    </div>
                </article>
                <article class="game">
                    <img src="../Assets/Images/zelda.png" alt="jeu">
                    <div>
                        <div>
                            <h2>Nom du jeu</h2>
                            <h3>10h</h3>
                        </div>
                        <p>Platforme1 Platformee2 Platform3 Platform4</p>
                    </div>
                </article>
                <article class="game">
                    <img src="../Assets/Images/zelda.png" alt="jeu">
                    <div>
                        <div>
                            <h2>Nom du jeu</h2>
                            <h3>10h</h3>
                        </div>
                        <p>Platforme1 Platformee2 Platform3 Platform4</p>
                    </div>
                </article>
                <article class="game">
                    <img src="../Assets/Images/zelda.png" alt="jeu">
                    <div>
                        <div>
                            <h2>Nom du jeu</h2>
                            <h3>10h</h3>
                        </div>
                        <p>Platforme1 Platformee2 Platform3 Platform4</p>
                    </div>
                </article>
            </div>
        </div>
    </main>
    <footer>
        <p>Game Collection - 2024 - Tous droits réservés</p>
    </footer>
</body>
</html>