<?php 
require_once('connection.php');
session_start(); 
if(!isset($_SESSION['User']))
    {header("location:account/login.php");}
?>
<?php
    // $query="select * from account where email='".$_SESSION['User']."'";
    // $results=mysqli_query($con,$query);
    // $row=$results->fetch_assoc();
    // echo ' Welcome ' . $row['name'] .'<br/>';
    // echo 'ID: '. $row['id'] .'<br/>';
    // // echo 'Name: '. $row['name'] .'<br/>';
    // echo 'Birthdate: '. $row['birthdate'] .'<br/>';
    // echo 'Email: '.$row['email'] .'<br/>';
    // echo '<a href="logout.php?logout">Logout</a>';
    // $query="select * from account where email='".$_SESSION['User']."'";
    // $con = mysqli_connect('localhost','root','','webdb_project');

    // $results=mysqli_query($con,$query);
    // $row=$results->fetch_assoc();
    // echo $row['name'];
    $hi='hi'
?>

<h2>hello</h2>

<?php echo gettype($_SESSION['User']);?>
