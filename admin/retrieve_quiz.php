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
    <title>Admin | Retrieve Quiz</title>
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
$query = " SELECT * FROM quiz ;";
$result = $con->query($query);
?>

<body>
    <section>
        <h1>Quiz table</h1>
        <table>
            <tr>
                <th>Quiz ID</th>
                <th>Creator ID</th>
                <th>Quiz Name</th>
                <th>No. of Questions</th>
                <th>Created On</th>
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
                <td><?php echo $rows['quiz_id'];?></td>
                <td><?php echo $rows['creator_id'];?></td>
                <td>
                    <?php echo $rows['quiz_name'];?>
                </td>
                <td><?php echo $rows['questions'];?></td>
                <td><?php echo $rows['created_on'];?></td>

            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>

<footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>
</footer>

</html>

<?php
    }
}?>