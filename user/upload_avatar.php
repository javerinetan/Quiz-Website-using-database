<?php
session_start();
require_once('../connection.php');

if (!isset($_SESSION['User'])) {
    exit(json_encode(['success' => false, 'message' => 'User not logged in.']));
}

$userID = $_SESSION['User'];

if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    // Ensure a unique filename to avoid overwriting existing avatars
    $avatarFileName = 'avatar_' . $userID . '_' . uniqid() . '.' . pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $avatarFilePath = 'path/to/upload/directory/' . $avatarFileName;

    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarFilePath)) {
        // Update the database with the new avatar file path
        $updateQuery = "UPDATE account SET image_url = '$avatarFilePath' WHERE id = $userID";
        $updateResult = mysqli_query($con, $updateQuery);

        if ($updateResult) {
            exit(json_encode(['success' => true, 'message' => 'Avatar uploaded successfully.']));
        } else {
            unlink($avatarFilePath); // Delete the file if database update fails
            exit(json_encode(['success' => false, 'message' => 'Failed to update database.']));
        }
    } else {
        exit(json_encode(['success' => false, 'message' => 'Failed to move uploaded file.']));
    }
} else {
    exit(json_encode(['success' => false, 'message' => 'Error uploading file.']));
}
?>
