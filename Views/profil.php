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
            <?php if ($controller->errorMessage): ?>
                <div class="error">
                    <p><?php echo $controller->errorMessage; ?></p>
                </div>
            <?php endif; ?>
            <?php if ($controller->validationMessage): ?>
                <div class="validation">
                    <p><?php echo $controller->validationMessage; ?></p>
                </div>
            <?php endif; ?>
            <form method="post">
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
            <?php if (isset($_POST['askForDeleteProfil'])): ?>
                <p>Êtes-vous sûr de vouloir supprimer définitivement votre compte ?</p>
            <?php endif; ?>
            <form method="post">
                <input type="hidden" name="<?php echo isset($_POST['askForDeleteProfil']) ? "deleteProfil" : "askForDeleteProfil"; ?>">
                <button type="submit">
                    <?php echo isset($_POST['askForDeleteProfil']) ? "Confirmer" : "Supprimer mon compte"; ?>
                </button>
            </form>
            <form action="/disconnect" method="post">
                <button type="submit">Se déconnecter</button>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
