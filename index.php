<?php
    $request = $_SERVER['REQUEST_URI'];

    $request = strtok($request, '?');

    $routes = [
        '/' => './Views/home.php',
        '/index' => 'Views/home.php',
        '/home' => 'Views/home.php',
        '/librairy' => 'Views/librairy.php',
        '/profil' => 'Views/profil.php',
        '/scoreboard' => 'Views/scoreboard.php',
        '/edit' => 'Views/edit.php',
        '/add' => 'Views/add.php',
        '/login' => './Views/login.php',
        '/register' => 'Views/register.php',
        '/404' => 'Views/404.html'
    ];

    if (array_key_exists($request, $routes)) {
        include $routes[$request];
    } else {
        http_response_code(404);
        header('Location: /404');
    }
?>