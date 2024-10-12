<?php
include 'db_Conection.php';

function createTables($db) {
    $sql = [
        // Tạo bảng Category
        "CREATE TABLE Category (
            Category_ID INT IDENTITY(1,1) PRIMARY KEY,
            Name NVARCHAR(10) NOT NULL,
            Img_url NVARCHAR(500),
            isDelete CHAR(1) CHECK (isDelete IN ('Y', 'N')) NOT NULL DEFAULT 'N',
            created_at DATETIME DEFAULT GETDATE(),
            updated_at DATETIME DEFAULT GETDATE()
        )",
        
        // Tạo bảng Event
        "CREATE TABLE Event (
            Event_ID INT IDENTITY(1,1) PRIMARY KEY,
            Event_title NVARCHAR(10) NOT NULL,
            Event_sub_text NVARCHAR(100) NOT NULL,
            Img_url NVARCHAR(500),
            Category_ID INT,
            isDelete CHAR(1) CHECK (isDelete IN ('Y', 'N')) NOT NULL DEFAULT 'N',
            created_at DATETIME DEFAULT GETDATE(),
            updated_at DATETIME DEFAULT GETDATE(),
            FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID)
        )",
        
        // Tạo bảng Event_detail
        "CREATE TABLE Event_detail (
            Event_detail_ID INT IDENTITY(1,1) PRIMARY KEY,
            Event_detail_title NVARCHAR(10) NOT NULL,
            Event_detail_sub_text NVARCHAR(100) NOT NULL,
            Event_detail_img NVARCHAR(500),
            Event_ID INT,
            isDelete CHAR(1) CHECK (isDelete IN ('Y', 'N')) NOT NULL DEFAULT 'N',
            created_at DATETIME DEFAULT GETDATE(),
            updated_at DATETIME DEFAULT GETDATE(),
            FOREIGN KEY (Event_ID) REFERENCES Event(Event_ID)
        )",
        
        // Tạo bảng Celestial
        "CREATE TABLE Celestial (
            Celestial_ID INT IDENTITY(1,1) PRIMARY KEY,
            Celestial_type CHAR(6) CHECK (Celestial_type IN ('Star', 'Planet')) NOT NULL,
            Category_ID INT,
            isDelete CHAR(1) CHECK (isDelete IN ('Y', 'N')) NOT NULL DEFAULT 'N',
            created_at DATETIME DEFAULT GETDATE(),
            updated_at DATETIME DEFAULT GETDATE(),
            FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID)
        )",
        
        // Tạo bảng Celestial_detail
        "CREATE TABLE Celestial_detail (
            Celestial_detail_ID INT IDENTITY(1,1) PRIMARY KEY,
            Celestial_detail_title NVARCHAR(10) NOT NULL,
            Celestial_detail_sub NVARCHAR(100) NOT NULL,
            Other_details NVARCHAR(MAX),
            Celestial_discovery_date NVARCHAR(MAX),
            Celestial_size NVARCHAR(MAX),
            Celestial_ozone NVARCHAR(MAX),
            Celestial_distance_s_e NVARCHAR(MAX),
            Celestial_ID INT,
            Celestial_detail_img NVARCHAR(500),
            isDelete CHAR(1) CHECK (isDelete IN ('Y', 'N')) NOT NULL DEFAULT 'N',
            created_at DATETIME DEFAULT GETDATE(),
            updated_at DATETIME DEFAULT GETDATE(),
            FOREIGN KEY (Celestial_ID) REFERENCES Celestial(Celestial_ID)
        )",
        
        // Tạo bảng Astronaut
        "CREATE TABLE Astronaut (
            Astronaut_ID INT PRIMARY KEY IDENTITY(1,1),
            Astronaut_title TEXT NOT NULL,
            Astronaut_subtitle TEXT,
            Img_url TEXT,
            Category_ID INT,
            isDelete CHAR(1) CHECK (isDelete IN ('Y', 'N')) NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID)
        )",
        
        "CREATE TABLE Astronaut_detail (
            Astronaut_detail_ID INT PRIMARY KEY IDENTITY(1,1),
            Astronaut_detail_header_text TEXT NOT NULL,
            Astronaut_detail_header_subtext TEXT NOT NULL,
            Astronaut_detail_sub_text TEXT NOT NULL,
            Astronaut_detail_img TEXT,
            Astronaut_detail_img_sub_text TEXT,
            Astronaut_ID INT,
            Astronaut_detail_type INT,
            isDelete CHAR(1) CHECK (isDelete IN ('Y', 'N')) NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (Astronaut_ID) REFERENCES Astronaut(Astronaut_ID)
        )",
        
        "CREATE TABLE Spaceships (
            Spaceships_id INT PRIMARY KEY IDENTITY(1,1),
            Spaceships_name TEXT NOT NULL,
            Spaceships_title TEXT NOT NULL,
            Spaceships_description TEXT NOT NULL,
            Spaceships_image TEXT NOT NULL,
            Spaceships_details TEXT NOT NULL,
            Spaceships_caption TEXT,
            isDelete CHAR(1) CHECK (isDelete IN ('Y', 'N')) NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )",
        
       " CREATE TABLE Stations (
            Stations_id INT PRIMARY KEY IDENTITY(1,1),
            Stations_name TEXT NOT NULL,
            Stations_title TEXT NOT NULL,
            Stations_description TEXT NOT NULL,
            Stations_image TEXT NOT NULL,
            Stations_details TEXT NOT NULL,
            Stations_caption TEXT,
            isDelete CHAR(1) CHECK (isDelete IN ('Y', 'N')) NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )",
        
       " ALTER TABLE Astronaut
        ADD FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID);",
        
        
        // Tạo bảng Config
        "CREATE TABLE Config (
            Event_ID INT,
            Astronaut_ID INT,
            Celestial_ID INT,
            [order] INT,
            FOREIGN KEY (Event_ID) REFERENCES Event(Event_ID),
            FOREIGN KEY (Astronaut_ID) REFERENCES Astronaut(Astronaut_ID),
            FOREIGN KEY (Celestial_ID) REFERENCES Celestial(Celestial_ID)
        )"
    ];


    foreach ($sql as $query) {
        try {
            $db->getConnection()->exec($query);
            echo "Table created successfully.<br>";
        } catch (PDOException $e) {
            echo "Error creating table: " . $e->getMessage() . "<br>";
        }
    }
}

$db = new Database();
createTables($db);
$db->closeConnection();
?>
