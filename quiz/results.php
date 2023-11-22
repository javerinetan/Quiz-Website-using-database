<?php
require_once('../connection.php');
session_start();
if (!isset($_SESSION['User'])) {
    header("location:../account/login.php");
}

if(isset($_GET['attempt_id'])){
    $attempt_id = $_GET['attempt_id'];
    $sql10="select * from quiz_attempt_log where attempt_id = ". $attempt_id;
    $quiz_results10 = mysqli_query($con,$sql10);
    $quiz_row10 = mysqli_fetch_assoc($quiz_results10);
    $percentage = $quiz_row10['score'];
    $correct = $quiz_row10['correct'];

    $total_questions = "".intval($quiz_row10['wrong']) + intval($quiz_row10['correct']);
    $quiz_id = $quiz_row10['quiz_id'];
}else {
    echo "Quiz ID or user answers not provided!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Results</title>

    
    <!-- bootstraps -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../wf/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="quiz_style.css" />


    <link href="../wf/assets/QuizITLogo.png" rel="shortcut icon" type="image/x-icon" />
    <link href="../wf/assets/QuizITLogo.png" rel="apple-touch-icon" />

    
</head>
<?php require '../navbar.php' ?>

<body>
    <div class="container text-center">
        <h1 class="display-4" style="margin-top: 30px;">Quiz Results</h1>
        <div class="progress-container" style="width: 300px; height: 80px; position: relative;">

            <!-- The percentage bar -->
            <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage; ?>%;"
                    aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <!-- Display the percentage in the center of the circle -->
            <div class="percentage-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #333;">
                <?php echo $percentage; ?>%
            </div>

        </div>
        <p class="mt-3">You scored <?php echo $correct; ?> out of <?php echo $total_questions; ?> questions
            correctly.</p>
        <div class="mt-4">
            <a href="attempt_quiz.php?quiz_id=<?php echo $quiz_id; ?>" class="btn btn-invert">Retake Quiz</a>
            <a href="../user/home.php" class="btn btn-normal">Go Back to Homepage</a>
        </div>
    </div>
</body>

<footer>
    <script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
    <script src='../language.js'></script>
    <script src="quiz.js"></script>
</footer>

</html>
