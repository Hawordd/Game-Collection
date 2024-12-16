<?php

namespace DBConfig;

require 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Config
{
    private static array $settings;

    public function __construct()
    {
        self::$settings = [
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD']
        ];
    }

    public static function get($key)
    {
        return self::$settings[$key] ?? null;
    }
}