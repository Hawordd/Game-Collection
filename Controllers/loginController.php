<?php
use Models\UserModel;

require_once 'Models/userModel.php';

class loginController
{
    private UserModel $model;
    public string $errorMessage = '';

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function loginRequest(): void
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['loginUser'])) {
                $email = $_POST['email'] ?? null;
                $password = $_POST['password'] ?? null;

                if ($this->model->emailExists($email) && $this->model->passwordIsValid($email, $password)) {
                    $user = $this->model->getUserByEmail($email);
                    $_SESSION['id'] = $user['id_utili'];
                    $_SESSION['prenom'] = $user['pren_utili'];

                    $this->errorMessage = 'Connection réussie';
                    header('Location: /');
                    exit();
                } else {
                    $this->errorMessage = 'E-mail ou mot de passe incorrect';
                }
            }
        }
    }
}