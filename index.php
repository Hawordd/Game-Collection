<?php
    $db = new PDO('mysql:host=localhost;dbname=................;charset=utf8', 'root', '');

    require_once 'Models/Game.php';
    $gameModel = new Game($db);
    require_once 'Models/User.php';
    $userModel = new User($db);

    require_once 'Controllers/GameController.php';
    $articleController = new ArticleController($articleModel);

    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    if ($page == 'home') {
        $articleController->showArticles($word);
    } else if (preg_match('(\d+)', $page, $matches)) {
        $articleController->showArticle($page);
    }
?>