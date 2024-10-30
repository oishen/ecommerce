<?php
session_start();
require_once 'config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $ps = trim($_POST['password']);
    $cfPassword = trim($_POST['cfPassword']);

    // Check for empty fields
    if (empty($name) || empty($email) || empty($ps) || empty($cfPassword)) {
        header('Location: signup.php?error=*form required');
        exit();
    }

    // Check if passwords match
    if ($ps !== $cfPassword) {

        header('Location: signup.php?error=*passwords do not match');
        exit();
    } else {
        
        // Check password strength
        if (strlen($ps) < 8 || !preg_match('/[A-Z]/', $ps) || !preg_match('/[a-z]/', $ps) || !preg_match('/[0-9]/', $ps)) {
            header('Location: signup.php?error=password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number');
            exit();
        }
    }

    // Check if email already exists
    $emailCheckStmt = $conn->prepare("SELECT id FROM `productform` WHERE email = ?");
    $emailCheckStmt->bind_param("s", $email);
    $emailCheckStmt->execute();
    $emailCheckStmt->store_result();

    if ($emailCheckStmt->num_rows > 0) {
        header('Location: signup.php?error=email already exists');
        $emailCheckStmt->close();
        exit();
    }
    $emailCheckStmt->close();

    // Hash the password
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO `productform` (`fname`, `email`, `password`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hash_password);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        $_SESSION['user'] = $name;
        header('Location: index.php?success=signup success');

    } else {
        header('Location: signup.php?error=signup failed');
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
