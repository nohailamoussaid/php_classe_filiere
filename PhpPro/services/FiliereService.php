<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DepartementService
 *
 * @author mosab
 */
include_once 'beans/Filiere.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class FiliereService implements IDao {
    //put your code here
    private $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
    }

    
    public function create($o) {
        $query = "INSERT INTO filiere VALUES (NULL,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(), $o->getLibelle(), $o->getAbr())) or die('Error');
    
    }

    public function delete($id) {
        $query = "DELETE FROM filiere WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from filiere";
        $req = $this->connexion->getConnexion()->query($query);
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    

    public function findById($id) {
        $query = "select * from filiere where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $res=$req->fetch(PDO::FETCH_OBJ);
        $fonction = new Filiere($res->id,$res->code, $res->libelle, $res->abr);
        return $fonction;
    }

     public function findByIdApi($id) {
        $query = "select * from filiere where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $res=$req->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public function update($o) {
        $query = "UPDATE filiere SET libelle = ?,code=?,abr=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getLibelle(), $o->getCode(), $o->getAbr(), $o->getId())) or die('Error');       
    }

}
