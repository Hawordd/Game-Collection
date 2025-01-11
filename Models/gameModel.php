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
        $req = $this->db->prepare('INSERT INTO JEUX (nom_jeux, editeur_jeux, date_sortie_jeux, url_couverture_jeux, url_jeux, desc_jeux) VALUES (:nom_jeux, :editeur_jeux, :date_sortie_jeux, :url_couverture_jeux, :url_jeux, :desc_jeux)');
        $req->execute(array(
            'nom_jeux' => $nom_jeux,
            'editeur_jeux' => $editeur_jeux,
            'date_sortie_jeux' => $date_sortie_jeux,
            'url_couverture_jeux' => $url_couverture_jeux,
            'url_jeux' => $url_jeux,
            'desc_jeux' => $desc_jeux
        ));

        $gameId = $this->db->lastInsertId();
        foreach ($plateformes as $plateforme) {
            $req = $this->db->prepare('INSERT INTO JEUX_PLATEFORME (id_jeux, id_plat) VALUES (:id_jeux, :plateforme)');
            $req->execute(array(
                'id_jeux' => $gameId,
                'plateforme' => $plateforme
            ));
        }

        $req = $this->db->prepare('INSERT INTO TEMPS (id_jeux, id_utili, temps_jeux) VALUES (:id_jeux, :id_utili, :temps_jeu)');
        $req->execute(array(
            'id_jeux' => $gameId,
            'id_utili' => $_SESSION['id'],
            'temps_jeu' => -1
        ));
    }

    public function getGamesByUser(int $userId): array {
        $req = $this->db->prepare('SELECT id_jeux FROM TEMPS WHERE id_utili = :userId');
        $req->execute(['userId' => $userId]);

        $games = [];
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $game) {
            $games[] = $game['id_jeux'];
        }
        return $games;
    }

    public function getPlaytime($game, $id)
    {
        $req = $this->db->prepare('SELECT temps_jeux FROM TEMPS WHERE id_jeux = :game AND id_utili = :id');
        $req->execute(array(
            'game' => $game,
            'id' => $id
        ));
        return $req->fetch()['temps_jeux'];
    }

    public function getGamePlatforms($game): array
    {
        $req = $this->db->prepare('SELECT nom_plat FROM PLATEFORME JOIN JEUX_PLATEFORME ON PLATEFORME.id_plat = JEUX_PLATEFORME.id_plat WHERE id_jeux = :game');
        $req->execute(array('game' => $game));

        $platforms = [];
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $platform) {
            $platforms[] = $platform['nom_plat'];
        }
        return $platforms;
    }

    public function getAllGamesNotOwnedByUser(): array
    {
        $req = $this->db->prepare('SELECT * FROM JEUX WHERE id_jeux NOT IN (SELECT id_jeux FROM TEMPS WHERE id_utili = :userId)');
        $req->execute(['userId' => $_SESSION['id']]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addGameToUserLibrary($gameId): void
    {
        $req = $this->db->prepare('INSERT INTO TEMPS (id_jeux, id_utili, temps_jeux) VALUES (:gameId, :userId, :temps_jeu)');
        $req->execute([
            'gameId' => $gameId,
            'userId' => $_SESSION['id'],
            'temps_jeu' => -1
        ]);
    }
}