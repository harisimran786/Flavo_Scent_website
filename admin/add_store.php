<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

require_once '../includes/db.php';

if (isset($_POST['add_store'])) {
    $store_name = $_POST['store_name'];
    $query = "INSERT INTO stores (store_name) VALUES ('$store_name')";
    mysqli_query($conn, $query);
    $message = "Store added successfully!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Store</title>
    <link rel="stylesheet" type="text/css" href="../css/admin-page-styles.css">
</head>
<body>
    <?php require '../header.php'; ?>
    
    <h2>Add New Store</h2>
    
    <?php if (isset($message)) echo "<p>$message</p>"; ?>

    <form method="post" action="">
        <label for="store_name">Store Name:</label>
        <input type="text" id="store_name" name="store_name" required>
        <button type="submit" name="add_store">Add Store</button>
    </form>
    
    <?php require '../footer.php'; ?>
</body>
</html>
