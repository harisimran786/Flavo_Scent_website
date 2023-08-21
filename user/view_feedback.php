<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once '../includes/db.php';

$feedback_id = $_GET['feedback_id'];
$user_id = $_SESSION['user_id'];

$sql_feedback = "SELECT * FROM feedbacks WHERE feedback_id = ? AND user_id = ?";
$stmt_feedback = $conn->prepare($sql_feedback);
$stmt_feedback->bind_param('ii', $feedback_id, $user_id);
$stmt_feedback->execute();
$result_feedback = $stmt_feedback->get_result();

if ($result_feedback->num_rows > 0) {
    $feedback = $result_feedback->fetch_assoc();
} else {
    $error = "Feedback not found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include '../header.php'; ?>

    <div class="container">
        <h1>View Feedback</h1>
        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php else : ?>
            <div class="feedback">
                <p><strong>Store:</strong> <?php echo $feedback['store_name']; ?></p>
                <p><strong>Feedback:</strong> <?php echo $feedback['feedback_text']; ?></p>
                <div class="image-box">
                    <img src="<?php echo $feedback['selfie_path']; ?>" alt="Selfie">
                </div>
                <p><strong>Unit Number:</strong> <?php echo $feedback['unit_number']; ?></p>
            </div>
        <?php endif; ?>
    </div>

    <?php include '../footer.php'; ?>
</body>
</html>
