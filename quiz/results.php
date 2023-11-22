<?php
require_once('../connection.php');
session_start();
if (!isset($_SESSION['User'])) {
    header("location:../account/login.php");
}

// Assuming you have the quiz_id and user's answers in the session
// if (isset($_SESSION['quiz_id']) && isset($_SESSION['user_answers'])) {
//     $quiz_id = $_SESSION['quiz_id'];
//     $user_answers = $_SESSION['user_answers'];

//     // Fetch quiz details
//     $quiz_query = "SELECT * FROM quiz WHERE quiz_id = $quiz_id";
//     $quiz_result = mysqli_query($con, $quiz_query);
//     $quiz_row = mysqli_fetch_assoc($quiz_result);

//     if ($quiz_row) {
//         $quiz_name = $quiz_row['quiz_name'];

//         // Fetch quiz questions
//         $questions_query = "SELECT * FROM quiz_$quiz_id";
//         $questions_result = mysqli_query($con, $questions_query);
//         $questions = mysqli_fetch_all($questions_result, MYSQLI_ASSOC);

//         // Calculate the percentage of correct answers
//         $correct_count = 0;
//         foreach ($questions as $question) {
//             $question_id = $question['question'];
//             if (isset($user_answers[$question_id]) && $user_answers[$question_id] == $question['correct_option']) {
//                 $correct_count++;
//             }
//         }

//         $total_questions = count($questions);
//         $percentage = ($correct_count / $total_questions) * 100;
//     } else {
//         echo "Quiz not found!";
//         exit;
//     }
// } else {
//     echo "Quiz ID or user answers not provided!";
//     exit;
// }

// if (isset($_POST['quiz_id'])) {
//     $quiz_id = $_POST['quiz_id'];
//     $question_order = $_POST['question_id'];
//     $quiz_count = count($question_order);

//     // print_r($_POST);
//     $wrong = 0;
//     $correct = 0;
//     $order = 1;
//     // print_r($user_answers);

//     foreach($question_order as $question){
//         $quiz_query = "SELECT * FROM quiz_$quiz_id WHERE quiz_no=$question";
//         $quiz_result = mysqli_query($con, $quiz_query);
//         $quiz_row = mysqli_fetch_assoc($quiz_result);    
//         $answer = $quiz_row['answer'];
//         $given_input = 'answer'.$order;
//         if($answer === $_POST[$given_input]){
//             $correct++;
//         }else{
//             $wrong++;
//         }
//         $order++;
//     }

//     $total_questions = $quiz_count;
//     $percentage = ($correct / $total_questions) * 100;

//     $sql = "INSERT INTO quiz_attempt_log VALUES (NULL,'".$_SESSION['User']."',".$quiz_id.", ".$wrong.", ".$correct.", ".$percentage.", NULL)";
//     $insertresults = mysqli_query($con,$sql);
//     if ($insertresults) {
//         $sql2="select *, ROW_NUMBER() as rn from quiz_attempt_log where rn = 1";
//         $quiz_results2 = mysqli_query($con,$sql2);
//         $quiz_row2 = mysqli_fetch_assoc($quiz_result2);    
//         $attempt_id = $quiz_row2['attempt_id'];
//         header("location:results.php?attempt_id=".$attempt_id);
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }
if(isset($_GET['attempt_id'])){
    $attempt_id = isset($_GET['attempt_id']);
    $sql10="select * from quiz_attempt_log where attempt_id = ". $attempt_id;
    $quiz_results10 = mysqli_query($con,$sql10);
    $quiz_row10 = mysqli_fetch_assoc($quiz_results10);
    $percentage = $quiz_row10['score'];
    $correct = $quiz_row10['correct'];
    $total_questions = "".intval($quiz_row10['wrong']) + intval($quiz_row10['correct']);
}

    // if ($quiz_row) {
    //     $quiz_name = $quiz_row['quiz_name'];

    //     // Fetch quiz questions
    //     $questions_query = "SELECT * FROM quiz_$quiz_id";
    //     $questions_result = mysqli_query($con, $questions_query);
    //     $questions = mysqli_fetch_all($questions_result, MYSQLI_ASSOC);

    //     // Calculate the percentage of correct answers
    //     $correct_count = 0;
    //     foreach ($questions as $question) {
    //         $question_id = $question['question'];
    //         if (isset($user_answers[$question_id]) && $user_answers[$question_id] == $question['correct_option']) {
    //             $correct_count++;
    //         }
    //     }

    //     $total_questions = count($questions);
    //     $percentage = ($correct_count / $total_questions) * 100;
    // } else {
    //     echo "Quiz not found!";
    //     exit;
    // }
 else {
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../wf/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="quiz_style.css" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

    <link href="../wf/assets/QuizITLogo.png" rel="shortcut icon" type="image/x-icon" />
    <link href="../wf/assets/QuizITLogo.png" rel="apple-touch-icon" />

</head>
<?php require '../navbar.php' ?>

<body>
    <div class="container text-center">
        <h1 class="display-4">Quiz Results</h1>
        <div class="progress" style="width: 200px; height: 200px;">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $percentage; ?>%;"
                aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <p class="mt-3">You scored <?php echo $correct; ?> out of <?php echo $total_questions; ?> questions
            correctly.</p>
        <div class="mt-4">
            <a href="retake_quiz.php" class="btn btn-primary">Retake Quiz</a>
            <a href="../homepage.php" class="btn btn-success">Go Back to Homepage</a>
        </div>
    </div>
</body>

<footer>
    <script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
    <script src='../language.js'></script>
    <script src="quiz.js"></script>
</footer>

</html>
