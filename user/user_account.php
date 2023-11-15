<?php 
require_once('../connection.php');
session_start(); 
if(isset($_SESSION['User']))
    {
        $query="select * from account where email='".$_SESSION['User']."'";
        $results=mysqli_query($con,$query);
        $row=$results->fetch_assoc();
        echo ' Welcome ' . $row['name'] .'<br/>';
        echo 'ID: '. $row['id'] .'<br/>';
        // echo 'Name: '. $row['name'] .'<br/>';
        echo 'Birthdate: '. $row['birthdate'] .'<br/>';
        echo 'Email: '.$row['email'] .'<br/>';
        echo '<a href="logout.php?logout">Logout</a>';
        echo ' <div class="home-button">
        <a href="../user/user_dashboard.php">Go to Homepage <span>&rarr;</span></a>
    </div>';
    }
else
    {
        header("location:login.php");
    }
?>