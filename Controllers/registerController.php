<?php

use Models\UserModel;

require_once 'Models/userModel.php';

class registerController
{
    private UserModel $model;
    public string $errorMessage = '';
    public string $validationMessage = '';

    public function __construct() {
        $this->model = new UserModel();
    }

    public function registerRequest(): void
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['registerUser'])) {
                $nom = $_POST['name'] ?? null;
                $prenom = $_POST['surname'] ?? null;
                $email = $_POST['email'] ?? null;
                $password = $_POST['password'] ?? null;
                $password_verify = $_POST['confirm_password'] ?? null;

                if ($this->model->verifyDoublePasswordUser($password, $password_verify) === false) {
                    $this->errorMessage = 'Les mots de passe ne correspondent pas';
                } else {
                    if ($this->model->emailExists($email)) {
                        $this->errorMessage = 'Cet email est déjà utilisé';
                    } else {
                        $this->model->addUser($nom, $prenom, $email, $password);
                        $this->validationMessage = 'Votre compte a bien été créé';
                        $user = $this->model->getUserByEmail($email);
                        $_SESSION['id'] = $user['id_utili'];
                        $_SESSION['prenom'] = $user['pren_utili'];
                        header('Location: /');
                        exit();
                    }
                }
            }
        }
    }

    
}