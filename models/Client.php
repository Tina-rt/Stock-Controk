<?php
require_once 'database/Database.php';

class Client
{
    private $id;
    private $nom;
    private $prenom;
    private $nomSociete;
    private $numero;
    private $nomUtilisateur;
    private $email;
    private $adresse;
    private $quotasID;
    private $db_name;
    private $password;

    public function __construct($id, $nom, $prenom, $nomSociete, $numero, $nomUtilisateur, $email, $adresse, $quotasID, $password)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->nomSociete = $nomSociete;
        $this->numero = $numero;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->quotasID = $quotasID;
        $this->db_name = $nomSociete."_DB";
        $this->password = $password;
    }

    public function __toString(){
        return "Client ".$this->id." ".$this->nom;
    }

    // Getters and Setters

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getNomSociete()
    {
        return $this->nomSociete;
    }

    public function setNomSociete($nomSociete)
    {
        $this->nomSociete = $nomSociete;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function getpassword()
    {
        return $this->password;
    }

    public function setpassword($password)
    {
        $this->password = $password;
    }

    public function getQuotasID()
    {
        return $this->quotasID;
    }

    public function setQuotasID($quotasID)
    {
        $this->quotasID = $quotasID;
    }

    public function getDbName(){
        return $this->db_name;
    }

    public function setDbName($new_dbName){
        $this->db_name = $new_dbName;
    }
    


    public static function getAllClients()
    {
        
        $pdo = Database::getConnection(); // Assuming a Database class is used to establish a database connection
        $stmt = $pdo->query('SELECT * FROM clients');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getClientByNom_utilisateur($nom_utilisateur){
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM clients WHERE nom_utilisateur=:nom_utilisateur');
        $stmt->execute(['nom_utilisateur'=>$nom_utilisateur]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getClientById($id)
    {
        // Retrieve a client from the database based on the given ID and return the result
        // Example implementation using PDO:
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM clients WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function saveClient($client)
    {
        // Save a new client to the database
        // Example implementation using PDO:
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('INSERT INTO clients (nom, prenom, nom_societe, numero, nom_utilisateur, email, password, adresse, quotasID, db_name) 
                               VALUES (:nom, :prenom, :nomSociete, :numero, :nomUtilisateur, :email,:password, :adresse, :quotasID, :db_name)');
        $stmt->execute([
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'nomSociete' => $client->getNomSociete(),
            'numero' => $client->getNumero(),
            'nomUtilisateur' => $client->getNomUtilisateur(),
            'email' => $client->getEmail(),
            'adresse' => $client->getAdresse(),
            'password' => $client->getpassword(),
            'quotasID' => $client->getQuotasID(),
            'db_name' => $client->getDbName()
        ]);


    }

    public static function updateClient($client)
    {
        // Update an existing client in the database
        // Example implementation using PDO:
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('UPDATE clients SET nom = :nom, prenom = :prenom, nom_societe = :nomSociete, numero = :numero, 
                               nom_utilisateur = :nomUtilisateur, email = :email, adresse = :adresse, quotasID = :quotasID WHERE id = :id');
        $stmt->execute([
            'id' => $client->getId(),
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'nomSociete' => $client->getNomSociete(),
            'numero' => $client->getNumero(),
            'nomUtilisateur' => $client->getNomUtilisateur(),
            'email' => $client->getEmail(),
            'adresse' => $client->getAdresse(),
            'quotasID' => $client->getQuotasID()
        ]);
    }

    public static function deleteClient($id)
    {
        // Delete a client from the database based on the given ID
        // Example implementation using PDO:
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM clients WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }


}
