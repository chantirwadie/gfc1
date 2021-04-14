<?php
include_once RACINE . '/classes/Classe.php';
include_once RACINE . '/connexion/Connexion.php';
include_once RACINE . '/dao/IDao.php';

class ClasseService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO classe (`id`, `classe`, `filiere`) ". "VALUES (NULL, '" . $o->getClasse() . "', '" . $o->getFiliere() . "');";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function delete($id) {
        $query = "delete from classe where id = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
    public function findAllajax() {
        $query =  "SELECT * FROM `classe`";
        $req = $this->connexion->getConnexion()->query($query); 
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    
    }
    public function countByClasse() {
        $query =  "select COUNT(classe) AS nbr, c.filiere as nom from classe c GROUP by c.filiere";
        $req = $this->connexion->getConnexion()->query($query); 
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    
    }
    public function findAll() {
        $etds = array();
        $query = "select * from classe";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Classe($e->id, $e->classe, $e->filiere);
        }
        return $etds;
    }


    public function findById($id) {
        $query = "select * from classe where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $classe = new Classe($res->id, $res->classe, $res->filiere);
        return $classe;
    }

    public function findclasses($filiere) {
        $query = "select classe from classe WHERE filiere =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($filiere));
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function update($o) {
        $query = "UPDATE `classe` SET `classe` = '" . $o->getClasse() . "', `filiere` = '" . $o->getFiliere() . "' WHERE `classe`.`id` = " . $o->getId();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

}