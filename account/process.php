<?php 
require_once('connection.php');
session_start();
    if(isset($_POST['Login']))
    {
       if(empty($_POST['Email']) || empty($_POST['Password']))
       {
            header("location:login.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select id from account where email='". strtolower($_POST['Email']) ."' and password='".$_POST['Password']."'";
            // $con = mysqli_connect('localhost','root','','webdb_project');
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['Email'];
                header("location:welcome.php");
            }
            else
            {
                header("location:login.php?Invalid= Please Enter Correct Email or Password ");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }

?>