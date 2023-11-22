<?php
// Include the connection file
require_once('../connection.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['User'])) {
    header("location:../account/login.php");
    exit();
}

if (isset($_GET['quiz_id'])) {
    $quiz_id = $_GET['quiz_id'];

    // Fetch quiz details
    $quiz_query = "SELECT * FROM quiz WHERE quiz_id = $quiz_id";
    $quiz_result = mysqli_query($con, $quiz_query);
    $quiz_row = mysqli_fetch_assoc($quiz_result);

    if ($quiz_row) {
        $quiz_name = $quiz_row['quiz_name'];
        $quiz_limit = $quiz_row['questions'];

        // Fetch quiz questions
        $questions_query = "SELECT * FROM quiz_$quiz_id";
        $questions_result = mysqli_query($con, $questions_query);
        $questions = mysqli_fetch_all($questions_result, MYSQLI_ASSOC);

        // Check if the form is submitted
        if (isset($_POST['updateQuestion'])) {
            // Iterate through submitted data and update the database
            foreach ($questions as $question) {
                $question_no = $question['quiz_no'];
                $question_text = mysqli_real_escape_string($con, $_POST["q{$question_no}_qn"]);
                $option_1 = mysqli_real_escape_string($con, $_POST["q{$question_no}_op1"]);
                $option_2 = mysqli_real_escape_string($con, $_POST["q{$question_no}_op2"]);
                $option_3 = mysqli_real_escape_string($con, $_POST["q{$question_no}_op3"]);
                $option_4 = mysqli_real_escape_string($con, $_POST["q{$question_no}_op4"]);
                $correct_option = mysqli_real_escape_string($con, $_POST["q{$question_no}_answer"]);

                $correct = $_POST["q{$question_no}_answer"];
                if($correct=="option_1"){
                    $correct=$option_1;
                }elseif($correct=="option_2"){
                    $correct=$option_2;
                }elseif($correct=="option_3"){
                    $correct=$option_3;
                }elseif($correct=="option_4"){
                    $correct=$option_4;
                }

                // Update the database
                $update_query = "UPDATE quiz_$quiz_id SET question = '$question_text', 
                    option_1 = $option_1  , option_2 = $option_2, option_3 = $option_3, option_4 = $option_4,
                    answer = $correct WHERE quiz_no = $question_no";

                mysqli_query($con, $update_query);
            }

            // Redirect to the view_quiz.php page after the update
            header("location:view_quiz.php?quiz_id=$quiz_id");
            exit();
        }
    }
}
?>


<!DOCTYPE html>
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
    <h2>Update Quiz Question</h2>
    <div class="main-content">
        <form method="post" class="row g-2" id="quiz-form">
            <?php foreach ($questions as $question) : ?>
                <div class="quiz-question" id="question<?php echo $question['quiz_no']; ?>">
            
                <div class="question-container">
                    <h3>Question <?php echo $question['quiz_no']; ?></h3>
                    <div class="col-md-23">
                        <label for="q<?php echo $question['quiz_no']; ?>_qn">Question</label>
                        <input type="text" name="q<?php echo $question['quiz_no']; ?>_qn" value="<?php echo htmlspecialchars($question['question']); ?>" class="form-control mb-3" required>
                    </div>
                    <div class="col-md-23">
                        <label for="q<?php echo $question['quiz_no']; ?>_op1">Option 1</label>
                        <input type="text" name="q<?php echo $question['quiz_no']; ?>_op1" value="<?php echo htmlspecialchars($question['option_1']); ?>" class="form-control mb-3" required>
                    </div>
                    <div class="col-md-23">
                        <label for="q<?php echo $question['quiz_no']; ?>_op2">Option 2</label>
                        <input type="text" name="q<?php echo $question['quiz_no']; ?>_op2" value="<?php echo htmlspecialchars($question['option_2']); ?>" class="form-control mb-3" required>
                    </div>
                    <div class="col-md-23">
                        <label for="q<?php echo $question['quiz_no']; ?>_op3">Option 3</label>
                        <input type="text" name="q<?php echo $question['quiz_no']; ?>_op3" value="<?php echo htmlspecialchars($question['option_3']); ?>" class="form-control mb-3" required>
                    </div>
                    <div class="col-md-23">
                        <label for="q<?php echo $question['quiz_no']; ?>_op4">Option 4</label>
                        <input type="text" name="q<?php echo $question['quiz_no']; ?>_op4" value="<?php echo htmlspecialchars($question['option_4']); ?>" class="form-control mb-3" required>
                    </div>
                    <div class="col-md-23">
                        <label for="q<?php echo $question['quiz_no']; ?>_answer">Correct Answer</label>
                        <select name="q<?php echo $question['quiz_no']; ?>_answer" class="form-control" required>
                            <option value="option_1" <?php echo ($question['answer'] == 'option_1') ? 'selected' : ''; ?>>Option 1</option>
                            <option value="option_2" <?php echo ($question['answer'] == 'option_2') ? 'selected' : ''; ?>>Option 2</option>
                            <option value="option_3" <?php echo ($question['answer'] == 'option_3') ? 'selected' : ''; ?>>Option 3</option>
                            <option value="option_4" <?php echo ($question['answer'] == 'option_4') ? 'selected' : ''; ?>>Option 4</option>
                        </select>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

            <button type="submit" name="updateQuestion">Update Question</button>
        </form>
    </div>
</body>

<footer>
    <script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
    <script src='../language.js'></script>
    <script src="quiz.js"></script>
</footer>

</html>
