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
                <form>
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
                        <input type="password" name="confirm_password" id="confirm_password" required pattern=".{8,}" oninput="this.setCustomValidity(this.value != document.getElementById('password').value ? 'Les mots de passe ne correspondent pas.' : '')">
                    </div>
                    <button type="submit" class="login-button">Se connecter</button>
                </form>
                <a href="register.html">Se connecter</a>
            </div>
        </div>
    </main>
    <footer>
        <p>Game Collection - 2024 - Tous droits réservés</p>
    </footer>
</body>
</html>