<?php

    require_once 'config/config.php';
    $select = "SELECT * FROM `product`";
    $result_all = mysqli_query($conn, $select);

    // Check for file upload
    if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $stock = $_POST['stock'];
        

        // Validate file type and size
        $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
        if (!in_array($file_type, $allowed_types) || $file_size > 2097152){
            header('Location: index.php');
            exit;
        }

        // Generate unique image path
        $target_dir = "product_img/";
        $target_dir1 = '../FrontWeb/product_img/';
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $image_path = $target_file;

        // Move uploaded file
        if (move_uploaded_file($file_tmp, $target_file)) {
            // Copy uploaded file to the second directory
            $target_file1 = $target_dir1 . basename($_FILES["image"]["name"]);
           
            if (copy($target_file, $target_file1)) {
                // Insert image path into database
                $insert = "INSERT INTO `product` (`image`, `name`, `price`, `category`, `stock`) VALUES ('$image_path', '$name', '$price', '$category', '$stock')";
                if (mysqli_query($conn, $insert)) {
                    header('Location: index.php');
                } else {
                    echo "Error inserting image path into database";
                }
            } else {
                echo "Error copying uploaded file to second directory";
            }
        } else {
            echo "Error moving uploaded file";
        }
    }
?>