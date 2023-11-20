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
    // $quizzesCreated = mysqli_num_rows($resultCreated);

} else {
    // created = 0 
    // echo "Error: " . $queryCreated . "<br>" . $con->error;

}

// Count quizzes taken by the user
$queryTaken = "SELECT COUNT(*) as quizzes_taken FROM quiz WHERE user_id = $userid";
$resultTaken = FALSE; // temporary until the table for it has been set
// $resultTaken = mysqli_query($con, $queryTaken);
// $rowTaken = mysqli_fetch_assoc($resultTaken);
// $quizzesTaken = $rowTaken['quizzes_taken'];
// if ($resultTaken == TRUE) {
//     $rowTaken = mysqli_fetch_assoc($resultTaken);
//     $quizzesTaken = $rowTaken['quizzes_taken'];
// } else {
//     // taken = 0
//     // echo "Error: " . $queryCreated . "<br>" . $con->error;
// }
// $quizzesTaken = $instance->retrieveData($queryTaken)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- bootstraps -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="userstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

    <link href="../wf/assets/QuizITLogo.png" rel="shortcut icon" type="image/x-icon" />
    <link href="../wf/assets/QuizITLogo.png" rel="apple-touch-icon" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <!-- Logo and Search Bar on the left -->
        <img class="navbar-brand" src="../wf/assets/QuizITLogoname.png" href="home.php">

        <!-- Toggler Button for small screens -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
        </button>
        <form class="d-flex">
            <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
        </form>

        <!-- Navbar items at the center -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Dashboard</a>
                </li>
            </ul>
        </div>

        <!-- Profile button and dropdown on the left -->
        <div class="dropdown">
        <a href="../quiz/create_quiz.php"><button class="btn create " type="submit">Create a Quiz</button></a>

            <!-- Profile dropdown with image -->
            <button class="btn profile dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../wf/assets/dd.jpg" alt="User Image" class="user-image">
            </button>
            <ul class="profile_drop dropdown-menu" aria-labelledby="profileDropdown">
                <li class="details_user">
                <?php  
                    $query="select * from account where id=".$_SESSION['User']."";
                    $results=mysqli_query($con,$query);
                    $row=$results->fetch_assoc();
                    echo $row['name'];
                    echo '<br>';
                    echo $row['email'];
                ?>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="user_account.php">Settings</a></li>
                <li><a class="dropdown-item" href="../account/logout.php?logout">Log Out</a>
                <?php 
                    // $query="select * from account where email='".$_SESSION['User']."'";
                    // $results=mysqli_query($con,$query);
                    // $row=$results->fetch_assoc();
                    // echo '<a class="dropdown-item" href="../account/logout.php?logout">Log Out</a>';
                ?>
                </li>
            </ul>
        </div>
    </div>
</nav>


<body>

<!-- Dashboard for no. of quiz created & Quiz taken over a session -->

<div class="dashboard">
    <h2>Welcome, <?php echo $row['name'] ; ?>!</h2>
    <p>Number of quizzes created: <?php 
    if($resultCreated==True){
        echo $quizzesCreated;
    }else{
        echo "0";
    }; 
    ?></p>
    <p>Number of quizzes taken: <?php 
    if($resultTaken==TRUE){
        echo $quizzesTaken;
    }else{
        echo "0";
    }; 
    ?></p>
</div>

<?php 
    $queryforgraph1 = "SELECT YEAR(created_on) AS year, MONTH(created_on) AS month, COUNT(*) AS quizzes_created
                       FROM quiz
                       WHERE creator_id = $userid
                       GROUP BY year, month";

    // Fetch data for graph1
    $resultGraph1 = mysqli_query($con, $queryforgraph1);
    $dataGraph1 = [];

    while ($rowGraph1 = mysqli_fetch_assoc($resultGraph1)) {
        $dataGraph1[] = [
            'year' => $rowGraph1['year'],
            'month' => $rowGraph1['month'],
            'quizzes_created' => $rowGraph1['quizzes_created'],
        ];
    }
?>

<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php 
            echo json_encode(array_map(function($entry) {
                return date("M Y", mktime(0, 0, 0, $entry['month'], 1, $entry['year']));
            }, $dataGraph1)); 
        ?>,
        datasets: [{
            label: '# of Quiz Created per Month',
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

</body>

<footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>
</footer>

</html>