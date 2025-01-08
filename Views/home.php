<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/styles.css">
    <title>Game Collection</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div id="banner">
            <img src="../Assets/Images/banner.jpg" alt="banner">
            <div>
                <?php if (isset($_SESSION['prenom'])): ?>
                    <h2>Salut <?php echo $_SESSION['prenom']; ?> !</h2>
                <?php else: ?>
                    <h2>Salut !</h2>
                <?php endif; ?>
                <h2>Prêt à ajouter des</h2>
                <h2>jeux à ta collection ?</h2>
            </div>
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