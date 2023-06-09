<?php

class Database {

    private $hostname = "localhost";
    private $database = "asesorias_s_martinez_spa";    
    private $username = "root";    
    private $password = "";    
    private $charset = "utf8"; 
    
    
    
    function connection(){

    try {
        
        $connection = "mysql:host=".$this->hostname.";dbname=".$this->database.";
        charset=".$this->charset;

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $pdo = new PDO($connection, $this->username, $this->password, $options);

        return $pdo;

    } catch (PDOException $e) {
        echo 'error connection: '. $e->getMessage();
        exit;
    }
}
};