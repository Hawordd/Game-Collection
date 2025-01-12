<?php
require 'Controllers/scoreboardController.php';
$controller = new scoreboardController();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/styles.css">
    <title>Game Collection - Classement</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div id="content">
            <h1>Classement des temps passés</h1>
            <table>
                <tr>
                    <th>Joueur</th>
                    <th>Temps passés</th>
                    <th>Jeu favori</th>
                </tr>
                <?php foreach($controller->getUserScoreboard() as $line): ?>
                    <tr>
                        <td><?php echo $line['Joueur'] ?></td>
                        <td><?php echo $line['Temps total passé'] ?></td>
                        <td><?php echo $line['Jeu favori'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>