<?php

    require_once 'config/config.php';
    $bannerSelect = "SELECT * FROM `heroslide`";
    $banerQuery = mysqli_query($conn, $bannerSelect);

    // Check for file upload
    if (isset($_FILES['image1'])) {
        $file_name1 = $_FILES['image1']['name'];
        $file_tmp1 = $_FILES['image1']['tmp_name'];
        $file_type1 = $_FILES['image1']['type'];
        $file_size1 = $_FILES['image1']['size'];
        $title = $_POST['title'];
        

        // Validate file type and size
        $allowed_types1 = array('image/jpeg', 'image/png', 'image/gif');
        if (!in_array($file_type1, $allowed_types1) || $file_size1 > 2097152){
            header('Location: index.php');
            exit;
        }

        // Generate unique image path
        $target_dir1 = "banner_img/";
        $target_dir = '../FrontWeb/banner_img/';
        $target_file1 = $target_dir1 . basename($_FILES["image1"]["name"]);
        $image_path1 = $target_file1;

        // Move uploaded file
        if (move_uploaded_file($file_tmp1, $target_file1)) {
            // Copy uploaded file to the second directory
            $target_file = $target_dir . basename($_FILES["image1"]["name"]);

            if (copy($target_file1, $target_file)) {

                // Insert image path into database
                $bannerInsert = "INSERT INTO `heroslide` (`image`, `title`) VALUES ('$image_path1', '$title')";
                if (mysqli_query($conn, $bannerInsert)) {
                    header('Location: index.php');
                    exit();
                } else {
                    echo "Error uploading image";
                }
            }
        } else {
            echo "Error moving uploaded file";
        }
    }
?>