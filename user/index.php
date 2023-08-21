<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: user/user_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Website</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h1>Feedback Website</h1>
        <p>
            Welcome to the Feedback Website. Please <a href="login.php">login</a> to provide feedback or view your dashboard.
        </p>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
