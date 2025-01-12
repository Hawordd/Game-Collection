<?php
require_once 'Controllers/gameController.php';

$controller = new gameController();
$gameDetails = $controller->getGameInfos($_GET['game_id']);
$playtime = $controller->getPlaytime($_GET['game_id']);
$controller->updatePlaytimeRequest();
$controller->deleteGameFromUserRequest();

if (!$gameDetails) {
    header('Location: /404');
    exit();
}

$gameId = $gameDetails['id_jeux'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/styles.css">
    <title>Game Collection - <?php echo htmlspecialchars($gameDetails['nom_jeux']); ?></title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div id="content-row">
            <div id="game-info">
                <h1><?php echo htmlspecialchars($gameDetails['nom_jeux']); ?></h1>
                <p><?php echo htmlspecialchars($gameDetails['desc_jeux']); ?></p>
                <p>Temps passé sur le jeu : <?php echo htmlspecialchars($playtime)?> h</p>
                <form method="post" id="updatePlaytime">
                    <h1>Ajouter le temps passés sur le jeu</h1>
                    <div class="label">
                        <label for="time">Temps passés sur le jeu :</label>
                        <input type="hidden" name="game_id" value="<?php echo $gameId; ?>">
                        <input type="text" pattern="\d*" name="time" id="time" placeholder="Temps de jeu" required>
                    </div>
                    <button type="submit" name="updatePlaytime">Ajouter</button>
                </form>
                <form method="post" id="deleteGameFromUser">
                    <input type="hidden" name="game_id" value="<?php echo $gameId; ?>">
                    <button type="submit" name="deleteGameFromUser">Supprimer le jeu de ma bibliothèque</button>
                </form>
            </div>
            <img src="<?php echo $gameDetails['url_couverture_jeux'] ?>" alt="img game">
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>