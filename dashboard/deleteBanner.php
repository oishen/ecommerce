<?php

require_once 'config/config.php';

$BanSel = "SELECT * FROM `heroslide`";
$BanRes = mysqli_query($conn, $BanSel);

if (isset($_GET['id'])) {
    $BanId = $_GET['id'];
    $BanDel = mysqli_query($conn, "DELETE FROM `heroslide` WHERE `id` = '$BanId'");
    header('Location: index.php');
}

?>