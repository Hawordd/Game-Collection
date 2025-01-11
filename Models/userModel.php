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

    public function getUserScordboard() {
        $req = $this->db->prepare('SELECT CONCAT(u.nom_utili, " ", u.pren_utili) AS Joueur, SUM(t.temps_jeux) AS "Temps total passé", (SELECT j2.nom_jeux FROM TEMPS t2 JOIN JEUX j2 ON t2.id_jeux = j2.id_jeux WHERE t2.id_utili = u.id_utili ORDER BY t2.temps_jeux DESC LIMIT 1) AS "Jeu favori" FROM UTILISATEUR u JOIN TEMPS t ON u.id_utili = t.id_utili WHERE t.temps_jeux >= 0 GROUP BY u.id_utili ORDER BY SUM(t.temps_jeux) ASC');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
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

    public function deleteUser($id): void {
        try {
            $req = $this->db->prepare('DELETE FROM UTILISATEUR WHERE id_utili = :id;');
            $req->execute(array(
                'id' => $id,
            ));
            header('Location: /disconnect'); 
            exit;
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