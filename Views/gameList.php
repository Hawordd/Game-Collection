<?php
require 'Controllers/gameListController.php';
$controller = new gameListController();
if(isset($_SESSION['id'])) {
    $games = $controller->getUserGames($_SESSION['id']);
}
?>
<div id="my-games">
    <h1>Mes jeux</h1>
    <div id="games-list">
        <?php if (empty($games)): ?>
            <p>Vous n'avez pas encore ajouté de jeux.</p>
            <form action="library">
                <button type="submit">Ajouter un jeu</button>
            </form>
        <?php else: ?>
            <?php foreach ($games as $game): ?>
                <?php
                $gameInfos = $controller->getGameInfos($game);
                $playtime = $controller->getPlaytime($game, $_SESSION['id']);
                $platforms = $controller->getGamePlatforms($game);
                ?>
                <article class="game">
                    <img src="<?php echo $gameInfos['url_couverture_jeux'] ?>" alt="jeu">
                    <div>
                        <div>
                            <h2><?php echo $gameInfos['nom_jeux'] ?></h2>
                            <?php if($playtime !== -1): ?>
                                <h3><?php echo $playtime . 'H' ?></h3>
                                <?php endif; ?>
                        </div>
                        <p><?php echo implode(' ', $platforms); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>