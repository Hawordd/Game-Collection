<?php

namespace Models;

use DBConfig\Database;
use PDO;

require_once 'Config/DBConfig/database.php';
require_once 'Config/DBConfig/config.php';

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
        $req = $this->db->prepare('SELECT * FROM JEUX WHERE nom_jeux = :nom');
        $req->execute(array('nom' => $nom));
        return $req->fetch();
    }

    public function addGame($nom_jeux, $editeur_jeux, $date_sortie_jeux, $url_couverture_jeux, $url_jeux, $desc_jeux, $plateformes): void {
        $req = $this->db->prepare('INSERT INTO JEUX (nom_jeux, editeur_jeux, date_sortie_jeux, url_couverture_jeux, url_jeux, desc_jeux, id_utili) VALUES (:nom_jeux, :editeur_jeux, :date_sortie_jeux, :url_couverture_jeux, :url_jeux, :desc_jeux, :id_utili)');
        $req->execute(array(
            'nom_jeux' => $nom_jeux,
            'editeur_jeux' => $editeur_jeux,
            'date_sortie_jeux' => $date_sortie_jeux,
            'url_couverture_jeux' => $url_couverture_jeux,
            'url_jeux' => $url_jeux,
            'desc_jeux' => $desc_jeux,
            'id_utili' => $_SESSION['id']
        ));

        $gameId = $this->db->lastInsertId();
        foreach ($plateformes as $plateforme) {
            $req = $this->db->prepare('INSERT INTO JEUX_PLATEFORME (id_jeux, id_plat, id_utili) VALUES (:id_jeux, :plateforme, :id_utili)');
            $req->execute(array(
                'id_jeux' => $gameId,
                'plateforme' => $plateforme,
                'id_utili' => $_SESSION['id']
            ));
        }
    }
}