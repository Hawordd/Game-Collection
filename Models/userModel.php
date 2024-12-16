<?php

namespace Models;

use DBConfig\Database;
use PDO;

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

    public function addUser($email, $motdepasse): void {
        $req = $this->db->prepare('INSERT INTO UTILISATEUR (email_utili, mdp_utili) VALUES (:email, :motdepasse)');
        $req->execute(array('email' => $email, 'motdepasse' => password_hash($motdepasse, PASSWORD_DEFAULT)));
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
}