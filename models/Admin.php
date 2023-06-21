<?php
class Admin{
    private $id;
    private $username;
    private $password;

    public function __construct($id, $username, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    public static function getAllAdmin(){
        $con = Database::getConnection();
        $stmt = $con->prepare("SELECT * FROM admin_info ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAdminByNom_utilisateur($nom_utilisateur){
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM admin_info WHERE nom_utilisateur=:nom_utilisateur');
        $stmt->execute(['nom_utilisateur'=>$nom_utilisateur]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}