<?php
session_start();

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_role'] == 'admin') {
        header("Location: admin/admin_login.php"); // Redirect to admin login
    } else {
        header("Location: index.php"); // Redirect to main home page
    }
} else {
    header("Location: login.php"); // Redirect to login page if not logged in
}

session_destroy();
exit;
?>
