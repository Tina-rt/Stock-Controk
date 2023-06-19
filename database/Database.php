<?php

class Database
{
    private $hostname = "localhost";
    private $port = "3306";
    private $username = 'root';
    private $password = '';
    private $db_name = '';

    public function __construct($db_name)
    {
        $this->db_name = $db_name;
    }

    public static function getConnection($db_name = 'stockcontrol')
    {
        $conn = new PDO('mysql:host=localhost;dbname=stockcontrol', 'root', '');
        return $conn;
    }

    public static function newDatabaseClient($dbname)
    {
        $db = new PDO("mysql:host=127.0.0.1;dbname=" . $dbname . ";charset=utf8mb4", 'root', '');

        $select = $db->exec(file_get_contents('database/sql_file/client_database.sql'));
        
    }

    
}
