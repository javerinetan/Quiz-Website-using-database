<?php 
    require_once('../connection.php');
    session_start(); 
    if(!isset($_SESSION['User']))
        {header("location:login.php");}
    else{
        $query= "DELETE FROM account WHERE email='".strtolower($_SESSION['User'])."';";
        mysqli_query($con,$query);
        // if (mysqli_query($con,$query) === TRUE) {
        //     echo '1';
        // } else {
        //     echo "Error: " . $qn_query . "<br>" . $con->error;
        // }
        session_destroy();
        header('location:../index.php');
    }

?>