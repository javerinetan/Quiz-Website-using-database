<!-- for log in only function -->
<?php 
require_once('../connection.php');
session_start(); 
if(!isset($_SESSION['User']))
    {header("location:../account/login.php");} 
else{
    $query="select * from account where id=".$_SESSION['User']."";
    $instance = new DatabaseConnection();
    $row=$instance->retrieveData($query);
    if(!$row['admin'])
        {  
            header("location:../index.php");
        }
    else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Retrieve Users</title>
</head>

<style>
    table {
            margin: 0 auto;
            font-size: large;
            border-collapse: collapse;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            border: 1px solid black !important;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black !important;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }

</style>

<?php require '../navbar.php'; ?>
<?php
$query = " SELECT * FROM account WHERE admin = FALSE ;";
$result = $con->query($query);
?>

<body>
    <section>
        <br>
        <h1 style="color: #5d2057">User table</h1>
        <br>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Joined for (days)</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php 
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td>
                    <?php 
                        $date = new DateTime($rows['birthdate']);
                        $currentDate = new DateTime();
                        // Calculate the interval between the two dates
                        $interval = $date->diff($currentDate);
                        $age = $interval->y;
                        echo $age;?>
                </td>
                <td><?php echo $rows['email'];?></td>
                <td><?php 
                $date = new DateTime($rows['joined_on']);
                $currentDate = new DateTime();
                // Calculate the interval between the two dates
                $interval = $date->diff($currentDate);
                $days = $interval->d;
                echo $days;?></td>
                <!-- <td><?php echo $rows['joined_on'];?></td> -->

            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>

<footer>


<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script><script src='../language.js'></script>
</footer>

</html>

<?php
    }
}?>