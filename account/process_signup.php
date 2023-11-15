<?php 
require_once('connection.php');
    if(isset($_POST['Signup']))
    {
       if(empty($_POST['Name']) || empty($_POST['Birthdate']) || empty($_POST['Email']) || empty($_POST['Password']))
       {
            header("location:signup.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select * from account where email='".$_POST['Email']."'";
            $result=mysqli_query($con,$query);
            if (mysqli_fetch_assoc($result)){
                echo 'This email has been registered already<br>Login instead: <a href="login.php">Login Page</a> ';
            }
            else{
                $sql = "INSERT INTO account VALUES (NULL,'".$_POST['Name']."', '".$_POST['Birthdate']."', '".$_POST['Email']."', '".$_POST['Password']."', NULL)";
                $insertresults = mysqli_query($con,$sql);
                if (mysqli_query($con,$sql) === TRUE) {
                echo "New account created! Please go to <a href='login.php'>Login Page</a> ";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }

?>