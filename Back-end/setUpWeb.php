<?php
class Database {
    private $username = "root";
    private $password = "";
    private $dbname = "CosmicWonders";
    private $conn;

    public function __construct() {
        $this->connect();
        $this->createDatabase(); 
        $this->connectToDatabase(); 
    }

    private function connect() {
        try {
            $this->conn = new PDO("mysql:host=localhost;port=3306", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to MySQL server successfully<br>";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    private function createDatabase() {
        try {
            $this->conn->exec("CREATE DATABASE IF NOT EXISTS `$this->dbname`");
            echo "Database created successfully or already exists<br>";
        } catch (PDOException $e) {
            echo "Error creating database: " . $e->getMessage() . "<br>";
        }
    }

    private function connectToDatabase() {
        try {
            $this->conn = new PDO("mysql:host=localhost;port=3306;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to database successfully<br>";
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

    public function createTables() {
        $sql = [
            "CREATE TABLE IF NOT EXISTS Category (
                Category_ID INT AUTO_INCREMENT PRIMARY KEY,
                Name VARCHAR(100) NOT NULL,
                Img_url VARCHAR(500),
                isDelete CHAR(1) NOT NULL DEFAULT 'N',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )",
            "CREATE TABLE IF NOT EXISTS Event (
                Event_ID INT AUTO_INCREMENT PRIMARY KEY,
                Event_title VARCHAR(100) NOT NULL,
                Event_sub_text VARCHAR(255) NOT NULL,
                Img_url VARCHAR(500),
                Category_ID INT,
                isDelete CHAR(1) NOT NULL DEFAULT 'N',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID)
            )",
            "CREATE TABLE IF NOT EXISTS Event_detail (
                Event_detail_ID INT AUTO_INCREMENT PRIMARY KEY,
                Event_detail_title VARCHAR(100) NOT NULL,
                Event_detail_sub_text VARCHAR(255) NOT NULL,
                Event_detail_img VARCHAR(500),
                Event_ID INT,
                isDelete CHAR(1) NOT NULL DEFAULT 'N',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (Event_ID) REFERENCES Event(Event_ID)
            )",
            "CREATE TABLE IF NOT EXISTS Celestial (
                Celestial_ID INT AUTO_INCREMENT PRIMARY KEY,
                Celestial_type ENUM('Star', 'Planet') NOT NULL,
                Category_ID INT,
                isDelete CHAR(1) NOT NULL DEFAULT 'N',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID)
            )",
            "CREATE TABLE IF NOT EXISTS Celestial_detail (
                Celestial_detail_ID INT AUTO_INCREMENT PRIMARY KEY,
                Celestial_detail_title VARCHAR(100) NOT NULL,
                Celestial_detail_sub VARCHAR(255) NOT NULL,
                Other_details TEXT,
                Celestial_discovery_date VARCHAR(255),
                Celestial_size VARCHAR(255),
                Celestial_ozone VARCHAR(255),
                Celestial_distance_s_e VARCHAR(255),
                Celestial_ID INT,
                Celestial_detail_img VARCHAR(500),
                isDelete CHAR(1) NOT NULL DEFAULT 'N',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (Celestial_ID) REFERENCES Celestial(Celestial_ID)
            )",
            "CREATE TABLE IF NOT EXISTS Astronaut (
                Astronaut_ID INT AUTO_INCREMENT PRIMARY KEY,
                Astronaut_title TEXT NOT NULL,
                Astronaut_subtitle TEXT,
                Img_url TEXT,
                Category_ID INT,
                isDelete CHAR(1) NOT NULL DEFAULT 'N',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID)
            )",
            "CREATE TABLE IF NOT EXISTS Astronaut_detail (
                Astronaut_detail_ID INT AUTO_INCREMENT PRIMARY KEY,
                Astronaut_detail_header_text TEXT NOT NULL,
                Astronaut_detail_header_subtext TEXT NOT NULL,
                Astronaut_detail_sub_text TEXT NOT NULL,
                Astronaut_detail_img TEXT,
                Astronaut_detail_img_sub_text TEXT,
                Astronaut_ID INT,
                Astronaut_detail_type INT,
                isDelete CHAR(1) NOT NULL DEFAULT 'N',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (Astronaut_ID) REFERENCES Astronaut(Astronaut_ID)
            )",
            "CREATE TABLE IF NOT EXISTS Spaceships (
                Spaceships_id INT AUTO_INCREMENT PRIMARY KEY,
                Spaceships_name TEXT NOT NULL,
                Spaceships_title TEXT NOT NULL,
                Spaceships_description TEXT NOT NULL,
                Spaceships_image TEXT NOT NULL,
                Spaceships_details TEXT NOT NULL,
                Spaceships_caption TEXT,
                isDelete CHAR(1) NOT NULL DEFAULT 'N',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )",
            "CREATE TABLE IF NOT EXISTS Stations (
                Stations_id INT AUTO_INCREMENT PRIMARY KEY,
                Stations_name TEXT NOT NULL,
                Stations_title TEXT NOT NULL,
                Stations_description TEXT NOT NULL,
                Stations_image TEXT NOT NULL,
                Stations_details TEXT NOT NULL,
                Stations_caption TEXT,
                isDelete CHAR(1) NOT NULL DEFAULT 'N',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )",
            "CREATE TABLE IF NOT EXISTS Config (
                Event_ID INT,
                Astronaut_ID INT,
                Celestial_ID INT,
                `order` INT,
                FOREIGN KEY (Event_ID) REFERENCES Event(Event_ID),
                FOREIGN KEY (Astronaut_ID) REFERENCES Astronaut(Astronaut_ID),
                FOREIGN KEY (Celestial_ID) REFERENCES Celestial(Celestial_ID)
            )"
        ];

        foreach ($sql as $query) {
            try {
                $this->conn->exec($query);
                echo "Table created successfully.<br>";
            } catch (PDOException $e) {
                echo "Error creating table: " . $e->getMessage() . "<br>";
            }
        }
    }
}

$db = new Database();   
$db->createTables();
$db->closeConnection();
?>
