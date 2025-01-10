<?php
require_once 'Controllers/profilController.php';
$controller = new ProfilController();
$controller->profilRequest();
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
            <h1>Mon profil</h1>
            <form>
                <div class="label">
                    <label for="name">Nom :</label>
                    <input type="text" name="name" id="name" value="<?php echo $controller->getNom() ?>" required>
                </div>
                <div class="label">
                    <label for="surname">Prénom :</label>
                    <input type="text" name="surname" id="surname" value="<?php echo $controller->getPrenom() ?>" required>
                </div>
                <div class="label">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" value="<?php echo $controller->getEmail() ?>" required>
                </div>
                <div class="label">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="label">
                    <label for="confirm_password">Confirmez le mot de passe :</label>
                    <input type="password" name="confirm_password" id="confirm_password" required pattern=".{8,}" oninput="this.setCustomValidity(this.value != document.getElementById('password').value ? 'Les mots de passe ne correspondent pas.' : '')">
                </div>
                <input type="hidden" name="updateProfil">
                <button type="submit">Modifier</button>
                
            </form>
            <form action="">
                <input type="hidden" name="updateProfil">
                <button type="submit">Supprimer mon compte</button>
            </form>
            <form action="/disconnect" method="post">
                <button type="submit">Se déconnecter</button>
            </form>
        </div>
        <?php if ($controller->errorMessage): ?>
                <p><?php echo $controller->errorMessage; ?></p>
        <?php endif; ?>
        <?php if ($controller->validationMessage): ?>
                <p><?php echo $controller->validationMessage; ?></p>
        <?php endif; ?>
    </main>
    <footer>
        <p>Game Collection - 2024 - Tous droits réservés</p>
    </footer>
</body>
</html>