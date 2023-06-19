<?php
require_once 'database/Database.php';

class Quotas{
    private $id;
    private $nom_quota;
    private $valeur;

    public function __construct($id, $nom_quota, $valeur){
        $this->id = $id;
        $this->nom_quota = $nom_quota;
        $this->valeur = $valeur;
    }

    public function get_id(){
        return $this->id;
    }

    public function set_id($newId){
        $this->id = $newId;
    }
    public function get_nom_quota(){
        return $this->nom_quota;
    }

    public function set_nom_quota($newnom_quota){
        $this->nom_quota = $newnom_quota;
    }
    public function get_valeur(){
        return $this->valeur;
    }

    public function set_valeur($newvaleur){
        $this->valeur = $newvaleur;
    }

    public function createQuota(){
        $conn = Database::getConnection();
        $sttment = $conn->prepare('INSERT INTO quotas(nom_quota, valeur) VALUES (:nom_quota, :valeur)');
        $sttment->bindParam(':nom_quota', $this->nom_quota);
        $sttment->bindParam(':valeur', $this->valeur);
        $sttment->execute();
    }   
    
}