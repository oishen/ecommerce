<?php
session_start();
require_once 'config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $sql_update = "UPDATE productForm SET fname = ?, lname = ?, DOB = ?, email = ?, phone = ? WHERE id = ?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("sssssi", $fname, $lname, $dob, $email, $phone, $user_id);
    $stmt->execute();
    $stmt->close();
}

$sql = "SELECT * FROM productForm WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res_edit = $stmt->get_result();
$row_show = $res_edit->fetch_assoc();
$stmt->close();
$conn->close();
?>
