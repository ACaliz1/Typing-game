<?php
include '../config/database.php';

$username = $_POST['username'];
$wpm = floatval($_POST['wpm']);
$accuracy = floatval($_POST['accuracy']);

$sql = "INSERT INTO user_stats (username, wpm, accuracy) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sdd", $username, $wpm, $accuracy);

if ($stmt->execute()) {
    echo "Record saved successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
