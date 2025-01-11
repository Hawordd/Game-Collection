<?php

use Models\GameModel;

require_once 'Models/gameModel.php';

class libraryController
{
    private GameModel $model;

    public function __construct()
    {
        $this->model = new GameModel();
    }

    public function getAllGamesNotOwnedByUser(): array
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
            $games = $this->model->searchGame($_POST['search']);
        } else {
            $games = $this->model->getAllGamesNotOwnedByUser();
        }

        if (empty($games)) {
            header('Location: /add');
            exit();
        }

        return $games;
    }

    public function getGameInfos($id_jeux)
    {
        return $this->model->getGame($id_jeux);
    }

    public function getGamePlatforms($id_jeux)
    {
        return $this->model->getGamePlatforms($id_jeux);
    }

    public function addGameToUserRequest(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_id'])) {
            $this->model->addGameToUserLibrary($_POST['game_id']);

            header('Location: /');
            exit();
        }
    }
}