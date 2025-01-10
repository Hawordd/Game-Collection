<?php

use Models\UserModel;

require_once 'Models/userModel.php';

class ProfilController
{
    private UserModel $model;
    public string $errorMessage = '';

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function profilRequest(): void
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['updateProfil'])) {
                $id = $_SESSION['id'];
                $nom = $_POST['name'] ?? null;
                $prenom = $_POST['surname'] ?? null;
                $currentEmail = $this->getEmail();
                $email = $_POST['email'] ?? null;
                $password = $_POST['password'] ?? null;
                $password_verify = $_POST['confirm_password'] ?? null;

                if ($this->verifyDoublePasswordUser($password, $password_verify) === false) {
                    $this->errorMessage = 'Les mots de passe ne correspondent pas';
                } else {
                    if ($currentEmail != $email) {
                        if ($this->model->emailExists($email)) {
                            $this->errorMessage = 'Cet email est déjà utilisé';
                        }
                    } else {
                        $this->model->updateUser($id, $nom, $prenom, $email, $password);
                        $this->validationMessage = 'Profil modifié avec succès';
                    }
                }
            }
        }
            
    }

    public function getNom(){
        $nom = $this->model->getUser($_SESSION['id'])['nom_utili'];
        return htmlspecialchars($nom);
    }

    public function getPrenom(){
        $prenom = $this->model->getUser($_SESSION['id'])['pren_utili'];
        return htmlspecialchars($prenom);
    }

    public function getEmail(){
        $email = $this->model->getUser($_SESSION['id'])['email_utili'];
        return htmlspecialchars($email);
    }
}