<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $images = $_FILES['images'];

    $uploadedImages = [];
    $uploadDirectory = 'uploads/';

    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    foreach ($images['tmp_name'] as $key => $tmpName) {
        $fileName = basename($images['name'][$key]);
        $targetFilePath = $uploadDirectory . time() . '_' . $fileName;

        if (move_uploaded_file($tmpName, $targetFilePath)) {
            $uploadedImages[] = $targetFilePath;
        }
    }

    // Save product information and images to database or process further
    // For demonstration, we just print the data
    echo '<h2>Product Created</h2>';
    echo '<p>Name: ' . htmlspecialchars($name) . '</p>';
    echo '<p>Category: ' . htmlspecialchars($category) . '</p>';
    echo '<p>Price: ' . htmlspecialchars($price) . '</p>';
    echo '<h3>Uploaded Images</h3>';
    echo '<ul>';
    foreach ($uploadedImages as $image) {
        echo '<li><img src="' . htmlspecialchars($image) . '" alt="Product Image" style="max-width: 100px;"></li>';
    }
    echo '</ul>';
} else {
    echo 'Invalid request method';
}
?>
