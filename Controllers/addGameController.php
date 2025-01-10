<?php

use Models\GameModel;

require_once 'Models/gameModel.php';

class addGameController
{
    private GameModel $model;
    public string $errorMessage = '';

    public function __construct()
    {
        $this->model = new GameModel();
    }

    public function addGameRequest(): void
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['addGame'])) {
                $exist = $this->model->getGameName($_POST['name']);
                if ($exist) {
                    $this->errorMessage = 'Ce jeu existe déjà.';
                    return;
                }
                $nom = $_POST['name'] ?? null;
                $editeur = $_POST['editor'] ?? null;
                $date_sortie = $_POST['release'] ?? null;
                $url_img = $_POST['img'] ?? null;
                $url_jeu = $_POST['site'] ?? null;
                $desc_jeu = $_POST['descr'] ?? null;
                $platforms = $_POST['platforms'] ?? [];

                if ($nom && $editeur && $date_sortie && $url_img && $url_jeu && $desc_jeu) {
                    $this->model->addGame($nom, $editeur, $date_sortie, $url_img, $url_jeu, $desc_jeu, $platforms);
                    header('Location: /library');
                    exit();
                } else {
                    $this->errorMessage = 'Tous les champs sont requis.';
                }
            }
        }
    }
}