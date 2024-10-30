<?php
session_start();
require_once 'config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $ps = trim($_POST['password']);

    // Check for empty fields
    if (empty($email) || empty($ps)) {
        header('Location: login.php?error=*All fields are required');
        exit();
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("SELECT id, fname, password FROM `productform` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if email exists
    if ($stmt->num_rows == 0) {
        header('Location: login.php?error=Invalid email or password');
        $stmt->close();
        $conn->close();
        exit();
    }

    // Bind result variables
    $stmt->bind_result($id, $name, $hashed_password);
    $stmt->fetch();

    // Verify password
    if (password_verify($ps, $hashed_password)) {
        $_SESSION['user'] = $name;
        header('Location: index.php?success=login success');
    } else {
        header('Location: login.php?error=Invalid email or password');
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>