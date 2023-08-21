<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once '../includes/db.php';

if (isset($_POST['submit_feedback'])) {
    $store_name = $_POST['store_name'];
    $feedback_text = $_POST['feedback_text'];
    $unit_number = $_POST['unit_number'];

    // Handle file upload
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["selfie"]["name"]);
    move_uploaded_file($_FILES["selfie"]["tmp_name"], $target_file);

    $sql = "INSERT INTO feedbacks (user_id, store_name, feedback_text, selfie_path, unit_number) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isssi', $_SESSION['user_id'], $store_name, $feedback_text, $target_file, $unit_number);
    $stmt->execute();
}

$stores = mysqli_query($conn, "SELECT store_name FROM stores");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Feedback</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include '../header.php'; ?>

    <div class="container">
        <form action="submit_feedback.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="store">Store</label>
                <select name="store_name" id="store" required>
                    <?php while($row = mysqli_fetch_assoc($stores)): ?>
                        <option value="<?= $row['store_name'] ?>"><?= $row['store_name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div>
                <label for="feedback">Feedback</label>
                <textarea name="feedback_text" id="feedback" required></textarea>
            </div>
            <div>
                <label for="selfie">Upload Selfie</label>
                <input type="file" name="selfie" id="selfie" required>
            </div>
            <div>
                <label for="unit">Unit Number</label>
                <input type="text" name="unit_number" id="unit" required>
            </div>
            <div>
                <input type="submit" name="submit_feedback" value="Submit Feedback">
            </div>
        </form>
    </div>

    <?php include '../footer.php'; ?>
</body>
</html>
