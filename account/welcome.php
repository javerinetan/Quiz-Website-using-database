<?php 
require_once('connection.php');
session_start(); 
if(isset($_SESSION['User']))
    {
        echo ' Welcome ' . strval($_SESSION['User']) .'<br/>';
        echo '<a href="logout.php?logout">Logout</a>';
    }
else
    {
        header("location:login.php");
    }
?>