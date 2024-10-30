<?php
require_once 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['id'];
    $title = $_POST['title'];

    // Handle the image upload
    if (isset($_FILES['editImageBanner']) && $_FILES['editImageBanner']['error'] == UPLOAD_ERR_OK) {
        $image = $_FILES['editImageBanner']['name'];
        $target_dir = "banner_img/";
        $target_file = $target_dir . basename($image);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['editImageBanner']['tmp_name'], $target_file)) {
            // Update the database with the new image path
            $sql = "UPDATE heroslide SET title='$title', image='$target_file' WHERE id='$id'";
        } else {
            echo "Error uploading file.";
            exit;
        }
    } else {
        // If no new image is uploaded, update other fields without changing the image
        $sql = "UPDATE heroslide SET title='$title' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
