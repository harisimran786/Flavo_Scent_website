<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once '../includes/db.php';

$user_id = $_SESSION['user_id'];

// Retrieve user information
$sql_user = "SELECT user_name, mobile_number, email FROM users WHERE user_id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param('i', $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
$user = $result_user->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include '../header.php'; ?>

    <div class="container">
        <h1>User Dashboard</h1>
        <div>
            <p><strong>Name:</strong> <?= $user['user_name'] ?></p>
            <p><strong>Mobile Number:</strong> <?= $user['mobile_number'] ?></p>
            <p><strong>Email:</strong> <?= $user['email'] ?></p>
        </div>
        <div>
            <h2>Your Feedbacks</h2>
            <?php
            $sql_feedbacks = "SELECT * FROM feedbacks WHERE user_id = ?";
            $stmt_feedbacks = $conn->prepare($sql_feedbacks);
            $stmt_feedbacks->bind_param('i', $user_id);
            $stmt_feedbacks->execute();
            $result_feedbacks = $stmt_feedbacks->get_result();

            if ($result_feedbacks->num_rows > 0) {
                while ($row_feedback = $result_feedbacks->fetch_assoc()) {
                    echo "<div class='feedback'>";
                    echo "<p><strong>Store:</strong> {$row_feedback['store_name']}</p>";
                    echo "<p><strong>Feedback:</strong> {$row_feedback['feedback_text']}</p>";
                    echo "<div class='image-box'>";
                    echo "<img src='{$row_feedback['selfie_path']}' alt='Selfie'>";
                    echo "</div>";
                    echo "<p><strong>Unit Number:</strong> {$row_feedback['unit_number']}</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No feedbacks submitted yet.</p>";
            }
            ?>
        </div>
    </div>

    <?php include '../footer.php'; ?>
</body>
</html>
