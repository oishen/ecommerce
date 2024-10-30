<?php

    require_once 'config/config.php';

    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        $query = "SELECT * FROM product WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

    } else {
        header("Location: index.php");
        exit();
    }

?>