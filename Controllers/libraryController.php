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
        return $this->model->getAllGamesNotOwnedByUser();
    }

    public function getGameInfos($id_jeux)
    {
        return $this->model->getGame($id_jeux);
    }

    public function getGamePlatforms($id_jeux)
    {
        return $this->model->getGamePlatforms($id_jeux);
    }

    public function addGameToUserLibrary($gameId): void
    {
        $this->model->addGameToUserLibrary($gameId);
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