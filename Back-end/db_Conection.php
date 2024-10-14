<?php
class Database {
    private $username = "root";
    private $password = "";
    private $dbname = "cosmicwonders";
    private $conn;  

    public function __construct() {
        $this->connect();
    } 

    private function connect() {
        try {
            $this->conn = new PDO("mysql:host=localhost;port=3306;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage(); 
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }
}
?>