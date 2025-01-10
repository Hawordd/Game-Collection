<?php

use Models\GameModel;

require_once 'Models/gameModel.php';

class gameListController
{
    private GameModel $model;

    public function __construct()
    {
        $this->model = new GameModel();
    }

    public function getUserGames(int $userId): array {
        return $this->model->getGamesByUser($userId);
    }

    public function getGameInfos($id): array {
        $game = $this->model->getGame($id);
        return $game ? $game : [];
    }

    public function getPlaytime($game, $id)
    {
        return $this->model->getPlaytime($game, $id);
    }

    public function getGamePlatforms($game): array
    {
        return $this->model->getGamePlatforms($game);
    }
}