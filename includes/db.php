<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "feedback_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
