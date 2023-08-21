<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php"); // Redirect to admin login if not logged in
    exit;
} else {
    header("Location: admin_dashboard.php"); // Redirect to admin dashboard if logged in
    exit;
}
?>