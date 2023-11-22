<!-- for log in only function -->
<?php 
require_once('../connection.php'); 
session_start(); 
if(!isset($_SESSION['User']))
    {header("location:../account/login.php");} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<?php require '../navbar.php'; ?>

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
        #container-central{
         width: 70%;
         height: 30%;   
         margin-left: auto;
         margin-right: auto;
        }
</style>

<?php
$query = "SELECT * FROM quiz_attempt_log qal JOIN quiz q ON qal.quiz_id = q.quiz_id WHERE attempt_by = " . $_SESSION['User'];
$result = $con->query($query);

$query2 = "SELECT qal.quiz_id, q.quiz_name, qal.score FROM quiz_attempt_log qal JOIN quiz q ON qal.quiz_id = q.quiz_id WHERE attempt_by = {$_SESSION['User']} ORDER BY qal.attempted_on DESC LIMIT 3";
$result2 = $con->query($query2);

?>

<body>
    <section>
        <h1>Attempts Log table</h1>
        <table>
            <tr>
               
                <th>Attmept ID</th>
                <th>Quiz Name</th>
                <th>Correct</th>
                <th>Wrong</th>
                <th>Score</th>
                <th>Attempted On</th>
            </tr>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['attempt_id']; ?></td>
                        <td><?php echo $row['quiz_name']; ?></td>
                        <td><?php echo $row['correct']; ?></td>
                        <td><?php echo $row['wrong']; ?></td>
                        <td><?php echo $row['score']; ?></td>
                        <td><?php echo $row['attempted_on']; ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }
            ?>
        </table>
    </section>

    <section>
        <h1>Last 3 Attempts </h1>
        <table>
            <tr>
                <th>Quiz Name</th>
                <th>Score</th>
                <th>Retake Quiz</th>
            </tr>
            <?php
            if ($result2) {
                while ($row = mysqli_fetch_assoc($result2)) {
            ?>
                    <tr>
                        <td><?php echo $row['quiz_name']; ?></td>
                        <td><?php echo $row['score']; ?></td>
                        <td><a href="../quiz/attempt_quiz.php?quiz_id=<?php echo $row['quiz_id']; ?>">Retake Quiz</a></td>

                    </tr>
            <?php
                }
            } else {
                echo "Error: " . mysqli_error($con);
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