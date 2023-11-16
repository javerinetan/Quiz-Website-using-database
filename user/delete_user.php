<?php
require_once('../connection.php');
session_start();

// if (!isset($_SESSION['User'])) {
//     header("location:../account/login.php");
//     exit;
// } else {
    // Use prepared statement to prevent SQL injection
    $query = "DELETE FROM account WHERE id=?";
    $stmt = $con->prepare($query);

    // Assuming id is an integer, use 'i' as the data type specifier
    $stmt->bind_param("i", $_SESSION['User']); 

    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        session_destroy();
        header('location:../index.php');
        exit;
    } else {
        // Handle the case where no rows were affected (user not found, or other issues)
        echo "Error: User not deleted.";
        exit;
    }

    $stmt->close();
    $con->close();
// }
?>
