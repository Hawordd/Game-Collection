<?php

session_start();

$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, '?');

if (!isset($_SESSION['id']) && $request !== '/login' && $request !== '/register') {
    header('Location: /login');
    exit();
}

$routes = [
    '/' => 'Views/home.php',
    '/index' => 'Views/home.php',
    '/home' => 'Views/home.php',
    '/library' => 'Views/library.php',
    '/profil' => 'Views/profil.php',
    '/scoreboard' => 'Views/scoreboard.php',
    '/edit' => 'Views/edit.php',
    '/add' => 'Views/add.php',
    '/login' => 'Views/login.php',
    '/register' => 'Views/register.php',
    '/disconnect' => 'Views/disconnect.php',
    '/404' => 'Views/404.html'
];

if (array_key_exists($request, $routes)) {
    include $routes[$request];
} elseif (isset($_GET['game_id'])) {
    $game_id = $_GET['game_id'];
    include 'Views/edit.php';
} else {
    http_response_code(404);
    header('Location: /404');
}
?>