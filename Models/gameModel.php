<?php

namespace Models;

use DBConfig\Database;
use PDO;

class GameModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getGame($id) {
        $req = $this->db->prepare('SELECT * FROM JEUX WHERE id_jeux = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function getGameName($nom) {
        $req = $this->db->prepare('SELECT * FROM UTILISATEUR WHERE nom_jeux = :nom');
        $req->execute(array('nom' => $nom));
        return $req->fetch();
    }

    public function addGame($nom, $editeur, $date_sortie, $url_img, $url_jeu, $desc_jeu): void {
        $req = $this->db->prepare('INSERT INTO JEUX VALUES (:nom, :editeur, :date_sortie, :url_img, :url_jeu, :desc_jeu)');
        $req->execute(array('email' => $nom, 'editeur' => $editeur, 'date_sortie' => $date_sortie, 'url_img' => $url_img, 'url_jeu' => $url_jeu,'desc_jeu' => $desc_jeu));
    }
}