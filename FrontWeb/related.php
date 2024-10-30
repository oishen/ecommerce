<?php

require_once 'config/config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Prepare and execute the first query to get the category
    $stmt = $conn->prepare("SELECT category FROM `product` WHERE `id` = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $category = $row['category'];

        // Prepare and execute the second query to get all products in the same category
        $stmt2 = $conn->prepare("SELECT * FROM `product` WHERE `category` = ?");
        $stmt2->bind_param("s", $category);
        $stmt2->execute();
        $resAll = $stmt2->get_result();
        
    } else {
        echo "No category found for the given ID.";
    }
    
    $stmt->close();
    $stmt2->close();
}

$conn->close();

?>
