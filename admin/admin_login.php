<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location: admin_dashboard.php");
    exit();
}

require_once '../includes/db.php';

if (isset($_POST['admin_login'])) {
    $admin_id = $_POST['admin_id'];
    $mobile_number = $_POST['mobile_number'];

    $query = "SELECT * FROM admins WHERE admin_id = '$admin_id' AND mobile_number = '$mobile_number'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin_id'] = $admin_id;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid admin ID or mobile number.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin-page-styles.css">
</head>
<body>
    <?php require '../header.php'; ?>
    
    <h2>Admin Login</h2>
    
    <?php if (isset($error)) echo "<p>$error</p>"; ?>

    <form method="post" action="">
        <label for="admin_id">Admin ID:</label>
        <input type="text" id="admin_id" name="admin_id" required>
        
        <label for="mobile_number">Mobile Number:</label>
        <input type="number" id="mobile_number" name="mobile_number" required>
        
        <button type="submit" name="admin_login">Login</button>
    </form>
    
    <?php require '../footer.php'; ?>
</body>
</html>
