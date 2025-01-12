<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/styles.css">
    <title>Game Collection</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <div id="banner">
            <img src="../Assets/Images/banner.jpg" alt="banner">
            <div>
                <?php if (isset($_SESSION['prenom'])): ?>
                    <h2>Salut <?php echo $_SESSION['prenom']; ?> !</h2>
                <?php else: ?>
                    <h2>Salut !</h2>
                <?php endif; ?>
                <h2>Prêt à ajouter des</h2>
                <h2>jeux à ta collection ?</h2>
            </div>
        </div>
        <?php include 'gameList.php'; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>