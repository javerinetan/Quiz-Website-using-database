<?php 
    require_once('connection.php');
    session_start(); 
    if(!isset($_SESSION['User']))
        {header("location:login.php");}
    else{
        $query= "DELETE FROM account WHERE email='".strtolower($_SESSION['User'])."';";
        mysqli_query($con,$table_query);
        header('location:../index.php');
    }

?>