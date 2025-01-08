<?php
require 'Controllers/addGameController.php';
$controller = new addGameController();
$controller->addGameRequest();
?>

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
        <div id="content">
            <h1>Ajouter un jeu a sa bibliothèque</h1>
            <p>Le jeu que vous souhaiter ajouter n'existe pas ! Vous pouvez le créer, celui-ci sera automatiquement ajouter a votre bibliothèque !</p>
            <form method="post" action="add" id="addGame">
                <input type="hidden" name="addGame" value="1">
                <div class="label">
                    <label for="name">Nom du jeu :</label>
                    <input type="text" name="name" id="name" placeholder="Non du jeu" required>
                </div>
                <div class="label">
                    <label for="editor">Éditeur du jeu :</label>
                    <input type="text" name="editor" id="editor" placeholder="Éditeur du jeu" required>
                </div>
                <div class="label">
                    <label for="release">Sortie du jeu :</label>
                    <input type="date" name="release" id="release" required>
                </div>
                <h3>Platformes</h3>
                <div class="checkbox">
                    <input type="checkbox" name="platforms[]" value="1" id="1">
                    <label for="1">PC</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="platforms[]" value="4" id="4">
                    <label for="4">PS4</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="platforms[]" value="3" id="3">
                    <label for="3">Xbox</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="platforms[]" value="2" id="2">
                    <label for="2">Nintendo Switch</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="platforms[]" value="5" id="5">
                    <label for="5">Mobile</label>
                </div>
                <div class="label">
                    <label for="descr">Description du jeu :</label>
                    <input type="text" name="descr" id="descr" placeholder="Description du jeu" required>
                </div>
                <div class="label">
                    <label for="img">URL de la cover :</label>
                    <input type="url" name="img" id="img" placeholder="URL de l'Images" required>
                </div>
                <div class="label">
                    <label for="site">URL du site :</label>
                    <input type="url" name="site" id="site" placeholder="URL du site" required>
                </div>
                <button type="submit">Ajouter le jeu</button>
            </form>
        </div>
    </main>
    <footer>
        <p>Game Collection - 2024 - Tous droits réservés</p>
    </footer>
</body>
</html>
 