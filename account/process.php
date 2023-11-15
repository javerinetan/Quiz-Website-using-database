<?php 
require_once('connection.php');
session_start();
    if(isset($_POST['Login']))
    {
       if(empty($_POST['UName']) || empty($_POST['Password']))
       {
            header("location:login.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select * from account where username='".$_POST['UName']."' and password='".$_POST['Password']."'";
            $con = mysqli_connect('localhost','root','','php_crud_tutorial');
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['UName'];
                header("location:welcome.php");
            }
            else
            {
                header("location:login.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }

?>