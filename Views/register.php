<?php
require 'Controllers/registerController.php';
$controller = new registerController();
$controller->registerRequest();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Assets/styles.css">
    <title>Game Collection - Register</title>
</head>
<body>
<main>
    <div id="log-page">
        <div id="log-form">
            <h1>Inscription</h1>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registerUser']) && $controller->errorMessage): ?>
                <p class="error-message"><?php echo $controller->errorMessage; ?></p>
            <?php endif; ?>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registerUser']) && $controller->validationMessage): ?>
                <p class="validation-message"><?php echo $controller->validationMessage; ?></p>
            <?php endif; ?>
            <form method="post" action="register" id="registerUser">
                <input type="hidden" name="registerUser" value="1">
                <div class="label">
                    <label for="name">Nom :</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="label">
                    <label for="surname">Prénom :</label>
                    <input type="text" name="surname" id="surname" required>
                </div>
                <div class="label">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="label">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="label">
                    <label for="confirm_password">Confirmez le mot de passe :</label>
                    <input type="password" name="confirm_password" id="confirm_password" required pattern=".{8,}">
                </div>
                <button type="submit" class="login-button">S'inscrire</button>
            </form>
            <a href="login">Se connecter</a>
        </div>
    </div>
</main>
<footer>
    <p>Game Collection - 2024 - Tous droits réservés</p>
</footer>
</body>
</html>