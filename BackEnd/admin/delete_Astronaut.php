<?php
include 'C:/xampp/htdocs/CosmicWonders/BackEnd/config.php';


if (isset($_GET['id'])) {
    $astronautId = $_GET['id'];
     
    $sql = "UPDATE Astronaut SET isDelete = 'Y' WHERE Astronaut_ID = :astronautId";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['astronautId' => $astronautId]);
    
    header("Location: http:/CosmicWonders/FrontEnd/admin/admin.php");
    exit();
} else {
    echo "Astronaut ID not specified.";
}
?>
