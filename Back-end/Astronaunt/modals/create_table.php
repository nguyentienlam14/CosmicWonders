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
            Astronaut_ID INT IDENTITY(1,1) PRIMARY KEY,
            Astronaut_title NVARCHAR(10) NOT NULL,
            Img_url NVARCHAR(500),
            Category_ID INT,
            isDelete CHAR(1) CHECK (isDelete IN ('Y', 'N')) NOT NULL DEFAULT 'N',
            created_at DATETIME DEFAULT GETDATE(),
            updated_at DATETIME DEFAULT GETDATE(),
            FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID)
        )",
        
        // Tạo bảng Astronaut_detail
        "CREATE TABLE Astronaut_detail (
            Astronaut_detail_ID INT IDENTITY(1,1) PRIMARY KEY,
            Astronaut_detail_type INT(1) NOT NULL CHECK (Astronaut_detail_type IN ('1,2,3')),
            Astronaut_detail_header_text NVARCHAR(10) NOT NULL,
            Astronaut_detail_sub_text NVARCHAR(100) NOT NULL,
            Astronaut_Large_Size NVARCHAR(MAX),
            Astronaut_Diverse_Research NVARCHAR(MAX),
            Astronaut_Transport_Vehicles NVARCHAR(MAX),
            Astronaut_Living_Conditions NVARCHAR(MAX),
            Astronaut_Energy_Systems NVARCHAR(MAX),
            Astronaut_detail_img NVARCHAR(500),
            Astronaut_ID INT,
            isDelete CHAR(1) CHECK (isDelete IN ('Y', 'N')) NOT NULL DEFAULT 'N',
            created_at DATETIME DEFAULT GETDATE(),
            updated_at DATETIME DEFAULT GETDATE(),
            FOREIGN KEY (Astronaut_ID) REFERENCES Astronaut(Astronaut_ID)
        )",
        
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
