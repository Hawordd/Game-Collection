<?php

namespace Models;

use DBConfig\Database;
use PDO;
use PDOException;

require_once 'Config/DBConfig/database.php';
require_once 'Config/DBConfig/config.php';

class UserModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getUser($id) {
        $req = $this->db->prepare('SELECT * FROM UTILISATEUR WHERE id_utili = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function getUserByEmail($email) {
        $req = $this->db->prepare('SELECT * FROM UTILISATEUR WHERE email_utili = :email');
        $req->execute(array('email' => $email));
        return $req->fetch();
    }

    public function addUser($nom, $prenom, $email, $motdepasse): void {
        try {
            $req = $this->db->prepare('INSERT INTO UTILISATEUR (nom_utili, pren_utili, email_utili, mdp_utili) VALUES (:nom, :prenom, :email, :motdepasse)');
            $req->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'motdepasse' => password_hash($motdepasse, PASSWORD_DEFAULT)
            ));
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function updateUser($id, $nom, $prenom, $email, $motdepasse): void {
        try {
            $req = $this->db->prepare('UPDATE UTILISATEUR SET nom_utili = :nom, pren_utili = :prenom, email_utili = :email, mdp_utili = :motdepasse WHERE id_utili = :id;');
            $req->execute(array(
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'motdepasse' => password_hash($motdepasse, PASSWORD_DEFAULT)
            ));
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function emailExists($email): bool {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM UTILISATEUR WHERE email_utili = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function passwordIsValid($email, $password): bool {
        $stmt = $this->db->prepare("SELECT mdp_utili FROM UTILISATEUR WHERE email_utili = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $hashedPassword = $stmt->fetchColumn();
        return password_verify($password, $hashedPassword);
    }

    public function verifyDoublePasswordUser($password, $password2): bool
    {
        return $password === $password2;
    }
}