<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/styles.css">
    <title>Game Collection - Profil</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div id="content-row">
            <div id="game-info">
                <h1>{Game name}</h1>
                <p>Description</p>
                <p>Temps passés : XXh</p>
                <form method="post">
                    <h1>Ajouter le temps passés sur le jeu</h1>
                    <div class="label">
                        <label for="time">Temps passés sur le jeu :</label>
                        <input type="text" pattern="\d*" name="time" id="time" placeholder="Temps de jeu" required>
                    </div>
                    <button type="submit">Ajouter</button>
                </form>
                <form method="post">
                    <button type="submit">Supprimer le jeu de ma bibliothèque</button>
                </form>
            </div>
            <img src="../Assets/Images/zelda.png" alt="img game">
        </div>
    </main>
    <footer>
        <p>Game Collection - 2024 - Tous droits réservés</p>
    </footer>
</body>
</html>