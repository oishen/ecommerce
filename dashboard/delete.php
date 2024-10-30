<?php

require_once 'config/config.php';

$select_delete = "SELECT * FROM `product`";
$result_delete = mysqli_query($conn, $select_delete);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $del = mysqli_query($conn, "DELETE FROM `product` WHERE `id` = '$id'");
    header('Location: index.php');
}

?>