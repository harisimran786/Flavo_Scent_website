<?php
session_start();
require_once 'includes/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Ensure no user exists with the same email
    $checkQuery = "SELECT * FROM USER WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        $error = "A user with this email already exists!";
    } else {
        $query = "INSERT INTO USER (user_name, mobile_number, email, password) VALUES ('$username', $mobile, '$email', '$hashed_password')";
        if (mysqli_query($conn, $query)) {
            header('Location: login.php');
            exit;
        } else {
            $error = "Registration failed!";
        }
    }
}
?>

<!-- Rest of the HTML code remains unchanged -->
