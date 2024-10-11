<?php
$host = "localhost";    
$port = "3306";         
$dbname = "cosmicwonders"; 
$username = "root";     
$password = "tienlam14";         

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo  $e->getMessage();
}
?>
