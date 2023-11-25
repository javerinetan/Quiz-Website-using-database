<?php
require_once('../connection.php');
session_start();

if (!isset($_SESSION['User'])) {
    header("location:../account/login.php");
    exit;
} else {
    // Use prepared statement to prevent SQL injection
    $user_id=$_SESSION['User'];

    $delete_log="DELETE FROM quiz_attempt_log where attempt_by = $user_id";
    mysqli_query($con, $delete_log);

    $delete_quiz="DELETE FROM quiz where creator_id = $user_id";
    mysqli_query($con, $delete_quiz);

    $query = "DELETE FROM account WHERE id=?";
    $stmt = $con->prepare($query);


    // Check if the prepared statement was successful
    if (!$stmt) {
        echo "Error: Could not prepare the delete statement.";
        exit;
    }

    // Assuming id is an integer, use 'i' as the data type specifier
    $stmt->bind_param("i", $_SESSION['User']); 

    // Execute the prepared statement
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        // Session destruction and redirection
        session_destroy();
        header('location:../index.php');
        exit;
    } else {
        // Handle the case where no rows were affected (user not found, or other issues)
        echo "Error: User not deleted.";
        exit;
    }

    // Close the statement before closing the connection
    $stmt->close();
    $con->close();
}
?>
