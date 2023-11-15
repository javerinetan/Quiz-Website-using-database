<?php 
require_once('account/connection.php');
session_start(); 
if(!isset($_SESSION['User']))
    {header("location:login.php");}
?>
<?php
    $query="select * from account where email='".$_SESSION['User']."'";
    $results=mysqli_query($con,$query);
    $row=$results->fetch_assoc();
    echo ' Welcome ' . $row['name'] .'<br/>';
    echo 'ID: '. $row['id'] .'<br/>';
    // echo 'Name: '. $row['name'] .'<br/>';
    echo 'Birthdate: '. $row['birthdate'] .'<br/>';
    echo 'Email: '.$row['email'] .'<br/>';
    echo '<a href="logout.php?logout">Logout</a>';
?>
