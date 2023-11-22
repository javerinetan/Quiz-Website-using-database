<?php
require_once('../connection.php');
session_start();

if (!isset($_SESSION['User'])) {
    header("location:../account/login.php");
    exit();
}

if (isset($_GET['quiz_id']) && isset($_GET['quiz_no'])) {
    $quiz_id = $_GET['quiz_id'];
    $quiz_no = $_GET['quiz_no'];

    // Delete the question from the database
    $delete_query = "DELETE FROM quiz_$quiz_id WHERE quiz_no = $quiz_no";
    mysqli_query($con, $delete_query);

    mysqli_query($con, "UPDATE quiz SET questions = questions - 1 WHERE quiz_id = $quiz_id");


    // Redirect to the quiz table page after deletion
    header("location:view_quiz.php?quiz_id=$quiz_id");
    exit();
} else {
    // Redirect to an error page or handle the case where quiz_id or quiz_no is not set
    header("location:error_page.php");
    exit();
}
?>