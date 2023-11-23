<?php 
require_once('../connection.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(!isset($_SESSION['User']))
    {header("location:login.php");
} 

$userid = $_SESSION['User'];
$query="select * from account where id=".$_SESSION['User']."";
$instance = new DatabaseConnection();
$row=$instance->retrieveData($query);

// Count quizzes created by the user
$queryCreated = "SELECT COUNT(*) as quizzes_created FROM quiz WHERE creator_id = $userid";
$resultCreated = mysqli_query($con, $queryCreated);
if ($resultCreated == TRUE) {
    $rowCreated = mysqli_fetch_assoc($resultCreated);
    $quizzesCreated = $rowCreated['quizzes_created'];

} else {
    // created = 0 
    // echo "Error: " . $queryCreated . "<br>" . $con->error;

}

// Count quizzes taken by the user
$queryTaken = "SELECT COUNT(*) as quizzes_taken FROM quiz_attempt_log WHERE attempt_by = $userid";
$resultTaken = mysqli_query($con, $queryTaken);
if ($resultTaken == TRUE) {
    $rowTaken = mysqli_fetch_assoc($resultTaken);
    $quizzesTaken = $rowTaken['quizzes_taken'];
} else {
    // taken = 0
    // echo "Error: " . $queryTaken . "<br>" . $con->error;
}


$quizzesTaken = $instance->retrieveData($queryTaken)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <style>
        h1 {
            text-align: center;
            color: #800880;
            font-size: 3em;
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', 'sans-serif';
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 25vh
        }
 
        .dashboard{
            text-align: center;

        }

        #Chart1, #Chart2 {
            width: 80%; 
            margin: 20px auto; 
            border: 1px solid #ddd; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            padding-bottom: 2.5%;
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

        body {
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', 'sans-serif';
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            text-align: center;
            color: #5d2057;
        }

        h6{
            color: #800880;
        }

        #createQuizBtn {
            align-items: center;
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

        .btn-try-container{
            text-align: center;
            margin-top: 20px;
        }

        .btn-try:hover{
            background-color: #0a5cb4; /* You can change the hover background color */
            text-decoration: none;
            color: #fff;
        }

        p{
            color: #f8f9fa;
            padding: 0.6%;
        }        

    </style>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>
<?php require '../navbar.php'?>


<body>

<!-- Dashboard for no. of quiz created & Quiz taken over a session -->


</div>
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

        echo '<div class="dashboard">';
        echo '    <h1>Welcome, ' . $row['name'] . '!</h1>';
        echo '    <h6>Number of quizzes created: ';
        if ($resultCreated == true) {
            echo $quizzesCreated;
        } else {
            echo "0";
        };
        echo '</h6>';
        echo '    <h6>Number of quizzes taken: ';
        if ($resultTaken == true) {
            $number = reset($quizzesTaken);
            echo $number;
        } else {
            echo "0";
        };
        echo '</h6>';
        echo '</div>';

        echo '<div>';
        echo '<canvas id="Chart1"></canvas>';
        echo '<canvas id="Chart2"></canvas>';
        echo '</div>';
    }
?>

<?php 
    $queryforgraph1 = "SELECT YEAR(created_on) AS year, MONTH(created_on) AS month, dayofmonth(created_on) as day, COUNT(*) AS quizzes_created
                       FROM quiz
                       WHERE creator_id = $userid
                       GROUP BY year, month, day";

    // Fetch data for graph1
    $resultGraph1 = mysqli_query($con, $queryforgraph1);
    $dataGraph1 = [];

    while ($rowGraph1 = mysqli_fetch_assoc($resultGraph1)) {
        $dataGraph1[] = [
            'year' => $rowGraph1['year'],
            'month' => $rowGraph1['month'],
            'day' => $rowGraph1['day'],
            'quizzes_created' => $rowGraph1['quizzes_created'],
        ];
    }

    $queryforgraph2 = "SELECT YEAR(attempted_on) AS year2, MONTH(attempted_on) AS month2, dayofmonth(attempted_on) as day2, COUNT(*) AS quizzes_taken
                       FROM quiz_attempt_log
                       WHERE attempt_by = $userid
                       GROUP BY year2, month2, day2";

    // Fetch data for graph2
    $resultGraph2 = mysqli_query($con, $queryforgraph2);
    $dataGraph2 = [];

    while ($rowGraph2 = mysqli_fetch_assoc($resultGraph2)) {
        $dataGraph2[] = [
            'year2' => $rowGraph2['year2'],
            'month2' => $rowGraph2['month2'],
            'day2' => $rowGraph2['day2'],
            'quizzes_taken' => $rowGraph2['quizzes_taken'],
        ];
    }

?>

<!-- When i click on the quiz start, append +1 into a list so i have a counter -->



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('Chart1');

  new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php
            // an empty array to store formatted date strings
            $formattedDates = [];

            // Iterate through each entry in the $dataGraph1 array
            foreach ($dataGraph1 as $date) {
                // Extract month and year from the current entry
                $month = $date['month'];
                $year = $date['year'];
                $day = $date['day'];

                // Convert the corresponding value for the dates
                // mktime = (hour, minute, second, month, day, year, is_dst)
                $timestamp = mktime(0, 0, 0, $month, $day, $year);

                // Format the timestamp as "D M Y" and add it to the $formattedDates array
                $formattedDates[] = date("d M Y", $timestamp);
            }

            // change the $formattedDates into a json-encoding format then print/echo the array
            echo json_encode($formattedDates);
        ?>,
        datasets: [{
            label: '# of Quiz Created by day',
            data: <?php echo json_encode(array_column($dataGraph1, 'quizzes_created')); ?>,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                stepSize: 1,
                precision: 0
            }
        }
    }
});
</script>

<script>
  const ctx1 = document.getElementById('Chart2');

  new Chart(ctx1, {
    type: 'line',
    data: {
        labels: <?php
            $formattedDates2 = [];

            foreach ($dataGraph2 as $date) {

                $month2 = $date['month2'];
                $year2 = $date['year2'];
                $day2 = $date['day2'];

                $timestamp = mktime(0, 0, 0, $month2, $day2, $year2);

                $formattedDates2[] = date("d M Y", $timestamp);
            }
            echo json_encode($formattedDates2);
        ?>,
        datasets: [{
        label: '# of Quiz taken by day',
        data: <?php echo json_encode(array_column($dataGraph2, 'quizzes_taken')); ?>,
        borderWidth: 1
    }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                stepSize: 1,
                precision: 0
            }
        }
    }
});
</script>

<br>
<br>
</body>

<footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>
</footer>

</html>