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

    // Get the quiz number of the question that is being deleted
    $delete_query = "SELECT quiz_no FROM quiz_$quiz_id WHERE quiz_no = $quiz_no";
    $result = $con->query($delete_query);
    $deleted_quiz_no = $result->fetch_assoc()['quiz_no'];

    // Delete the question from the database
    $delete_query = "DELETE FROM quiz_$quiz_id WHERE quiz_no = $quiz_no";
    mysqli_query($con, $delete_query);

    mysqli_query($con, "UPDATE quiz SET questions = questions - 1 WHERE quiz_id = $quiz_id");

    // Update the quiz numbers for the remaining questions
    $update_query = "UPDATE quiz_$quiz_id SET quiz_no = quiz_no - 1 WHERE quiz_no > $deleted_quiz_no";
    mysqli_query($con, $update_query);


    // Redirect to the quiz table page after deletion
    header("location:view_quiz.php?quiz_id=$quiz_id");
    exit();
} elseif(!isset($_GET['quiz_no']) && isset($_GET['quiz_id'])){
        $quiz_id = $_GET['quiz_id'];
        $delete_query = "DROP TABLE quiz_$quiz_id";
        mysqli_query($con, $delete_query);

        // $delete_log = "select * from quiz_attempt_log where quiz_id=$quiz_id";
        // $log_result = $con->query($query);

        // while($log_rows=$log_result->fetch_assoc()){
        //     $log_id=$log_rows['attempt_id'];

        // }              
        $delete_log="delete from quiz_attempt_log where quiz_id=$quiz_id";
        mysqli_query($con, $delete_log);


        $delete_query2 = "DELETE FROM quiz WHERE quiz_id = $quiz_id";
        mysqli_query($con, $delete_query2);
    
        header("location:../user/home.php");
    }
else {
    // Redirect to an error page or handle the case where quiz_id or quiz_no is not set
    header("location:error_page.php");
    exit();
}
?>