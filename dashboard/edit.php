<?php
require_once 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];

    // Handle the image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $target_dir = "product_img/";
        $target_dir1 = '../FrontWeb/product_img/';
        $target_file = $target_dir . basename($image);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $target_file1 = $target_dir1 . basename($_FILES["image"]["name"]);
            copy($target_file, $target_file1);
            // Update the database with the new image path
            $sql = "UPDATE product SET name='$name', price='$price', category='$category', image='$target_file', stock='$stock' WHERE id='$id'";
        } else {
            echo "Error uploading file.";
            exit;
        }
    } else {
        // If no new image is uploaded, update other fields without changing the image
        $sql = "UPDATE product SET name='$name', price='$price', category='$category', stock='$stock' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
