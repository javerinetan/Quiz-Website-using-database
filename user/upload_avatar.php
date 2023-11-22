<?php
session_start();
require_once('../connection.php');

if (!isset($_SESSION['User'])) {
    exit(json_encode(['success' => false, 'message' => 'User not logged in.']));
}

$userID = $_SESSION['User'];
$avatarURL = isset($_POST['avatar_url']) ? $_POST['avatar_url'] : '';

// Update the database with the new avatar URL
$updateQuery = "UPDATE account SET image_url = '$avatarURL' WHERE id = $userID";
$updateResult = mysqli_query($con, $updateQuery);

if ($updateResult) {
    exit(json_encode(['success' => true, 'message' => 'Avatar URL updated successfully.']));
} else {
    exit(json_encode(['success' => false, 'message' => 'Failed to update database.']));
}
?>
