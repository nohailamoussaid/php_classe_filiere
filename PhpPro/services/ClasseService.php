<?php

include_once 'beans/Classe.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class ClasseService Implements IDao {

    //put your code here
    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO classe VALUES (NULL,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(), $o->getNom(), $o->getId_fil())) or die('Error');
    }


    public function delete($id) {
        $query = "DELETE FROM classe WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from classe";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findById($id) {
        $query = "select * from classe where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $pointage = new Classe($res->id, $res->code, $res->nom, $res->id_fil);
        return $pointage;
    }

    public function findByIdApi($id) {
        $query = "select * from classe where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public function update($o) {
        $query = "UPDATE classe SET code = ?,nom=?,id_fil=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(), $o->getNom(), $o->getId_fil(), $o->getId())) or die('Error');
    }
    public function select($id_fil) {
        $query = "SELECT * FROM classe WHERE id_fil=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute( array($id_fil)) or die('Error');
         $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public function countbyfiliere(){
        $query ="SELECT COUNT(*) as nbr,id_fil as fil FROM classe Group BY id_fil";
        $req = $this->connexion->getConnexion()->query($query);
        $rs = $req->fetchAll(PDO::FETCH_OBJ);
        return $rs;
    }
}
