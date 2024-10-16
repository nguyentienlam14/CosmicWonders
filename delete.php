<?php
include 'C:/Xamp/htdocs/CosmicWonders/Back-end/db_Conection.php';

$db = new Database();
$conn = $db->getConnection();

if (isset($_GET['id'])) {
    $astronautId = $_GET['id'];
    $sql = "UPDATE Astronaut SET isDelete = 'Y' WHERE Astronaut_ID = :astronautId";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['astronautId' => $astronautId]);
    
    header("Location:admin.php");
    exit();
} else {
    echo "Astronaut ID not specified.";
}
?>
