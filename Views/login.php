<?php
require 'Controllers/loginController.php';
$controller = new loginController();
$controller->loginRequest();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/styles.css">
    <title>Game Collection - Login</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div id="log-page">
            <div id="log-form">
                <h1>Se connecter à Game Collection</h1>
                <form method="post" action="login" id="loginUser">
                    <input type="hidden" name="loginUser" value="1">
                    <div class="label">
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="label">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button type="submit" class="login-button">Se connecter</button>
                </form>
                <a href="register">S'inscire</a>
            </div>
        </div>
    </main>
    <footer>
        <p>Game Collection - 2024 - Tous droits réservés</p>
    </footer>
</body>
</html>