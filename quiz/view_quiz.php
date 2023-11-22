<!-- for log in only function -->
<?php 
require_once('../connection.php');
session_start(); 
if(!isset($_SESSION['User']))
    {header("location:../account/login.php");} 

$query="select * from account where id=".$_SESSION['User']."";
$instance = new DatabaseConnection();
$row=$instance->retrieveData($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
    <?php
        // $query = "SELECT name FROM account WHERE id=" . $_SESSION['User'] . "";
        // $result = mysqli_query($con, $query);
        // $row = $result->fetch_assoc();
        echo 'Welcome ' . ucfirst($row['name']);
    ?>

    </title>

    <style>
        
    </style>

</head>
<?php require '../navbar.php' ?>

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
        .add-qn-container {
            text-align: right;
            margin-top: 20px; /* Adjust the margin as needed */
            width: 92.4%;
        }

        .add-qn-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff; /* You can change the background color */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            border: none;
            outline: none;
        }

        .add-qn-btn:hover {
            background-color: #0a5cb4; /* You can change the hover background color */
            text-decoration: none;
            color: #fff;
        }

</style>

<?php
$query = "SELECT * FROM quiz_".$_GET['quiz_id']." ;";
$result = $con->query($query);
?>

<body>
    <div class="container">
        <section>
            <h1>quiz table</h1>
            <table>
                <tr>
                
                    <th>No</th>
                    <th>Question</th>
                    <th>Option 1</th>
                    <th>Option 2</th>
                    <th>Option 3</th>
                    <th>Option 4</th>
                    <th>Answer</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php 
                    // LOOP TILL END OF DATA
                    $counter = 0; // Initialize the counter
                    while($rows=$result->fetch_assoc()) {
                        $counter += 1
                ?>
                <tr>
                    
                    <td><?php echo $counter;?></td>
                    <td><?php echo $rows['question'];?></td>
                    <td><?php echo $rows['option_1'];?></td>
                    <td><?php echo $rows['option_2'];?></td>
                    <td><?php echo $rows['option_3'];?></td>
                    <td><?php echo $rows['option_4'];?></td>
                    <td><?php echo $rows['answer'];?></td>

                    <td><a href="update_quiz.php?quiz_id=<?php echo $_GET['quiz_id']; ?>&quiz_no=<?php echo $rows['quiz_no']; ?>"><i class="fa fa-pencil-square-o fa-lg" style="color: #f5a60f;"></i></a></td>
                    <td><a href="delete_quiz.php?quiz_id=<?php echo $_GET['quiz_id']; ?>&quiz_no=<?php echo $rows['quiz_no']; ?>" onclick="return confirm('Are you sure you want to delete this question?')"><i class="fa fa-trash fa-lg" style="color: red;"></i></a></td>

                </tr>
                <?php
                    }
                ?>

            </table>
            <div class="add-qn-container">
                <a href="add_question.php?quiz_id=<?php echo $_GET['quiz_id']; ?>" class="add-qn-btn">Add Question</a>
            </div>
        </section>
    </div>

</body>

<footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>
</footer>

</html>