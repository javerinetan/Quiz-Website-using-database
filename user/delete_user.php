<?php
require_once('../connection.php');
session_start();

if (!isset($_SESSION['User'])) {
    header("location:../account/login.php");
} else {
    // Use prepared statement to prevent SQL injection
    $query = "DELETE FROM account WHERE email=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", strtolower($_SESSION['User'])); // 's' indicates a string parameter
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        session_destroy();
        header('location:../index.php');
    } else {
        // Handle the case where no rows were affected (user not found, or other issues)
        echo "Error: User not deleted.";
    }

    $stmt->close();
    $con->close();
}
?>