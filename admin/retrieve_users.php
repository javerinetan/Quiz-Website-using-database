<!-- for log in only function -->
<?php 
require_once('../connection.php');
session_start(); 
if(!isset($_SESSION['User']))
    {header("location:login.php");}
else{
    $query="select * from account where id='".$_SESSION['User']."'";
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

    <!-- bootstraps -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../wf/style.css" rel="stylesheet" type="text/css" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

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
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
</style>

<?php
$query = " SELECT * FROM account WHERE admin = FALSE ;";
$result = $con->query($query);
?>

<body>
    <section>
        <h1>User table</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Birthdate</th>
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
<script src='../language.js'></script>
</footer>

</html>

<?php
    }
}?>