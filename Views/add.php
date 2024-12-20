<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/styles.css">
    <title>Game Collection - Profil</title>
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
        <div id="content">
            <h1>Ajouter un jeu a sa bibliothèque</h1>
            <p>Le jeu que vous souhaiter ajouter n'existe pas ! Vous pouvez le créer, celui-ci sera automatiquement ajouter a votre bibliothèque !</p>
            <form>
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
                    <input type="checkbox" name="release" id="release" required>
                    <label for="">PC</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="release" id="release" required>
                    <label for="">PS4</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="release" id="release" required>
                    <label for="">Xbox</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="release" id="release" required>
                    <label for="">Nintendo Switch</label>
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
 