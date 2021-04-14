<?php

include_once RACINE . '/classes/Filiere.php';
include_once RACINE . '/connexion/Connexion.php';
include_once RACINE . '/dao/IDao.php';

class FiliereService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO filiere (`id`, `code`, `libelle`) ". "VALUES (NULL, '" . $o->getCode() . "', '" . $o->getLibelle() . "');";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function delete($id) {
        $query = "delete from filiere where id = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
    public function findAllajax() {
        $query = "SELECT * FROM filiere";
        $req = $this->connexion->getConnexion()->query($query); 
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }


    public function findAll() {
        $etds = array();
        $query = "select * from filiere";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Filiere($e->id, $e->code, $e->libelle);
        }
        return $etds;
    }

    public function findById($id) {
        $query = "select * from filiere where id = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new Filiere($e->id, $e->code, $e->libelle);
        }
        return $etd;
    }
    
    public function update($o) {
        $query = "UPDATE `filiere` SET `code` = '" . $o->getCode() . "', `libelle` = '" . $o->getLibelle() . "' WHERE `filiere`.`id` = " . $o->getId();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
    public function getAll() {
        $query = "select * from filiere";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
}

}

