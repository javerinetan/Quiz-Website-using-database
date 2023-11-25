<?php
require_once('../connection.php');
session_start();

if (!isset($_SESSION['User'])) {
    header("location:../account/login.php");
    exit();
}

if (isset($_GET['quiz_id'])) {
    $quiz_id = $_GET['quiz_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addQuestion'])) {

        
        // Process the form submission to add a new question
        $question_text = mysqli_real_escape_string($con, $_POST['question']);
        $option_1 = mysqli_real_escape_string($con, $_POST['option_1']);
        $option_2 = mysqli_real_escape_string($con, $_POST['option_2']);
        $option_3 = mysqli_real_escape_string($con, $_POST['option_3']);
        $option_4 = mysqli_real_escape_string($con, $_POST['option_4']);
        $correct_option = mysqli_real_escape_string($con, $_POST['correct_option']);

        $correct = $_POST['correct_option'];
        if($correct=="option_1"){
            $correct=$option_1;
        }elseif($correct=="option_2"){
            $correct=$option_2;
        }elseif($correct=="option_3"){
            $correct=$option_3;
        }elseif($correct=="option_4"){
            $correct=$option_4;
        }

        // Get the last quiz_no
        $last_quiz_no_query = "SELECT MAX(quiz_no) AS last_quiz_no FROM quiz_$quiz_id";
        $result = mysqli_query($con, $last_quiz_no_query);
        $row = mysqli_fetch_assoc($result);
        $last_quiz_no = $row['last_quiz_no'];

        // Increment the last quiz_no by one
        $new_quiz_no = $last_quiz_no + 1;

        // Add the new question to the database with the new quiz_no
        $insert_query = "INSERT INTO quiz_$quiz_id (quiz_no, question, option_1, option_2, option_3, option_4, answer) 
                         VALUES ($new_quiz_no, '$question_text', '$option_1', '$option_2', '$option_3', '$option_4', '$correct')";
        mysqli_query($con, $insert_query);
        
        mysqli_query($con, "UPDATE quiz SET questions = questions + 1 WHERE quiz_id = $quiz_id");


        // Redirect back to view_quiz.php after adding the question
        header("location:view_quiz.php?quiz_id=$quiz_id");
        exit();
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Quiz Question</title>

    <!-- bootstraps -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

<body>
   <div class="container">
    <h2>Add Question</h2>
        <form method="post" class="row g-2" id="quiz-form" style="width: 100%;">
            <div class="quiz-question">
                <div class="question-container">
                    <h3>Add New Question</h3>
                    <div class="col-md-23">
                        <label for="question">Question</label>
                        <input type="text" name="question" class="form-control mb-3" required>
                    </div>
                    <div class="col-md-23">
                        <label for="option_1">Option 1</label>
                        <input type="text" name="option_1" class="form-control mb-3" required>
                    </div>
                    <div class="col-md-23">
                        <label for="option_2">Option 2</label>
                        <input type="text" name="option_2" class="form-control mb-3" required>
                    </div>
                    <div class="col-md-23">
                        <label for="option_3">Option 3</label>
                        <input type="text" name="option_3" class="form-control mb-3" required>
                    </div>
                    <div class="col-md-23">
                        <label for="option_4">Option 4</label>
                        <input type="text" name="option_4" class="form-control mb-3" required>
                    </div>
                    <div class="col-md-23">
                        <label for="correct_option">Correct Answer</label>
                        <select name="correct_option" class="form-control" required>
                            <option value="option_1">Option 1</option>
                            <option value="option_2">Option 2</option>
                            <option value="option_3">Option 3</option>
                            <option value="option_4">Option 4</option>
                        </select>
                        <!-- Hidden input field to store the selected option's value -->
                        <input type="hidden" name="correct_answer" value="">
                    </div>
                </div>
            </div>

            <button type="submit" name="addQuestion" class="add-qn-btn" style="font-size: 16px;">Add Question</button>
        </form>
        <div class="home-btn-container">
            <a class="home-btn" href="view_quiz.php?quiz_id=<?php echo $_GET['quiz_id']; ?>"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a>
        </div>
   </div>
</body>

<footer>
    <script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
    <script src='../language.js'></script>
    <script src="quiz.js"></script>
</footer>

</html>

</html>
