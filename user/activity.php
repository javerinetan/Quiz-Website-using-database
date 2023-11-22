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
        #error_msg {
            text-align: center;
            color: #800880;
            font-size: 3em;
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', 'sans-serif';
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 25vh
        }

        #createQuizBtn {
            align-items: center;
        }
        .btn-try-container{
            text-align: center;
            margin-top: 20px;
        }

        .btn-try{
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
        .btn-try:hover{
            background-color: #0a5cb4; /* You can change the hover background color */
            text-decoration: none;
            color: #fff;
        }


</style>

<?php
$query = "SELECT * FROM quiz_attempt_log qal JOIN quiz q ON qal.quiz_id = q.quiz_id WHERE attempt_by = " . $_SESSION['User'];
$result = $con->query($query);

$query2 = "SELECT qal.quiz_id, q.quiz_name, qal.score FROM quiz_attempt_log qal JOIN quiz q ON qal.quiz_id = q.quiz_id WHERE attempt_by = {$_SESSION['User']} ORDER BY qal.attempted_on DESC LIMIT 3";
$result2 = $con->query($query2);

?>

<body>
    <br>
    <br>
    <?php
        $query_check_attempts = "SELECT COUNT(*) as num_attempts FROM quiz_attempt_log WHERE attempt_by = {$_SESSION['User']}";
        $result_check_attempts = $con->query($query_check_attempts);
        $row_check_attempts = mysqli_fetch_assoc($result_check_attempts);
    
        if ($row_check_attempts['num_attempts'] == 0) {
            echo '<div class="container">';
            echo "<h1 id=error_msg>No attempts made yet.</h1>";
            echo '<div class="btn-try-container">';
            echo '<a href="home.php" class="btn create btn-try" id="createQuizBtn">Get Started!</a>';
            echo '</div>';
            echo '</div>';


        } else {
            echo '<section>';
            echo '    <h1>Last 3 Attempts </h1>';
            echo '    <table>';
            echo '        <tr>';
            echo '            <th>Quiz Name</th>';
            echo '            <th>Score</th>';
            echo '            <th>Retake Quiz</th>';
            echo '        </tr>';
            if ($result2) {
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo '        <tr>';
                    echo '            <td>' . $row['quiz_name'] . '</td>';
                    echo '            <td>' . $row['score'] . '</td>';
                    echo '            <td><a href="../quiz/attempt_quiz.php?quiz_id=' . $row['quiz_id'] . '"><i class="fa fa-repeat fa-lg" style="color: red;" aria-hidden="true"></i></a></td>';
                    echo '        </tr>';
                }
            } else {
                echo 'Error: ' . mysqli_error($con);
            }
            echo '    </table>';
            echo '</section>';

            echo '<br>';
            echo '<br>';
            echo '<br>';

            echo '<section>';
            echo '    <h1>Attempts Log table</h1>';
            echo '    <table>';
            echo '        <tr>';
            echo '            <th>Attempt ID</th>';
            echo '            <th>Quiz Name</th>';
            echo '            <th>Correct</th>';
            echo '            <th>Wrong</th>';
            echo '            <th>Score</th>';
            echo '            <th>Attempted On</th>';
            echo '        </tr>';
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '        <tr>';
                    echo '            <td>' . $row['attempt_id'] . '</td>';
                    echo '            <td>' . $row['quiz_name'] . '</td>';
                    echo '            <td>' . $row['correct'] . '</td>';
                    echo '            <td>' . $row['wrong'] . '</td>';
                    echo '            <td>' . $row['score'] . '</td>';
                    echo '            <td>' . $row['attempted_on'] . '</td>';
                    echo '        </tr>';
                }
            } else {
                echo 'Error: ' . mysqli_error($con);
            }
            echo '    </table>';
            echo '</section>';
        }

    ?>

    


</body>



<footer>
<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>
</footer>

</html>