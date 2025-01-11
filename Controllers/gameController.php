<?php

use Models\GameModel;

require_once 'Models/gameModel.php';

class gameController
{
    private GameModel $model;

    public function __construct()
    {
        $this->model = new GameModel();
    }

    public function getGameInfos($id): array {
        $game = $this->model->getGame($id);
        return $game ?: [];
    }

    public function getPlaytime($game_id)
    {
        return $this->model->getPlaytime($game_id);
    }

    public function updatePlaytimeRequest(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatePlaytime'])) {
            $playtime = $_POST['time'] ?? null;
            if ($playtime) {
                $this->model->updatePlaytime($_POST['game_id'], $playtime);
                header('Location: /');
                exit();
            }
        }
    }

    public function deleteGameFromUserRequest(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteGameFromUser'])) {
            $this->model->deleteGameFromUser($_POST['game_id']);
            header('Location: /');
            exit();
        }
    }
}