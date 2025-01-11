<?php
require_once 'Controllers/libraryController.php';
$controller = new libraryController();
$controller->addGameToUserRequest();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/styles.css">
    <title>Game Collection - Bibliothèque</title>
</head>
<body>
<?php include 'header.php'; ?>
<main>
    <div id="search-game">
        <h1>Ajouter un jeu à sa bibliothèque</h1>
        <form method="post">
            <input type="text" name="search" id="search" placeholder="Rechercher un jeu" required>
            <button type="submit">Rechercher</button>
        </form>
    </div>
    <div id="my-games">
        <h1>Ajouter un jeu à sa bibliothèque</h1>
        <div id="games-list">
            <?php
            require_once 'Controllers/libraryController.php';
            $controller = new libraryController();
            $games = $controller->getAllGamesNotOwnedByUser();
            foreach ($games as $game):
                $gameInfos = $controller->getGameInfos($game['id_jeux']);
                $platforms = $controller->getGamePlatforms($game['id_jeux']);
                ?>
                <article class="game">
                    <img src="<?php echo $gameInfos['url_couverture_jeux'] ?>" alt="jeu">
                    <div>
                        <div>
                            <h2><?php echo $gameInfos['nom_jeux'] ?></h2>
                        </div>
                        <p><?php echo implode(' ', $platforms); ?></p>
                        <form method="post" action="library">
                            <input type="hidden" name="game_id" value="<?php echo $game['id_jeux'] ?>">
                            <button type="submit">Ajouter à ma librairie</button>
                        </form>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<footer>
    <p>Game Collection - 2024 - Tous droits réservés</p>
</footer>
</body>
</html>