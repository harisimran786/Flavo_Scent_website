<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

require_once '../includes/db.php';

$feedbacks = mysqli_query($conn, "SELECT * FROM feedbacks");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/admin-page-styles.css">
</head>
<body>
    <?php require '../header.php'; ?>
    
    <h2>Admin Dashboard</h2>

    <a href="download_csv.php">Download Feedbacks as CSV</a>

    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Feedback</th>
                <th>Selfie Rating</th>
                <!-- Other columns -->
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($feedbacks)): ?>
            <tr>
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['feedback_text']; ?></td>
                <td><?php echo $row['selfie_rating']; ?></td>
                <!-- Other columns -->
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    
    <?php require '../footer.php'; ?>
</body>
</html>
