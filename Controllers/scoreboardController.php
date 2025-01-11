<?php

use Models\GameModel;
use Models\UserModel;

require_once 'Models/gameModel.php';
require_once 'Models/userModel.php';

class scoreboardController
{
    private GameModel $gameModel;
    private UserModel $userModel;

    public function __construct()
    {
        $this->gameModel = new GameModel();
        $this->userModel = new UserModel();
    }

    public function getUserScoreboard(): array
    {
        return $this->userModel->getUserScordboard();
    }


}